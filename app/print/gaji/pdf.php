<?php
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';

$kode = $_GET['kode'];
$nopeg = $_GET['nopeg'];

// Ambil data gaji berdasarkan kode transaksi dan nopeg
$pecah = $koneksi->query("SELECT * FROM gaji WHERE kode_transaksi='$kode' AND nopeg='$nopeg'")->fetch_assoc();

// Ambil data pegawai berdasarkan nopeg
$data = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'")->fetch_assoc();

$bulan = $pecah['bulan'];
$terima = $bulan+1;


require('../../../public/plugins/fpdf/fpdf.php');

// Inisialisasi objek FPDF
$pdf = new FPDF();

// Tambahkan halaman baru
$pdf->AddPage();

// Path gambar latar belakang
$imagePath = '../../../public/img/logo greyscale.jpg';

// Ukuran halaman PDF (A4)
$pageWidth = 210;
$pageHeight = 297;

// Ukuran gambar baru (lebih kecil)
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
// Tambahkan teks


// Atur font untuk selanjutnya menjadi normal (tidak bold)
$pdf->SetFont('Arial', '', 10);

// Loop untuk menambahkan baris
$pdf->Cell(20,5,'No',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$pecah['no_gaji'],0,0);
$pdf->Ln();
$pdf->Cell(20,5,'Nama',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data['nama'],0,0);
$pdf->Ln();
$pdf->Cell(20,5,'Jabatan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data['jabatan'],0,0);
$pdf->Ln();
$pdf->Cell(20,5,'Unit Kerja',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,$data['unit'],0,0);
$pdf->Ln();
$pdf->Cell(20,5,'Keterangan',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1, 5, strtoupper('Gaji '. bulan_indonesia($bulan). ' Diterimakan '. bulan_indonesia($terima).' '.$pecah['tahun']), 0, 0);

$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(114,5,'RINCIAN PENDAPATAN',0,0);
$pdf->Cell(50,5,'POTONGAN',0,0);
$pdf->Ln(10);

function format_currency($value) {
	return $value != 0 ? 'Rp.' . number_format($value) : '';
}

$pdf->SetFont('Arial', '', 10);


$pdf->Cell(6,5,"1.",0,0);
$pdf->Cell(55,5,"Upah Sebelum Kenaikan Th 2024",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['upah_awal']),0,0);

$pdf->Cell(4,5,"1.",0,0);
$pdf->Cell(40,5,"BPJS Tenaga Kerja",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['bpjs_kerja']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"2.",0,0);
$pdf->Cell(55,5,"Penambahan",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['penambahan']),0,0);

$pdf->Cell(4,5,"2.",0,0);
$pdf->Cell(40,5,"BPJS Kesehatan",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['bpjs_kes']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"3.",0,0);
$pdf->Cell(55,5,"Upah Setelah Kenaikan Th 2024",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['revisi']),0,0);

$pdf->Cell(4,5,"3.",0,0);
$pdf->Cell(40,5,"PPH21",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['pph21']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"4.",0,0);
$pdf->Cell(55,5,"Tunjangan Jabatan",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['tj_jbtn']),0,0);

$pdf->Cell(4,5,"4.",0,0);
$pdf->Cell(40,5,"PPNI",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['ppni']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"5.",0,0);
$pdf->Cell(55,5,"Tunjanagn Fungsional",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['tj_fungsional']),0,0);

$pdf->Cell(4,5,"5.",0,0);
$pdf->Cell(40,5,"Lain-lain",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['lain']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"6.",0,0);
$pdf->Cell(55,5,"Tunjangan TPBR/Khusus",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['tj_tpbri']),0,0);


$pdf->Ln();
$pdf->Cell(6,5,"7.",0,0);
$pdf->Cell(55,5,"Fee For Service",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['fee_for_servis']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"8.",0,0);
$pdf->Cell(55,5,"Lembur Pelayanan",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['lembur']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"9.",0,0);
$pdf->Cell(55,5,"Penyesuaian Gaji",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['penyesuaian']),0,0);

$pdf->Ln();
$pdf->Cell(6,5,"10.",0,0);
$pdf->Cell(55,5,"Lain-lain",0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(47,5,format_currency($pecah['tj_lain']),0,0);

// footer
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(61,5,'TOTAL PENDAPATAN',0,0);
$pdf->Cell(7,5,':',0,0);
$pdf->Cell(45,5,format_currency($pecah['bruto']),0,0);
$pdf->Cell(45,5,'TOTAL POTONGAN',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['total_potongan']),0,0);
$pdf->Ln(8);


$pdf->Cell(44,5,' ',0,0);
$pdf->Cell(7,5,' ',0,0);
$pdf->Cell(62,5,' ',80,0);
$pdf->Cell(45,5,'PENDAPATAN BERSIH',0,0);
$pdf->Cell(6,5,':',0,0);
$pdf->Cell(1,5,format_currency($pecah['total_pendapatan']),0,0);


$pdf->SetFont('Arial', '', 10);
$pdf->Ln(17);
$pdf->Cell(45,5,'SEMARANG,'.strtoupper(tgl_indo($pecah['tgl_gaji'])),0,0);
$pdf->Ln();
$pdf->Cell(45,5,'MENGETAHUI,',0,0);
$pdf->Ln();
$pdf->Cell(45,5,'WADIR KEUANGAAN RS.PERMATA MEDIKA',0,0);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(45,5,'Dr. H. UTOMO.DS., Sp. OG',0,0);



// Simpan dokumen PDF
//$pdf->Output();
$pdf->Output('Gaji-'.bulan_indonesia($bulan).'-'.$pecah['tahun'].'-.pdf', 'I');
?>