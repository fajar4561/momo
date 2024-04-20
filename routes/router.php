<?php 
if (isset($_GET['halaman'])) {
	if ($_GET["halaman"] == "beranda") {
		require "views/base.php";
	}
	else if ($_GET["halaman"] == "input-pegawai") {
		require "views/input-pegawai.php";
	}
	else {
		echo "<script>location='?halaman=beranda';</script>";
	}
}
else {
	echo "<script>location='?halaman=beranda';</script>";
}
?>