<?php 
session_start();
require '../../../env/koneksi.php';

$id = $_GET['id'];
$jabatan = strtoupper($_POST['jabatan']);
$jenis = $_POST['jenis'];
$hirarki = $_POST['hirarki'];

$ubah = $koneksi->query("UPDATE master_pegawai SET jabatan='$jabatan',
	jenis_pegawai='$jenis',
	hirarki='$hirarki' WHERE id='$id' ");


if ($ubah) {
	$_SESSION['pesan'] = 'master jabatan telah diupdate';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../master-jabatan';</script>"; 
}
else {
	echo "Error update jabatan ....... ".$koneksi->error;
}

?>