<?php 
session_start();
require '../../../env/koneksi.php';

function isMobileDevice() {
    return preg_match("/(android|iphone|ipod|opera mini|iemobile)/i", $_SERVER['HTTP_USER_AGENT']);
}


$id = $_POST['id'];
$ijazah = $_POST['ijazah'];
$noktp = $_POST['noktp'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$alamat2 = $_POST['alamat2'];
$kawin = $_POST['kawin'];
$tgl_lahir = $_POST['tgl_lahir'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$password = md5($_POST['password']);


$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];

if (!empty($ijazah)) {
	$koneksi->query("UPDATE pegawai SET ijazah='$ijazah' WHERE id='$id'");
}

if (!empty($noktp)) {
	$koneksi->query("UPDATE pegawai SET nik='$noktp' WHERE id='$id'");
}

if (!empty($agama)) {
	$koneksi->query("UPDATE pegawai SET agama='$agama' WHERE id='$id'");
}

if (!empty($alamat)) {
	$koneksi->query("UPDATE pegawai SET alamat='$alamat' WHERE id='$id'");
}

if (!empty($alamat2)) {
	$koneksi->query("UPDATE pegawai SET alamat2='$alamat2' WHERE id='$id'");
}

if (!empty($kawin)) {
	$koneksi->query("UPDATE pegawai SET status_kawin='$kawin' WHERE id='$id'");
}

if (!empty($tgl_lahir)) {
	// Buat objek DateTime dari tanggal lahir
	$tanggal_lahir = new DateTime($tgl_lahir);

	// Buat objek DateTime dari tanggal hari ini
	$today = new DateTime();

	// Hitung selisih antara tanggal lahir dan tanggal hari ini
	$diff = $tanggal_lahir->diff($today);

	// Formatkan hasil usia
	$usia = $diff->y . ' tahun ' . $diff->m . ' bulan';

	$koneksi->query("UPDATE pegawai SET tgl_lahir='$tgl_lahir', umur='$usia' WHERE id='$id'");

}

if (!empty($email)) {
	$koneksi->query("UPDATE pegawai SET email='$email' WHERE id='$id'");
}

if (!empty($telepon)) {
	$koneksi->query("UPDATE pegawai SET telpon='$telepon' WHERE id='$id'");
}

if (!empty($_POST['password'])) {
	
	//$password=md5($_POST['password']);
	$koneksi->query("UPDATE pegawai SET password='$password' WHERE id='$id'");
}

if (!empty($lokasi)) {
	$uniqId = uniqid();
	$fotobaru = $uniqId."_".$foto;
	move_uploaded_file($lokasi, "../../../public/img/".$fotobaru);
	$koneksi->query("UPDATE pegawai SET foto='$fotobaru' WHERE id='$id'");
}


$_SESSION['pesan'] = 'Data Berhasil Diperbaharui !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';

if (isMobileDevice()) {
	echo "<script>location='../../../profil';</script>"; 
}
else {
	echo "<script>window.location=history.go(-1);</script>";
}



?>