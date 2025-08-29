<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');


// Koneksi database
require '../../../env/koneksi.php';

if ($koneksi->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $koneksi->connect_error]));
}

// Dapatkan parameter unit dari URL
$unit = $koneksi->real_escape_string($_GET['unit']);

// Query untuk mengambil data ruangan berdasarkan unit
$sq = $koneksi->query("SELECT * FROM detail_unit WHERE unit = '$unit'");

// Array untuk menyimpan hasil
$rooms = array();

// Cek apakah query berhasil
if ($sq) {
    // Ambil data dari hasil query
    while ($data = $sq->fetch_assoc()) {
        $rooms[] = $data;
    }
} else {
    // Jika ada kesalahan dalam query
    $rooms['error'] = $koneksi->error;
}

// Kembalikan hasil dalam format JSON
echo json_encode($rooms);

// Tutup koneksi
$koneksi->close();
?>
