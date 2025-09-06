<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
require '../../../env/koneksi.php'; 

$tgl_upload = date("Y-m-d");
$sesi_pengguna = $_SESSION['username'];

// ambil data berdasarkan pengguna
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();

$nopeg=$data_user['nopeg'];
$jenis = $_POST['jenis'];
$nama_data = strtoupper($jenis);
$tgl_buat = !empty($_POST['tgl_dibuat']) ? $_POST['tgl_dibuat'] : "0000-00-00";
$tgl_berakhir = !empty($_POST['tgl_berakhir']) ? $_POST['tgl_berakhir'] : "0000-00-00";
$no_file = $_POST['nomor'];


$file = $_FILES['berkas']['tmp_name'];
$file_info = pathinfo($_FILES['berkas']['name']);
$file_ext = strtolower($file_info['extension']);
$nama_file = $_FILES['berkas']['name'];

$uniqId = uniqid();
$filebaru = $uniqId."_".$nama_file;

// chek apakah sudah ada data yang diupload
// ini berlaku untuk file berkas selain sertifikat.

if ( !in_array($jenis, ['sertifikat'])) {
	
	// berlaku untuk selain sertifikat supaya tidak crash
	$koneksi->query("DELETE FROM file_detail WHERE jenis_file='$jenis' AND nopeg='$nopeg'");
	$ambil_file = $koneksi->query("SELECT * FROM file WHERE nopeg='$nopeg'");
	$ada_file = $ambil_file->num_rows; 

	if ($ada_file==1) {
		// update berkas yang sudah ada
		$update = $koneksi->query("UPDATE file SET $jenis='$filebaru' WHERE nopeg='$nopeg'");
		if ($update) {
			// pindah file ke server
			if ($jenis=='foto') {
				$koneksi->query("UPDATE pegawai SET foto='$filebaru' WHERE nopeg='$nopeg' ");
				move_uploaded_file($file, "../../../public/img/".$filebaru);	
			}
			else {
				move_uploaded_file($file, "../../../public/file/berkas/".$filebaru);		
			}
			

	    } else {
	        echo "Gagal update: " . $koneksi->error;
	    }

	}
	else {
		// tambah data baru
		$simpan_file = $koneksi->query("INSERT INTO file (id,nopeg,$nama_data) VALUES(null, '$nopeg','$filebaru')");
		if ($simpan_file) {
			// pindah file ke server
			if ($jenis=='foto') {
				$koneksi->query("UPDATE pegawai SET foto='$filebaru' WHERE nopeg='$nopeg' ");
				move_uploaded_file($file, "../../../public/img/".$filebaru);	
			}
			else {
				move_uploaded_file($file, "../../../public/file/berkas/".$filebaru);		
			}

	    } else {
	        echo "Gagal simpan data baru: " . $koneksi->error;
	    }

	}
}
else {

	$keterangan = $_POST['keterangan'];
	$simpan_file = $koneksi->query("INSERT INTO sertifikat (id,nopeg,berkas,keterangan) VALUES(null, '$nopeg', '$filebaru', '$keterangan')");
	if ($simpan_file) {
			// pindah file ke server
		move_uploaded_file($file, "../../../public/file/berkas/".$filebaru);

	} else {
		echo "Gagal simpan data baru: " . $koneksi->error;
	}

}

// simpan semua detail
if ($jenis != 'foto') {
	$simpan_file_detail = $koneksi->query("INSERT INTO file_detail (id,nopeg,jenis_file,nama_file,tgl_keluar,tgl_berakhir,no_file,tgl_upload) 
		VALUES(null, '$nopeg', '$nama_data', '$filebaru', '$tgl_buat', '$tgl_berakhir', '$no_file', '$tgl_upload')");
 }
 else {
 	$simpan_file_detail = $koneksi->query("INSERT INTO file_detail (id,nopeg,jenis_file,nama_file,no_file,tgl_upload) 
		VALUES(null, '$nopeg', '$nama_data', '$filebaru', '$no_file', '$tgl_upload')");
 } 

if ($simpan_file_detail) {
	$_SESSION['pesan'] = 'Berkas '.strtoupper($nama_data).' Berhasil diupload !';
	$_SESSION['info'] = 'Berhasil ! ';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../pengajuan-kredensial';</script>";
} else {
	echo "Gagal Simpan detail file ".$koneksi->error;
}




?>