<?php 
// ambil dari variabel session yang aktive
$sesi_pegawai = $_SESSION['username'];

$ambil_data_diri = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pegawai'");
$data_diri = $ambil_data_diri->fetch_assoc();

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
        $format = 'la-file-image text-info';
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


$files = [
    "FOTO"   => "Foto Terbaru",
    "KTP"    => "KTP",
    "KK"     => "Kartu Keluarga",
    "IJAZAH" => "Ijazah Terkahir",
    "PPNI"   => "PPNI",
    "SIP"    => "SIP",
    "STR"    => "STR",
    "NPWP"   => "NPWP",
    "PORTOFOLIO"   => "Portofolio",
    "TRANSKIP"   => "Transkip Nilai",
];

// ambil data berkas 
$n = $data_diri['nopeg'];
$ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$n'");
$ambil_berkas_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
$sertifikat = $ambil_berkas_sertif->num_rows;

$berkas = mysqli_fetch_assoc($ambil_berkas);

// // ambil detail file
// $ambil_detail_file = $koneksi->query("SELECT * FROM detail_file WHERE nopeg='$n'");
// $ada_berks = $ambil_detail_file->num_rows;

// Memanggil fungsi untuk setiap berkas
$ktpData = getFileFormat($berkas['KTP']);
$kkData = getFileFormat($berkas['KK']);
$ijazahData = getFileFormat($berkas['IJAZAH']);
$ppniData = getFileFormat($berkas['PPNI']);
$sipData = getFileFormat($berkas['SIP']);
$strData = getFileFormat($berkas['STR']);
$npwpData = getFileFormat($berkas['NPWP']);

// Anda dapat mengakses hasilnya seperti ini
$ktp = $ktpData['format'];
$file_path_ktp = $ktpData['file_path'];
$file_size_ktp = $ktpData['file_size'];
$display_name_ktp = $ktpData['display_name']; // Nama file pendek

$kk = $kkData['format'];
$file_path_kk = $kkData['file_path'];
$file_size_kk = $kkData['file_size'];
$display_name_kk = $kkData['display_name']; // Nama file pendek

$ijazah = $ijazahData['format'];
$file_path_ijazah = $ijazahData['file_path'];
$file_size_ijazah = $ijazahData['file_size'];
$display_name_ijazah = $ijazahData['display_name']; // Nama file pendek

$ppni = $ppniData['format'];
$file_path_ppni = $ppniData['file_path'];
$file_size_ppni = $ppniData['file_size'];
$display_name_ppni = $ppniData['display_name']; // Nama file pendek

$sip = $sipData['format'];
$file_path_sip = $sipData['file_path'];
$file_size_sip = $sipData['file_size'];
$display_name_sip = $sipData['display_name'];

$str = $strData['format'];
$file_path_str = $strData['file_path'];
$file_size_str = $strData['file_size'];
$display_name_str = $strData['display_name'];

$npwp = $npwpData['format'];
$file_path_npwp = $npwpData['file_path'];
$file_size_npwp = $npwpData['file_size'];
$display_name_npwp = $npwpData['display_name'];


// --- LOGIKA CEK FILE DAN DETAIL ---
$isComplete = true;
$missingFiles = []; // simpan label
$missingKeys  = []; // simpan key (field2) untuk dropdown

foreach ($files as $field2 => $label2) {
    $key = strtolower($field2);
    // cek apakah file ada di tabel file
    if (empty($berkas[$field2])) {
        $isComplete = false;
        $missingFiles[] = $label2 . " (Belum diupload)";
        $missingKeys[]  = $field2;
    } else {
        // kalau sudah ada file, cek apakah sudah ada di detail_file
        $cekDetail = $koneksi->query("SELECT * FROM file_detail WHERE nopeg='$n' AND jenis_file='$field2'");
        if ($cekDetail && $cekDetail->num_rows == 0) {
            $isComplete = false;
            $missingFiles[] = $label2 . " (Berkas Kurang Valid)";
            $missingKeys[]  = $field2;
        }
    }
}

// cek sertifikat
if ($sertifikat == 0) {
    $isComplete = false;
    $missingFiles[] = "Sertifikat (Belum ada)";
    $missingKeys[]  = "sertifikat";
} else {
    $cekDetailSertif = $koneksi->query("SELECT * FROM detail_file WHERE nopeg='$n' AND field='SERTIFIKAT'");
    if ($cekDetailSertif && $cekDetailSertif->num_rows == 0) {
        $isComplete = false;
        $missingFiles[] = "Sertifikat (Belum divalidasi)";
        $missingKeys[]  = "sertifikat";
    }
}


// ambil data untuk mengechek apakah sudah melakukan pengajuan yang on progress
$ambil_pengajuan = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$n' AND status_pengajuan='menunggu'");
$ada_pengajuan = $ambil_pengajuan->num_rows;


?>