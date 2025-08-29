<?php
require '../../../env/koneksi.php';

$search = $_GET['query'];
$ambildata = $koneksi->query("SELECT * FROM stok_barang  WHERE nama_barang LIKE '%$search%' ORDER BY nama_barang ASC");

$results = [];
while ($data = mysqli_fetch_assoc($ambildata)) {
    $results[] = $data;
}

echo json_encode($results);
?>
