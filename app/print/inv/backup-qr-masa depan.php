<?php
session_start(); 
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require('../../../public/plugins/fpdf/fpdf.php');
ob_start();


$kode_get = $_GET['kode'];


$ambil = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_inv ='$kode_get'");
$row = $ambil->fetch_assoc();

$unit = $row['unit'];
$ruangan = $row['ruangan'];
$kod = $row['kode_inv'];
$kode_penyerahan  = $row['kode_penyerahan'];

$ambil_utama = $koneksi->query("SELECT * FROM penyerahan WHERE kode_penyerahan='$kode_penyerahan'");
$data = $ambil_utama->fetch_assoc();


$tempdir = "../../../public/file/inv/";
$namafile = str_replace('/', '_', $kode_get) . ".png";


$pdf = new FPDF();
$pageWidth = 60;  
$pageHeight = 30; 
$pdf->AddPage('L', 'A4');

// Path lengkap ke file QR Code
$gambarPath = $tempdir . $namafile;

$lebar_logo = 60;
$tinggi_logo = 0; 

$x_logo = ($pageWidth - $lebar_logo) / 2; // Posisi x untuk gambar logo
$y_logo = 0; // Posisi y logo
$logo_path = '../../../public/img/kop2.png'; 

$pdf->Image($gambarPath, 5, 8, 18, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(255, 255, 255);


$pdf->SetXY(0, 0);
$pdf->MultiCell(65, 6,' ', 0,0, 'C');
$pdf->SetXY(0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 5, '', 0, 'C');
$pdf->Cell(30, 5, 'RS. PERMATA MEDIKA', 0, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(23, 7);
$pdf->Cell(1,5,$kod,0,0);


// Bersihkan buffer output dan tampilkan PDF
ob_end_clean();

$pdf->Output();

?>