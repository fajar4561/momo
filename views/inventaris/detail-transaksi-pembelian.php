<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
require 'env/koneksi.php';
$kode = $_GET['kode'];
// Dekripsi data

$ambil = $koneksi->query("SELECT * FROM pembelian_barang WHERE kode_transaksi='$kode'");
$pecah = $ambil->fetch_assoc();
require 'env/nama_bulan.php';
require 'env/tgl_indo.php';
$nopeg = $pecah['admin'];
$ambil_user = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$row = $ambil_user->fetch_assoc();





?>

<style>
    /* Gaya untuk margin di tengah */
    .centered {
        margin: 0 auto;
        display: block;
        text-align: center; /* Untuk mengatur posisi konten ke tengah */
    }

    /* Gaya untuk membuat gambar responsif */
    .img-responsive {
        max-width: 100%;
        height: auto;
    }

    /* Media query untuk layar yang lebih kecil */
    @media (max-width: 768px) {
        .img-responsive {
            max-width: 90%; /* Misalnya, ukuran gambar maksimum 80% dari lebar layar saat layar diresize */
        }
    }

    @media print {
        @page {
            size: A5; /* Atur ukuran kertas menjadi A5 saat mencetak */
        }
    }
</style>

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body"> 
                <div class="row justify-content-center">
                    <div class="p-2 centered">
                        <img src="<?=$link?>/public/img/kop.JPG" alt="logo-small" class="img-responsive" height="120">
                    </div>  
                </div><!--end row-->     
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-md-between">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr style="line-height: 1;">
                                <th>Kode Transaksi</th>
                                <td>:</td>
                                <td><?=$pecah['kode_transaksi']?></td>
                            </tr>
                            <tr style="line-height: 1;">
                                <th>Tanggal Pembelian</th>
                                <td>:</td>
                                <td class="text-uppercase"><?=tgl_indo($pecah['tgl_transaksi'])?></td>
                            </tr>
                            <tr style="line-height: 1;">
                                <th>Suplier</th>
                                <td>:</td>
                                <td class="text-uppercase"><?=strtoupper($pecah['suplier'])?></td>
                            </tr>
                            <tr style="line-height: 1;">
                                <th>No Faktur</th>
                                <td>:</td>
                                <td class="text-uppercase"><?=strtoupper($pecah['faktur'])?></td>
                            </tr>
                            <tr style="line-height: 1;">
                                <th>Catatan</th>
                                <td>:</td>
                                <td class="text-uppercase"><?=$pecah['catatan']?></td>
                            </tr>
                            
                        </table>
                    </div>                       
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <center class="mb-3"><h4>List Pembelian Barang</h4></center>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>kode Barang</th>
                                    <th>Merk</th>
                                    <th>Tipe</th>
                                    <th>No Seri</th>
                                    <th>Masa Garansi</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $ambildata = $koneksi->query("SELECT * FROM detail_pembelian WHERE kode_transaksi='$kode'");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($ambildata)) { 
                                ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=ucwords($data['nama_barang'])?></td>
                                        <td><?=$data['kode_barang']?></td>
                                        <td><?=$data['merk']?></td>
                                        <td><?=$data['tipe']?></td>
                                        <td><?=$data['no_seri']?></td>
                                        <td><?=$data['masa_garansi']?> <?=ucwords($data['garansi'])?></td>
                                        <td>Rp.<?=number_format($data['harga'])?> / <small><?=$data['satuan']?></small></td>
                                        <td><?=$data['jumlah']?> / <small><?=$data['satuan']?></small></td>
                                        <td>Rp.<?=number_format($data['harga']*$data['jumlah'])?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="9">Total Pembelian</th>
                                    <th>Rp.<?=number_format($pecah['total_pembelian'])?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6">
                        <table class="table">
                            <tr>
                                <th>(Semarang, <?=tgl_indo($pecah['tgl_transaksi'])?>)<br>Petugas Entri </th>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$link?>public/file/qr/<?=$pecah['admin']?>.png" alt="" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 80px; height: auto; object-fit: cover;">
                                </td>
                            </tr>
                            <tr>
                               <td><?=$row['nama']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- -->
            </div>
        </div>
    </div>
</div>

<script src="env/js/notif.js"></script>

