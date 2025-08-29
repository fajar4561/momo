<?php
session_start();
ob_start();
$today= date("d M Y");
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/tgl_indo2.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';
require '../../../public/plugins/fpdf/fpdf.php' ;

$nopeg = $_SESSION['username'];
$ambil_peg = $koneksi->query("SELECT * FROM pegawai WHERE username ='$nopeg'");
$data_peg = $ambil_peg->fetch_assoc();

if (isset($_GET['jenis'])) {
    $jenis = $_GET['jenis'];

    if ($jenis == 1) {
        $tahun = $_GET['tahun'];
        $ambil_lap = $koneksi->query("
            SELECT * 
            FROM pembelian_barang 
            INNER JOIN detail_pembelian 
                ON pembelian_barang.kode_transaksi = detail_pembelian.kode_transaksi  
            WHERE YEAR(pembelian_barang.tgl_transaksi) = '$tahun' 
            ORDER BY pembelian_barang.tgl_transaksi ASC
        ");
        $teks = 'PERIODE ' . $tahun;
    }
    else if ($jenis == 2) {
        // bulanan
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $ambil_lap = $koneksi->query("
            SELECT * 
            FROM pembelian_barang 
            INNER JOIN detail_pembelian 
                ON pembelian_barang.kode_transaksi = detail_pembelian.kode_transaksi  
            WHERE MONTH(pembelian_barang.tgl_transaksi) = '$bulan' 
              AND YEAR(pembelian_barang.tgl_transaksi) = '$tahun' 
            ORDER BY pembelian_barang.tgl_transaksi ASC
        ");
        $teks = 'PERIODE ' . strtoupper(bulan_indonesia($bulan)) . ' TAHUN ' . $tahun;      
    }
    else if ($jenis == 3) {
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $ambil_lap = $koneksi->query("
            SELECT * 
            FROM pembelian_barang 
            INNER JOIN detail_pembelian 
                ON pembelian_barang.kode_transaksi = detail_pembelian.kode_transaksi  
            WHERE pembelian_barang.tgl_transaksi BETWEEN '$tgl1' 
              AND '$tgl2' 
            ORDER BY pembelian_barang.tgl_transaksi ASC
        ");
        $teks = 'PERIODE '.strtoupper(tgl_indo($tgl1)).' SAMPAI '.strtoupper(tgl_indo($tgl2));
    }

    $jml_data = mysqli_num_rows($ambil_lap);
    if ($jml_data > 0) {
        $pdf = new FPDF();
        $pdf->AddPage();

        $judul = 'LAPORAN PEMBELIAN BARANG';
        $judul2 = $teks;
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
            $pdf->Cell(0, 0, $judul, 0, 0); // 'C' untuk center
            $pdf->SetXY(10, 57);
            $pdf->SetX($centerX2);
            $pdf->Cell(0, 0, $judul2, 0, 0); // 'C' untuk center

            $pdf->SetXY(10, 70);
            $pdf->SetFont('Arial', 'B', 10);

            $pdf->Cell(10,5,'No',1,0, 'C');
            $pdf->Cell(20,5,'Tgl Beli',1,0, 'C');
            $pdf->Cell(45,5,'Nama Barang',1,0);
            $pdf->Cell(47,5,'Merk / Tipe',1,0);
            $pdf->Cell(30,5,'Harga',1,0);
            $pdf->Cell(15,5,'Jml',1,0, 'C');
            $pdf->Cell(28,5,'Total',1,0);
            $pdf->Ln();
            $no=1;
            $total = 0;
            $pdf->SetFont('Arial', '', 9);
            while ($data = mysqli_fetch_assoc($ambil_lap)) {
                $total += $data['harga']*$data['jumlah'];
                $pdf->Cell(10,5,$no++,1,0,'C');
                $pdf->Cell(20, 5, date("d-m-Y", strtotime($data['tgl_transaksi'])), 1, 0, 'C');
                $pdf->Cell(45,5,$data['nama_barang'],1,0);
                $pdf->Cell(47,5,$data['merk'].' '. $data['tipe'],1,0);
                $pdf->Cell(30,5,'Rp.'.number_format($data['harga']),1,0);
                $pdf->Cell(15,5,$data['jumlah'],1,0, 'C');
                $pdf->Cell(28,5,'Rp.'.number_format($data['harga']*$data['jumlah']),1,0);
                $pdf->Ln();
            }
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(167,5,'Total Pembelian',1,0);
            $pdf->Cell(28, 5, 'Rp.' . number_format($total), 1, 0);

            $pdf->Ln(15);

            // ttd
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(80,5,'',0,0);
            $pdf->Cell(5,5,'Mengetahui',0,'C');
            $pdf->Ln(10);
            $pdf->Cell(15,5,'',0,0);
            $pdf->Cell(5,5,tgl_ind($today),0,0, 'C');
            $pdf->Cell(135,5,'',0,0);
            $pdf->Cell(5,5,' ',0,'C');
            $pdf->Ln();
            $pdf->Cell(15,5,'',0,0);
            $pdf->Cell(5,5,'Petugas',0,0, 'C');
            $pdf->Cell(135,5,'',0,0);
            $pdf->Cell(5,5,' ',0,'C');

            $pdf->Ln(20);

            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(15,5,'',0,0);
            $pdf->Cell(5,5,$data_peg['nama'],0,0, 'C');
            $pdf->Cell(143,5,'',0,0);
            $pdf->Cell(5,5,'',0,0);

            ob_end_clean();
            $pdf->Output();
    }
    else {
        header('Content-Type: application/json'); // Mengatur header untuk JSON
        echo json_encode(["status" => "kosong"]); // Menampilkan respons JSON jika laporan kosong
    }
}

?>