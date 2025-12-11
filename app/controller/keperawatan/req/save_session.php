<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = array(
        'nama' => isset($_POST['nama']) ? $_POST['nama'] : '',
        'nik' => isset($_POST['nik']) ? $_POST['nik'] : '',
        'unit' => isset($_POST['unit']) ? $_POST['unit'] : '',
        'email' => isset($_POST['email']) ? $_POST['email'] : '',
        'telepon' => isset($_POST['telepon']) ? $_POST['telepon'] : '',
        'jenjang_saat_ini' => isset($_POST['jenjang_saat_ini']) ? $_POST['jenjang_saat_ini'] : ''
    );

    // Debug output
    echo json_encode($_SESSION['form_data']);
    exit;
}
?>
