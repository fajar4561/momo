<?php 
// variable sementara
date_default_timezone_set('Asia/Jakarta');
$today= date("Y-m-d");
$tgl_hari_ini = date("Y-m-d H:i:s");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../../../vendor/autoload.php';
require '../../../../env/koneksi.php';
require '../../../../env/tgl_indo.php';
require '../../../../env/tgl_indo2.php';
require '../../../../env/terbilang.php';
require '../../../../env/nama_bulan.php';
require('../../../../public/plugins/fpdf/fpdf.php'); 
require '../../../../env/log.php';
$nopeg = '5591388';
$ambil_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$data_pegawai = $ambil_pegawai->fetch_assoc();
// hoook kode 
$kode = 20251125001;
// akhir variabel sementara
ob_start(); // pastikan buffering aktif paling awal

	$pdf = new FPDF('L','mm','A4');
	$pdf->AddPage();

	$ambil_kredensial = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE kode_pengajuan='$kode'");
	$data_pengajuan = $ambil_kredensial->fetch_assoc();

	$id_jenjang = $data_pengajuan['jenjang_diajukan'];
	$ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
	$data_rkk = $ambil_rkk->fetch_assoc();
	$jenis_pk = $data_rkk['nama_rkk'];

	$pageWidth = 297;
	$pageHeight = 210;
 
	// Background sertifikat
	if ($jenis_pk=='PK-1') {
		$pdf->Image('../../../../public/file/keperawatan/a.jpg', 0, 0, $pageWidth, $pageHeight, 'JPG');  //asline ../../../
	}
	elseif ($jenis_pk=='PK-2') {
		$pdf->Image('../../../../public/file/keperawatan/b.jpg', 0, 0, $pageWidth, $pageHeight, 'JPG');
	}
	else {
		$pdf->Image('../../../../public/file/keperawatan/c.jpg', 0, 0, $pageWidth, $pageHeight, 'JPG');
	}
	

	// Warna teks #0E4B6C
	// $pdf->SetTextColor(14, 75, 108);
	// $pdf->AddFont('Roboto-Medium', '', 'Roboto-Medium.php');
	// $pdf->SetFont('Roboto-Medium','',30);


	$pdf->SetFont('Arial', 'B', 30);
 

	// Teks yang mau ditampilkan
	$judul = $data_rkk['nama_rkk'] . ' '.$data_rkk['unit_rkk'];

	// Hitung lebar teks
	$textWidth = $pdf->GetStringWidth($judul);

	// Lebar halaman (A4 landscape = 297 mm)
	$pageWidth = 297;

	// Hitung posisi X agar teks tepat di tengah
	$x = ($pageWidth - $textWidth) / 2;

	$pdf->SetAutoPageBreak(false);
	$pdf->SetFont('Times', '', 14);
	$direktur = 'dr. NUZULA FIKRIN NABILA'; // next bisa di ambil dari data karyawan otomatis
	$direktur = strtolower($direktur);
	$nama_direktur = str_replace('dr. ', '', $direktur);
	$nama_direktur = ucwords($nama_direktur);
	$direktur = 'dr. ' . $nama_direktur;
	$l_direktur = $pdf->GetStringWidth($direktur);

	$keperawatan = 'MEIRITA PRANAWATI';
	$keperawatan = strtolower($keperawatan);
	$keperawatan= ucwords($keperawatan);
	$l_keperawatan = $pdf->GetStringWidth($keperawatan);
	
	// ======================= PK-1 =============================
	if ($jenis_pk=='PK-1') {
		// Tetapkan posisi Y sesuai keinginan (misal 69)
		$pdf->SetXY($x+10, 69);

		// Tulis teksnya
		$pdf->SetFont('Times', '', 25);
		$pdf->Cell($textWidth, 5, $judul, 0, 0, 'C');

		$nama = $data_pegawai['nama'];
		$textWidth = $pdf->GetStringWidth($nama);
		$x = ($pageWidth - $textWidth) / 2;
		$pdf->SetXY($x+10, 95);
		$pdf->SetFont('Times', '', 25);
		$pdf->Cell($textWidth, 5, $nama, 0, 0, 'C');

		$pdf->AddFont('JosefinSans-Medium', '', 'JosefinSans-Medium.php');
		$pdf->SetFont('JosefinSans-Medium','',16);

		$tanggal_dibuat = tgl_indo($today);
		$panjang_tanggal = $pdf->GetStringWidth($tanggal_dibuat); 
		$x = ($pageWidth - $panjang_tanggal) / 2;
		$pdf->SetXY($x+10, 160);
		$pdf->Cell($panjang_tanggal, 5, 'Semarang, '.$tanggal_dibuat, 0, 0, 'C');

		// direktur
		$x = ($pageWidth - $l_direktur) / 2;
		$pdf->SetXY($x-25, -17);
		$pdf->Cell($l_direktur, 5, $direktur, 0, 0, 'C');

		// komite keperawatan
		$x = ($pageWidth - $l_keperawatan) / 2;
		$pdf->SetXY($x+87, -17);
		$pdf->Cell($l_keperawatan, 5, $keperawatan, 0, 0, 'C');

		$pdf->SetFont('Times', 'I', 14);
		$pdf->SetXY(185, -10);
		$pdf->Cell(0, 5,'Ketua Komite', 0, 0, 'C');

		$pdf->SetXY(125, -10);
		$pdf->Cell(1, 5,'Direktur', 0, 0, 'C');


		$pdf->AddPage(); // Halaman kedua
		$pdf->SetFont('Arial', '', 14);
		$pdf->Cell(0, 10, 'Halaman 2', 0, 1, 'C');

		$pdf->Image('../../../../public/file/keperawatan/ab.png', 0, 0, $pageWidth, $pageHeight, 'PNG');  //asline ../../../

	}

	// ======================= PK-2 =============================
	elseif ($jenis_pk=='PK-2') {
		// Tetapkan posisi Y sesuai keinginan (misal 69)
		$pdf->SetXY($x, 80);

		$pdf->SetTextColor(255, 255, 255);

		// Tulis teksnya
		$pdf->SetFont('Times', '', 25);
		$pdf->Cell($textWidth, 5, $judul, 0, 0, 'C');

		$nama = $data_pegawai['nama'];
		$textWidth = $pdf->GetStringWidth($nama);
		$x = ($pageWidth - $textWidth) / 2;
		$pdf->SetXY($x, 105);
		$pdf->SetFont('Times', '', 25);
		$pdf->Cell($textWidth, 5, $nama, 0, 0, 'C');

		$pdf->AddFont('JosefinSans-Medium', '', 'JosefinSans-Medium.php');
		$pdf->SetFont('JosefinSans-Medium','',14);

		$tanggal_dibuat = tgl_indo($today);
		$panjang_tanggal = $pdf->GetStringWidth($tanggal_dibuat); 
		$x = ($pageWidth - $panjang_tanggal) / 2;
		$pdf->SetXY($x, 152);
		$pdf->Cell($panjang_tanggal, 5, 'Semarang, '.$tanggal_dibuat, 0, 0, 'C');

		// direktur
		$x = ($pageWidth - $l_direktur) / 2;
		$pdf->SetXY($x-65, -41);
		$pdf->Cell($l_direktur, 5, $direktur, 0, 0, 'C');

		// komite keperawatan
		$x = ($pageWidth - $l_keperawatan) / 2;
		$pdf->SetXY($x+62, -41);
		$pdf->Cell($l_keperawatan, 5, $keperawatan, 0, 0, 'C');

		$pdf->SetFont('Times', 'I', 14);
		$pdf->SetXY(140, -33);
		$pdf->Cell(0, 5,'Ketua Komite', 0, 0, 'C');

		$pdf->SetXY($x-45, -33);
		$pdf->Cell(1, 5,'Direktur', 0, 0, 'C');
	}
	else {
		// Tetapkan posisi Y sesuai keinginan (misal 69)
		$pdf->SetXY(20, 50);

		$pdf->SetTextColor(211, 173, 78);

		$pdf->SetFont('Times', '', 45);
		// Tulis teksnya
		$pdf->Cell($textWidth, 5, $judul, 0, 0, '');

		$pdf->SetTextColor(255, 255, 255);


		$nama = $data_pegawai['nama'];
		$textWidth = $pdf->GetStringWidth($nama);
		$x = ($pageWidth - $textWidth) / 2;
		$pdf->SetXY(20, 90);
		$pdf->AddFont('JosefinSans-Medium', '', 'JosefinSans-Medium.php');
		$pdf->SetFont('JosefinSans-Medium','',30);
		$pdf->Cell($textWidth, 5, $nama, 0, 0, '');

		// $pdf->SetTextColor(194, 166, 206);

		$pdf->SetFont('Times','',14);

		$tanggal_dibuat = tgl_indo($today);
		$panjang_tanggal = $pdf->GetStringWidth($tanggal_dibuat); 
		$x = ($pageWidth - $panjang_tanggal) / 2;
		$pdf->SetXY(20, 139);
		$pdf->Cell($panjang_tanggal, 5, 'Semarang, '.$tanggal_dibuat, 0, 0, '');

		// direktur
		$x = ($pageWidth - $l_direktur) / 2;
		$pdf->SetXY(20, -42);
		$pdf->Cell($l_direktur, 5, $direktur, 0, 0, 'C');

		// komite keperawatan
		$x = ($pageWidth - $l_keperawatan) / 2;
		$pdf->SetXY($x+5, -42);
		$pdf->Cell($l_keperawatan, 5, $keperawatan, 0, 0, 'C');

		$pdf->SetXY(35, -35);
		$pdf->Cell(1, 5,'Direktur', 0, 0, '');

		$pdf->SetXY(137, -35);
		$pdf->Cell(1, 5,'Ketua Komite', 0, 0, '');


	}
	

	$pdf->Output("../../../public/file/keperawatan/sertifikat/sertifikat-".$kode."-".$nopeg.".pdf", 'I');

	ob_end_flush(); // akhiri output buffering

?>