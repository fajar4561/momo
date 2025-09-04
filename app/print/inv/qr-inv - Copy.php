<?php
session_start(); 
require '../../../env/koneksi.php';
require('../../../public/plugins/fpdf/fpdf.php');
ob_start();


$kode_get = $_GET['kode'];


$ambil = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_inv ='$kode_get'");
$row = $ambil->fetch_assoc();

$unit = $row['unit'];
$ruangan = $row['ruangan'];
$kod = $row['kode_inv'];


$tempdir = "../../../public/file/inv/";
$namafile = str_replace('/', '_', $kode_get) . ".png";

echo "$ruangan";


$pdf = new FPDF();
$pageWidth = 60;  // Lebar dalam cm
$pageHeight = 30; // Panjang dalam cm
$pdf->AddPage('L', array($pageWidth, $pageHeight)); // Ukuran dalam mm (1 cm = 10 mm)


// Path lengkap ke file QR Code
$gambarPath = $tempdir . $namafile;

$lebar_logo = 6; // Lebar gambar dalam milimeter
$tinggi_logo = 0; // Tinggi gambar dalam milimeter (0 menyesuaikan dengan lebar)

$x_logo = ($pageWidth - $lebar_logo) / 2 + 1; // Posisi x untuk gambar
$y_logo = 0.5; // Posisi y (sesuaikan sesuai kebutuhan)
$logo_path = '../../../public/img/LOGO.JPG'; 
$pdf->Image($logo_path, $x_logo, $y_logo, $lebar_logo, $tinggi_logo, 'JPG');

$pdf->SetFont('Arial', 'B', 7);

$length = strlen($ruangan); // untuk string ASCII
// atau
$length = mb_strlen($ruangan, 'UTF-8'); // untuk string dengan encoding multibyte

// if ($length <= 4) {
//     $lebarTeks = $pdf->GetStringWidth('RUANGAN '.$ruangan);
// } else {
//     $lebarTeks = $pdf->GetStringWidth($ruangan);
// }

$lebarTeks = $pdf->GetStringWidth($kod);

$xc = ($pageWidth - $lebarTeks) / 2;
$pdf->SetXY($xc, 8.5);

// if ($length <= 4) {
//     $pdf->Cell(5,0,'RUANGAN '.$ruangan,0,0);
// }
// else {
//     $pdf->Cell(5,0,$ruangan,0,0);
// }

$pdf->Cell(5,0,$kod,0,0);

// Menghitung posisi x untuk menempatkan teks di tengah
$lebarSel = 60; // Lebar maksimum yang diinginkan
$x1 = ( $lebarSel - $lebarTeks ) / 2 + 1; // Posisi x awal garis horizontal
$x2 = $x1 + $lebarTeks; // Posisi x akhir garis horizontal

// Posisi y untuk garis horizontal
$lineY = 10; // Dapat disesuaikan jika perlu

// Menambahkan garis horizontal
$pdf->Line($x1, $lineY, $x2, $lineY);

$lebar = 18; // Lebar gambar dalam milimeter
$tinggi = 0; // Tinggi gambar dalam milimeter (0 menyesuaikan dengan lebar)

// Menghitung posisi x agar gambar berada di tengah
$x = ($lebarSel - $lebar) / 2 + 1; // Posisi x untuk gambar
$y = 11; // Posisi y

// Tambahkan gambar QR Code ke PDF
$pdf->Image($gambarPath, $x, $y, $lebar, $tinggi);



// Bersihkan buffer output dan tampilkan PDF
ob_end_clean();

$pdf->Output();

?>