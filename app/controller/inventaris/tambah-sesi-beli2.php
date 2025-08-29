<?php 
session_start();
require '../../../env/koneksi.php';
$id2= $_POST['id'];
$kode2 = $_POST['kode2'];

$id = uniqid();
$nama = $_POST['nama'];
$kode = $_POST['kode'];
$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$no_seri = $_POST['no_seri'];
$harga = (int) preg_replace("/[^0-9]/", "", $_POST['harga']);
$jumlah = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$garansi = $_POST['garansi'];
$bulan_garansi = $_POST['bulan_garansi'];

$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];

if (empty($lokasi)) {
	// ambil data foto berdasarkan stok barang
	$ambil = $koneksi->query("SELECT * FROM stok_barang WHERE id='$id2'");
	$pecah = $ambil->fetch_assoc();
	$fotobaru = $pecah['foto_barang'];
}
else {
	
	$fotobaru = $id."_".$foto;
	move_uploaded_file($lokasi, "../../../public/inv/".$fotobaru);
}




$_SESSION['nama_inv'][$id] = $nama;
$_SESSION['kode_inv'][$id] = $kode;
//$_SESSION['suplier_inv'][$id] = $suplier;
$_SESSION['merk_inv'][$id] = $merk;
$_SESSION['tipe_inv'][$id] = $tipe;
$_SESSION['no_seri_inv'][$id] = $no_seri;
$_SESSION['harga_inv'][$id] = $harga;
$_SESSION['jumlah_inv'][$id] = $jumlah;
$_SESSION['satuan_inv'][$id] = $satuan;
$_SESSION['garansi_inv'][$id]= $garansi;
$_SESSION['bulan_garansi_inv'][$id] = $bulan_garansi;
$_SESSION['foto_inv'][$id] = $fotobaru;

echo "<script>location.href='../../../ubah-transaksi-pembelian/".$kode2."';</script>";




?>