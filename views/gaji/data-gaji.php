<?php

require 'public/component/toast.php';
if (isset($_SESSION['bulan'])) {
    unset($_SESSION['bulan']);
    unset($_SESSION['tahun']);
}

// chek transaksi gaji yang belum terkirim via email

require 'env/koneksi.php';
require 'env/tgl_indo.php';
require 'env/terbilang.php';
require 'env/nama_bulan.php';
require 'req/style-data-gaji.php';

?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 col-sm-4 text-center">
                        <img src="public/bg/bg02.jpg" class="img-fluid rounded" alt="Header Image">
                    </div>
                    <!-- Teks Header -->
                    <div class="col-md-9 col-sm-8">
                        <h3 class="fw-bold mb-3">Informasi Halaman</h3>
                        <p class="mb-0 text-muted">
                            1. Pada tombol <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle btn-sm">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                terdapat menu tambah data transaksi penggajian baru dan import data . 
                            <br>
                            2. File import & export harus berformatkan <strong>".xlsx"</strong> , dengan syarat sudah mengisikan periode transaksi gaji <strong><a href="#">Klik Disini</a></strong> untuk detailnya<br>
                            3. Maksimalkan Fungsi pencarian data pegawai pada fitur <button type="button" class="btn btn-sm btn-de-dark">Search...</button> yang terletak di pojok kanan atas tabel<br>
                            4. Pada Tombol <i class="las la-pen font-20"></i> atau dengan klik kanan <i class="las la-mouse-pointer font-20"></i> pada kolom tabel Terdapat menu detail ,hapus dan export gaji<br>
                            5. Menu " <button type="button" class="btn btn-primary btn-de-dark dropdown-toggle btn-sm">10<i class="mdi mdi-chevron-down"></i></button> entries per page" Digunakan untuk menampilkan jumlah data tiap tabel<br>
                            6. Kolom Progressi merupakan presentasi jumlah data gaji yang terisi. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Halaman Data Transaksi Gaji</h4>
                        <p class="text-muted mb-0">Halaman ini digunakan untuk berisikan informasi transkasi penggajian pegawai dalam sistem. Anda dapat mengubah dan menambahkan data baru ke sistem.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-gaji">Tambah Data</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary">Import Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table table-responsive">
                            <table class="table table-sm" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <!-- <th>Tanggal</th> -->
                                        <th>Periode</th>
                                        <th>Jumlah Karyawan</th>
                                        <th>Terproses</th>
                                        <th>Progresi</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambildata = $koneksi->query("SELECT * FROM transaksi_gaji ORDER BY kode_transaksi DESC");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($ambildata)) { 
                                        require_once 'env/nama_bulan.php';
                                        $progres = ($data['proses']/$data['jumlah_karyawan']) * 100;
                                    ?>
                                    <tr 
                                        data-dropdown-id="<?=$data['kode_transaksi']?>"
                                        data-periode-bulan="<?=ucwords($data['periode_bulan'])?>"
                                        data-periode-tahun="<?=$data['periode_tahun']?>"
                                        data-status="<?=ucwords($data['status_transaksi'])?>"
                                    >
                                        <td><?=$no++?></td>
                                        <td><?=$data['kode_transaksi']?></td>
                                        
                                        <td><?=ucwords(bulan_indonesia($data['periode_bulan']))?> <?=$data['periode_tahun']?></td>
                                        <td><?=$data['jumlah_karyawan']?></td>
                                        <td><?=$data['proses']?></td>
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
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-pen font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href="detail-transaksi-gaji/<?=$data['kode_transaksi']?>">Detail</a>
                                                    <?php if ($data['jumlah_karyawan']!=$data['proses']) { ?>
                                                        <a class="dropdown-item" href="app/controller/gaji/export-gaji-all.php?kode=<?=$data['kode_transaksi']?>&bulan=<?=$data['periode_bulan']?>&tahun=<?=$data['periode_tahun']?>">Export</a>
                                                    <?php } ?>
                                                    <?php if ($session_akses==1) {?>
                                                    <a class="dropdown-item" href="app/controller/gaji/hapus-transaksi-gaji.php?kode=<?=$data['kode_transaksi']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ???')">Hapus</a>
                                                    <?php } ?>
                                                    <!--
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary<?=$data['id']?>">Ubah</a>
                                                    -->
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
            </div>
        </div><!--end card--> 
    </div><!--end col-->
</div><!--end row-->
<div class="modal fade" id="exampleModalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Import Gaji Pegawai</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <form method="post" action="app/controller/gaji/import-gaji.php" enctype="multipart/form-data" onsubmit="showLoading()">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-grid">
                                <p class="text-muted">Pastikan File yang diupload berformatkan "xlsx".</p>
                                <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                <input type="file" id="input-file" name="input-file" onchange="handleChange()" hidden />
                                <label class="btn-upload btn btn-primary mt-4" for="input-file">Upload File</label>
                            </div>
                        </div>
                    </div>                                                   
                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-de-primary btn-sm" id="submit-btn" hidden>Save</button>
                </div><!--end modal-footer-->
            </form>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
<script src="env/js/notif.js"></script>
<?php require 'req/js-data-gaji.php'; ?>