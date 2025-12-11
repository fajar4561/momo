<?php
require 'public/component/toast.php';
require 'env/tgl_indo.php';  
require 'req/style-detail-kredensial.php';
require 'req/style-detail-data-kredensial.php';
require 'env/keamanan.php';

$kode = $_GET['k'];
$nopeg = $_GET['nopeg'];
$ambil_kredensial = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg' AND kode_pengajuan='$kode'");
$data_pengajuan = $ambil_kredensial->fetch_assoc();

$id_jenjang = $data_pengajuan['jenjang_diajukan'];
$ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
$data_rkk = $ambil_rkk->fetch_assoc();

// ambil data pegawai
$ambil_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$data_pegawai = $ambil_pegawai->fetch_assoc();

// ambil fetail file 
// digunakan untuk validasi form submit
$konek_file_detail = $koneksi->query("SELECT * FROM file_detail WHERE nopeg='$nopeg' AND (validasi IS NULL OR validasi='')");
$cek_validasi = $konek_file_detail->num_rows;

$datetime = $data_pengajuan['tgl_pengajuan'];
$obj = new DateTime($datetime);
$tanggal = $obj->format('Y-m-d'); // hanya tanggal
$jam = $obj->format('H:i:s');     // hanya jam
 
?>

<div class="bg-light">
    <div class="container p-3">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-12">
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
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Sidebar -->
                            <div class="row g-0">
                                <!-- Sidebar -->
                                <div class="col-lg-3 border-end">
                                    <div class="p-4">
                                        <div class="nav flex-column nav-pills" id="tab-detail" role="tablist">
                                            <a class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-personal">
                                                <i class="fas fa-user me-2"></i>Personal Info
                                            </a>
                                            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-security">
                                                <i class="fas fa-lock me-2"></i>Security
                                            </a>
                                            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-notif">
                                                <i class="fas fa-bell me-2"></i>Notifications
                                            </a>
                                            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-billing">
                                                <i class="fas fa-credit-card me-2"></i>Billing
                                            </a>
                                            <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-activity">
                                                <i class="fas fa-chart-line me-2"></i>Activity
                                            </a>
                                        </div>
                                        <div class="lottie-card p-3 text-center bg-white">
                                            <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>

                                            <dotlottie-wc 
                                                src="public/bg/detail-kredensial.lottie"
                                                class="sidebar-lottie"
                                                autoplay 
                                                loop>
                                            </dotlottie-wc>

                                            <div class="small text-muted mt-2 fw-semibold">
                                                Detail Kredensial
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Content Area -->
                                <div class="col-lg-9">
                                    <div class="p-4">
                                        <div class="tab-content">
                                            <!-- TAB 1: Personal Info -->
                                            <div class="tab-pane fade show active" id="tab-personal">
                                                <h5 class="mb-4">Personal Information</h5>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Nomor Pegawai</label>
                                                        <input type="text" class="form-control" value="<?=$data_pegawai['nopeg']?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" class="form-control" value="<?=$data_pegawai['nama']?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" value="alex.johnson@example.com">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Phone</label>
                                                        <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Bio</label>
                                                        <textarea class="form-control" rows="4">
                                                        Product designer with 5+ years of experience in creating user-centered digital solutions.
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- TAB 2: Security -->
                                            <div class="tab-pane fade" id="tab-security">
                                                <h5 class="mb-4">Security Settings</h5>
                                                <div class="card p-3">
                                                    <h6>Two-Factor Authentication</h6>
                                                    <p class="text-muted small">Add an extra layer of security</p>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- TAB 3: Notifications -->
                                            <div class="tab-pane fade" id="tab-notif">
                                                <h5 class="mb-4">Notifications</h5>
                                                <div class="card p-3">
                                                    <h6>Email Notifications</h6>
                                                    <p class="text-muted small">Receive activity updates</p>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- TAB 4: Billing -->
                                            <div class="tab-pane fade" id="tab-billing">
                                                <h5 class="mb-4">Billing</h5>
                                                <div class="card p-3">
                                                    <p class="text-muted mb-0">Your billing information goes here.</p>
                                                </div>
                                            </div>
                                            <!-- TAB 5: Activity -->
                                            <div class="tab-pane fade" id="tab-activity">
                                                <h5 class="mb-4">Recent Activity</h5>
                                                <div class="activity-item mb-3">
                                                    <h6 class="mb-1">Updated profile picture</h6>
                                                    <p class="text-muted small mb-0">2 hours ago</p>
                                                </div>
                                                <div class="activity-item mb-3">
                                                    <h6 class="mb-1">Changed password</h6>
                                                    <p class="text-muted small mb-0">Yesterday</p>
                                                </div>
                                                <div class="activity-item">
                                                    <h6 class="mb-1">Updated billing information</h6>
                                                    <p class="text-muted small mb-0">3 days ago</p>
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
</div>