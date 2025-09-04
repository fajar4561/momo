<?php 
session_start();
require '../../../env/koneksi.php';
$id_rkk = $_POST['id_rkk'];
$keterangan = $_POST['keterangan'];

// ambil data berdasarkanr parameter id_rkk

$ambil = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_rkk'");
$data = $ambil->fetch_assoc();

$nama_rkk = $data['nama_rkk'];
$unit_rkk = $data['unit_rkk'];

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$ubah = $koneksi->query("UPDATE detail_master_rkk SET kompetensi_rkk='$keterangan' WHERE id='$id'");

	if ($ubah) {
		$_SESSION['pesan'] = 'Data RKK pada <strong>'.$nama_rkk.'-'.$unit_rkk.'</strong> berhasil di perbaharui';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../../master-form-rkk';</script>"; 
	}


}
else {
	$simpan = $koneksi->query("INSERT INTO detail_master_rkk (id,id_rkk,kompetensi_rkk) VALUES(null, '$id_rkk', '$keterangan')");
	if ($simpan) {
		$_SESSION['pesan'] = 'Data RKK baru pada <strong>'.$nama_rkk.'-'.$unit_rkk.'</strong> berhasil di tambahkan';
		$_SESSION['info'] = 'Berhasil !';
		$_SESSION['warna'] = 'success';
		echo "<script>location='../../../master-form-rkk';</script>"; 
	}
	else {
		echo "Gagal Simpan .... ".$koneksi->error;
	}
}


?>