<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
$today= date("d M Y");
$tgl_hari_ini = date("Y-m-d H:i:s");
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/tgl_indo2.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';
require('../../../public/plugins/fpdf/fpdf.php'); 

// kode pengajuan
$today = date("Ymd");
$quer = mysqli_query($koneksi, "SELECT max(kode_pengajuan) as kodeTerbesar FROM pengajuan_kredensial WHERE kode_pengajuan LIKE '%".$today."%' ");
$dat = mysqli_fetch_array($quer);
$kode= $dat['kodeTerbesar'];
if ($dat['kodeTerbesar']) {
    $urutan = (int) substr($dat['kodeTerbesar'], 8, 3);
} else {
    $urutan = 0;
}
$urutan++;
$kode = $today. sprintf("%03s", $urutan);

// deklarasi variabel
// biodata diri
$nopeg = $_POST['nik'];
$email = $_POST['email'];
$unit = $_POST['unit'];
$telepon = $_POST['telepon'];
$jenjang_saat_ini = $_POST['jenjang_saat_ini'];
// RKK
$rkk_id = $_POST['rkk_id'];
$ambil_karir = $koneksi->query("SELECT * FROM master_rkk WHERE id='$rkk_id'");
$data_karir = $ambil_karir->fetch_assoc();
$jenjang_yang_dipilih = $data_karir['nama_rkk'].' '.$data_karir['unit_rkk'];
$status ='menunggu';

// update biodata diri
$update_biodata = $koneksi->query("UPDATE pegawai SET email='$email', telpon='$telepon', unit='$unit' WHERE nopeg='$nopeg' ");

if ($update_biodata) {
	// code...
}
else {
	echo "Gagal Update data diri".$koneksi->error ;
}

$simpan_pengajuan_kredensial = $koneksi->query("INSERT INTO pengajuan_kredensial (id,kode_pengajuan,tgl_pengajuan,nopeg,jenjang_diajukan,status_pengajuan) 
	VALUES(null, '$kode', '$tgl_hari_ini', '$nopeg', '$rkk_id', '$status')");

if ($simpan_pengajuan_kredensial) {
	// code...
}
else {
	echo "Gagal simpan data simpan_pengajuan_kredensial ".$koneksi->error ;
}

// simpan detail pengajuan kredensial

foreach ($_POST['kewenangan'] as $key => $value) {
	$simpan_pengajuan_kredensial_detail = $koneksi->query("INSERT INTO pengajuan_kredensial_detail (id,kode_pengajuan,nopeg,id_rkk,jenis_kewenangan,id_jenis_kewenangan,status_pengajuan) 
		VALUES(null, '$kode', '$nopeg', '$rkk_id', '$value', '$key', '$status')");
	if ($simpan_pengajuan_kredensial_detail) {
	// code...
	}
	else {
		echo "Gagal simpan data simpan_pengajuan_kredensial_detail ".$koneksi->error ;
	}
}

// disini kirim email ke admin. dan generate surat permohonan kredensial
// 1.permohonan pengajuan
require 'req/surat-permohonan.php';

// 2. Lembar Verifikasi
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
$pdf->SetFont('Arial','B',8);
$pdf->Image('../../../public/img/kop.JPG', 10, 10, 180, 0, 'JPG');

$pdf->SetXY(10, 50);
$pdf->SetFont('Arial', 'B', 12);

$judul3 = 'lembar verifikasi berkas';
$judulWidth3 = $pdf->GetStringWidth($judul3);
$centerX3 = ($pageWidth - $judulWidth3) / 2;

$pdf->SetX($centerX3);
$pdf->Cell(0, 0, strtoupper($judul3), 0, 0); // 'C' untuk center
$pdf->SetXY(10, 60);

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
    "KTP"    => "KTP",
    "KK"     => "Kartu Keluarga",
    "IJAZAH" => "Ijazah Terakhir",
    "PPNI"   => "PPNI",
    "SIP"    => "SIP",
    "STR"    => "STR Profesi",
    "NPWP"   => "NPWP"
];
$pdf->setXY(10,100);
$pdf->SetFont('Arial','',8);
$no = 1;
foreach ($files as $field => $label) {
	$ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$nopeg'");
	$berkas = mysqli_fetch_assoc($ambil_berkas);
	$ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$field]'");
    $data_detail = $ambil_detail_file->fetch_assoc();
    
    $pdf->Cell(53, 8, $no++.". ".$label, 1, 0, 'L');   // Kolom Materi
    $pdf->Cell(10, 8, '', 1, 0, 'C');       // Kolom ADA
    $pdf->Cell(15, 8, '', 1, 0, 'C');       // Kolom Tidak Ada
    $pdf->Cell(22, 8, '', 1, 0, 'C');       // Kolom Sedang Proses
    $pdf->Cell(
	    35, 8, 
	    ($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_keluar'])) 
	        ? '' 
	        : date("d F Y", strtotime($data_detail['tgl_keluar'])),
	    1, 0, 'C'
	);

    $pdf->Cell(25, 8, 
    	($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) 
	        ? '' 
	        : date("d F Y", strtotime($data_detail['tgl_berakhir']))
    , 1, 0, 'C');       // Kolom Tgl Berakhir
    $pdf->Cell(35, 8, $data_detail['no_file'], 1, 0, 'C');       // Kolom Nomor Surat
    $pdf->Ln();
}
$pdf->SetFont('Arial','B',8);
 $pdf->Cell(195, 8, strtoupper('sertifikat pelatihan yang dimiliki selama bekerja di RS. Permata medika'), 1, 0, 'C');


$pdf->Output("laporan.pdf", "I");

$_SESSION['pesan'] = 'Pengajuan Kredensial dengan kode'.$kode.' Berhasil disimpan !';
$_SESSION['info'] = 'Berhasil ! ';
$_SESSION['warna'] = 'success';
//echo "<script>location='../../../data-pengajuan';</script>";


?>