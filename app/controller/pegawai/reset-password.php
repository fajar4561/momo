<?php 
session_start();
require '../../../env/koneksi.php';

$n = $_GET['n'];
// Dekripsi data
$password = md5("$n");

$koneksi->query("UPDATE pegawai SET password='$password' WHERE nopeg='$n'");

$_SESSION['pesan'] = 'password Berhasil di reset !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>location='../../../data-pegawai';</script>"; 




?>