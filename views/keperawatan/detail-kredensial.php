<?php
require 'public/component/toast.php';
require 'env/tgl_indo.php'; 
$kode = $_GET['k'];
$nopeg = $_GET['nopeg'];

$ambil_kredensial = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg'");
$data_pengajuan = $ambil_kredensial->fetch_assoc();

$id_jenjang = $data_pengajuan['jenjang_diajukan'];
$ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
$data_rkk = $ambil_rkk->fetch_assoc();

// ambil data pegawai
$ambil_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$data_pegawai = $ambil_pegawai->fetch_assoc();

function getFileFormat($file) {
    // Menentukan path file dan ekstensi file
    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_path = 'public/file/berkas/' . $file;
    $file_size = file_exists($file_path) ? filesize($file_path) / 1024 : 0; // Cek apakah file ada

    // Pemendekan nama file jika terlalu panjang
    $maxLength = 10;
    if (strlen($file) > $maxLength) {
        $shortName = substr($file, -$maxLength); // Ambil bagian akhir dari nama file
        $displayName = '...' . $shortName; // Format nama file pendek
    } else {
        $displayName = $file;
    }

    // Menentukan format berdasarkan ekstensi file
    if ($file_extension == 'pdf') {
        $format = 'la-file-pdf text-danger';
    } elseif ($file_extension == 'png') {
        $format = 'la-file-image text-warning';
    } elseif ($file_extension == 'jpg') {
        $format = 'la-file-image text-info';
    } elseif ($file_extension == 'jpeg') {
        $format = 'la-file-image text-success';
    } else {
        $format = 'la-file text-secondary';
    }

    return [
        'format' => $format,
        'file_size' => $file_size,
        'file_path' => $file_path,
        'display_name' => $displayName, // Nama file pendek
    ];
}

// ambil data berkas 
$n = $nopeg;
$ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$n'");
$ambil_berkas_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
$sertifikat = $ambil_berkas_sertif->num_rows;

$berkas = mysqli_fetch_assoc($ambil_berkas);

// Memanggil fungsi untuk setiap berkas
$ktpData = getFileFormat($berkas['KTP']);
$kkData = getFileFormat($berkas['KK']);
$ijazahData = getFileFormat($berkas['IJAZAH']);
$ppniData = getFileFormat($berkas['PPNI']);
$sipData = getFileFormat($berkas['SIP']);
$strData = getFileFormat($berkas['STR']);
$npwpData = getFileFormat($berkas['NPWP']);

// Anda dapat mengakses hasilnya seperti ini
$ktp = $ktpData['format'];
$file_path_ktp = $ktpData['file_path'];
$file_size_ktp = $ktpData['file_size'];
$display_name_ktp = $ktpData['display_name']; // Nama file pendek

$kk = $kkData['format'];
$file_path_kk = $kkData['file_path'];
$file_size_kk = $kkData['file_size'];
$display_name_kk = $kkData['display_name']; // Nama file pendek

$ijazah = $ijazahData['format'];
$file_path_ijazah = $ijazahData['file_path'];
$file_size_ijazah = $ijazahData['file_size'];
$display_name_ijazah = $ijazahData['display_name']; // Nama file pendek

$ppni = $ppniData['format'];
$file_path_ppni = $ppniData['file_path'];
$file_size_ppni = $ppniData['file_size'];
$display_name_ppni = $ppniData['display_name']; // Nama file pendek

$sip = $sipData['format'];
$file_path_sip = $sipData['file_path'];
$file_size_sip = $sipData['file_size'];
$display_name_sip = $sipData['display_name'];

$str = $strData['format'];
$file_path_str = $strData['file_path'];
$file_size_str = $strData['file_size'];
$display_name_str = $strData['display_name'];

$npwp = $npwpData['format'];
$file_path_npwp = $npwpData['file_path'];
$file_size_npwp = $npwpData['file_size'];
$display_name_npwp = $npwpData['display_name'];


$files = [
    "FOTO"   => "Foto Terbaru",
    "KTP"    => "KTP",
    "KK"     => "Kartu Keluarga",
    "IJAZAH" => "Ijazah Terkahir",
    "PPNI"   => "PPNI",
    "SIP"    => "SIP",
    "STR"    => "STR",
    "NPWP"   => "NPWP",
    "PORTOFOLIO"   => "Portofolio",
    "TRANSKIP"   => "Transkip Nilai",
];

require 'req/style-detail-kredensial.php';
?>
<div class="row p-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold pt-0" data-bs-toggle="tab" href="#Project2_Tab" role="tab"><span class="text-primary">#
                                <?=$data_pengajuan['kode_pengajuan']?></span></a>
                    </li>
                </ul>
            </div>
            <div class="card-body pt-0">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active mt-3" id="Project2_Tab" role="tabpanel">
                        <div class="holder">
                            <ul class="steppedprogress pt-1">
                                <!-- selesai -->
                                <!-- <li class="complete continuous"><span>Pengajuan</span></li> -->
                                <!-- gagal -->
                                <!-- <li class="failed"><span>Verifikasi Berkas</span></li> -->
                                <!-- sedang berjalan -->
                                <!-- <li class="in-progress"><span>Penilaian</span></li> -->
                                <!-- belum mulai -->
                                <!-- <li class=""><span>Selesai</span></li> -->
                                <li class="complete continuous"><span>Pengajuan</span></li>
                                <li class="in-progress"><span>Verifikasi Berkas</span></li>
                                <li class=""><span>Penilaian</span></li>
                                <li class=""><span>Selesai</span></li>
                            </ul>
                        </div>
                        <div class="row mt-3 p-3">
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <p class="mb-0 text-muted">Tanggal Pengajuan :
                                        <?= date('d M Y', strtotime($data_pengajuan['tgl_pengajuan'])) ?>
                                    </p>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-primary">
                                                <i class="fas fa-user fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Nama</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_pegawai['nama']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-success">
                                                <i class="fas fa-map-marker-alt fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Alamat</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_pegawai['alamat']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-warning">
                                                <i class="fas fa-briefcase fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Unit</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_pegawai['unit']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-danger">
                                                <i class="fas fas fa-user-md fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Jenjang Karir</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_rkk['nama_rkk']?>
                                                    <?=$data_rkk['unit_rkk']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="file-box-content mt-2">
                                        <?php
                                        $colors = ['text-primary', 'text-success', 'text-danger', 'text-warning', 'text-info', 'text-secondary'];

                                        foreach ($files as $field => $label): 
                                            if (!empty($berkas[$field])):
                                                // pilih warna random
                                                $randColor = $colors[array_rand($colors)];
                                        ?>
                                        <div class="file-box">
                                            <div class="dropdown dropend">
                                                <a href="#" data-bs-toggle="dropdown" class="download-icon-link" download>
                                                    <i class="las la-download file-download-icon"></i>
                                                    <div class="text-center">
                                                        <i class="lar la-file-alt <?= $randColor ?>"></i>
                                                        <h6 class="text-truncate">
                                                            <?= htmlspecialchars($berkas[$field]) ?>
                                                        </h6>
                                                        <small class="text-muted">
                                                            <?= $label ?></small>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Download</a>
                                                    <a class="dropdown-item" href="#">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            endif;
                                        endforeach;
                                        if ($sertifikat >= 1) {
                                            while ($data_sertifikat= mysqli_fetch_assoc($ambil_berkas_sertif)) {
                                                $randColor2 = $colors[array_rand($colors)];
                                         
                                        ?>
                                        <div class="file-box">
                                            <a href="public/file/berkas/<?= htmlspecialchars($data_sertifikat['berkas']) ?>" class="download-icon-link" download>
                                                <i class="las la-download file-download-icon"></i>
                                            </a>
                                            <div class="text-center">
                                                <i class="lar la-file-alt <?= $randColor2 ?>"></i>
                                                <h6 class="text-truncate">
                                                    <?= htmlspecialchars($data_sertifikat['berkas']) ?>
                                                </h6>
                                                <small class="text-muted">Sertifikat</small>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle" id="myTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th rowspan="2" style="width: 50px;">No</th>
                                                <th rowspan="2">Materi</th>
                                                <th rowspan="2" class="text-center">Ada</th>
                                                <th rowspan="2" class="text-center">Tidak Ada</th>
                                                <th rowspan="2" class="text-center">Sedang Proses</th>
                                                <th colspan="3" class="text-center">Verifikasi</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Tanggal Dikeluarkan</th>
                                                <th class="text-center">Tanggal Berakhir</th>
                                                <th class="text-center">Nomor Surat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        		$no = 1;
                                        		$no2 = 1; 
                                        		foreach ($files as $field => $label) :
												    $ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$field]' AND nopeg='$nopeg' ");
												    $data_detail = $ambil_detail_file->fetch_assoc();
                                        	?>
                                            <tr data-bs-toggle="modal" data-bs-target="#detailModal<?=$field?>" style="cursor:pointer;">
                                                <td class="text-center position-relative">
                                                    <?=$no++?>
                                                </td>
                                                <td class="">
                                                    <?=$label?>
                                                </td>
                                                <td class="text-center">
                                                	<?=($data_detail['validasi']=='ada' ? '<i class="fas fa-check text-success"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                	<?=($data_detail['validasi']=='tidak' ? '<i class="fas fa-check text-danger"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                	<?=($data_detail['validasi']=='proses' ? '<i class="fas fa-check text-warning"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_keluar'])) 
            										? '' : date("d F Y", strtotime($data_detail['tgl_keluar']))?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['tgl_berakhir'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) 
                                                	? '' : date("d F Y", strtotime($data_detail['tgl_berakhir']))?>
                                                </td>
                                                <td class="text-center">
                                                    <?=(in_array($field, ['FOTO','PORTOFOLIO']) ? '~' : $data_detail['no_file'])?>
                                                </td>
                                                <!-- modal data -->
                                                <div class="modal fade" id="detailModal<?=$field?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                                            <!-- Header -->
                                                            <div class="modal-header bg-primary text-white rounded-top-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3 shadow-sm" style="width:45px;height:45px;">
                                                                        <i class="fas fa-id-card fa-lg"></i>
                                                                    </div>
                                                                    <h5 class="modal-title fw-semibold">Detail Kredensial</h5>
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <!-- Preview File -->
                                                            <div class="p-3 text-center border-bottom bg-light">
                                                                <?php
                                                                	if ($data_detail['jenis_file']=='FOTO') {
												                    	$file_path = "public/img/".$data_detail['nama_file'];
                                                                	 }
                                                                	 else {
                                                                	 	$file_path = "public/file/berkas/".$data_detail['nama_file'];
                                                                	 } 
												                    $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
												                    
												                    if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
												                        echo '<img src="'.$file_path.'" class="img-fluid rounded-3 shadow-sm" style="width: 100%; max-width: 250px; height: auto; object-fit: cover;">';
												                    } elseif ($ext === 'pdf') {
												                        echo '<iframe src="'.$file_path.'" class="w-100 rounded-3 shadow-sm" style="height:400px;" frameborder="0"></iframe>';
												                    } else {
												                        echo '<p class="text-muted fst-italic">Preview tidak tersedia</p>';
												                    }
												                ?>
                                                            </div>
                                                            <form method="post" action="app/controller/keperawatan/validasi-berkas.php" class="validasi-form">
                                                                <!-- Body -->
                                                                <div class="modal-body">
                                                                    <div class="row g-4">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Materi</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=$label?></span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Nomor Surat</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=$data_detail['no_file']?></span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Tanggal Dikeluarkan</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=($data_detail['tgl_keluar']=='0000-00-00' || empty($data_detail['tgl_keluar'])) ? '-' : date("d F Y", strtotime($data_detail['tgl_keluar']))?>
                                                                                </span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Tanggal Berakhir</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=($data_detail['tgl_berakhir']=='0000-00-00' || empty($data_detail['tgl_berakhir'])) ? '-' : date("d F Y", strtotime($data_detail['tgl_berakhir']))?>
                                                                                </span>
                                                                            </li>
                                                                            <?php
																			$sisaMasa = '-'; // default

																			if (!empty($data_detail['tgl_berakhir']) && $data_detail['tgl_berakhir'] != '0000-00-00') {
																			    $today = new DateTime(); // tanggal hari ini
																			    $tglBerakhir = new DateTime($data_detail['tgl_berakhir']);

																			    if ($tglBerakhir >= $today) {
																			        $interval = $today->diff($tglBerakhir);
																			        $sisaMasa = $interval->y . " tahun, " . $interval->m . " bulan, " . $interval->d . " hari";
																			    } else {
																			        $sisaMasa = "Sudah Kadaluarsa";
																			    }
																			}
																			?>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Sisa Masa Berlaku</span>
                                                                                <span class="fw-semibold">
                                                                                    <?= $sisaMasa ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <input type="hidden" name="id_berkas" value="<?=$data_detail['id']?>">
                                                                    <input type="hidden" name="kode_pengajuan" value="<?=$kode?>">
                                                                    <input type="hidden" name="nopeg" value="<?=$nopeg?>">
                                                                    <div class="row gy-3">
                                                                        <div class="col-12">
																		    <label class="form-label fw-semibold">Validasi <span class="text-danger">*</span></label>
																		    <div class="d-flex flex-wrap gap-3">
																		        <input type="radio" class="btn-check" name="validasi" id="valid_<?=$field?>_1" value="ada" autocomplete="off" required>
																		        <label class="btn btn-outline-success rounded-pill px-3 py-1" for="valid_<?=$field?>_1">
																		            <i class="fas fa-check me-1"></i> Ada
																		        </label>

																		        <input type="radio" class="btn-check" name="validasi" id="valid_<?=$field?>_2" value="tidak" autocomplete="off">
																		        <label class="btn btn-outline-danger rounded-pill px-3 py-1" for="valid_<?=$field?>_2">
																		            <i class="fas fa-times me-1"></i> Tidak Ada
																		        </label>

																		        <input type="radio" class="btn-check" name="validasi" id="valid_<?=$field?>_3" value="proses" autocomplete="off">
																		        <label class="btn btn-outline-warning rounded-pill px-3 py-1" for="valid_<?=$field?>_3">
																		            <i class="fas fa-spinner me-1"></i> Sedang Proses
																		        </label>
																		    </div>
																		</div>
                                                                        <div class="col-12">
                                                                            <label class="form-label fw-semibold">Catatan <small class="text-muted">(opsional)</small></label>
                                                                            <textarea class="form-control rounded-3" name="catatan" rows="2" placeholder="Tambahkan catatan validasi (jika perlu)..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Footer -->
                                                                <div class="modal-footer border-0 bg-white">
                                                                    <a href="<?=$file_path?>" target="_blank" class="btn btn-sm btn-primary">
                                                                        <i class="fas fa-eye me-1"></i> Lihat
                                                                    </a>
                                                                    <button class="btn btn-sm btn-info" download type="sybmit">
                                                                        <i class="fas fa-download me-1"></i> Simpan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <thead class="table-light">
                                            <tr>
                                                <th colspan="8" class="text-center">Sertifikat Pelatihan Yang Dimiliki Selama Bekerja di RS. Permata Medika</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        		$ambil_sertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$nopeg'");
												while ($data_sertifikat= mysqli_fetch_assoc($ambil_sertifikat)) {
												    $sertifikat_berkas = $data_sertifikat['berkas'];
												    $ambil_sertif = $koneksi->query("SELECT * FROM file_detail WHERE nama_file = '$sertifikat_berkas' ");
												    $pecah_sertifikat = $ambil_sertif->fetch_assoc();
                                        	?>
                                            <tr>
                                                <td class="text-center">
                                                    <?=$no2++?>
                                                </td>
                                                <td>
                                                    <?=$data_sertifikat['keterangan']?>
                                                </td>
                                                <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">
                                                    <?=
                                                		($pecah_sertifikat['tgl_keluar'] == '0000-00-00' || empty($pecah_sertifikat['tgl_keluar'])) ? '' : date("d F Y", strtotime($pecah_sertifikat['tgl_keluar']))
                                                	?>
                                                </td>
                                                <td class="text-center">
                                                    <?=
                                                		($pecah_sertifikat['tgl_berakhir'] == '0000-00-00' || empty($pecah_sertifikat['tgl_berakhir'])) ? '' : date("d F Y", strtotime($pecah_sertifikat['tgl_berakhir']))
                                                	?>
                                                </td>
                                                <td class="text-center">
                                                    <?=$pecah_sertifikat['no_file']?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
const fileBoxContent = document.querySelector('.file-box-content');

// === DRAG TO SCROLL ===
let isDown = false;
let startX;
let scrollLeft;

fileBoxContent.addEventListener('mousedown', (e) => {
    isDown = true;
    fileBoxContent.classList.add('active');
    startX = e.pageX - fileBoxContent.offsetLeft;
    scrollLeft = fileBoxContent.scrollLeft;
});

fileBoxContent.addEventListener('mouseleave', () => {
    isDown = false;
    fileBoxContent.classList.remove('active');
});

fileBoxContent.addEventListener('mouseup', () => {
    isDown = false;
    fileBoxContent.classList.remove('active');
});

fileBoxContent.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - fileBoxContent.offsetLeft;
    const walk = (x - startX) * 1.5; // kecepatan geser (1.5 bisa disesuaikan)
    fileBoxContent.scrollLeft = scrollLeft - walk;
});

// === MOUSE WHEEL KE SAMPING ===
fileBoxContent.addEventListener('wheel', (e) => {
    if (e.deltaY !== 0) {
        e.preventDefault();
        fileBoxContent.scrollLeft += e.deltaY; // geser horizontal dengan scroll wheel
    }
});

// sweet alert validasi berkas
document.querySelectorAll('.validasi-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // cegah submit langsung

        Swal.fire({
            title: '<span style="font-size:16px;font-weight:600;color:#333;">Mohon tunggu...</span>',
            html: `
	        <p style="margin-top:8px;font-size:14px;color:#666;">
	            Sedang diproses, jangan menutup halaman ini.
	        </p>
	    `,
            imageUrl: 'public/bg/loading3.gif', // bisa pakai GIF / animasi SVG
            imageWidth: 200,
            imageHeight: 200,
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                popup: 'swal-premium'
            }
        });


        // setelah beberapa saat submit formnya
        setTimeout(() => {
            form.submit();
        }, 1200); // 1.2 detik delay biar kelihatan smooth
    });
});
</script>