<?php 
session_start();

$id = $_GET['id'];
$kode2 =  $_GET['kode'];

unset($_SESSION['nama_inv'][$id]);
unset($_SESSION['kode_inv'][$id]);
//unset($_SESSION['suplier_inv'][$id]);
unset($_SESSION['merk_inv'][$id]);
unset($_SESSION['tipe_inv'][$id]);
unset($_SESSION['no_seri_inv'][$id]);
unset($_SESSION['harga_inv'][$id]);
unset($_SESSION['jumlah_inv'][$id]);
unset($_SESSION['satuan_inv'][$id]);
unset($_SESSION['garansi_inv'][$id]);
unset($_SESSION['bulan_garansi_inv'][$id]);
//unlink('../../../public/inv/'.$_SESSION['foto_inv'][$id]);
unset($_SESSION['foto_inv'][$id]);




echo "<script>location.href='../../../ubah-transaksi-pembelian/".$kode2."';</script>";




?>