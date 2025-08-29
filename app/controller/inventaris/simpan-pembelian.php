<?php 
session_start();

error_reporting(0);
ini_set('display_errors', 0);
require '../../../env/koneksi.php';

// Deklarasi variabel
$kode = $_POST['kode'];
$tgl = $_POST['tgl_beli'];
$suplier = $_POST['suplier'];
$faktur = $_POST['faktur'];
$file = $_FILES['file'];
$catatan = $_POST['catatan'];
$lokasi = $_FILES['file']['tmp_name'];

// Validasi tipe file
$allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
$fileType = mime_content_type($lokasi);

if (!empty($lokasi)) {
    if (!in_array($fileType, $allowedTypes)) {
        // Jika bukan PDF atau gambar, kembali ke halaman input pembelian
        $_SESSION['pesan'] = 'File yang diunggah harus berupa PDF atau gambar (JPEG, PNG)!';
        $_SESSION['info'] = 'Gagal';
        $_SESSION['warna'] = 'danger';
        echo "<script>location='../../../input-pembelian';</script>";
        exit();
    }
    
    $uniqId = uniqid();
    $file_baru = $uniqId . "_" . $_FILES['file']['name'];
    move_uploaded_file($lokasi, "../../../public/inv/" . $file_baru);
} else {
    $file_baru = '';
}

// Perhitungan total pembelian
$total = 0;
foreach ($_SESSION["nama_inv"] as $id => $jml) {
    $nama = $_SESSION['nama_inv'][$id];
    $kode_barang = $_SESSION['kode_inv'][$id];
    $merk = $_SESSION['merk_inv'][$id];
    $tipe = $_SESSION['tipe_inv'][$id];
    $no_seri = $_SESSION['no_seri_inv'][$id];
    $harga = $_SESSION['harga_inv'][$id];
    $jumlah = $_SESSION['jumlah_inv'][$id];
    $satuan = $_SESSION['satuan_inv'][$id];
    $garansi = $_SESSION['garansi_inv'][$id];
    $bulan_garansi = $_SESSION['bulan_garansi_inv'][$id];
    $fotobaru = $_SESSION['foto_inv'][$id];
    $tot = $harga * $jumlah;
    $total += $tot;

    // Simpan detail pembelian
    $simpan_detail = $koneksi->prepare("INSERT INTO detail_pembelian (kode_transaksi, tgl_transaksi, nama_barang, kode_barang, merk, tipe, no_seri, harga, jumlah, satuan, masa_garansi, garansi, foto_barang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $simpan_detail->bind_param("ssssssssissss", $kode, $tgl, $nama, $kode_barang, $merk, $tipe, $no_seri, $harga, $jumlah, $satuan, $bulan_garansi, $garansi, $fotobaru);
    if (!$simpan_detail->execute()) {
        echo "Gagal Simpan detail pembelian barang: " . $koneksi->error;
    }

    // Cek apakah barang sudah ada di stok
    $ambil = $koneksi->prepare("SELECT stok FROM stok_barang WHERE LOWER(nama_barang) = LOWER(?) AND kode_barang = ? AND LOWER(merk) = LOWER(?) AND LOWER(tipe) = LOWER(?) AND LOWER(satuan) = LOWER(?)");
    $ambil->bind_param("sssss", $nama, $kode_barang, $merk, $tipe, $satuan);
    $ambil->execute();
    $ambil->store_result();
    $sama = $ambil->num_rows;
    
    if ($sama == 1) {
        $ambil->bind_result($stok_lama);
        $ambil->fetch();
        $stok = $stok_lama + $jumlah;
        if (!empty($seri_lama)) {
            $no_seri_baru = $seri_lama . "," . $no_seri;
        } else {
            $no_seri_baru = $no_seri;
        }

        $update_stok = $koneksi->prepare("
            UPDATE stok_barang 
            SET stok = ?, no_seri = ? 
            WHERE LOWER(nama_barang) = LOWER(?) 
              AND kode_barang = ? 
              AND LOWER(merk) = LOWER(?) 
              AND LOWER(tipe) = LOWER(?) 
              AND LOWER(satuan) = LOWER(?)
        ");
        $update_stok->bind_param(
            "issssss", 
            $stok,           // 1: stok
            $no_seri_baru,   // 2: no_seri
            $nama,           // 3: nama_barang
            $kode_barang,    // 4: kode_barang
            $merk,           // 5: merk
            $tipe,           // 6: tipe
            $satuan          // 7: satuan
        );
        $update_stok->execute();

    } else {
        $simpan_stok = $koneksi->prepare("INSERT INTO stok_barang (nama_barang, kode_barang, merk, tipe, no_seri, foto_barang, stok, satuan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $simpan_stok->bind_param("ssssssis", $nama, $kode_barang, $merk, $tipe, $no_seri, $fotobaru, $jumlah, $satuan);
        if (!$simpan_stok->execute()) {
            echo "Gagal Tambah Data Stok Barang: " . $koneksi->error;
        }
    }
}

// ambil petugas yang ngisi form
$idUser = $_SESSION["username"];
    // ambil data user yg login
$sqlUser = "SELECT * FROM pegawai WHERE username = '$idUser' ";
$ambilUser = $koneksi->query($sqlUser);
$pecahuser = $ambilUser->fetch_assoc();

$admin = $pecahuser['nopeg'];

$simpan_beli = $koneksi->prepare("INSERT INTO pembelian_barang (kode_transaksi, tgl_transaksi, suplier, faktur, total_pembelian, berkas, catatan, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$simpan_beli->bind_param("ssssisss", $kode, $tgl, $suplier, $faktur, $total, $file_baru, $catatan, $admin);
if (!$simpan_beli->execute()) {
    echo "Gagal Tambah Data pembelian Barang: " . $koneksi->error;
}

// Hapus sesi
unset($_SESSION['nama_inv'], $_SESSION['kode_inv'], $_SESSION['merk_inv'], $_SESSION['tipe_inv'], $_SESSION['no_seri_inv'], $_SESSION['harga_inv'], $_SESSION['jumlah_inv'], $_SESSION['satuan_inv'], $_SESSION['garansi_inv'], $_SESSION['bulan_garansi_inv'], $_SESSION['foto_inv']);

$_SESSION['pesan'] = 'Data Pembelian dengan Kode Transaksi <strong>' . $kode . '</strong> Berhasil disimpan!';
$_SESSION['info'] = 'Berhasil!';
$_SESSION['warna'] = 'success';
echo "<script>location='../../../data-pembelian';</script>";
?>
