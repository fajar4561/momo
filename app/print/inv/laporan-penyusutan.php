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
            FROM detail_pembelian 
            WHERE YEAR(tgl_transaksi) = '$tahun' 
            ORDER BY tgl_transaksi ASC
        ");
        $ambil_lap2 = $koneksi->query("
            SELECT * 
            FROM detail_pembelian 
            WHERE YEAR(tgl_transaksi) = '$tahun' 
            ORDER BY tgl_transaksi ASC
        ");
        $teks = 'PEMBELIAN PERIODE ' . $tahun;
    }
    else if ($jenis == 2) {
        // bulanan
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $ambil_lap = $koneksi->query("
            SELECT * 
            FROM detail_pembelian 
            WHERE MONTH(tgl_transaksi)= '$bulan' AND YEAR(tgl_transaksi) = '$tahun' 
            ORDER BY tgl_transaksi ASC
        ");
        $ambil_lap2 = $koneksi->query("
            SELECT * 
            FROM detail_pembelian 
            WHERE MONTH(tgl_transaksi)= '$bulan' AND YEAR(tgl_transaksi) = '$tahun' 
            ORDER BY tgl_transaksi ASC
        ");
        
        $teks = 'PERIODE ' . strtoupper(bulan_indonesia($bulan)) . ' TAHUN ' . $tahun;      
    }
    else if ($jenis == 3) {
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $ambil_lap = $koneksi->query("
            SELECT * 
            FROM detail_pembelian 
            WHERE tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'  
            ORDER BY tgl_transaksi ASC
        ");
        $ambil_lap2 = $koneksi->query("
            SELECT * 
            FROM detail_pembelian 
            WHERE tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'  
            ORDER BY tgl_transaksi ASC
        ");
        $teks = 'PERIODE '.strtoupper(tgl_indo($tgl1)).' SAMPAI '.strtoupper(tgl_indo($tgl2));
    }

    // hasil dari get


    $jml_data = mysqli_num_rows($ambil_lap);
    if ($jml_data > 0) {
        $pdf = new FPDF('L', 'mm', 'A4'); // 'L' untuk landscape, 'mm' untuk satuan, dan 'A4' untuk ukuran kertas
        $pdf->AddPage();

        // Judul dan gambar latar belakang
        $judul = 'LAPORAN PENYUSUTAN BARANG';
        $judul2 = $teks;
        $imagePath = '../../../public/img/logo greyscale.jpg';

        // Ukuran halaman PDF (A4, Landscape)
        $pageWidth = 297;
        $pageHeight = 210;

        // Ukuran dan posisi gambar
        $imageWidth = 200; // Lebar gambar dalam mm
        $imageHeight = 0; // Tinggi gambar dalam mm

        // Hitung posisi x dan y agar gambar berada di tengah
        $x = ($pageWidth - $imageWidth) / 2;
        $y = ($pageHeight - $imageHeight) / 2;

        // Menambahkan gambar latar belakang di tengah halaman
        // $pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);
        $pdf->SetFont('Arial','B',8);
        $pdf->Image('../../../public/img/kop.JPG', $x, 10, $imageWidth, $imageHeight, 'JPG'); // Lebar diperbesar sesuai landscape

        // Menambahkan judul laporan
        $pdf->SetXY(10, $y/2);
        $pdf->SetFont('Arial', 'B', 12);
        $judulWidth = $pdf->GetStringWidth($judul);
        $judulWidth2 = $pdf->GetStringWidth($judul2);
        $centerX = ($pageWidth - $judulWidth) / 2;
        $centerX2 = ($pageWidth - $judulWidth2) / 2;

        $pdf->SetX($centerX);
        $pdf->Cell(0, 0, $judul, 0, 0);
        $pdf->SetY($y/2+6);
        $pdf->SetX($centerX2);
        $pdf->Cell(0, 0, $judul2, 0, 0);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY(8, $y/2+16);
        $pdf->Cell(5,5,'1.',0,0);
        $pdf->Cell(10,5,'PENYUSUTAN TAHUNAN',0,0);
        $pdf->SetXY(10, $y/2+23);

        $pdf->SetFont('Arial', 'B', 10);
        // Membuat tabel dengan kolom yang lebih lebar untuk landscape
        $pdf->Cell(10,5,'No',1,0, 'C');
        $pdf->Cell(20,5,'Tgl Beli',1,0, 'C');
        $pdf->Cell(68,5,'Nama Barang',1,0);
        $pdf->Cell(30,5,'Nilai Perolehan',1,0);
        $pdf->Cell(15,5,'Umur',1,0, 'C');
        $pdf->Cell(38,5,'Penyusutan Tahunan',1,0, 'C');
        $pdf->Cell(35,5,'Hasil Penyusutan',1,0, 'C');
        $pdf->Cell(30,5,'Nilai Buku Awal',1,0);
        $pdf->Cell(30,5,'Nilai Buku Akhir',1,0);
        $pdf->Ln();

        // Menambahkan data dari database
        $no=1;
        $total = 0;
        $pdf->SetFont('Arial', '', 9);

        while ($data = mysqli_fetch_assoc($ambil_lap)) {
            $harga = $data['harga'] * $data['jumlah'];
            $kode_barang = $data['kode_barang'];
            $koneksi_tahun = $koneksi->query("SELECT * FROM master_barang WHERE kode_barang='$kode_barang'");
            $dbarang = $koneksi_tahun->fetch_assoc();
            $masa = $dbarang['masa'];
            // mencari nilai sisa
            // 1. mencari selisih tahun pembelian barang dengan tahun saat ini
            $tanggal_beli = new DateTime($data['tgl_transaksi']);
            $tanggal_sekarang = new DateTime(); // Tanggal saat ini
            $selisih = $tanggal_sekarang->diff($tanggal_beli);
            $selisih_tahun = $selisih->y; // Mengambil selisih dalam tahun
            $selisih_bulan = ($selisih->y * 12) + $selisih->m; // Mengambil selisih dalam bulan
            
            // 2. mencari nilai penyusutan pertahun
            // rumus awalan
            $penyusutan_pertahun_awal = $harga / $masa; // Menghitung penyusutan per tahun

            // Hitung nilai sisa
            if ($selisih_tahun == 0) {
                $nilai_sisa = $harga; // Jika belum ada tahun yang dilalui, nilai sisa sama dengan harga
                $nilai_buku_awal = $harga; // Nilai buku awal bulan adalah harga
                $susut_per_tahun = $penyusutan_pertahun_awal;
            } else {
                $nilai_sisa = $harga - ($selisih_tahun * $penyusutan_pertahun_awal); // Hitung nilai sisa
                $nilai_buku_awal = $harga - ($penyusutan_pertahun_awal * $selisih_tahun); // Hitung nilai buku awal
                $susut_per_tahun = $harga-$nilai_sisa/$masa;
            }

            // Total penyusutan sampai hari ini
            $total_penyusutan = $penyusutan_pertahun_awal * $selisih_tahun; // Hitung total penyusutan berdasarkan selisih tahun

            // Hitung nilai buku akhir
            $nilai_buku_akhir = $harga - $total_penyusutan; // Nilai buku akhir berdasarkan total penyusutan

            $pdf->Cell(10,5,$no++,1,0,'C');
            $pdf->Cell(20, 5, date("d-m-Y", strtotime($data['tgl_transaksi'])), 1, 0, 'C');
            $pdf->Cell(68,5,$data['nama_barang']. ' ('.$data['merk'].' '. $data['tipe'].')',1,0);
            $pdf->Cell(30,5,'Rp.'.number_format($harga),1,0);
            $pdf->Cell(15,5,$masa,1,0, 'C');
            $pdf->Cell(38,5,'Rp.'.number_format($penyusutan_pertahun_awal),1,0);
            $pdf->Cell(35,5,'Rp.'.number_format($total_penyusutan),1,0);
            $pdf->Cell(30,5,'Rp.'.number_format($nilai_buku_awal),1,0);
            $pdf->Cell(30,5,'Rp.'.number_format($nilai_buku_akhir),1,0);
            $pdf->Ln();

            // for ($i = 1; $i <= $data['jumlah']; $i++) {
                
            // }
        }

        // Footer untuk menampilkan total
        $pdf->Ln(5);

        // penyusutan Tahunan
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(5,5,'2.',0,0);
        $pdf->Cell(10,5,'PENYUSUTAN BULANAN',0,0);

        $pdf->Ln(7);
        $pdf->SetFont('Arial', 'B', 10);
        // Membuat tabel dengan kolom yang lebih lebar untuk landscape
        $pdf->Cell(10,5,'No',1,0, 'C');
        $pdf->Cell(20,5,'Tgl Beli',1,0, 'C');
        $pdf->Cell(68,5,'Nama Barang',1,0);
        $pdf->Cell(30,5,'Nilai Perolehan',1,0);
        $pdf->Cell(15,5,'Umur',1,0, 'C');
        $pdf->Cell(38,5,'Penyusutan Bulanan',1,0, 'C');
        $pdf->Cell(35,5,'Hasil Penyusutan',1,0, 'C');
        $pdf->Cell(30,5,'Nilai Buku Awal',1,0);
        $pdf->Cell(30,5,'Nilai Buku Akhir',1,0);
        $pdf->Ln();

        $no2=1;
        $pdf->SetFont('Arial', '', 9);
        while ($data2 = mysqli_fetch_assoc($ambil_lap2)) {
            $harga2 = $data2['harga'] * $data2['jumlah'];
            $kode_barang2 = $data2['kode_barang'];
            $koneksi_tahun2 = $koneksi->query("SELECT * FROM master_barang WHERE kode_barang='$kode_barang2'");
            $dbarang2 = $koneksi_tahun2->fetch_assoc();
            $masa2 = $dbarang2['masa'];

            // Mencari nilai sisa
            // 1. Mencari selisih tahun pembelian barang dengan tahun saat ini
            $tanggal_beli2 = new DateTime($data2['tgl_transaksi']); // Sesuaikan dengan $data2
            $tanggal_sekarang2 = new DateTime(); // Tanggal saat ini
            $selisih2 = $tanggal_sekarang2->diff($tanggal_beli2);
            $selisih_tahun2 = $selisih2->y; // Mengambil selisih dalam tahun
            $selisih_bulan2 = ($selisih2->y * 12) + $selisih2->m; // Mengambil selisih dalam bulan

            // Menghitung penyusutan per tahun
            $penyusutan_pertahun_awal2 = $harga2 / $masa2;

            // Total penyusutan sampai hari ini dalam bulan
            $total_penyusutan = $penyusutan_pertahun_awal2 * $selisih_tahun2; // Hitung total penyusutan berdasarkan selisih tahun

            // Nilai buku akhir berdasarkan total penyusutan
            $nilai_buku_akhir2 = $harga2 - $total_penyusutan;

            // Penyusutan per bulan
            $penyusutan_perbulan2 = $penyusutan_pertahun_awal2 / 12;

            // Hasil penyusutan bulanan
            $hasil_penyusutan_bulanan2 = $penyusutan_perbulan2 * $selisih_bulan2;

            // Menghitung nilai sisa dan nilai buku awal bulan
            if ($selisih_bulan2 == 0) {
                $nilai_sisa2 = $harga2; // Nilai sisa sama dengan harga jika belum ada penyusutan yang dilakukan
                $nilai_buku_awal_bulan = $harga2; // Nilai buku awal bulan adalah harga
            } else {
                $nilai_sisa2 = $harga2 - $hasil_penyusutan_bulanan2; // Hitung nilai sisa
                $nilai_buku_awal_bulan = $harga2 - ($penyusutan_perbulan2 * ($selisih_bulan2 - 1)); // Hitung nilai buku awal bulan
            }

            // Hitung nilai buku akhir bulan
            $nilai_buku_akhir_bulan = $harga2 - $hasil_penyusutan_bulanan2; // Hitung nilai buku akhir bulan


            $pdf->Cell(10, 5, $no2++, 1, 0, 'C');
            $pdf->Cell(20, 5, date("d-m-Y", strtotime($data2['tgl_transaksi'])), 1, 0, 'C');
            $pdf->Cell(68, 5, $data2['nama_barang'] . ' (' . $data2['merk'] . ' ' . $data2['tipe'] . ')', 1, 0);
            $pdf->Cell(30, 5, 'Rp.' . number_format($harga2), 1, 0);
            $pdf->Cell(15, 5, $masa2, 1, 0, 'C');
            $pdf->Cell(38, 5, 'Rp.' . number_format($penyusutan_perbulan2), 1, 0);
            $pdf->Cell(35, 5, 'Rp.' . number_format($hasil_penyusutan_bulanan2), 1, 0);
            $pdf->Cell(30, 5, 'Rp.' . number_format($nilai_buku_awal_bulan), 1, 0);
            $pdf->Cell(30, 5, 'Rp.' . number_format($nilai_buku_akhir_bulan), 1, 0);
            $pdf->Ln();
        }



        // mengetahui
        $pdf->Ln(15);

        // Menambahkan tanda tangan
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(110,5,'',0,0);
        $pdf->Cell(5,5,' ',0,'C');
        $pdf->Ln(10);
        $pdf->Cell(15,5,'',0,0);
        $pdf->Cell(5,5,tgl_ind($today),0,0, 'C');
        $pdf->Cell(165,5,'',0,0);
        $pdf->Ln();
        $pdf->Cell(15,5,'',0,0);
        $pdf->Cell(5,5,'Petugas',0,0, 'C');
        $pdf->Cell(165,5,'',0,0);

        $pdf->Ln(20);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(15,5,'',0,0);
        $pdf->Cell(5,5,$data_peg['nama'],0,0, 'C');
        $pdf->Cell(173,5,'',0,0);

        // Output PDF
        ob_end_clean();
        $pdf->Output();
    }
    else {
        header('Content-Type: application/json'); // Mengatur header untuk JSON
        echo json_encode(["status" => "kosong"]); // Menampilkan respons JSON jika laporan kosong
    }
}

?>