<?php
session_start();
require '../../../env/koneksi.php';



// deklarasi variabel
$id = $_GET['id'];
$ambil_id = $koneksi->query("SELECT * FROM unit_inv WHERE id='$id'");
$fetch = $ambil_id->fetch_assoc();
$unit_lama =$fetch['unit'];
 // hapus unit lama
$koneksi->query("DELETE FROM unit_inv WHERE unit='$unit_lama'");
$koneksi->query("DELETE FROM detail_unit WHERE unit='$unit_lama'");

$_SESSION['pesan'] = 'Data Berhasil dihapus';
$_SESSION['info'] = 'Berhasil!';
$_SESSION['warna'] = 'success';
echo "<script>location='../../../unit-inv';</script>";

?>
