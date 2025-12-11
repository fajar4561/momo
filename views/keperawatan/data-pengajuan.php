<?php 
require 'public/component/toast.php';
require 'env/tgl_indo.php';

// data nopeg berdasarkan session yang aktif
$nopeg = $pecahuser['nopeg'];

// ambil data berdasarkan data pengajuan
$ambil_kredensial = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg' ORDER BY tgl_pengajuan DESC");
$ada_data_pengajuan = $ambil_kredensial->num_rows;

require 'req/style-detail-kredensial.php';
?>
<?php if ($ada_data_pengajuan>=1 ) { 
    $data_pengajuan = $ambil_kredensial->fetch_assoc();
?>
<div class="row p-3">
    <div class="col-lg-8">
        <div class="row">
            <?php if (!isMobileDevice()) { ?>
            <div class="col-12">
                <div class="card" style="background: url('public/bg/bg05.webp') no-repeat center center; background-size: cover;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-1 align-self-center">
                                <div class="p-2">
                                    <h1 class="my-4 font-weight-bold">Kelola Pengajuan <span class="text-primary">Kredensial Mu</span>.</h1>
                                    <p class="font-14 text-muted">
                                        Melalui halaman ini Anda dapat memantau status pengajuan, meninjau riwayat aktivitas,
                                        serta mengelola berkas kredensial dengan lebih terarah. Sistem dirancang untuk membantu
                                        proses kredensial Anda berjalan lebih mudah, transparan, dan efisien.
                                    </p>
                                    <!-- <button type="button" class="btn btn-de-primary">Get Started</button> -->
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4 offset-lg-1 text-center">
                                <img src="public/bg/data-pengajuan.webp" class="d-block w-100" alt="...">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <?php } ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active fw-semibold pt-0" data-bs-toggle="tab" href="#Project2_Tab" role="tab">Kode Pengajuan <span class="text-primary">#
                                        <?=$data_pengajuan['kode_pengajuan']?></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pt-0">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Project2_Tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="media mb-3">
                                            <img src="public/img/<?=$pecahuser['foto']?>" alt="" class="thumb-md rounded-circle">
                                            <div class="media-body align-self-center text-truncate ms-3">
                                                <h4 class="m-0 fw-semibold text-dark font-16">
                                                    <?=$pecahuser['nama']?>
                                                </h4>
                                                <p class="text-muted  mb-0 font-13"><span class="text-dark">unit : </span>
                                                    <?=$data_pengajuan['unit']?>
                                                </p>
                                            </div>
                                            <!--end media-body-->
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6 text-lg-end mb-2 mb-lg-0">
                                        <h6 class="fw-semibold m-0">Tanggal Pengajuan : <span class="text-muted fw-normal">
                                                <?= date('d M Y', strtotime($data_pengajuan['tgl_pengajuan'])) ?></span></h6>
                                        <!-- <h6 class="fw-semibold mb-0 mt-2">Deadline : <span class="text-muted fw-normal"> 28 Fab 2021</span></h6> -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <div class="holder">
                                    <ul class="steppedprogress pt-1">
                                        <?php 
                                        $statusMap = [ 
                                            'menunggu'   => [
                                                'status1' => 'complete continuous',
                                                'status2' => 'in-progress',
                                                'status3' => '',
                                                'status4' => ''
                                            ],
                                            'penilaian'  => [
                                                'status1' => 'complete continuous',
                                                'status2' => 'complete continuous',
                                                'status3' => 'in-progress',
                                                'status4' => ''
                                            ],
                                            'selesai'    => [
                                                'status1' => 'complete continuous',
                                                'status2' => 'complete continuous',
                                                'status3' => 'complete continuous',
                                                'status4' => 'complete finish'
                                            ],
                                            'validasi gagal'    => [
                                                'status1' => 'complete continuous',
                                                'status2' => 'failed',
                                                'status3' => '',
                                                'status4' => ''
                                            ],
                                            'mengulang'    => [
                                                'status1' => 'complete continuous',
                                                'status2' => 'complete continuous',
                                                'status3' => 'failed',
                                                'status4' => ''
                                            ],
                                        ];

                                        $status_kredensial = strtolower($data_pengajuan['status_pengajuan']);
                                        $map = isset($statusMap[$status_kredensial]) ? $statusMap[$status_kredensial] : [];
                                        ?>
                                        <li class="<?php echo isset($map['status1']) ? $map['status1'] : ''; ?>"><span>Pengajuan</span></li>
                                        <li class="<?php echo isset($map['status2']) ? $map['status2'] : ''; ?>"><span>Verifikasi Berkas</span></li>
                                        <li class="<?php echo isset($map['status3']) ? $map['status3'] : ''; ?>"><span>Penilaian</span></li>
                                        <li class="<?php echo isset($map['status4']) ? $map['status4'] : ''; ?>"><span>Selesai</span></li>
                                    </ul>
                                </div>
                                <!--end task-box-->
                                <hr class="hr-dashed">
                                
                                <!--end row-->
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Riwayat Aktifitas</h4>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        All<i class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Purchases</a>
                                        <a class="dropdown-item" href="#">Emails</a>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body p-0">
                        <div class="p-3" style="height: 425px;" data-simplebar>
                            <div class="activity">
                                <?php 
                                $ambil_riwayat = $koneksi->query("SELECT * FROM riwayat_pengguna WHERE nopeg='$nopeg' ORDER BY jam DESC");

                                // Daftar icon & warna berdasarkan jenis_transaksi
                                $iconMap = [
                                    'login'          => ['icon' => 'la-sign-in-alt',   'color' => 'bg-soft-success'],
                                    'logout'         => ['icon' => 'la-sign-out-alt',  'color' => 'bg-soft-danger'],
                                    'update'         => ['icon' => 'la-edit',          'color' => 'bg-soft-warning'],
                                    'hapus berkas'   => ['icon' => 'la-trash',         'color' => 'bg-soft-danger'],
                                    'tolak pengajuan'   => ['icon' => 'la-times-circle',         'color' => 'bg-soft-danger'],
                                    'upload'         => ['icon' => 'la-upload',        'color' => 'bg-soft-primary'],
                                    'pengajuan'      => ['icon' => 'la-file-alt',      'color' => 'bg-soft-info'],
                                    'penilaian'      => ['icon' => 'la-check-circle',  'color' => 'bg-soft-success'],
                                    'default'        => ['icon' => 'la-user-clock',    'color' => 'bg-soft-secondary'],
                                ];
                                 function time_ago($datetime) {
                                        date_default_timezone_set('Asia/Jakarta'); // sesuaikan zona waktu

                                        $timestamp = strtotime($datetime);
                                        $diff = time() - $timestamp;

                                        if ($diff < 60) {
                                            return 'Baru saja';
                                        } elseif ($diff < 3600) {
                                            $menit = floor($diff / 60);
                                            return $menit . ' menit lalu';
                                        } elseif ($diff < 86400) {
                                            $jam = floor($diff / 3600);
                                            return $jam . ' jam lalu';
                                        } elseif ($diff < 604800) {
                                            $hari = floor($diff / 86400);
                                            return $hari . ' hari lalu';
                                        } elseif ($diff < 2592000) {
                                            $minggu = floor($diff / 604800);
                                            return $minggu . ' minggu lalu';
                                        } elseif ($diff < 31536000) {
                                            $bulan = floor($diff / 2592000);
                                            return $bulan . ' bulan lalu';
                                        } else {
                                            $tahun = floor($diff / 31536000);
                                            return $tahun . ' tahun lalu';
                                        }
                                    }

                                while ($riwayat = mysqli_fetch_assoc($ambil_riwayat)) {
                                    $jenis = strtolower($riwayat['jenis_transaksi']);
                                    $iconClass = isset($iconMap[$jenis]) ? $iconMap[$jenis]['icon'] : $iconMap['default']['icon'];
                                    $bgColor = isset($iconMap[$jenis]) ? $iconMap[$jenis]['color'] : $iconMap['default']['color'];
                                ?>
                                    <div class="activity-info mb-3">
                                        <div class="icon-info-activity">
                                            <i class="las <?= $iconClass ?> <?= $bgColor ?>"></i>
                                        </div>
                                        <div class="activity-info-text">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="text-muted mb-0 font-13 w-75">
                                                    <span class="fw-bold text-dark"><?= ucwords($riwayat['jenis_transaksi']) ?></span>
                                                    — <?= $riwayat['keterangan'] ?>
                                                </p>
                                                <small class="text-muted"><?= time_ago($riwayat['jam']) ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!--end activity-->
                        </div>
                        <!--end analytics-dash-activity-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable_1">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Pengajuan.</th>
                                <th>Tgl Pengajuan</th>
                                <th>Jenjang</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1 ; 
                            $ambil_data = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg' ORDER BY tgl_pengajuan DESC");
                            while ($data = mysqli_fetch_assoc($ambil_data)) {

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
                                    <?=$data['kode_pengajuan']?>
                                </td>
                                <td>
                                    <?=date("d M Y", strtotime($data['tgl_pengajuan']))?>
                                </td>
                                <td>
                                    <?=$data_rkk['nama_rkk']?>
                                    <?=$data_rkk['unit_rkk']?>
                                </td>
                                <td>
                                    <?php
                                    $statusMap = [
                                        'menunggu'   => ['color' => 'primary', 'label' => 'Menunggu'],
                                        'validasi gagal'   => ['color' => 'danger', 'label' => 'Berkas Ditolak'],
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
                                <td><a href="detail-data-kredensial?k=<?=$data['kode_pengajuan']?>&nopeg=<?=$nopeg?>" class="btn btn-primary btn-round btn-sm">Lihat</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="row p-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="row d-flex align-items-center">
                    <div class="col-md-7 col-xl-12 col-lg-12 p-0 vh-100 d-flex justify-content-center" style="background: url('public/bg/bg_kredensial.webp') no-repeat center center; background-size: cover;">
                        <div class="d-flex align-items-center">
                            <div class="account-title text-center text-dark">
                                <img src="public/bg/nurse.webp" alt="" style="width: 100%; max-width: 550px; height: auto; object-fit: cover;" class="img-fluid rounded">
                                <h4 class="mt-3 text-dark">MAAF, Anda Belum Melakukan Pengajuan <span class="text-warning">Kredensial</span> </h4>
                                <h1 class="text-dark">Let's Get Started</h1>
                                <p class="mt-0">Silahkan anda melakukan pengajuan di halaman pengajuan kredensial atau anda bisa mengakses dengan menekan <a href="pengajuan-kredensial">link ini</a></p>
                                <div class="border w-25 mx-auto border-warning"></div>
                            </div>
                        </div>
                        <!--end /div-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</div>
<?php } ?>