<?php 
session_start();
require '../../../env/koneksi.php';
$id = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM detail_master_rkk WHERE id='$id'");

if ($hapus) {
	$_SESSION['pesan'] = 'Data Berhasil di hapus dari sistem';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../master-form-rkk';</script>"; 
}


?>