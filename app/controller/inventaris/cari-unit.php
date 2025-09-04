<?php
require '../../../env/koneksi.php';

$search = $_GET['query'];
$ambildata = $koneksi->query("SELECT * FROM unit_inv  WHERE unit LIKE '%$search%' AND unit NOT IN ('BAGIAN UMUM', 'GUDANG UMUM', 'BIDANG UMUM') ORDER BY unit ASC");

$results = [];
while ($data = mysqli_fetch_assoc($ambildata)) {
    $results[] = $data;
}

echo json_encode($results);
?>
