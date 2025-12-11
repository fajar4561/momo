<?php
date_default_timezone_set('Asia/Jakarta'); 
session_start();
$today= date("d M Y");
$tgl_hari_ini = date("Y-m-d");
require '../../../env/koneksi.php';
require '../../../env/log.php';

$id = $_GET['id'];
$jenis = $_GET['jenis'];
// $filePath = "../../../public/file/berkas/" . $id;
$jenis_transaksi='Hapus Berkas';
$keterangan_log = "Berkas <strong>".$jenis."</strong> Berhasil di Hapus";

$sesi_pengguna = $_SESSION['username'];
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();
$nopeg = $data_user['nopeg'];

// 2 


$hapus1= $koneksi->query("DELETE FROM file_detail WHERE nama_file='$id'");
if ($hapus1) {
	// code...
}
else {
	echo "Eror hapus 1".$koneksi->error;
}

if ($jenis=='SERTIFIKAT') {
	$koneksi->query("DELETE FROM sertifikat WHERE berkas='$id'");
}
else {
	$hapus2= $koneksi->query("UPDATE file SET `$jenis`='' WHERE nopeg='$nopeg'");
	if ($hapus2) {
		// code...
	}
	else {
		echo "Eror hapus 2".$koneksi->error;
	}
}
simpanriwayat($koneksi,"$nopeg", "$jenis_transaksi", "$keterangan_log");
$_SESSION['pesan'] = $keterangan_log;
$_SESSION['info'] = 'Berhasil ! ';
$_SESSION['warna'] = 'success';
echo '<script>location="../../../pengajuan-kredensial";</script>';

?>