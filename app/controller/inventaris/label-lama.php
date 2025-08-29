<?php
require '../../../env/koneksi.php';
require('../../../public/plugins/fpdf/fpdf.php'); 
$unit = $_GET['unit'];
$tempdir = "../../../public/file/inv/";


$konek_penyerahan = $koneksi->query("SELECT * FROM detail_penyerahan WHERE unit='$unit' AND parameter = '1' ");
$pdf = new FPDF();

while ($konek = mysqli_fetch_assoc($konek_penyerahan)) {
    $kode_get = $konek['kode_inv'];
    $ambil_get = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_inv ='$kode_get'");
    $fetch = $ambil_get->fetch_assoc();

    $unit_get = $fetch['unit'];
    $ruangan_get = $fetch['ruangan'];
    $kod = $fetch['kode_inv'];
    $kode_penyerahan_get  = $fetch['kode_penyerahan'];

    $ambil_utama = $koneksi->query("SELECT * FROM penyerahan WHERE kode_penyerahan='$kode_penyerahan_get'");
    $data2 = $ambil_utama->fetch_assoc();

    // ambil tgl stok
    $nama_bar = $fetch['nama_barang'];
    $merk_bar = $fetch['merk'];
    $tipe_bar = $fetch['tipe'];
    $kode_bar = $fetch['kode_barang'];
    $konek_beli = $koneksi->query("SELECT * FROM detail_pembelian WHERE nama_barang='$nama_bar' AND kode_barang='$kode_bar' AND merk='$merk_bar' AND tipe='$tipe_bar' ");
    $dat1 = $konek_beli->fetch_assoc(); 

    $tempdir = "../../../public/file/inv/";
    $namafile = str_replace('/', '_', $kode_get) . ".png";

    // Tambahkan halaman baru untuk setiap item
    $pdf->AddPage('L', 'A4');  // Dipanggil di dalam loop, cukup satu kali per item

    $pageWidth = 60;  
    $pageHeight = 30; 
    $gambarPath = $tempdir . $namafile;

    $lebar_logo = 60;
    $tinggi_logo = 0; 
    $x_logo = ($pageWidth - $lebar_logo) / 2;
    $y_logo = 0;
    $logo_path = '../../../public/img/kop2.png'; 

    $pdf->Image($gambarPath, 5, 10, 18, 0);
    $pdf->Image($logo_path, $x_logo + 2.5, $y_logo, $lebar_logo, $tinggi_logo, 'png');

    $pdf->SetXY(23, 9);
    $pdf->SetFont('Arial', 'B', 5.5);
    $pdf->Cell(1, 5, $kod, 0, 0);

    $pdf->SetFont('Arial', '', 5.5);
    $pdf->SetXY(23, 12);
    $pdf->Cell(1, 5, 'Nama', 0, 0);
    $pdf->SetXY(32, 12);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 12);
    $pdf->Cell(1, 5, $fetch['nama_barang'], 0, 0);

    $pdf->SetXY(23, 14);
    $pdf->Cell(1, 5, 'Merk/Tipe', 0, 0);
    $pdf->SetXY(32, 14);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 14);
    $pdf->Cell(1, 5, $fetch['merk'].' '.$fetch['tipe'], 0, 0);

    $pdf->SetXY(23, 16);
    $pdf->Cell(1, 5, 'Unit', 0, 0);
    $pdf->SetXY(32, 16);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 16);
    $pdf->Cell(1, 5, $unit_get, 0, 0);

    $pdf->SetXY(23, 18);
    $pdf->Cell(1, 5, 'Ruangan', 0, 0);
    $pdf->SetXY(32, 18);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 18);
    $pdf->Cell(1, 5, $ruangan_get, 0, 0);
}

$filename = 'Label-'.$unit.'-'.$kode_penyerahan.'.pdf';
$tempFile = '../../../public/file/inv/pdf' . $filename; // Folder temp untuk menyimpan sementara

// Simpan PDF di server
$pdf->Output('F', $tempFile); // 'F' untuk menyimpan file di server

if (ob_get_length()) ob_end_clean();

echo "<script>
    function downloadFile() {
        const link = document.createElement('a');
        link.href = '$tempFile';
        link.download = '$filename';
        link.click();
        
        window.location.href = '../../../data-inventaris';
    }
    downloadFile();
</script>";


?>