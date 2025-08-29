 <?php 
session_start();
require '../../../env/koneksi.php';

$nopeg = $_POST['nopeg'];
$jabatan = $_POST['jabatan'];


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

foreach ($jabatan as $key => $value) {
    // Simpan Data
    if (!empty($value)) {
       $koneksi->query("INSERT INTO pegawai_jabatan (id,nopeg,jabatan) VALUES(null, '$nopeg', '$value')");
    }
}


// // pesan
$_SESSION['pesan'] = 'Jabatan Berhasil ditambahkan !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';

echo "<script>location='../../../profil';</script>";

?>