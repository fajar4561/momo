<?php 
$pdf = new FPDF('L','mm','A3'); // Landscape, A3
$pdf->AddPage();

$pdf->SetFont('Arial','B',8);

// Ukuran kertas A3
$a3Width  = 420;  // Lebar A3 Landscape
$a3Height = 297;  // Tinggi A3 Landscape

// Kop header
$kopWidthA3  = 220;
$kopHeightA3 = 50;
$xA3 = ($a3Width - $kopWidthA3) / 2;
$yA3 = 10;
$pdf->Image('../../../public/img/kop.JPG', $xA3, $yA3, $kopWidthA3, $kopHeightA3, 'JPG');

// Judul
$pdf->SetXY(10, 65);
$pdf->SetFont('Arial', 'B', 11);
$judul4 = 'Lembar Log Book';
$judulWidth4 = $pdf->GetStringWidth($judul4);
$pdf->SetX(($a3Width - $judulWidth4) / 2);
$pdf->Cell($judulWidth4, 0, strtoupper($judul4), 0, 1, 'C');

$pdf->SetLeftMargin(50); // mulai dari kiri 50
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);

// Lebar bisa disesuaikan sesuai kebutuhan
$pdf->Cell(45, 5, 'Nama', 0, 0);           // label
$pdf->Cell(5, 5, ':', 0, 0, 'C');          // titik dua, center
$pdf->Cell(50, 5, $pecah['nama'], 0, 1); // isi, lalu pindah baris

$pdf->Cell(45, 5, 'NIP/NIK', 0, 0);
$pdf->Cell(5, 5, ':', 0, 0, 'C');
$pdf->Cell(50, 5, $nopeg, 0, 1);

$pdf->Cell(45, 5, 'Unit', 0, 0);
$pdf->Cell(5, 5, ':', 0, 0, 'C');
$pdf->Cell(50, 5, $pecah['unit'], 0, 1);

$pdf->Cell(45, 5, 'Jenjang Karir Yang Diajukan', 0, 0);
$pdf->Cell(5, 5, ':', 0, 0, 'C');
$pdf->Cell(50, 5, $jenjang_yang_dipilih , 0, 1);


$pdf->Ln(10);
$pdf->SetFont('Arial','B',9);

// ================= HEADER =================
$pdf->SetX(30);
$pdf->Cell(10, 30, 'No', 1, 0, 'C'); 
$pdf->Cell(70, 30, 'Tindakan Keperawatan', 1, 0, 'C');
$pdf->Cell(90, 10, 'SUPERVISI', 1, 0, 'C');
$pdf->Cell(90, 10, 'PEER', 1, 0, 'C');
$pdf->Cell(90, 10, 'MANDIRI', 1, 1, 'C');

// Header level 2
$pdf->SetX(30);
$pdf->Cell(80, 10, '', 0, 0);
for ($i=0; $i<3; $i++) {
    $pdf->Cell(30, 10, 'I', 1, 0, 'C');
    $pdf->Cell(30, 10, 'II', 1, 0, 'C');
    $pdf->Cell(30, 10, 'III', 1, 0, 'C');
}
$pdf->Ln();

// Header level 3
$pdf->SetX(30);
$pdf->Cell(80, 10, '', 0, 0);
for ($i=0; $i<9; $i++) {
    $pdf->Cell(15, 10, 'tgl', 1, 0, 'C');
    $pdf->Cell(15, 10, 'ket', 1, 0, 'C');
}
$pdf->Ln();

// ================= BODY =================
$no5 = 1;
$rowCount = 0; 
$pageNum = 1; // hitung halaman, mulai dari 1

$ambil_data_rkk = $koneksi->query("SELECT * FROM pengajuan_kredensial_detail WHERE kode_pengajuan='$kode'");
while ($data_detail_rkk = mysqli_fetch_assoc($ambil_data_rkk)) {
    $id_jenis_kewenangan = $data_detail_rkk['id_jenis_kewenangan'];
    $ambil_master_rkk = $koneksi->query("SELECT * FROM detail_master_rkk WHERE id='$id_jenis_kewenangan'");
    $pecah_rkk = $ambil_master_rkk->fetch_assoc();

    $pdf->SetFont('Arial','',9);
    $pdf->SetX(30);

    // simpan posisi awal baris
    $xStart = $pdf->GetX();
    $yStart = $pdf->GetY();

    // MultiCell untuk keterangan (70 mm)
    $pdf->SetX($xStart + 10);
    $pdf->MultiCell(70, 5, $pecah_rkk['kompetensi_rkk'], 1, 'L');

    // tinggi baris
    $rowHeight = $pdf->GetY() - $yStart;

    // kolom nomor
    $pdf->SetXY($xStart, $yStart);
    $pdf->Cell(10, $rowHeight, $no5++, 1, 0, 'C');

    // kolom supervisi/peer/mandiri
    $pdf->SetXY($xStart + 80, $yStart); 
    for ($i=0; $i<9; $i++) {
        $pdf->Cell(15, $rowHeight, '', 1, 0, 'C'); 
        $pdf->Cell(15, $rowHeight, '', 1, 0, 'C'); 
    }

    // pindah ke baris berikutnya
    $pdf->SetY($yStart + $rowHeight);

    // tambah counter baris
    $rowCount++;

    // tentukan batas baris per halaman
    $maxRows = ($pageNum == 1) ? 20 : 40;

    // cek kalau sudah mencapai batas -> ganti halaman
    if ($rowCount >= $maxRows) {
        $pdf->AddPage();
        $pageNum++;       // pindah ke halaman berikutnya
        $rowCount = 0;    // reset counter

        // cetak ulang header tabel
        $pdf->SetFont('Arial','B',9);

        $pdf->SetX(30);
        $pdf->Cell(10, 30, 'No', 1, 0, 'C'); 
        $pdf->Cell(70, 30, 'Tindakan Keperawatan', 1, 0, 'C');
        $pdf->Cell(90, 10, 'SUPERVISI', 1, 0, 'C');
        $pdf->Cell(90, 10, 'PEER', 1, 0, 'C');
        $pdf->Cell(90, 10, 'MANDIRI', 1, 1, 'C');

        // Header level 2
        $pdf->SetX(30);
        $pdf->Cell(80, 10, '', 0, 0);
        for ($i=0; $i<3; $i++) {
            $pdf->Cell(30, 10, 'I', 1, 0, 'C');
            $pdf->Cell(30, 10, 'II', 1, 0, 'C');
            $pdf->Cell(30, 10, 'III', 1, 0, 'C');
        }
        $pdf->Ln();

        // Header level 3
        $pdf->SetX(30);
        $pdf->Cell(80, 10, '', 0, 0);
        for ($i=0; $i<9; $i++) {
            $pdf->Cell(15, 10, 'tgl', 1, 0, 'C');
            $pdf->Cell(15, 10, 'ket', 1, 0, 'C');
        }
        $pdf->Ln();
    }
}







$pdf->Output("../../../public/file/keperawatan/permohonan/log-book-".$kode."-".$nopeg.".pdf", 'F');

?>