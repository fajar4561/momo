<?php 
session_start();
require '../../../env/koneksi.php';

$id = $_GET['id'];

$koneksi->query("DELETE FROM pegawai_jabatan WHERE id='$id'");

$_SESSION['pesan'] = 'Jabatan Berhasil dihapus !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';

echo "<script>location='../../../profil';</script>";

?>