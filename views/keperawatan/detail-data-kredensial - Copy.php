<?php
require 'public/component/toast.php';
require 'env/tgl_indo.php';  
require 'req/style-detail-kredensial.php';
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
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Biodata</h4>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive shopping-cart">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <p class="d-inline-block align-middle mb-0 product-name"><strong>Kode Kredensial</strong></p>
                                </td>
                                <td>
                                    <?=$kode?>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <p class="d-inline-block align-middle mb-0 product-name"><strong>Tanggal Pengajuan</strong></p>
                                </td>
                                <td>
                                    <?=tgl_indo($tanggal)?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="d-inline-block align-middle mb-0 product-name"><strong>No. Pegawai</strong></p>
                                </td>
                                <td>
                                    <?=$nopeg?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="d-inline-block align-middle mb-0 product-name"><strong>Nama</strong></p>
                                </td>
                                <td><?=$data_pegawai['nama']?></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="d-inline-block align-middle mb-0 product-name"><strong>Unit / Jabatan</strong></p>
                                </td>
                                <td><?=$data_pegawai['unit']?> / <?=$data_pegawai['jabatan']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end re-table-->
                <div class="total-payment">
                    <div class="row justify-content-center">
                        <script
                          src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js"
                          type="module"
                        ></script>

                        <dotlottie-wc
                          src="https://lottie.host/e22233d0-1e41-45df-a55a-afcd5508b508/B8ITZKKlMH.lottie"
                          style="width: 300px;height: 300px"
                          autoplay
                          loop
                        ></dotlottie-wc>
                    </div>
                </div>
                <!--end total-payment-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div> 
    <div class="col-lg-8">
        <div class="card">
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
                <div class="row p-4">
                    <h4>Berkas-berkas</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require 'req/js-detail-kredensial.php';
?>