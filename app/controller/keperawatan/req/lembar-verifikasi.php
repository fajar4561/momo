<?php 
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
    "FOTO"   => "Foto Terbaru",
    "KTP"    => "KTP",
    "KK"     => "Kartu Keluarga",
    "IJAZAH" => "Ijazah Terkahir",
    "PPNI"   => "PPNI",
    "SIP"    => "SIP",
    "STR"    => "STR",
    "NPWP"   => "NPWP",
    "PORTOFOLIO"   => "Portofolio",
    "TRANSKIP"   => "Transkip Nilai",
];
$pdf->setXY(10,100);
$pdf->SetFont('Arial','',8);
$no = 1;
$no2 = 1;
foreach ($files as $field => $label) {
    $ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$nopeg'");
    $berkas = mysqli_fetch_assoc($ambil_berkas);
    $ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$field]' AND nopeg='$nopeg' ");
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
        ($data_detail['tgl_berakhir'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) 
            ? '' 
            : date("d F Y", strtotime($data_detail['tgl_berakhir']))
    , 1, 0, 'C');       // Kolom Tgl Berakhir
    $pdf->Cell(35, 8, 
        (in_array($field, ['FOTO','PORTOFOLIO']) ? '~' : $data_detail['no_file'])
    , 1, 0, 'C');       // Kolom Nomor Surat
    $pdf->Ln();
}
$pdf->SetFont('Arial','B',8);
$pdf->Cell(195, 8, strtoupper('sertifikat pelatihan yang dimiliki selama bekerja di RS. Permata medika'), 1, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$ambil_sertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$nopeg'");
while ($data_sertifikat= mysqli_fetch_assoc($ambil_sertifikat)) {
    $sertifikat_berkas = $data_sertifikat['berkas'];
    $ambil_sertif = $koneksi->query("SELECT * FROM file_detail WHERE nama_file = '$sertifikat_berkas' ");
    $pecah_sertifikat = $ambil_sertif->fetch_assoc();
    $pdf->Cell(53, 8, $no2++.". ".$data_sertifikat['keterangan'], 1, 0, 'L');   // Kolom Materi
    $pdf->Cell(10, 8, '', 1, 0, 'C');       // Kolom ADA
    $pdf->Cell(15, 8, '', 1, 0, 'C');       // Kolom Tidak Ada
    $pdf->Cell(22, 8, '', 1, 0, 'C');       // Kolom Sedang Proses
    $pdf->Cell(
        35, 8, 
        ($pecah_sertifikat['tgl_keluar'] == '0000-00-00' || empty($pecah_sertifikat['tgl_keluar'])) 
            ? '' 
            : date("d F Y", strtotime($pecah_sertifikat['tgl_keluar'])),
        1, 0, 'C'
    );
    $pdf->Cell(25, 8, 
        ($pecah_sertifikat['tgl_berakhir'] == '0000-00-00' || empty($pecah_sertifikat['tgl_berakhir'])) 
            ? '' 
            : date("d F Y", strtotime($pecah_sertifikat['tgl_berakhir']))
    , 1, 0, 'C');
    $pdf->Cell(35, 8,$pecah_sertifikat['no_file'], 1, 0, 'C');     
    $pdf->Ln();
}

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY(145, $y+10);
$pdf->Cell(5,5,tgl_ind($today),0,0);
$pdf->SetXY($x+10, $y+15);
$pdf->Image('../../../public/file/qr/' . $nopeg . '.png', 152, $pdf->GetY(), 0, 25);
$pdf->SetXY(145, $y+40);
$pdf->Cell(5,5,$pecah['nama'],0,0);

$pdf->Output("../../../public/file/keperawatan/permohonan/lembar-verifikasi-".$kode."-".$nopeg.".pdf", 'F');

?>