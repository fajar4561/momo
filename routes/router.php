<?php
if ($session_akses==0) {
	// jika pengguna biasa
	if (isset($_GET['halaman'])) {
		if ($_GET["halaman"] == "beranda") {
			require "views/user/base.php";
		}
		else if ($_GET["halaman"] == "detail-gaji") {
			require "views/gaji/detail-gaji.php";
		}
		else if ($_GET["halaman"] == "profil") {
			require "views/pegawai/profil.php";
		}
		else if ($_GET["halaman"] == "absensi") {
			require "views/pegawai/absensi.php";
		}
		else if ($_GET["halaman"] == "kritik") {
			require "views/pegawai/saran.php";
		}
		else if ($_GET["halaman"] == "berkas-kepegawaian") {
			require "views/pegawai/berkas.php";
		}
		else {
			echo "<script>location='beranda';</script>";
		}
	}
	else {
		echo "<script>location='beranda';</script>";
	}
}
else {
	if (isset($_GET['halaman'])) {
		if ($_GET["halaman"] == "beranda") {
			
			if (isMobileDevice()) {
				require "views/user/base.php";
			} else {
				require "views/base.php";	
			}
		}
		// # pegawai #
		else if ($_GET["halaman"] == "input-pegawai") {
			require "views/pegawai/input-pegawai.php";
		}
		else if ($_GET["halaman"] == "data-pegawai") {
			require "views/pegawai/data-pegawai.php";
		}
		else if ($_GET["halaman"] == "detail-pegawai") {
			require "views/pegawai/detail-pegawai.php";
		}
		// # Gaji #
		else if ($_GET["halaman"] == "input-gaji") {
			require "views/gaji/input-gaji.php";
		}
		else if ($_GET["halaman"] == "data-gaji") {
			require "views/gaji/data-gaji.php";
		}
		else if ($_GET["halaman"] == "detail-transaksi-gaji") {
			require "views/gaji/detail-transaksi-gaji.php";
		}
		else if ($_GET["halaman"] == "transaksi-gaji") {
			require "views/gaji/transaksi-gaji.php";
		}
		else if ($_GET["halaman"] == "detail-gaji") {
			require "views/gaji/detail-gaji.php";
		}
		else if ($_GET["halaman"] == "ubah-gaji") {
			require "views/gaji/ubah-gaji.php";
		}
		else if ($_GET["halaman"] == "absensi") {
			require "views/absensi/absensi.php";
		}
		else if ($_GET["halaman"] == "profil") {
			
			// chek apakah dalam mode dekstop atau tidak
			if (isMobileDevice()) {
				require "views/pegawai/profil.php";
			} else {
				require "views/user/base.php";
			}
		}
		else if ($_GET["halaman"] == "kritik") {
			require "views/pegawai/saran.php";
		}
		# berkas kepegawaian
		else if ($_GET["halaman"] == "kepegawaian") {
			require "views/pegawai/kepegawaian.php";
		}
		// menambahkan fitur upload berkas juga bagi admin
		else if ($_GET["halaman"] == "upload-berkas") {
			require "views/pegawai/berkas.php";
		}
		else {
			echo "<script>location='beranda';</script>";
		}
	}
	else {
		echo "<script>location='beranda';</script>";
	}
}
?>