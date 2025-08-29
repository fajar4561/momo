<?php
session_start();
require '../../../env/koneksi.php';



// deklarasi variabel
$id = $_POST['id'];
$ambil_id = $koneksi->query("SELECT * FROM unit_inv WHERE id='$id'");
$fetch = $ambil_id->fetch_assoc();
$unit_lama =$fetch['unit'];
 // hapus unit lama
$koneksi->query("DELETE FROM unit_inv WHERE unit='$unit_lama'");
$koneksi->query("DELETE FROM detail_unit WHERE unit='$unit_lama'");

$unit = $_POST['unit'];
$lantai = $_POST['lantai'];
$keterangan = $_POST['keterangan'];

$jumlah_data = count($_POST['nama_ruangan']);


if ($jumlah_data > 1) {
    foreach ($_POST['nama_ruangan'] as $index => $ruangan) {
        // simpan data di detail unit
        $unit = mysqli_real_escape_string($koneksi, strtoupper($unit));
        $ruangan = mysqli_real_escape_string($koneksi, strtoupper($ruangan));

        $simpan = $koneksi->query("INSERT INTO detail_unit (id, unit, ruangan) VALUES (null, '$unit', '$ruangan')");
        
    }

    // simpan data ke unit inv
    $koneksi->query("INSERT INTO unit_inv (id,unit,opsi,lantai,keterangan) VALUES(null, '$unit', '1', '$lantai', '$keterangan')");
}
else {
    $koneksi->query("INSERT INTO unit_inv (id,unit,opsi,lantai,keterangan) VALUES(null, '$unit', '0', '$lantai', '$keterangan')");
}

$_SESSION['pesan'] = 'Data Berhasil diubah!';
$_SESSION['info'] = 'Berhasil!';
$_SESSION['warna'] = 'success';
echo "<script>location='../../../unit-inv';</script>";

?>
