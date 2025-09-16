<?php
// Mapping halaman berdasarkan akses
$halaman_map = [
	1 => [ // Super Admin
		"beranda" => function () {
            return isMobileDevice() ? "views/user/base.php" : "views/base.php";
        },
        "input-pegawai" => "views/pegawai/input-pegawai.php",
        "data-pegawai" => "views/pegawai/data-pegawai.php",
        "detail-pegawai" => "views/pegawai/detail-pegawai.php",
        "ubah-pegawai" => "views/pegawai/ubah-pegawai.php",
        "input-gaji" => "views/gaji/input-gaji.php",
        "data-gaji" => "views/gaji/data-gaji.php",
        "transaksi-gaji" => "views/gaji/transaksi-gaji.php",
        "detail-transaksi-gaji" => "views/gaji/detail-transaksi-gaji.php",
        "detail-gaji" => "views/gaji/detail-gaji.php",
        "ubah-gaji" => "views/gaji/ubah-gaji.php",
        "absensi" => "views/absensi/absensi.php",
        "profil" => function () {
            return isMobileDevice() ? "views/pegawai/profil.php" : "views/user/base.php";
        },
        "kritik" => "views/pegawai/saran.php",
        "kepegawaian" => "views/pegawai/kepegawaian.php",
        "upload-berkas" => "views/pegawai/berkas.php",

        // inventaris
        "input-pembelian" => "views/inventaris/input-pembelian.php",
        "input-barang" => "views/inventaris/input-barang.php",
        "data-pembelian" => "views/inventaris/data-pembelian.php",
        "stok-barang" => "views/inventaris/stok-barang.php",
        "detail-transaksi-pembelian" => "views/inventaris/detail-transaksi-pembelian.php",
        "ubah-transaksi-pembelian" => "views/inventaris/ubah-transaksi-pembelian.php",
        "penyerahan-inventaris" => "views/inventaris/penyerahan-inventaris.php",
        "data-inventaris" => "views/inventaris/data-inventaris.php",
        "detail-inventaris" => "views/inventaris/detail-inventaris.php",
        "laporan-pembelian" => "views/inventaris/laporan-pembelian.php",
        "laporan-penyusutan" => "views/inventaris/laporan-penyusutan.php",
        "unit-inv" => "views/inventaris/unit-inv.php",
        "input-unit" => "views/inventaris/input-unit.php",
        "ubah-unit" => "views/inventaris/ubah-unit.php",
        "cek-inv" => "views/inventaris/cek-inv.php",

        // misc
        "chatbox" => "views/misc/chatbox.php",

        // Linen
        "input-linen" => "views/linen/input-linen.php",
        "master-linen" => "views/linen/master-linen.php",

        // kredensial
        "master-jabatan" => "views/pegawai/master-jabatan.php",
        "master-form-rkk" => "views/keperawatan/master-form-rkk.php",
        "pengajuan-kredensial" => "views/keperawatan/pengajuan-kredensial.php",
        "data-pengajuan-kredensial" => "views/keperawatan/data-pengajuan.php",
        "data-kredensial" => "views/keperawatan/data-kredensial.php",
        "detail-kredensial" => "views/keperawatan/detail-kredensial.php",

	],
    0 => [ // Pengguna biasa
        "beranda" => "views/user/base.php",
        "detail-gaji" => "views/gaji/detail-gaji.php",
        "profil" => "views/pegawai/profil.php",
        "absensi" => "views/pegawai/absensi.php",
        "kritik" => "views/pegawai/saran.php",
        "upload-berkas" => "views/pegawai/berkas.php",

        // perawat / bidan
        "pengajuan-kredensial" => "views/keperawatan/pengajuan-kredensial.php",
        "data-pengajuan-kredensial" => "views/keperawatan/data-pengajuan.php",
    ],
    2 => [ // HRD
        "beranda" => function () {
            return isMobileDevice() ? "views/user/base.php" : "views/base.php";
        },
        "input-pegawai" => "views/pegawai/input-pegawai.php",
        "data-pegawai" => "views/pegawai/data-pegawai.php",
        "detail-pegawai" => "views/pegawai/detail-pegawai.php",
        "ubah-pegawai" => "views/pegawai/ubah-pegawai.php",
        "input-gaji" => "views/gaji/input-gaji.php",
        "data-gaji" => "views/gaji/data-gaji.php",
        "transaksi-gaji" => "views/gaji/transaksi-gaji.php",
        "detail-transaksi-gaji" => "views/gaji/detail-transaksi-gaji.php",
        "ubah-gaji" => "views/gaji/ubah-gaji.php",
        "detail-gaji" => "views/gaji/detail-gaji.php",
        "absensi" => "views/absensi/absensi.php",
        "profil" => function () {
            return isMobileDevice() ? "views/pegawai/profil.php" : "views/user/base.php";
        },
        "kritik" => "views/pegawai/saran.php",
        "kepegawaian" => "views/pegawai/kepegawaian.php",
        "upload-berkas" => "views/pegawai/berkas.php",
    ],
    3 => [ // Bagian umum
        "beranda" => "views/user/base.php",
        "detail-gaji" => "views/gaji/detail-gaji.php",
        "profil" => "views/pegawai/profil.php",
        "absensi" => "views/pegawai/absensi.php",
        "kritik" => "views/pegawai/saran.php",
        "berkas-kepegawaian" => "views/pegawai/berkas.php",
        "upload-berkas" => "views/pegawai/berkas.php",
        // inventaris
        "input-pembelian" => "views/inventaris/input-pembelian.php",
        "input-barang" => "views/inventaris/input-barang.php",
        "data-pembelian" => "views/inventaris/data-pembelian.php",
        "stok-barang" => "views/inventaris/stok-barang.php",
        "detail-transaksi-pembelian" => "views/inventaris/detail-transaksi-pembelian.php",
        "ubah-transaksi-pembelian" => "views/inventaris/ubah-transaksi-pembelian.php",
        "penyerahan-inventaris" => "views/inventaris/penyerahan-inventaris.php",
        "data-inventaris" => "views/inventaris/data-inventaris.php",
        "detail-inventaris" => "views/inventaris/detail-inventaris.php",
        "laporan-pembelian" => "views/inventaris/laporan-pembelian.php",
        "laporan-penyusutan" => "views/inventaris/laporan-penyusutan.php",
        "unit-inv" => "views/inventaris/unit-inv.php",
        "input-unit" => "views/inventaris/input-unit.php"
    ],
];

// Default halaman
$default_halaman = "views/user/base.php";

// Cek apakah halaman diakses
if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];

    // Cek akses dan halaman
    if (isset($halaman_map[$session_akses][$halaman])) {
        $target = $halaman_map[$session_akses][$halaman];
        
        // Jika target berupa fungsi
        if (is_callable($target)) {
            require $target();
        } else {
            require $target;
        }
    } else {
        echo "<script>location='beranda';</script>";
    }
} else {
    echo "<script>location='beranda';</script>";
}
?>
