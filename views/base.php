<?php
date_default_timezone_set('Asia/Jakarta');
require 'env/koneksi.php';
require 'env/tgl_indo.php';
$ambil_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE status_pegawai !='REISGN'");
$jml_pegawai = mysqli_num_rows($ambil_pegawai);

$ambil_pegawai_tetap = $koneksi->query("SELECT * FROM pegawai WHERE status_pegawai ='TETAP'");
$jml_pegawai_tetap = mysqli_num_rows($ambil_pegawai_tetap);

$ambil_pegawai_kontrak = $koneksi->query("SELECT * FROM pegawai WHERE status_pegawai ='KONTRAK'");
$jml_pegawai_kontrak = mysqli_num_rows($ambil_pegawai_kontrak);

$ambil_pegawai_resign = $koneksi->query("SELECT * FROM pegawai WHERE status_pegawai ='RESIGN'");
$jml_pegawai_resign = mysqli_num_rows($ambil_pegawai_resign);

$tanggal_hari_ini = date("Y-m-d");
$jam = date('H');

// ucapan sistem
if ($jam >= 5 && $jam < 12) {
    $ucapan = "Selamat Pagi";
} elseif ($jam >= 12 && $jam < 18) {
    $ucapan = "Selamat Siang";
} else {
    $ucapan = "Selamat Malam";
}

require_once $link.'app/controller/pegawai/qr_otomatis.php';
?>
<div class="row p-2">
    <div class="col-lg-3">
        <div class="row">
            <div class="col-auto">
                <div class="card">
                    <img class="card-img-top img-fluid bg-light-alt" src="<?=$link?>public/resources/assets/images/small/beranda.jpg" alt="Card image cap">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">
                                    <?=$ucapan?>
                                </h4>               
                            </div><!--end col-->  
                            <div class="col-auto">                  
                                <span class="badge badge-outline-light"><?=tgl_indo($tanggal_hari_ini)?></span>              
                            </div><!--end col-->                                                                            
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                </div>
            </div>
            <div class="col-auto">
               <div class="card">
                   <div class="card-body">
                       <div class="dash-datepick">
                            <input type="hidden" id="light_datepicker"/>
                        </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold">Jumlah Karyawan</p>
                                <h3 class="my-1 font-20 fw-bold"><?=$jml_pegawai?></h3>
                            </div><!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                    <i class="ti ti-users font-24 align-self-center text-muted"></i>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">                                                
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold">Karyawan Tetap</p>
                                <h3 class="my-1 font-20 fw-bold"><?=$jml_pegawai_tetap?></h3>
                            </div><!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                    <i class="ti ti-report font-24 align-self-center text-muted"></i>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">                                                
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold">Karyawan Kontrak</p>
                                <h3 class="my-1 font-20 fw-bold"><?=$jml_pegawai_kontrak?></h3>
                            </div><!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                    <i class="ti ti-clock font-24 align-self-center text-muted"></i>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">                                                
                            <div class="col-9">
                                <p class="text-dark mb-0 fw-semibold">Pegawai Resign</p>
                                <h3 class="my-1 font-20 fw-bold"><?=$jml_pegawai_resign?></h3>
                            </div><!--end col-->
                            <div class="col-3 align-self-center">
                                <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                    <i class="ti ti-clock font-24 align-self-center text-muted"></i>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div>
            <div class="col-md-6 col-lg-12">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">                      
                                    <h4 class="card-title"></h4>                      
                                </div><!--end col-->
                            </div>  <!--end row-->                                  
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="chart-demo">
                                <div id="apex_line1" class="apex-charts"></div>
                            </div>                                        
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </div>
            <div class="col-md-6 col-lg-12">
                <div class="card">  
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Data Transaksi Gaji</h4>                      
                            </div><!--end col-->
                            <div class="col-auto"> 
                                <a href="data-gaji" class="text-primary">Lihat Semua</a>   
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->                                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Periode Gaji</th>
                                        <th>Tanggal Penginputan</th>
                                        <th>Jumlah Karyawan</th>
                                        <th>Terproses</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambildata = $koneksi->query("SELECT * FROM transaksi_gaji  ORDER BY kode_transaksi DESC LIMIT 5");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($ambildata)) { 
                                        require_once 'env/nama_bulan.php';
                                        $progres = ($data['proses']/$data['jumlah_karyawan']) * 100;
                                    ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=ucwords(bulan_indonesia($data['periode_bulan']))?> <?=$data['periode_tahun']?></td>
                                        <td><?=($data['tgl_transaksi']=='0000-00-00') ? '' : tgl_indo($data['tgl_transaksi'])?></td>
                                        <td>
                                            <?=$data['jumlah_karyawan']?>
                                        </td>
                                        <td>
                                            <?php
                                            $warna = $progres <= 20 ? "bg-danger" : ($progres <= 40 ? "bg-warning" : ($progres <= 60 ? "bg-info" : ($progres <= 80 ? "bg-primary" : "bg-success")));
                                            ?>
                                            <small class="float-end ms-2 pt-1 font-10"><?=round($progres)?>%</small>
                                            <div class="progress mt-2" style="height:3px;">
                                                <div class="progress-bar <?=$warna?>" role="progressbar" style="width: <?=$progres?>%;" aria-valuenow="<?=$progres?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill <?=($data['status_transaksi'] == 'belum selesai') ? 'bg-danger' : 'bg-success'?>">
                                                <?=ucwords($data['status_transaksi'])?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php } ?>                                                                                                  
                                </tbody>
                            </table>

                        </div><!--end table-responsive--> 
                    </div><!--end card-body-->                                                                                                        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=$link?>public/resources/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?=$link?>public/resources/assets/js/pages/helpdesk-index.init.js"></script>
<script src="<?=$link?>public/resources/assets/libs/litepicker/litepicker.js"></script>
<script src="<?=$link?>public/resources/assets/js/pages/projects-index.init.js"></script>