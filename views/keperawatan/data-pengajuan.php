<?php 
require 'public/component/toast.php';
require 'env/tgl_indo.php';

// data nopeg berdasarkan session yang aktif
$nopeg = $pecahuser['nopeg'];

// ambil data berdasarkan data pengajuan
$ambil_kredensial = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg'");
$ada_data_pengajuan = $ambil_kredensial->num_rows;

require 'req/style-detail-kredensial.php';
?>
<?php if ($ada_data_pengajuan==1 ) { 
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
                                        <h6 class="fw-semibold mb-0 mt-2">Deadline : <span class="text-muted fw-normal"> 28 Fab 2021</span></h6>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
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
                                <div class="task-box">
                                    <div class="task-priority-icon"><i class="fas fa-circle text-success"></i></div>
                                    </p>
                                    <p class="text-muted text-end mb-1">15% Complete</p>
                                    <div class="progress mb-3" style="height: 4px;">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="img-group">
                                            <a class="user-avatar" href="#">
                                                <img src="public/resources/assets/images/users/user-8.jpg" alt="user" class="thumb-xs rounded-circle">
                                            </a>
                                            <a class="user-avatar ms-n3" href="#">
                                                <img src="public/resources/assets/images/users/user-5.jpg" alt="user" class="thumb-xs rounded-circle">
                                            </a>
                                            <a class="user-avatar ms-n3" href="#">
                                                <img src="public/resources/assets/images/users/user-4.jpg" alt="user" class="thumb-xs rounded-circle">
                                            </a>
                                            <a class="user-avatar ms-n3" href="#">
                                                <img src="public/resources/assets/images/users/user-6.jpg" alt="user" class="thumb-xs rounded-circle">
                                            </a>
                                            <a href="" class="btn btn-soft-primary btn-icon-circle btn-icon-circle-sm">
                                                <i class="las la-plus"></i>4
                                            </a>
                                        </div>
                                        <!--end img-group-->
                                        <ul class="list-inline mb-0 align-self-center">
                                            <li class="list-item d-inline-block me-2">
                                                <a class="" href="#">
                                                    <i class="mdi mdi-format-list-bulleted text-success font-15"></i>
                                                    <span class="text-muted fw-bold">15/100</span>
                                                </a>
                                            </li>
                                            <li class="list-item d-inline-block">
                                                <a class="" href="#">
                                                    <i class="mdi mdi-comment-outline text-primary font-15"></i>
                                                    <span class="text-muted fw-bold">3</span>
                                                </a>
                                            </li>
                                            <li class="list-item d-inline-block">
                                                <a class="ms-2" href="#">
                                                    <i class="mdi mdi-pencil-outline text-muted font-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-item d-inline-block">
                                                <a class="" href="#">
                                                    <i class="mdi mdi-trash-can-outline text-muted font-18"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end task-box-->
                                <hr class="hr-dashed">
                                <div class="row mt-3">
                                    <div class="col-md">
                                        <div class="d-flex mb-2 mb-lg-0">
                                            <i data-feather="headphones" class="align-self-center text-secondary icon-sm"></i>
                                            <div class="d-block align-self-center ms-2">
                                                <h6 class="m-0">Last Meeting</h6>
                                                <p class="mb-0 text-muted">28 Oct 2021 / 10:30AM - 12:30PM</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-auto">
                                        <div class="d-flex">
                                            <i data-feather="headphones" class="align-self-center text-secondary icon-sm"></i>
                                            <div class="d-block align-self-center ms-2">
                                                <h6 class="m-0">Next Meeting</h6>
                                                <p class="mb-0 text-muted">06 Nov 2021 / 10:30AM - 12:30PM</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
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
                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="las la-user-clock bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted mb-0 font-13 w-75"><span>Donald</span>
                                                updated the status of <a href="">Refund #1234</a> to awaiting customer response
                                            </p>
                                            <small class="text-muted">10 Min ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="mdi mdi-timer-off bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted mb-0 font-13 w-75"><span>Lucy Peterson</span>
                                                was added to the group, group name is <a href="">Overtake</a>
                                            </p>
                                            <small class="text-muted">50 Min ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <img src="assets/images/users/user-5.jpg" alt="" class="rounded-circle thumb-sm">
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted mb-0 font-13 w-75"><span>Joseph Rust</span>
                                                opened new showcase <a href="">Mannat #112233</a> with theme market
                                            </p>
                                            <small class="text-muted">10 hours ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="mdi mdi-clock-outline bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted mb-0 font-13 w-75"><span>Donald</span>
                                                updated the status of <a href="">Refund #1234</a> to awaiting customer response
                                            </p>
                                            <small class="text-muted">Yesterday</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="mdi mdi-alert-outline bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted mb-0 font-13 w-75"><span>Lucy Peterson</span>
                                                was added to the group, group name is <a href="">Overtake</a>
                                            </p>
                                            <small class="text-muted">14 Nov 2021</small>
                                        </div>
                                    </div>
                                </div>
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
                                <th>No</th>
                                <th>Kode Pengajuan</th>
                                <th>Tgl Pengajuan</th>
                                <th>Nama</th>
                                <th>Unit</th>
                                <th>Jenis Kompetensi</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Unity Pugh</td>
                                <td>9958</td>
                                <td>Curicó</td>
                                <td>2005/02/11</td>
                                <td>37%</td>
                            </tr>
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