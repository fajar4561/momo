<?php
session_start();
$map = [
    'Import Excel...' => 20,
    'Generate PDF...' => 50,
    'Kirim Email...'  => 80,
    'Selesai!'        => 100
];
if(isset($_SESSION['proses'])){
    echo json_encode([
        "text" => $_SESSION['proses'],
        "percent" => $map[$_SESSION['proses']]
    ]);
} else {
    echo "";
}
