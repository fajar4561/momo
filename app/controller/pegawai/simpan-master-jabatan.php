<?php 
session_start();
require '../../../env/koneksi.php';

$jabatan = strtoupper($_POST['jabatan']);
$jenis = $_POST['jenis'];
$hirarki = $_POST['hirarki'];

$simpan = $koneksi->query("INSERT INTO master_pegawai (id,jabatan,jenis_pegawai,hirarki) values (null, '$jabatan', '$jenis', '$hirarki')");

if ($simpan) {
	$_SESSION['pesan'] = 'Data Jabatan <strong>'.$jabatan.'</strong> Berhasil ditambahakan ke database';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../master-jabatan';</script>"; 
}
else {
	echo "Error simpan jabatan ....... ".$koneksi->error;
}


?>