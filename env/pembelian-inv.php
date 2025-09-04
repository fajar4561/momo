<?php
include 'koneksi.php'; // Koneksi ke database

// Ambil parameter opsi dari request
$option = isset($_GET['option']) ? $_GET['option'] : 'this-month';

// Inisialisasi data
$response = [
    "bulanan" => ["labels" => [], "series" => [["name" => "Total Pembelian", "data" => []]]],
    "mingguan" => ["labels" => [], "series" => [["name" => "Total Pembelian", "data" => []]]],
    "harian" => ["labels" => [], "series" => [["name" => "Total Pembelian", "data" => []]]],
];

// Bulanan
$bulanan = $koneksi->query("
    SELECT 
        DATE_FORMAT(tgl_transaksi, '%M %Y') AS bulan,
        SUM(total_pembelian) AS total
    FROM pembelian_barang
    GROUP BY DATE_FORMAT(tgl_transaksi, '%Y-%m')
    ORDER BY tgl_transaksi ASC
");
while ($row = $bulanan->fetch_assoc()) {
    $response["bulanan"]["labels"][] = $row['bulan'];
    $response["bulanan"]["series"][0]["data"][] = (int)$row['total'];
}

// Mingguan
$mingguan = $koneksi->query("
    SELECT 
        CONCAT('Minggu ', WEEK(tgl_transaksi)) AS minggu,
        SUM(total_pembelian) AS total
    FROM pembelian_barang
    GROUP BY WEEK(tgl_transaksi), YEAR(tgl_transaksi)
    ORDER BY tgl_transaksi ASC
");
while ($row = $mingguan->fetch_assoc()) {
    $response["mingguan"]["labels"][] = $row['minggu'];
    $response["mingguan"]["series"][0]["data"][] = (int)$row['total'];
}

// Harian
$harian = $koneksi->query("
    SELECT 
        DATE_FORMAT(tgl_transaksi, '%d %M %Y') AS hari,
        SUM(total_pembelian) AS total
    FROM pembelian_barang
    GROUP BY DATE(tgl_transaksi)
    ORDER BY tgl_transaksi ASC
");
while ($row = $harian->fetch_assoc()) {
    $response["harian"]["labels"][] = $row['hari'];
    $response["harian"]["series"][0]["data"][] = (int)$row['total'];
}

// Kirim data dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
