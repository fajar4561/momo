<?php 
require 'req/style-data-kredensial.php';
require 'env/keamanan.php';
$data_kesehatan = $koneksi->query("SELECT * FROM pegawai WHERE jenis_pegawai='1' AND jenis_kesehatan IN (2,3)");
$data_perawat = $koneksi->query("SELECT * FROM pegawai WHERE jenis_pegawai='1' AND jenis_kesehatan='2'");
$data_bidan = $koneksi->query("SELECT * FROM pegawai WHERE jenis_pegawai='1' AND jenis_kesehatan='3'");
$pk_1 = $koneksi->query("SELECT * FROM pegawai WHERE  jenjang_karir IN (1,18)");
$pk_2 = $koneksi->query("SELECT * FROM pegawai WHERE  jenjang_karir IN (2,4,6,8,10,12,14,16,19)");
$pk_3 = $koneksi->query("SELECT * FROM pegawai WHERE  jenjang_karir IN (3,5,7,9,11,13,15,17,20)");
$jumlah_pk_1 = $pk_1->num_rows;
$jumlah_pk_2 = $pk_2->num_rows;
$jumlah_pk_3 = $pk_3->num_rows;
$jumlah_bidan = $data_bidan->num_rows;
$jumlah_perawat = $data_perawat->num_rows;
$jumlah_kesehatan = $data_kesehatan->num_rows;

$count_home = $koneksi->query("SELECT COUNT(*) AS total FROM pengajuan_kredensial WHERE status_pengajuan='menunggu'")->fetch_assoc()['total'];
$count_nilai = $koneksi->query("SELECT COUNT(*) AS total FROM pengajuan_kredensial WHERE status_pengajuan='penilaian'")->fetch_assoc()['total'];
$count_selesai = $koneksi->query("SELECT COUNT(*) AS total FROM pengajuan_kredensial WHERE status_pengajuan='selesai'")->fetch_assoc()['total'];
$count_mengulang = $koneksi->query("SELECT COUNT(*) AS total FROM pengajuan_kredensial WHERE status_pengajuan='mengulang'")->fetch_assoc()['total'];
$count_validasi_gagal = $koneksi->query("SELECT COUNT(*) AS total FROM pengajuan_kredensial WHERE status_pengajuan='validasi gagal'")->fetch_assoc()['total'];



$tanggal = [];
$jumlah = [];

$sql = "
    SELECT DATE_FORMAT(tgl_pengajuan, '%Y-%m-01') AS bulan, COUNT(*) AS total
    FROM pengajuan_kredensial
    GROUP BY bulan
    ORDER BY bulan ASC
";
$query = $koneksi->query($sql);
 
// Tambahkan pengecekan error
if (!$query) {
    die("Query error: " . $koneksi->error);
}

while ($row = $query->fetch_assoc()) {
    $tanggal[] = str_replace(' ', 'T', $row['bulan'] . ' 00:00:00');
    $jumlah[] = (int)$row['total'];
}
?>
<div class="row p-3">
    <div class="col-md-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white border-0 pb-2">
                <h4 class="card-title mb-1 fw-bold">Dashboard Kredensial</h4>
                <p class="text-muted small mb-0">
                    Pusat informasi terpadu untuk memantau progres, memvalidasi berkas, dan mengelola kredensial dengan mudah.
                </p>
            </div>
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs modern-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <i class="fas fa-home me-2"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#validasi" role="tab">
                            <i class="fas fa-book-open me-2"></i> Validasi Berkas
                            <?php if ($count_home > 0 ) { ?> <span class="badge bg-primary ms-2">
                                <?= $count_home ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <i class="fas fa-clipboard-list me-2"></i> Penilaian
                            <?php if ($count_nilai > 0 ) { ?> <span class="badge bg-secondary ms-2">
                                <?= $count_nilai ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <i class="fas fa-user me-2"></i> Semua Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#lap" role="tab">
                            <i class="far fa-file-archive me-2"></i> Laporan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#berkas" role="tab">
                            <i class="fas fa-calendar-minus me-2"></i> Manajemen Berkas
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="tab-pane-box p-4">
                            <!-- Header -->
                            <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">
                                <div>
                                    <h5 class="fw-semibold text-primary mb-1">
                                        <i class="fas fa-chart-line me-2"></i>Dashboard Kredensial
                                    </h5>
                                    <p class="text-muted small mb-0">
                                        Ringkasan data pengajuan, penilaian, dan hasil akhir dalam periode tertentu.
                                    </p>
                                </div>
                                <div>
                                    <select class="form-select form-select-sm shadow-sm border-0" style="min-width:180px;">
                                        <option>Periode: Tahun 2025</option>
                                        <option>Periode: Tahun 2024</option>
                                        <option>Periode: Tahun 2023</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Statistik ringkas -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-3 col-sm-6">
                                    <div class="card border-0 shadow-sm rounded-4 p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary p-3 me-3">
                                                <i class="fas fa-clock fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">Menunggu</h6>
                                                <small class="text-muted">
                                                    <?=$count_home?> Pengajuan</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="card border-0 shadow-sm rounded-4 p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-info bg-opacity-10 text-info p-3 me-3">
                                                <i class="fas fa-clipboard-list fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">Dalam Penilaian</h6>
                                                <small class="text-muted">
                                                    <?=$count_nilai?> Data</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="card border-0 shadow-sm rounded-4 p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-success bg-opacity-10 text-success p-3 me-3">
                                                <i class="fas fa-check-circle fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">Selesai</h6>
                                                <small class="text-muted">
                                                    <?=$count_selesai?> Pengajuan</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="card border-0 shadow-sm rounded-4 p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-danger bg-opacity-10 text-danger p-3 me-3">
                                                <i class="fas fa-times-circle fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">Mengulang</h6>
                                                <small class="text-muted">
                                                    <?=$count_mengulang?> Data</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Grafik placeholder -->
                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-3 text-primary">
                                        <i class="fas fa-chart-bar me-2"></i>Grafik Tren Pengajuan Kredensial
                                    </h6>
                                    <div id="areaChart"></div>
                                </div>
                            </div>
                            <!-- Tabel laporan -->
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-3 text-primary">
                                        <i class="fas fa-table me-2"></i>Data Laporan Terbaru
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Unit</th>
                                                    <th>Jenjang</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $no = 1;
                                                  $laporan = $koneksi->query("SELECT
                                                                fd.kode_pengajuan,
                                                                fd.tgl_pengajuan,
                                                                fd.nopeg,
                                                                CONCAT(mr.nama_rkk, ' - ', mr.unit_rkk) AS jenjang,
                                                                fd.status_pengajuan,
                                                                p.nama,
                                                                p.unit,
                                                                p.jabatan
                                                            FROM pengajuan_kredensial fd
                                                            JOIN pegawai p ON fd.nopeg = p.nopeg
                                                            LEFT JOIN master_rkk mr ON fd.jenjang_diajukan = mr.id ORDER BY fd.tgl_pengajuan DESC LIMIT 5 "); 
                                                  while ($d = $laporan->fetch_assoc()) {
                                                  ?>
                                                <tr>
                                                    <td>
                                                        <?=$no++?>
                                                    </td>
                                                    <td>
                                                        <?=$d['nama']?>
                                                    </td>
                                                    <td>
                                                        <?=date("d M Y", strtotime($d['tgl_pengajuan']))?>
                                                    </td>
                                                    <td>
                                                        <?=$d['unit']?>
                                                    </td>
                                                    <td>
                                                        <?=$d['jenjang']?>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-primary-subtle text-primary fw-semibold text-capitalize">
                                                            <?=$d['status_pengajuan']?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="detail-data-kredensial?k=<?= $d['kode_pengajuan']?>&nopeg=<?=$d['nopeg']?>" class="btn btn-sm btn-outline-primary rounded-pill px-3"> <i class="fas fa-eye me-1"></i> Detail</a>                                                    
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
                    <div class="tab-pane fade" id="validasi" role="tabpanel">
                        <div class="tab-pane-box">
                            <?php if ($count_home == 0): ?>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-7 col-xl-12 col-lg-12 p-0 vh-100 d-flex justify-content-center" style="background: url('public/bg/bg_kredensial.webp') no-repeat center center; background-size: cover;">
                                    <div class="d-flex align-items-center">
                                        <div class="account-title text-center text-dark">
                                            <img src="public/bg/kosong.webp" alt="" style="width: 100%; max-width: 550px; height: auto; object-fit: cover;" class="img-fluid rounded">
                                            <h4 class="mt-3 text-dark">MAAF, Belum ada berkas yang perlu di<span class="text-warning"> Validasi</span> </h4>
                                            <h1 class="text-dark">Mohon Untuk Menunggu</h1>
                                            <p class="mt-0">Sistem akan otomatis menampilkan data apabila sudah ada data berkas pengajuan yang perlu divalidasi</p>
                                            <div class="border w-25 mx-auto border-warning"></div>
                                        </div>
                                    </div>
                                    <!--end /div-->
                                </div>
                                <!--end col-->
                            </div>
                            <?php else : ?>
                            <div class="row">
                                <div class="p-4 position-relative overflow-hidden border-bottom mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="d-flex align-items-center mb-3 mb-md-0">
                                            <div class="me-3">
                                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px; height:48px;">
                                                    <i class="fas fa-hand-holding-heart fs-5"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="fw-semibold text-primary mb-1">Panel Validasi Berkas</h5>
                                                <p class="text-muted mb-0 small">
                                                    Menampilkan seluruh data perawat yang perlu dilakukan validasi berkas sebelum tahap penilaian.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Statistik ringkas -->
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="datatable_1">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama</th>
                                                    <th>Kode Pengajuan.</th>
                                                    <th>Tgl Pengajuan</th>
                                                    <th>Unit</th>
                                                    <th>Jenjang</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no =1 ; 
                                                $ambil_data = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE status_pengajuan='menunggu' ORDER BY tgl_pengajuan DESC");
                                                while ($data = mysqli_fetch_assoc($ambil_data)) {
                                                    $nopeg = $data['nopeg'];
                                                    $ambil_perawat = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
                                                    $row = $ambil_perawat->fetch_assoc();

                                                    $id_jenjang = $data['jenjang_diajukan'];
                                                    $ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
                                                    $data_rkk = $ambil_rkk->fetch_assoc();
                                                    $selisih = (time() - strtotime($data['tgl_pengajuan'])) / 86400;
                                                    $lama = ($selisih < 1) ? 'Hari ini' : floor($selisih) . ' hari lalu';
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?=$no++?>
                                                    </td>
                                                    <td>
                                                        <?=$row['nama']?>
                                                    </td>
                                                    <td>
                                                        <?=$data['kode_pengajuan']?>
                                                    </td>
                                                    <td>
                                                        <?=date("d M Y", strtotime($data['tgl_pengajuan']))?>
                                                    </td>
                                                    <td>
                                                        <?=$data['unit']?>
                                                    </td>
                                                    <td>
                                                        <?=$data_rkk['nama_rkk']?>
                                                        <?=$data_rkk['unit_rkk']?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $statusMap = [
                                                            'menunggu'   => ['color' => 'primary', 'label' => 'Menunggu'],
                                                            'penilaian'  => ['color' => 'secondary',    'label' => 'Dalam Penilaian'],
                                                            'selesai'    => ['color' => 'success', 'label' => 'Selesai'],
                                                        ];

                                                        $status = strtolower($data['status_pengajuan']);

                                                        $warna = isset($statusMap[$status]['color']) ? $statusMap[$status]['color'] : 'secondary';
                                                        $label = isset($statusMap[$status]['label']) ? $statusMap[$status]['label'] : ucfirst($status);
                                                        ?>
                                                        <span class="badge bg-<?= $warna ?> px-3 py-2 rounded-pill shadow-sm">
                                                            <i class="fas fa-bell me-1"></i>
                                                            <?= $label ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <?php if ($data['status_pengajuan'] =='menunggu') { ?>
                                                                <a href="detail-kredensial?k=<?=$data['kode_pengajuan']?>&nopeg=<?=$data['nopeg']?>" class="btn btn-secondary btn-sm">Validasi Berkas</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <div class="tab-pane-box">
                            <?php if ($count_nilai == 0): ?>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-7 col-xl-12 col-lg-12 p-0 vh-100 d-flex justify-content-center" style="background: url('public/bg/bg_kredensial.webp') no-repeat center center; background-size: cover;">
                                    <div class="d-flex align-items-center">
                                        <div class="account-title text-center text-dark">
                                            <img src="public/bg/tolak.webp" alt="" style="width: 100%; max-width: 550px; height: auto; object-fit: cover;" class="img-fluid rounded">
                                            <h4 class="mt-3 text-dark">MAAF, Belum ada pengajuan yang perlu di<span class="text-warning"> Nilai</span> </h4>
                                            <h1 class="text-dark">Mohon Untuk Menunggu</h1>
                                            <p class="mt-0">Sistem akan otomatis menampilkan data apabila sudah ada data berkas pengajuan yang perlu dinilai</p>
                                            <div class="border w-25 mx-auto border-warning"></div>
                                        </div>
                                    </div>
                                    <!--end /div-->
                                </div>
                                <!--end col-->
                            </div>
                            <?php else : ?>
                            <div class="p-4 position-relative overflow-hidden">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px; height:48px;">
                                            <i class="fas fa-clipboard-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="fw-semibold text-primary mb-1">Panel Penilaian Kredensial</h5>
                                        <p class="text-muted mb-0 small">
                                            Daftar peserta yang telah mengajukan kredensial dan menunggu proses penilaian oleh tim verifikator.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="datatable_2">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama</th>
                                                    <th>Kode Pengajuan.</th>
                                                    <th>Tgl Pengajuan</th>
                                                    <th>Unit</th>
                                                    <th>Jenjang</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no =1 ; 
                                                $ambil_data = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE status_pengajuan='penilaian' ORDER BY tgl_pengajuan DESC");
                                                while ($data = mysqli_fetch_assoc($ambil_data)) {
                                                    $nopeg = $data['nopeg'];
                                                    $ambil_perawat = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
                                                    $row = $ambil_perawat->fetch_assoc();

                                                    $id_jenjang = $data['jenjang_diajukan'];
                                                    $ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
                                                    $data_rkk = $ambil_rkk->fetch_assoc();
                                                ?>
                                                <tr onclick="window.location='penilaian-kredensial?k=<?=$data['kode_pengajuan']?>&nopeg=<?=$data['nopeg']?>'" style="cursor:pointer;">
                                                    <td class="text-center">
                                                        <?=$no++?>
                                                    </td>
                                                    <td>
                                                        <?=$row['nama']?>
                                                    </td>
                                                    <td>
                                                        <?=$data['kode_pengajuan']?>
                                                    </td>
                                                    <td>
                                                        <?=date("d M Y", strtotime($data['tgl_pengajuan']))?>
                                                    </td>
                                                    <td>
                                                        <?=$data['unit']?>
                                                    </td>
                                                    <td>
                                                        <?=$data_rkk['nama_rkk']?>
                                                        <?=$data_rkk['unit_rkk']?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $statusMap = [
                                                            'menunggu'   => ['color' => 'primary', 'label' => 'Menunggu'],
                                                            'penilaian'  => ['color' => 'secondary',    'label' => 'Dalam Penilaian'],
                                                            'selesai'    => ['color' => 'success', 'label' => 'Selesai'],
                                                        ];

                                                        $status = strtolower($data['status_pengajuan']);

                                                        $warna = isset($statusMap[$status]['color']) ? $statusMap[$status]['color'] : 'secondary';
                                                        $label = isset($statusMap[$status]['label']) ? $statusMap[$status]['label'] : ucfirst($status);
                                                        ?>
                                                        <span class="badge bg-<?= $warna ?> px-3 py-2 rounded-pill shadow-sm">
                                                            <i class="fas fa-bell me-1"></i>
                                                            <?= $label ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="tab-pane-box">
                            <div class="p-4 position-relative overflow-hidden border-bottom mb-3 bg-light rounded-3">
                              <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <!-- Kiri -->
                                <div class="d-flex align-items-center mb-3 mb-md-0">
                                  <div class="me-3">
                                    <div class="icon-circle bg-gradient-secondary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                                      <i class="fas fa-hand-holding-heart fs-5"></i>
                                    </div>
                                  </div>
                                  <div>
                                    <h5 class="fw-semibold text-dark mb-1">Panel Data Kredensial</h5>
                                    <p class="text-muted mb-0 small">
                                      <i class="fas fa-hospital me-1 text-secondary"></i>
                                      Seluruh data kredensial perawat RS Permata Medika — pantau status validasi secara real-time.
                                    </p>
                                  </div>
                                </div>

                                <!-- Kanan: Statistik Grid Responsif -->
                                <div class="stats-grid ms-md-3 mt-3 mt-md-0 flex-grow-1">
                                  <div class="stat-card text-center border rounded-3 px-3 py-2 bg-white shadow-sm hover-scale">
                                    <h6 class="mb-0 fw-bold text-primary"><?=$count_home?></h6>
                                    <small class="text-muted">Menunggu</small>
                                  </div>
                                  <div class="stat-card text-center border rounded-3 px-3 py-2 bg-white shadow-sm hover-scale">
                                    <h6 class="mb-0 fw-bold text-secondary"><?=$count_nilai?></h6>
                                    <small class="text-muted">Dalam Penilaian</small>
                                  </div>
                                  <div class="stat-card text-center border rounded-3 px-3 py-2 bg-white shadow-sm hover-scale">
                                    <h6 class="mb-0 fw-bold text-success"><?=$count_selesai?></h6>
                                    <small class="text-muted">Selesai</small>
                                  </div>
                                  <div class="stat-card text-center border rounded-3 px-3 py-2 bg-white shadow-sm hover-scale">
                                    <h6 class="mb-0 fw-bold text-warning"><?=$count_validasi_gagal?></h6>
                                    <small class="text-muted">Gagal Validasi</small>
                                  </div>
                                  <div class="stat-card text-center border rounded-3 px-3 py-2 bg-white shadow-sm hover-scale">
                                    <h6 class="mb-0 fw-bold text-danger"><?=$count_mengulang?></h6>
                                    <small class="text-muted">Mengulang</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <table class="table table-hover datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Kode Pengajuan.</th>
                                                <th>Tgl Pengajuan</th>
                                                <th>Unit</th>
                                                <th>Jenjang</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no =1 ; 
                                                $ambil_data = $koneksi->query("SELECT * FROM pengajuan_kredensial ORDER BY tgl_pengajuan DESC");
                                                while ($data = mysqli_fetch_assoc($ambil_data)) {
                                                    $nopeg = $data['nopeg'];
                                                    $ambil_perawat = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
                                                    $row = $ambil_perawat->fetch_assoc();

                                                    $id_jenjang = $data['jenjang_diajukan'];
                                                    $ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
                                                    $data_rkk = $ambil_rkk->fetch_assoc();
                                                ?>
                                            <!-- <tr onclick="window.location='penilaian-kredensial?k=<?=$data['kode_pengajuan']?>&nopeg=<?=$data['nopeg']?>'" style="cursor:pointer;"> -->
                                            <tr>
                                                <td class="text-center">
                                                    <?=$no++?>
                                                </td>
                                                <td>
                                                    <?=$row['nama']?>
                                                </td>
                                                <td>
                                                    <?=$data['kode_pengajuan']?>
                                                </td>
                                                <td>
                                                    <?=date("d M Y", strtotime($data['tgl_pengajuan']))?>
                                                </td>
                                                <td>
                                                    <?=$data['unit']?>
                                                </td>
                                                <td>
                                                    <?=$data_rkk['nama_rkk']?>
                                                    <?=$data_rkk['unit_rkk']?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $statusMap = [
                                                            'menunggu'   => ['color' => 'secondary', 'label' => 'Menunggu', 'icon' => 'fas fa-clock'],
                                                            'penilaian'  => ['color' => 'primary',    'label' => 'Dalam Penilaian', 'icon' => 'fas fa-clipboard-list'],
                                                            'selesai'    => ['color' => 'success', 'label' => 'Selesai', 'icon' => 'fas fa-check'],
                                                            'validasi gagal' => ['color' => 'warning', 'label' => 'Validasi Gagal', 'icon' => 'fas fa-times'],
                                                            'mengulang' => ['color' => 'danger', 'label' => 'Mengulang', 'icon' => 'fas fa-times-circle'],
                                                        ];

                                                        $status = strtolower($data['status_pengajuan']);

                                                        $warna = isset($statusMap[$status]['color']) ? $statusMap[$status]['color'] : 'secondary';
                                                        $label = isset($statusMap[$status]['label']) ? $statusMap[$status]['label'] : ucfirst($status);
                                                        $icon = isset($statusMap[$status]['icon']) ? $statusMap[$status]['icon'] : 'fas fa-bell';
                                                        ?>
                                                    <span class="badge bg-<?= $warna ?> px-3 py-2 rounded-pill shadow-sm">
                                                        <i class="<?= $icon ?> me-1"></i>
                                                        <?= $label ?>
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-sm btn-light border-0 shadow-none" type="button" id="aksiDropdown<?=$no?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="far fa-edit text-secondary fs-4"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 p-2" aria-labelledby="aksiDropdown<?=$no?>">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 hover-active" href="detail-data-kredensial?k=<?=$data['kode_pengajuan']?>&nopeg=<?=$data['nopeg']?>">
                                                                    <i class="fas fa-eye text-primary"></i>
                                                                    <span>Lihat Detail</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 hover-active" href="#">
                                                                    <i class="fas fa-file-alt text-info"></i>
                                                                    <span>Lihat Berkas</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 hover-active text-danger" href="#">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                    <span>Hapus</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab laporan -->
                    <!-- akhir tab laporan -->
                    <!-- Tab manajemen berkas -->
                    <div class="tab-pane fade" id="berkas" role="tabpanel">
                        <div class="tab-pane-box">
                            <div class="p-4 position-relative overflow-hidden border-bottom mb-3 bg-light rounded-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <!-- Kiri: Judul + Deskripsi -->
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <div class="me-3">
                                            <div class="icon-circle bg-gradient-secondary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                                                <i class="fas fa-archive fs-5"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold text-dark mb-1">Panel Manajemen Berkas Perawat</h5>
                                            <p class="text-muted mb-0 small">
                                                <i class="fas fa-hospital me-1 text-secondary"></i>
                                                Seluruh berkas-berkas perawat RS Permata Medika — pantau status, masa aktif berkas secara real-time.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                <h1 class="text-dark">Manajemen Berkas Perawat</h1>
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
                    <!-- Akhir Tab manajemen berkas -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
<?php require 'req/js-data-kredensial.php'?>