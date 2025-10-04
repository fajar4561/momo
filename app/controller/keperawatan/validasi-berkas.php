<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();
require '../../../env/koneksi.php';
require '../../../env/log.php'; 

$jenis_transaksi='validasi berkas kredensial';
$id_berkas = $_POST['id_berkas'];
$kode_pengajuan = $_POST['kode_pengajuan'];
$nopeg = $_POST['nopeg'];
$validasi = $_POST['validasi'];
$catatan = $_POST['catatan'];

$tgl_validasi = date("Y-m-d");
$sesi_pengguna = $_SESSION['username'];
// ambil data berdasarkan pengguna
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();
$validator = $data_user['nopeg'];

// simpan validasi
$update = $koneksi->query("UPDATE file_detail SET kode_pengajuan='$kode_pengajuan',
	catatan='$catatan', validasi='$validasi', tgl_validasi='$tgl_validasi', validator='$validator' WHERE id='$id_berkas'");

if ($update) {
	$_SESSION['pesan'] = 'Berkas telah divalidasi !';
	$_SESSION['info'] = 'Berhasil ! ';
	$_SESSION['warna'] = 'success';
	$keterangan_log = 'ID Berkas <strong>'.$id_berkas.'</strong> dengan Nopeg <strong>'.$nopeg.'</strong> dan Kode Pengajuan< strong>'.$kode_pengajuan.'</strong> telah divalidasi oleh <strong>'.$validator.'</strong>';
	simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");
	echo '<script>location="../../../detail-kredensial?k='.$kode_pengajuan.'&nopeg='.$nopeg.'";</script>';
}
else {
	$keterangan_log ="Gagal Update detail berkas..... ".$koneksi->error;
	simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");
	$_SESSION['pesan'] = $keterangan_log;
	$_SESSION['info'] = 'Gagal ! ';
	$_SESSION['warna'] = 'danger';
	echo '<script>location="../../../detail-kredensial?k='.$kode_pengajuan.'&nopeg='.$nopeg.'";</script>';
}
?> 