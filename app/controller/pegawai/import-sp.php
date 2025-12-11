<?php
date_default_timezone_set('Asia/Jakarta');

// // Folder tujuan
// $targetDir = "uploads/";

// if (!file_exists($targetDir)) {
//     mkdir($targetDir, 0777, true);
// }

if (isset($_FILES['berkas'])) {

    $fileName = $_FILES['berkas']['name'];
    $fileTmp  = $_FILES['berkas']['tmp_name'];
    $fileSize = $_FILES['berkas']['size'];
    $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validasi ekstensi
    $allowed = ['jpg','jpeg','png','pdf','xlsx','xls','docx'];
    
    if (!in_array($fileExt, $allowed)) {
        die("Format file tidak diizinkan!");
    }

    // Nama baru agar tidak bentrok
    $newName = time() . "_" . rand(1000,9999) . "." . $fileExt;

    // Pindahkan file
    if (move_uploaded_file($fileTmp, $targetDir . $newName)) {
        echo "<h3>Upload berhasil!</h3>";
        echo "Nama file baru: " . $newName;
        echo "<br><a href='upload-form.php'>Kembali</a>";
    } else {
        echo "Upload gagal!";
    }

} else {
    echo "Tidak ada file dikirim!";
}
?>