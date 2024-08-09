<?php 
session_start();
require '../../../env/koneksi.php';

// deklarasi variabel
$sesi_pengguna = $_SESSION['username'];

// ambil data berdasarkan pengguna
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();

$nopeg=$data_user['nopeg'];
$jenis = $_POST['jenis'];

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
	$_SESSION['info'] = ' Gagal Upload Berkas <strong class="text-uppercase">'.$jenis.'</strong?> !';
	$_SESSION['warna'] = 'danger';
	echo "<script>location='../../../berkas-kepegawaian';</script>"; 
}
else {
	// simpan data berdasarkan parameter jenis file upload
	// chek terlebih dahulu apakah nopeg sudah terdaftar apa belum
	$koneksi_terdaftar = $koneksi->query("SELECT * FROM file WHERE nopeg='$nopeg'");
	$yangcocok = $koneksi_terdaftar->num_rows;

	if ($yangcocok==1) {
		// update data
		$koneksi->query("UPDATE file SET $var='$filebaru' WHERE nopeg='$nopeg' ");

	}
	else {
		$koneksi->query("INSERT INTO file (id,nopeg,$var) VALUES(null, '$nopeg','$filebaru')");
	}

	$_SESSION['pesan'] = 'Berkas '.strtoupper($var).' Berhasil diupload !';
	$_SESSION['info'] = 'Berhasil ! ';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../berkas-kepegawaian';</script>";
}


?>