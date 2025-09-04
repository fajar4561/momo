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

// ambil tgl stok
$nama_barang = $row['nama_barang'];
$merk = $row['merk'];
$tipe = $row['tipe'];
$kode_bar = $row['kode_barang'];
$konek_beli = $koneksi->query("SELECT * FROM detail_pembelian WHERE nama_barang='$nama_barang' AND kode_barang='$kode_bar' AND merk='$merk' AND tipe='$tipe' ");
$dat1 = $konek_beli->fetch_assoc();


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

$pdf->Image($gambarPath, 5, 10, 18, 0);
$pdf->Image($logo_path, $x_logo+2.5, $y_logo, $lebar_logo, $tinggi_logo, 'png');

$pdf->SetXY(23, 9);
$pdf->SetFont('Arial', 'B', 5.5);

// Menampilkan teks di atas QR Code
$pdf->Cell(1,5,$kod,0,0);

$pdf->SetFont('Arial', '', 5.5);

$pdf->SetXY(23, 12);
$pdf->Cell(1,5,'Nama',0,0);
$pdf->SetXY(32, 12);
$pdf->Cell(1,5,':',0,0);
$pdf->SetXY(34, 12);
$pdf->Cell(1,5,$row['nama_barang'],0,0);

$pdf->SetXY(23, 14);
$pdf->Cell(1,5,'Merk/Tipe',0,0);
$pdf->SetXY(32, 14);
$pdf->Cell(1,5,':',0,0);
$pdf->SetXY(34, 14);
$pdf->Cell(1,5,$row['merk'].' '.$row['tipe'],0,0);

$pdf->SetXY(23, 16);
$pdf->Cell(1,5,'Tgl Beli',0,0);
$pdf->SetXY(32, 16);
$pdf->Cell(1,5,':',0,0);
$pdf->SetXY(34, 16);
$pdf->Cell(1,5,tgl_indo($dat1['tgl_transaksi']),0,0);

$pdf->SetXY(23, 18);
$pdf->Cell(1,5,'Tgl Pasang',0,0);
$pdf->SetXY(32, 18);
$pdf->Cell(1,5,':',0,0);
$pdf->SetXY(34, 18);
$pdf->Cell(1,5,tgl_indo($data['tgl_penyerahan']),0,0);

$pdf->SetXY(23, 20);
$pdf->Cell(1,5,'Unit',0,0);
$pdf->SetXY(32, 20);
$pdf->Cell(1,5,':',0,0);
$pdf->SetXY(34, 20);
$pdf->Cell(1,5,$unit,0,0);

$pdf->SetXY(23, 22);
$pdf->Cell(1,5,'Ruangan',0,0);
$pdf->SetXY(32, 22);
$pdf->Cell(1,5,':',0,0);
$pdf->SetXY(34, 22);
$pdf->Cell(1,5,$ruangan,0,0);

// Bersihkan buffer output dan tampilkan PDF
ob_end_clean();

$pdf->Output();

?>