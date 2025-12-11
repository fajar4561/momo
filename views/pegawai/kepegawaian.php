<?php
date_default_timezone_set('Asia/Jakarta');
$today = new DateTime();
require 'env/koneksi.php';
require 'env/tgl_indo.php';
require 'public/component/toast.php';
require 'req/style-kepegawaian.php';


$count_home = $koneksi->query("SELECT COUNT(*) AS total FROM file_detail WHERE validasi IS NULL AND jenis_file NOT IN ('FOTO', 'TRANSK')")->fetch_assoc()['total'];
$count_penilaian = $koneksi->query("SELECT COUNT(*) AS total FROM file_detail  WHERE tgl_berakhir <> '0000-00-00' AND (tgl_berakhir <= CURDATE() OR tgl_berakhir <= DATE_ADD(CURDATE(), INTERVAL 3 MONTH) ) ORDER BY tgl_berakhir ASC ")->fetch_assoc()['total'];
 
?>
<?php if (isMobileDevice()) { ?>
<style>
    .leftbar-tab-menu {
			display: none; /* Menyembunyikan menu saat halaman dimuat */
		}
	</style>
<?php } ?>
<div class="row p-3">
    <div class="col-md-12">
        <div class="card border-0 rounded-3">
            <div class="card-header bg-white border-0 pb-2">
                <h4 class="card-title mb-1 fw-bold">Manajemen Berkas Pegawai</h4>
                <p class="text-muted small mb-0">
                    Halaman ini digunakan oleh bagian HRD untuk memantau kelengkapan, memvalidasi, dan memperbarui berkas pegawai secara terpusat.
                </p>
            </div>
            <div class="row align-items-center">
                <!-- Gambar Header -->
                <div class="col-md-3 text-center">
                    <img src="public/bg/kepegawaian.webp" class="img-fluid rounded-3" alt="Informasi Pegawai">
                </div>
                <!-- Teks Informasi -->
                <div class="col-md-9">
                    <h4 class="fw-bold mb-3 text-primary">
                        <i class="bi bi-info-circle"></i> Informasi Halaman
                    </h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Gunakan tombol <button type="button" class="btn btn-primary btn-sm">Opsi</button>
                            untuk menambah berkas baru, memperbarui data, atau melakukan validasi dokumen pegawai.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Pastikan format file yang diunggah sesuai dengan ketentuan sistem.
                            Hanya file dengan ekstensi <code>.pdf</code> atau <code>.jpg/.png</code> yang diperbolehkan.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Gunakan fitur <button type="button" class="btn btn-outline-secondary btn-sm">Search...</button>
                            di pojok kanan atas tabel untuk mencari pegawai berdasarkan nama atau nomor induk.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Klik ikon <i class="las la-eye"></i> untuk melihat detail berkas,
                            <i class="las la-pen"></i> untuk memperbarui, atau <i class="las la-trash"></i> untuk menghapus berkas.
                        </li>
                        <li>
                            <i class="bi bi-chevron-right text-primary"></i>
                            Gunakan menu <strong>Entries per page</strong> untuk mengatur jumlah data pegawai yang ditampilkan di tabel.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs modern-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <i class="fas fa-exclamation-circle"></i> Validasi
                            <span class="badge bg-primary ms-2">
                                <?= $count_home ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <i class="fas fa-clock"></i> Kadaluarsa
                            <span class="badge bg-warning text-dark ms-2">
                                <?= $count_penilaian ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <i class="fas fa-folder-open"></i> Arsip Pegawai
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="tab-pane-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive datatable">
                                        <table class="table table-hover" id="datatable_1">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nopeg</th>
                                                    <th>Nama</th>
                                                    <th>Unit</th>
                                                    <th>Jenis Berkas</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no =1 ; 
                                                $ambil_data = $koneksi->query("SELECT * FROM file_detail WHERE validasi IS NULL AND jenis_file NOT IN ('FOTO', 'TRANSK') ORDER BY tgl_upload DESC");
                                                while ($data = mysqli_fetch_assoc($ambil_data)) {
                                                	$nopeg = $data['nopeg'];
                                                	$ambil_perawat = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
                                                    $row = $ambil_perawat->fetch_assoc();
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?=$no++?>
                                                    </td>
                                                    <td>
                                                        <?=$data['nopeg']?>
                                                    </td>
                                                    <td>
                                                        <?=$row['nama']?>
                                                    </td>
                                                    <td>
                                                        <?=$row['unit']?>
                                                    </td>
                                                    <td>
                                                        <?php
														// Mapping warna dan ikon berdasarkan jenis file
														$styleMap = array(
														    'KTP' => array('color' => 'primary', 'icon' => 'fa-id-card'),
														    'KK' => array('color' => 'secondary', 'icon' => 'fa-users'),
														    'IJAZAH' => array('color' => 'info', 'icon' => 'fa-graduation-cap'),
														    'PPNI' => array('color' => 'secondary', 'icon' => 'fa-user-nurse'),
														    'SIP' => array('color' => 'warning', 'icon' => 'fa-file-medical'),
														    'STR' => array('color' => 'danger', 'icon' => 'fa-certificate'),
														    'NPWP' => array('color' => 'dark', 'icon' => 'fa-file-invoice-dollar'),
														    'SERTIFIKAT' => array('color' => 'secondary', 'icon' => 'fa-award')
														);

														$jenis = $data['jenis_file'];

														// Cek manual jika tidak ada key di array (kompatibel PHP lama)
														if (isset($styleMap[$jenis])) {
														    $badgeColor = $styleMap[$jenis]['color'];
														    $badgeIcon  = $styleMap[$jenis]['icon'];
														} else {
														    $badgeColor = 'secondary';
														    $badgeIcon  = 'fa-file';
														}

														echo "<span class='badge bg-{$badgeColor} px-3 py-2 rounded-pill shadow-sm' style='width:95px; display:inline-block; text-align:center;'>
                                                            <i class='fas fa-bell me-1'></i>
                                                            {$jenis}
                                                        </span>";;
													?>
                                                    </td>
                                                    <td>
                                                        <?php 
	                                                    	if ($data['jenis_file']=='SERTIFIKAT') {
	                                                    		$nama_file = $data['nama_file'];
	                                                    		$konek_sertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE berkas='$nama_file'");
	                                                    		$data_sertifikat = $konek_sertifikat->fetch_assoc();
	                                                    		
	                                                    		echo $data_sertifikat['keterangan'];
	                                                    	}
	                                                    ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" id="detail-container" style="display:none;">
                                <div class="col-12">
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Detail Pengajuan</h5>
                                            <p><b>Kode:</b> <span id="detail-kode"></span></p>
                                            <p><b>Nama:</b> <span id="detail-nama"></span></p>
                                            <p><b>Unit:</b> <span id="detail-unit"></span></p>
                                            <p><b>Jenjang:</b> <span id="detail-jenjang"></span></p>
                                            <button class="btn btn-sm btn-danger" id="btn-close-detail">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <div class="tab-pane-box">
                            <div class="p-4 position-relative overflow-hidden">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px; height:48px;">
                                            <i class="fas fas fa-book-open fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="fw-semibold text-primary mb-1">Panel Berkas kadaluarsa dan hampir kadaluarsa</h5>
                                        <p class="text-muted mb-0 small">
                                            Panel ini menampilkan daftar berkas pegawai yang telah kadaluarsa atau mendekati masa kadaluarsa. Gunakan panel ini untuk memeriksa, memperbarui, dan memvalidasi ulang dokumen sesuai ketentuan kepegawaian.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="datatable_2">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nopeg</th>
                                                    <th>Nama</th>
                                                    <th>Unit</th>
                                                    <th>Jenis Berkas</th>
                                                    <th>Keterangan</th>
                                                    <th>Sisa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
										        $no = 1;
										        $today = date_create(date('Y-m-d'));
										        $ambil_data2 = $koneksi->query("
												    SELECT * FROM file_detail
												    WHERE tgl_berakhir <> '0000-00-00'
												      AND (tgl_berakhir <= CURDATE() OR tgl_berakhir <= DATE_ADD(CURDATE(), INTERVAL 3 MONTH))
												    ORDER BY tgl_berakhir ASC
												");


										        while ($fetch = mysqli_fetch_assoc($ambil_data2)) {
										            $tglBerakhir = date_create($fetch['tgl_berakhir']);
										            $nopeg = $fetch['nopeg'];

										            $ambil_perawat = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
										            $row = $ambil_perawat->fetch_assoc();

										            // Hitung selisih tanggal
										            if ($tglBerakhir && $tglBerakhir >= $today) {
										                $interval = date_diff($today, $tglBerakhir);
										                $totalHari = ($interval->y * 365) + ($interval->m * 30) + $interval->d;
										                $sisaMasa = $interval->y . " thn, " . $interval->m . " bln, " . $interval->d . " hr";

										                // Tentukan warna badge berdasarkan sisa hari
										                if ($totalHari <= 30) {
										                    $badgeColor = "secondary"; // hampir habis banget
										                } elseif ($totalHari <= 90) {
										                    $badgeColor = "warning"; // 1-3 bulan
										                } else {
										                    $badgeColor = "success"; // aman
										                }
										            } else {
										                $sisaMasa = "Sudah Kadaluarsa";
										                $badgeColor = "danger";
										            }
										        ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $fetch['nopeg'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['nama'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['unit'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
										                    // Mapping warna dan ikon berdasarkan jenis file
										                    $styleMap = array(
										                        'KTP' => array('color' => 'primary', 'icon' => 'fa-id-card'),
										                        'KK' => array('color' => 'secondary', 'icon' => 'fa-users'),
										                        'IJAZAH' => array('color' => 'info', 'icon' => 'fa-graduation-cap'),
										                        'PPNI' => array('color' => 'secondary', 'icon' => 'fa-user-nurse'),
										                        'SIP' => array('color' => 'warning', 'icon' => 'fa-file-medical'),
										                        'STR' => array('color' => 'danger', 'icon' => 'fa-certificate'),
										                        'NPWP' => array('color' => 'dark', 'icon' => 'fa-file-invoice-dollar'),
										                        'SERTIFIKAT' => array('color' => 'secondary', 'icon' => 'fa-award')
										                    );

										                    $jenis = $fetch['jenis_file'];
										                    if (isset($styleMap[$jenis])) {
										                        $badgeJenis = $styleMap[$jenis]['color'];
										                        $badgeIcon = $styleMap[$jenis]['icon'];
										                    } else {
										                        $badgeJenis = 'secondary';
										                        $badgeIcon = 'fa-file';
										                    }

										                    echo "<span class='badge bg-{$badgeJenis} px-3 py-2 rounded-pill shadow-sm d-inline-block text-center' style='width:95px;'>
										                            <i class='fas fa-bell me-1'></i> {$jenis}
										                          </span>";
										                    ?>
                                                    </td>
                                                    <td>
                                                        <?php 
										                        if ($fetch['jenis_file']=='SERTIFIKAT') {
										                            $nama_file = $fetch['nama_file'];
										                            $konek_sertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE berkas='$nama_file'");
										                            $data_sertifikat = $konek_sertifikat->fetch_assoc();
										                            echo $data_sertifikat['keterangan'];
										                        }
										                    ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-<?= $badgeColor ?> px-3 py-2 rounded-pill shadow-sm">
                                                            <?= $sisaMasa ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="p-4">
                            <div class="row g-3">
                                <!-- Panel kiri -->
                                <div class="col-lg-3">
                                    <div class="side-panel p-3 rounded shadow-sm">
                                        <div class="input-group mb-2">
                                            <button class="btn btn-light border" type="button">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <input type="text" id="search" class="form-control" placeholder="Cari nama / nopeg / unit...">
                                        </div>
                                        <small class="text-muted">Tekan Enter untuk pencarian cepat</small>
                                        <hr>
                                        <div class="scroll-container mt-2">
                                            <div id="files-tab" class="nav flex-column"></div>
                                        </div>
                                        <div class="mt-3 text-muted small text-center border-top pt-2">
                                            <i class="fas fa-database me-1"></i> 620GB / 1TB digunakan
                                            <div class="progress mt-1" style="height: 4px;">
                                                <div class="progress-bar bg-primary" style="width: 62%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel kanan -->
                                <div class="col-lg-9">
                                    <div class="content-panel p-4 rounded shadow-sm">
                                        <div id="files-tabContent" class="text-muted">
                                            <div class="text-center">
                                                <h4 class="mt-3 text-dark">
                                                  <span class="text-secondary">Panduan:</span> Silakan pilih pegawai di panel kiri untuk melihat berkas terkait.
                                                </h4>
                                                <h1 class="text-dark">Manajemen Berkas</h1>
                                                <div class="border w-25 mx-auto border-primary mb-3"></div>
                                                <img src="public/bg/search.webp" class="img-fluid" style="max-width:40%">
                                                <p class="mt-0">Sistem akan menampilkan data berkas pegawai secara otomatis apabila tersedia, baik yang telah divalidasi maupun yang masih menunggu validasi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'req/js-kepegawaian.php' ?>