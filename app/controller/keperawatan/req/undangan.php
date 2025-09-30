<?php 
// Hitung posisi x dan y agar gambar berada di tengah
$x = ($pageWidth - $imageWidth) / 2;
$y = ($pageHeight - $imageHeight) / 2;
$imagePath = '../../../public/img/logo greyscale.jpg';

// generated PDF hasil 
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->Image('../../../public/img/kop.JPG', 10, 10, 180, 0, 'JPG');

$judul3 = 'Undangan Ujian Kredensial';
$judulWidth3 = $pdf->GetStringWidth($judul3);
$centerX3 = ($pageWidth - $judulWidth3) / 2;

$pdf->SetFont('Arial','B',12);
$pdf->SetXY($centerX3-15,50);
$pdf->Cell(0, 0, strtoupper($judul3), 0, 0); // 'C' untuk center

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY(25,$y+7);

$pdf->SetFont('Arial','',10);
$pdf->Cell(22,5,'Semarang ,',0,0);
$pdf->Cell(80,5,date("d M Y"),0,0);

$pdf->SetXY(25,$y+15);

$files = glob("../../../public/file/keperawatan/undangan/*.pdf");
$no_urut = count($files) + 1;
$tahun = date("Y");
$nomor_surat = "RSPM/$tahun/KREDENSIAL/".str_pad($no_urut, 3, "0", STR_PAD_LEFT);

$pdf->Cell(30,5,'Nomor',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,$nomor_surat,0,0);
$pdf->Ln();
$pdf->SetX(25);
$pdf->Cell(30,5,'Perihal',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,'Undangan',0,0);
$pdf->Ln();
$pdf->SetX(25);
$pdf->Cell(30,5,'Lampiran',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,'1 Lembar',0,0);

$pdf->SetXY(25,$y+35);
$pdf->Cell(0, 5, 'Yth :', 0, 1);
$pdf->SetX(25);
$pdf->Cell(0, 5,$nama_pemohon, 0, 1);
$pdf->SetX(25);
$pdf->Cell(0, 5,'Ditempat', 0, 1);

$pdf->SetXY(25,$y+55);
$pdf->Cell(0, 5,'Dengan Hormat,', 0, 1);
$pdf->SetX(25);
$pdf->Cell(0, 5,'Sehubungan dengan kegiatan kredensial tenaga kesehatan di RS Permata Medika, bersama ini kami', 0, 1);
$pdf->SetX(25);
$pdf->Cell(0, 5,'mengundang Bapak/Ibu untuk hadir pada:', 0, 1);
$pdf->SetX(35);
$pdf->Cell(30,5,'Hari',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,tgl_ind($data_pengajuan['tgl_ujian']),0,1);
$pdf->SetX(35);
$pdf->Cell(30,5,'Pukul',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,$jam .' WIB s/d Selesai',0,1);
$pdf->SetX(35);
$pdf->Cell(30,5,'Tempat',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,$ruangan . ' RS Permata Medika',0,1);
$pdf->SetX(35);
$pdf->Cell(30,5,'Agenda Kegiatan',0,0);
$pdf->Cell(4,5,':',0,0);
$pdf->Cell(70,5,'Kredensial Perawat dan Bidan',0,1);
$pdf->SetX(25);
$pdf->Cell(0, 5,'Demikian surat undangan ini kami sampaikan. Atas perhatian dan kehadirannya, kami ucapkan terima kasih.', 0, 1);

$pdf->SetXY($leftX, 160);
$pdf->Cell(25, 5, 'Ketua Komite Keperawatan', 0, 0, 'C');

$pdf->SetXY(25,$y+35);
$pdf->Image('../../../public/file/qr/4331182.png', $leftX, 165, 25, 25);

// Nama
$pdf->SetXY($leftX, 192);
$pdf->Cell(25, 5, 'MEIRITA PRANAWATI', 0, 0, 'C');  // lebar 25, align center

$pdf->Output("../../../public/file/keperawatan/undangan/".$kode_pengajuan."-".$nopeg.".pdf", 'F');

?>