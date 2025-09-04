<?php 
session_start();
require '../../../env/koneksi.php';

$nopeg = $_GET['n'];

$reset = $koneksi->query("UPDATE pegawai SET password='$nopeg' WHERE nopeg='$nopeg'");

if ($reset) {

	$ambil_koneksi =$koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
	$pecah = $ambil_koneksi->fetch_assoc();
	$nama = $pecah['nama'];
	// alihkan halaman
	$_SESSION['pesan'] = 'Password <strong>'.$nama.'</strong> Berhasil di reset !';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../data-pegawai';</script>"; 
}
else {
	echo "Error....... ".$koneksi->error;
}


?>