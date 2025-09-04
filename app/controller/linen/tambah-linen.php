<?php 
session_start();
require '../../../env/koneksi.php';

$kode = $_POST['kode'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];

$simpan = $koneksi->query("INSERT INTO master_linen (id,kode_linen,jenis_linen,keterangan) 
	VALUES(null, '$kode', '$jenis', '$keterangan')");

if ($simpan) {
	$_SESSION['pesan'] = 'Master Linen dengan Kode  <strong>'.$kode.'</strong> Berhasil di simpan';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../master-linen';</script>"; 
}
else {
	echo "Error.. ".$koneksi->error;
}

?>