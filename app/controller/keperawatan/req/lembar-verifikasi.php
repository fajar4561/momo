<?php 
$pecah = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'")->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();

$judul = 'Lembar Verifikasi Berkas';
$judul2 = 'Pegawai';
$imagePath = '../../../public/img/logo greyscale.jpg';

// Ukuran halaman PDF (A4)
$pageWidth = 210;
$pageHeight = 297;

$imageWidth = 105; // Lebar gambar baru dalam mm
$imageHeight = 100; // Tinggi gambar baru dalam mm

// Hitung posisi x dan y agar gambar berada di tengah
$x = ($pageWidth - $imageWidth) / 2;
$y = ($pageHeight - $imageHeight) / 2;

// Menambahkan gambar latar belakang di tengah halaman dengan ukuran yang diperkecil
$pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
$pdf->SetFont('Arial','B',8);
$pdf->Image('../../../public/img/kop.JPG', 10, 10, 180, 0, 'JPG');

$pdf->SetXY(10, 50);
$pdf->SetFont('Arial', 'B', 12);

// Menghitung lebar judul dan posisi x untuk memusatkan
$judulWidth = $pdf->GetStringWidth($judul);
$judulWidth2 = $pdf->GetStringWidth($judul2);
$centerX = ($pageWidth - $judulWidth) / 2;
$centerX2 = ($pageWidth - $judulWidth2) / 2;

// Mengatur posisi x ke tengah dan menambahkan judul 
$pdf->SetX($centerX);
$pdf->Cell(0, 0, strtoupper($judul), 0, 0); // 'C' untuk center
$pdf->SetXY(10, 60);


// header
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,'Nama Peserta',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['nama'],0,0);
$pdf->Ln();
$pdf->Cell(30,5,'No Pegawai',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$nopeg,0,0);
$pdf->Ln();
$pdf->Cell(30,5,'Asal Ruang',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$unit,0,0);

$pdf->setXY(10,80);

$pdf->SetFont('Arial','B',8);
/// Fungsi multicell per kolom tapi tetap sejajar ke kanan
function MultiCellRow($pdf, $w, $h, $txt, $border=1, $align='C') {
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($w, $h, $txt, $border, $align);
    $pdf->SetXY($x + $w, $y); // kembali ke kanan
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
MultiCellRow($pdf, 30, 6, "Tanggal\nBerakhir",1,'C');
MultiCellRow($pdf, 30, 6, "Nomor Surat/\nSertifikat/Kartu",1,'C');
$pdf->Ln();




$pdf->Output("laporan.pdf", "I");

?>