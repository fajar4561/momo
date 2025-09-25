<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
ob_start();
date_default_timezone_set('Asia/Jakarta');
session_start();
$today= date("d M Y");
$today2 = date("Y-m-d");
$tgl_hari_ini = date("Y-m-d H:i:s");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/tgl_indo2.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';
require('../../../public/plugins/fpdf/fpdf.php'); 


// Deklarasi Variabel
$nopeg = $_POST['nopeg'];
$kode_pengajuan=$_POST['kode_pengajuan'];
$tanggal = $_POST['tanggal'];
$catatan = $_POST['catatan'];
$status_pengajuan = 'penilaian';

// ambil data session yang digunakan untuk validator
$sesi_pengguna = $_SESSION['username'];
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();
$validator_berkas = $data_user['nopeg'];

// Simpan pengajuan kredensial
// dengan mengupdate tabel pengajuan kredensial
$simpan_pengajuan = $koneksi->query("UPDATE pengajuan_kredensial SET status_pengajuan='$status_pengajuan',
	tgl_ujian='$tanggal', validator='$validator_berkas', tgl_validasi='$today2' WHERE nopeg='$nopeg'");

if ($simpan_pengajuan) {
	// code...
}
else {
	echo 'Eror galagal simpan_pengajuan..... '.$koneksi->error;
}

$ambil_peserta = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$pecah = $ambil_peserta->fetch_assoc();


$koenk_pengajuan = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg' AND kode_pengajuan='$kode_pengajuan'");
$data_pengajuan = $koenk_pengajuan->fetch_assoc();
$id_rkk = $data_pengajuan['jenjang_diajukan'];

$konek_master_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_rkk'");
$data_rkk = $konek_master_rkk->fetch_assoc();


// ambil data pengguna yang memvalidasi
// buat jaga-jaga kedepannya kalau diperlukan aksi dengan mendownload
$validator = $data_pengajuan['validator'];
$konek_Validator = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$validator'");
$data_validator = $konek_Validator->fetch_assoc();

$pageWidth = 210;
$pageHeight = 297;

$imageWidth = 105; // Lebar gambar baru dalam mm
$imageHeight = 100; // Tinggi gambar baru dalam mm

// Hitung posisi x dan y agar gambar berada di tengah
$x = ($pageWidth - $imageWidth) / 2;
$y = ($pageHeight - $imageHeight) / 2;
$imagePath = '../../../public/img/logo greyscale.jpg';

// generated PDF hasil 
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
$pdf->SetFont('Arial','B',8);
$pdf->Image('../../../public/img/kop.JPG', 10, 10, 180, 0, 'JPG');

$judul3 = 'lembar verifikasi berkas';
$judulWidth3 = $pdf->GetStringWidth($judul3);
$centerX3 = ($pageWidth - $judulWidth3) / 2;

$pdf->SetFont('Arial','B',12);
$pdf->SetXY($centerX3-15,50);
$pdf->Cell(0, 0, strtoupper($judul3), 0, 0); // 'C' untuk center
$pdf->SetXY(10, 55);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,'Nama Peserta',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(80,5,$pecah['nama'],0,0);

$pdf->Cell(30,5,'Verifikator',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data_validator['nama'],0,0);

$pdf->Ln();
$pdf->Cell(30,5,'No Pegawai',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(80,5,$nopeg,0,0);

$pdf->Cell(30,5,'Nopeg',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data_validator['nopeg'],0,0);

$pdf->Ln();
$pdf->Cell(30,5,'Asal Ruang',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['unit'],0,0);
$pdf->Ln();
$pdf->Cell(30,5,'Jenjang',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data_rkk['nama_rkk'],0,0);
$pdf->Ln();
$pdf->Cell(30,5,'Kode Pengajuan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$kode_pengajuan,0,0);
$pdf->Ln();
$pdf->Cell(30,5,'Tanggal Pengajuan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,tgl_ind($data_pengajuan['tgl_pengajuan']),0,0);

$pdf->setXY(10,90);

$pdf->SetFont('Arial','B',8);
/// Fungsi multicell per kolom tapi tetap sejajar ke kanan
function MultiCellRow($pdf, $w, $h, $txt, $border=1, $align='C') {
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->MultiCell($w,$h,$txt,$border,$align);

    // pindahkan X ke kanan kolom, Y tetap di atas
    $pdf->SetXY($x+$w, $y);
}

$pdf->SetFont('Arial','B',8);

// ===== Baris Pertama =====
$pdf->Cell(53,20,'Materi',1,0,'C');   // 20 mm total tinggi
$pdf->Cell(10,20,'ADA',1,0,'C');
$pdf->Cell(15,20,'Tidak Ada',1,0,'C');
$pdf->Cell(22,20,'Sedang Proses',1,0,'C');
$pdf->Cell(95,8,'Verifikasi',1,0,'C'); // judul utama
$pdf->Ln();

// ===== Baris Kedua (sub kolom Verifikasi) =====
$pdf->SetX(110); // mulai dari kolom Verifikasi

MultiCellRow($pdf, 35, 6, "Tanggal dikeluarkan\nSurat/Sertifikat/kartu",1,'C');
MultiCellRow($pdf, 25, 6, "Tanggal\nBerakhir",1,'C');
MultiCellRow($pdf, 35, 6, "Nomor Surat/\nSertifikat/Kartu",1,'C');
$pdf->Ln();


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
$pdf->setXY(10,110);
$pdf->SetFont('Arial','',8);

// Path gambar centang
$checkImg = '../../../public/bg/centang.png';

$no = 1;
$no2 = 1;
foreach ($files as $field => $label) {
    $ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$nopeg'");
    $berkas = mysqli_fetch_assoc($ambil_berkas);
    $ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$field]' AND nopeg='$nopeg' ");
    $data_detail = $ambil_detail_file->fetch_assoc();
    $pdf->Cell(53, 8, $no++.". ".$label, 1, 0, 'L');   // Kolom Materi
    $x = $pdf->GetX();
	$y = $pdf->GetY();
	$pdf->Cell(10, 8, '', 1, 0, 'C'); // kotak
	if ($data_detail['validasi'] == 'ada') {
	    $pdf->Image($checkImg, $x+2, $y+1.5, 5, 5); // sesuaikan posisi & ukuran
	} else {
	    $pdf->SetXY($x, $y);
	    $pdf->Cell(10, 8, '-', 0, 0, 'C');
	}

	// === KOLOM TIDAK ADA ===
	$x = $pdf->GetX();
	$y = $pdf->GetY();
	$pdf->Cell(15, 8, '', 1, 0, 'C'); 
	if ($data_detail['validasi'] == 'tidak') {
	    $pdf->Image($checkImg, $x+5, $y+1.5, 5, 5);
	} else {
	    $pdf->SetXY($x, $y);
	    $pdf->Cell(15, 8, '-', 0, 0, 'C');
	}

	// === KOLOM SEDANG PROSES ===
	$x = $pdf->GetX();
	$y = $pdf->GetY();
	$pdf->Cell(22, 8, '', 1, 0, 'C'); 
	if ($data_detail['validasi'] == 'proses') {
	    $pdf->Image($checkImg, $x+8, $y+1.5, 5, 5);
	} else {
	    $pdf->SetXY($x, $y);
	    $pdf->Cell(22, 8, '-', 0, 0, 'C');
	}
    $pdf->Cell(
        35, 8, 
        ($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_keluar'])) 
            ? '' 
            : date("d F Y", strtotime($data_detail['tgl_keluar'])),
        1, 0, 'C'
    );

    $pdf->Cell(25, 8, 
        ($data_detail['tgl_berakhir'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) 
            ? '' 
            : date("d F Y", strtotime($data_detail['tgl_berakhir']))
    , 1, 0, 'C');       // Kolom Tgl Berakhir
    $pdf->Cell(35, 8, 
        (in_array($field, ['FOTO','PORTOFOLIO']) ? '~' : $data_detail['no_file'])
    , 1, 0, 'C');       // Kolom Nomor Surat
    $pdf->Ln();
}
$pdf->SetFont('Arial','B',8);
$pdf->Cell(195, 8, strtoupper('sertifikat pelatihan yang dimiliki selama bekerja di RS. Permata medika'), 1, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$ambil_sertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$nopeg'");
while ($data_sertifikat= mysqli_fetch_assoc($ambil_sertifikat)) {
    $sertifikat_berkas = $data_sertifikat['berkas'];
    $ambil_sertif = $koneksi->query("SELECT * FROM file_detail WHERE nama_file = '$sertifikat_berkas' ");
    $pecah_sertifikat = $ambil_sertif->fetch_assoc();

    // Kolom Materi
    $pdf->Cell(53, 8, $no2++.". ".$data_sertifikat['keterangan'], 1, 0, 'L');   

    // === Kolom ADA ===
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Cell(10, 8, '', 1, 0, 'C'); 
    if ($pecah_sertifikat['validasi'] == 'ada') {
        $pdf->Image($checkImg, $x+2.5, $y+1.5, 5, 5);
    } else {
        $pdf->SetXY($x, $y);
        $pdf->Cell(10, 8, '-', 0, 0, 'C');
    }

    // === Kolom TIDAK ADA ===
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Cell(15, 8, '', 1, 0, 'C'); 
    if ($pecah_sertifikat['validasi'] == 'tidak') {
        $pdf->Image($checkImg, $x+5, $y+1.5, 5, 5);
    } else {
        $pdf->SetXY($x, $y);
        $pdf->Cell(15, 8, '-', 0, 0, 'C');
    }

    // === Kolom PROSES ===
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Cell(22, 8, '', 1, 0, 'C'); 
    if ($pecah_sertifikat['validasi'] == 'proses') {
        $pdf->Image($checkImg, $x+8, $y+1.5, 5, 5);
    } else {
        $pdf->SetXY($x, $y);
        $pdf->Cell(22, 8, '-', 0, 0, 'C');
    }

    // === Kolom Tgl Keluar ===
    $pdf->Cell(
        35, 8, 
        ($pecah_sertifikat['tgl_keluar'] == '0000-00-00' || empty($pecah_sertifikat['tgl_keluar'])) 
            ? '' 
            : date("d F Y", strtotime($pecah_sertifikat['tgl_keluar'])),
        1, 0, 'C'
    );

    // === Kolom Tgl Berakhir ===
    $pdf->Cell(
        25, 8, 
        ($pecah_sertifikat['tgl_berakhir'] == '0000-00-00' || empty($pecah_sertifikat['tgl_berakhir'])) 
            ? '' 
            : date("d F Y", strtotime($pecah_sertifikat['tgl_berakhir'])),
        1, 0, 'C'
    );

    // === Kolom No File ===
    $pdf->Cell(35, 8, $pecah_sertifikat['no_file'], 1, 0, 'C');     

    $pdf->Ln();
}

// === Blok tanda tangan kiri (Pemohon) ===

$leftX = 25;
$pdf->Image('../../../public/file/qr/' . $nopeg . '.png', $leftX, $y+25, 25, 25);

// Nama
$pdf->SetXY($leftX, $y+52);
$pdf->Cell(25, 5, $pecah['nama'], 0, 0, 'C');  // lebar 25, align center

// Role
$pdf->SetXY($leftX, $y+57);
$pdf->Cell(25, 5, '(Pemohon)', 0, 0, 'C');

// === Blok tanda tangan kanan (Verifikator) ===
$rightX = 162;
$pdf->Image('../../../public/file/qr/' . $nopeg . '.png', $rightX, $y+25, 25, 25);

// tanggal
$pdf->SetXY($rightX-3, $y+20);
$pdf->Cell(35, 6, tgl_ind($today), 0, 0,'');  // 40 lebar, align center

// Nama
$pdf->SetXY($rightX, $y+52);
$pdf->Cell(25, 5, $pecah['nama'], 0, 0, 'C');

// Role
$pdf->SetXY($rightX, $y+57);
$pdf->Cell(25, 5, '(Verifikator)', 0, 0, 'C');




$pdf->Output('laporan.pdf', 'I');



?>