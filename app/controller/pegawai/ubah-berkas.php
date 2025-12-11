<?php 
session_start();
require '../../../env/koneksi.php';

$tgl_upload = date("Y-m-d");
require '../../../env/log.php'; 

// deklarasi variabel
$sesi_pengguna = $_SESSION['username'];

// ambil data berdasarkan pengguna
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();

$nopeg=$data_user['nopeg'];
$jenis = $_POST['jenis'];
$tgl_buat = !empty($_POST['tgl_dibuat']) ? $_POST['tgl_dibuat'] : "0000-00-00";
$tgl_berakhir = !empty($_POST['tgl_berakhir']) ? $_POST['tgl_berakhir'] : "0000-00-00";
$no_file = isset($_POST['nomor']) ? $_POST['nomor'] : '';
 
$file = $_FILES['berkas']['tmp_name'];
$file_info = pathinfo($_FILES['berkas']['name']);
$file_ext = strtolower($file_info['extension']);
$nama_file = $_FILES['berkas']['name'];

$uniqId = uniqid();
$filebaru = $uniqId."_".$nama_file;
move_uploaded_file($file, "../../../public/file/berkas/".$filebaru);

$var = strtoupper($jenis);

$allowed_exts = array('jpg', 'png', 'jpeg', 'pdf');

if (!in_array($file_ext, $allowed_exts)) {
    
    // kembali ke halaman sebelumnya

	$_SESSION['pesan'] = 'Format file tidak sesuai !';
	$_SESSION['info'] = 'peringatan !';
	$_SESSION['warna'] = 'danger';
	echo "<script>location='../../../upload-berkas';</script>"; 
}
else {
	$koneksi->query("UPDATE file SET $var='$filebaru' WHERE nopeg='$nopeg' ");
	$koneksi->query("DELETE FROM file_detail WHERE jenis_file='$var' AND nopeg='$nopeg'");
	$up = $koneksi->query("INSERT INTO file_detail (id,nopeg,jenis_file,nama_file,tgl_keluar,tgl_berakhir,no_file,tgl_upload) 
		VALUES(null, '$nopeg', '$var', '$filebaru', '$tgl_buat', '$tgl_berakhir', '$no_file', '$tgl_upload')");
	if ($up) {
		echo 'yaw';
	}
	else {
		echo "Errp... ".$koneksi->error;
	}
	$_SESSION['pesan'] = 'Berkas '.strtoupper($var).' Berhasil di ubah !';
	$_SESSION['info'] = 'Berhasil ! ';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../upload-berkas';</script>"; 
}


?>