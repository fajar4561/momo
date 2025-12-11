<?php 
function getFileFormat($file) {
    // Menentukan path file dan ekstensi file
    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_path = 'public/file/berkas/' . $file;
    $file_size = file_exists($file_path) ? filesize($file_path) / 1024 : 0; // Cek apakah file ada

    // Pemendekan nama file jika terlalu panjang
    $maxLength = 10;
    if (strlen($file) > $maxLength) {
        $shortName = substr($file, -$maxLength); // Ambil bagian akhir dari nama file
        $displayName = '...' . $shortName; // Format nama file pendek
    } else {
        $displayName = $file;
    }

    // Menentukan format berdasarkan ekstensi file 
    if ($file_extension == 'pdf') {
        $format = 'la-file-pdf text-danger';
    } elseif ($file_extension == 'png') {
        $format = 'la-file-image text-warning';
    } elseif ($file_extension == 'jpg') {
        $format = 'la-file-image text-secondary'; 
    } elseif ($file_extension == 'jpeg') {
        $format = 'la-file-image text-success';
    } else {
        $format = 'la-file text-secondary';
    } 

    return [
        'format' => $format,
        'file_size' => $file_size,
        'file_path' => $file_path,
        'display_name' => $displayName, // Nama file pendek
    ];
}

// Ambil data dari database
$ambil_berkas_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
$sertifikat = $ambil_berkas_sertif->num_rows;


// cari tahu apakah pegawai yang login termasuk nakes atau tidak
$jenis_pegawai = $pecahuser['jenis_pegawai'];
$jenis_kesehatan = $pecahuser['jenis_kesehatan'];


// Ambil session dan data pegawai
$ambil_data_diri = $koneksi->query("SELECT * FROM pegawai WHERE username='$n'");
$data_diri = $ambil_data_diri->fetch_assoc();

// Daftar file yang harus diupload
if ($jenis_pegawai=='1') {
    $files = array(
        "FOTO" => array("label" => "Foto Terbaru", "icon" => "award"),
        "KTP" => array("label" => "KTP", "icon" => "users"),
        "KK" => array("label" => "Kartu Keluarga", "icon" => "trello"),
        "IJAZAH" => array("label" => "Ijazah Terakhir", "icon" => "file-text"),
        "PPNI" => array("label" => "PPNI", "icon" => "activity"),
        "STR" => array("label" => "STR", "icon" => "hard-drive"),
        "SIP" => array("label" => "SIP", "icon" => "credit-card"),
        "NPWP" => array("label" => "NPWP", "icon" => "file-plus"),
        "PORTOFOLIO" => array("label" => "PORTOFOLIO", "icon" => "bookmark"),
        "TRANSKIP" => array("label" => "Transkip Nilai", "icon" => "book-open"),
        "SERTIFIKAT" => array("label" => "Sertifikat", "icon" => "toggle-left"),
    );
} else {
    $files = array(
        "KTP" => array("label" => "KTP", "icon" => "users"),
        "KK" => array("label" => "Kartu Keluarga", "icon" => "trello"),
        "IJAZAH" => array("label" => "Ijazah Terakhir", "icon" => "file-text"),       
        "STR" => array("label" => "STR", "icon" => "hard-drive"),
        "SERTIFIKAT" => array("label" => "Sertifikat", "icon" => "toggle-left"),
    );
}


// Ambil data berkas dari database
$qBerkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$n'");
$berkas = $qBerkas->fetch_assoc();

// Ambil jumlah sertifikat
$qSertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
$jumlahSertifikat = $qSertifikat->num_rows;
$sertifikat = $qSertifikat->num_rows;

if ($jenis_pegawai=='1')
{
// Daftar file utama
    $fileList = array(
        "FOTO"   => "Foto Terbaru",
        "KTP" => "KTP",
        "KK" => "Kartu Keluarga",
        "IJAZAH" => "Ijazah",
        "PPNI" => "PPNI",
        "SIP" => "SIP",
        "STR" => "STR",
        "NPWP" => "NPWP",
        "PORTOFOLIO"   => "Portofolio",
        "TRANSKIP"   => "Transkip Nilai",
        "SERTIFIKAT" => "SERTIFIKAT"
    );    
} else {
    // Daftar file utama
    $fileList = array(
        "KTP" => "KTP",
        "KK" => "Kartu Keluarga",
        "IJAZAH" => "Ijazah",
        "STR" => "STR",
        "SERTIFIKAT" => "SERTIFIKAT"
    );
}



?>