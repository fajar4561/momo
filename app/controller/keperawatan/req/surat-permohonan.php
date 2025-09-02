<?php 
$pecah = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'")->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();

$judul = 'SURAT PERMOHONAN KREDENSIAL DAN REKREDENSIAL';
$judul2 = 'PERAWAT DAN BIDAN';
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
$pdf->SetXY(10, 57);
$pdf->SetX($centerX2);
$pdf->Cell(0, 0, $judul2, 0, 0); // 'C' untuk center

$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(10, 70);
$pdf->Cell(0, 5, 'Kepada Yth', 0, 1);   // 1 = pindah baris otomatis
$pdf->Cell(0, 5, 'Direktur RS Permata Medika Semarang', 0, 1); 
$pdf->Cell(0, 5, 'Di Tempat', 0, 1);

$pdf->SetXY(10, 90);
$pdf->Cell(0, 5, 'Yang bertanda tangan dibawah ini:', 0, 1);
$pdf->Cell(45,5,'Nama',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['nama'],0,0);
$pdf->Ln();
$pdf->Cell(45,5,'NIK/NIP',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['nopeg'],0,0);
$pdf->Ln();
$pdf->Cell(45,5,'Unit Kerja',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['unit'],0,0);
$pdf->Ln();
$pdf->Cell(45,5,'Jenjang karir saat ini',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$jenjang_saat_ini,0,0);
$pdf->Ln();
$pdf->Cell(45,5,'Jenjang karir yang diajukan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$jenjang_yang_dipilih,0,0);

$pdf->SetXY(10, 122);
$pdf->Cell(0, 5, 'Bersama ini kami mengajukan permohonan kredensial/rekredensial guna mendapatkan penugasan klinis dalam', 0, 1);
$pdf->Cell(0, 5, 'melakukan pelayanan Asuhan Keperawatan di Rumahsakit Permata Medika.', 0, 1);
$pdf->Cell(0, 5, 'Sebagai bahan pertimbangan bersama ini saya lampirkan :', 0, 1);
$files2 = [
    "FOTO"   => "Pas Foto Terbaru",
    "KTP"    => "Kartu Tanda Penduduk (KTP)",
    "KK"     => "Kartu Keluarga (KK)",
    "IJAZAH" => "Ijazah Terkahir",
    "PPNI"   => "Kartu Keanggotaan PPNI",
    "SIP"    => "Surat Ijin Praktik (SIP)",
    "STR"    => "Surat Tanda Registrasi (STR)",
    "NPWP"   => "NPWP",
    "PORTOFOLIO"   => "Portofolio",
    "TRANSKIP"   => "Transkip Nilai",
];

$no3 = 1;
foreach ($files2 as $field2 => $label2) {
	$pdf->SetX(15); 
	$pdf->Cell(0, 5, $no3++.'.'.$label2, 0, 1);
}
$pdf->Cell(0, 5, 'Demikian atas terkabulnya permohonan ini saya ucapkan terimakasih.', 0, 1);


// Menampilkan gambar QR code
$x2 = $pdf->GetX();
$y2 = $pdf->GetY();
$pdf->SetXY(145, $y2+10);
$pdf->Cell(5,5,tgl_ind($today),0,0);
$pdf->SetXY($x2+10, $y2+15);
$pdf->Image('../../../public/file/qr/' . $nopeg . '.png', 152, $pdf->GetY(), 0, 25);
$pdf->SetXY(145, $y2+40);
$pdf->Cell(5,5,$pecah['nama'],0,0);

$pdf->Output("../../../public/file/keperawatan/permohonan/surat-permohonan-".$kode."-".$nopeg.".pdf", 'F');
?>