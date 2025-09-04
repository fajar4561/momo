<?php 
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/tgl_indo2.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';
require('../../../public/plugins/fpdf/fpdf.php');

$kode = $_GET['kode'];
$ambil = $koneksi->query("SELECT * FROM penyerahan WHERE kode_penyerahan = '$kode'");
$pecah = $ambil->fetch_assoc();

$nopeg = $pecah['petugas'];
$ambil_peg = $koneksi->query("SELECT * FROM pegawai WHERE nopeg ='$nopeg'");
$data_peg = $ambil_peg->fetch_assoc();


$pdf = new FPDF();
$pdf->AddPage();

$judul = 'BERITA ACARA SERAH TERIMA INVENTARIS';
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

// Atur font
$pdf->SetFont('Arial','B',8);
$pdf->Image('../../../public/img/kop.JPG', 10, 10, 180, 0, 'JPG');

$pdf->SetXY(10, 50);
$pdf->SetFont('Arial', 'B', 12);

// Menghitung lebar judul dan posisi x untuk memusatkan
$judulWidth = $pdf->GetStringWidth($judul);
$centerX = ($pageWidth - $judulWidth) / 2;

// Mengatur posisi x ke tengah dan menambahkan judul
$pdf->SetX($centerX);
$pdf->Cell(0, 0, $judul, 0, 0); // 'C' untuk center



$pdf->SetXY(10, 60);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(37,5,'Kode Penyerahan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['kode_penyerahan'],0,0);
$pdf->Ln();
$pdf->Cell(37,5,'Tanggal',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,tgl_indo($pecah['tgl_penyerahan']),0,0);
$pdf->Ln(10);
$pdf->Cell(37,5,'Pada Hari '.tgl_ind($pecah['tgl_penyerahan']). ' telah dilaksanakan serah terima inventaris sebagai berikut',0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5,5,'I.',0,0);
$pdf->Cell(10,5,'PIHAK TERLIBAT',0,0);
$pdf->Ln();
$pdf->Cell(5,5,'',0,0);
$pdf->Cell(5,5,'1.',0,0);
$pdf->Cell(6,5,'Pihak Pertama',0,0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(20,5,'Nopeg',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$nopeg,0,0);
$pdf->Ln();
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(20,5,'Nama',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data_peg['nama'],0,0);
$pdf->Ln();
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(20,5,'Jabatan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data_peg['jabatan'],0,0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5,5,'',0,0);
$pdf->Cell(5,5,'2.',0,0);
$pdf->Cell(6,5,'Pihak Kedua',0,0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(20,5,'Unit',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['unit'],0,0);
$pdf->Ln();
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(20,5,'Nama',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,'........................................',0,0);
$pdf->Ln();
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(20,5,'Jabatan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,'........................................',0,0);
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5,5,'II.',0,0);
$pdf->Cell(10,5,'RINCIAN INVENTARIS YANG DISERAHKAN',0,0);
$pdf->Ln(7);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(5,5,'',0,0);
$pdf->Cell(10,5,'No',1,0);
$pdf->Cell(65,5,'Nama Barang',1,0);
$pdf->Cell(70,5,'No Inv',1,0);
$pdf->Cell(45,5,'Merk / Tipe',1,0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 9);
$konek_detail = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_penyerahan='$kode'");
$no=1;
while ($data = mysqli_fetch_assoc($konek_detail)) {
    $pdf->Cell(5,5,'',0,0);
    $pdf->Cell(10,5,$no++,1,0,'C');
    $pdf->Cell(65,5,$data['nama_barang'],1,0);
    $pdf->Cell(70,5,$data['kode_inv'],1,0);
    $pdf->Cell(45,5,$data['merk'].' '.$data['tipe'],1,0);
    $pdf->Ln();
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Ln(4);
$pdf->Cell(5,5,'III.',0,0);
$pdf->Cell(10,5,'PERNYATAAN',0,0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(5,5,'',0,0);
$pdf->MultiCell(0, 5, 'Dengan ditandatangani berita acara ini, pihak pertama menyatakan bahwa barang-barang tersebut telah diserahterimakan kepada pihak kedua dalam daftar yang telah disebutkan di atas. Pihak kedua juga menyatakan menerima barang-barang tersebut dan bertanggung jawab atas pemeliharaannya.', 0, 'L');
$pdf->Ln(10);

// ttd
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(80,5,'',0,0);
$pdf->Cell(5,5,'Mengetahui',0,'C');
$pdf->Ln(10);
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(5,5,'Pihak Pertama',0,'C');
$pdf->Cell(135,5,'',0,0);
$pdf->Cell(5,5,'Pihak Kedua',0,'C');
$pdf->Ln();
$yPos = $pdf->GetY() + 2; // Tambahkan sedikit spasi setelah baris sebelumnya
$pdf->SetY($yPos);

// Menampilkan gambar QR code
$pdf->Image('../../../public/file/qr/' . $nopeg . '.png', 20, $yPos, 0, 25);

// Mengatur posisi untuk Pihak Kedua di bawah gambar
$pdf->Cell(150, 5, '', 0, 0);
$pdf->Cell(5, 5, ' ', 0, 'C');

$yPos2 = $pdf->GetY() + 27;
$pdf->SetY($yPos2);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(45,5,$data_peg['nama'],0,0, 'C');
$pdf->Cell(92,5,'',0,0);
$pdf->Cell(45,5,'.........................',0,0, 'C');
$pdf->Output();


?>