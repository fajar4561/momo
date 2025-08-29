<?php 
session_start();
require '../../../env/koneksi.php';
require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
// Buat instance Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


$bulan2= $_GET['bulan'];
$tahun = $_GET['tahun'];

$sql = "SELECT pegawai.nopeg, nama, jabatan, unit, bulan, tahun FROM gaji 
        INNER JOIN pegawai ON gaji.nopeg=pegawai.nopeg 
        WHERE status_pegawai != 'RESIGN' AND bulan = '$bulan2' AND tahun = '$tahun' AND status = '0' 
        ORDER BY unit ASC, nama ASC";
$result = $koneksi->query($sql);

// Nama file CSV
$nama_file = '../../../public/file/gaji/Penggajian-Bulan-' . $bulan2 . '-' . $tahun . '.xlsx';
$header = array("No", "NIP", "Nama", "Jabatan", "Unit", "Periode Bulan", "Periode Tahun", "Upah Sebelum kenaikan", "Penambahan", "Upah Setelah Kenaikan", "TJ.JABATAN", "TJ.FUNGSIONAL", "TJ.RESIKO", "TJ.TPBR/KHUSUS", "FEE FOR SERVICE", "FEE PETUGAS MCU", "FEE TIM BPJS", "LEMBUR", "THR/THN", "LAIN-LAIN", "GAJI BRUTO", "BPJS TK", "BPJS KES", "PPH21", "PPNI","LAIN-LAIN", "TOTAL POTONGAN","GAJI NETTO", "OBAT","SERAGAM KARYAWAN", "KREDIT BTN", "LAIN-LAIN / BY PELATIHAN", "TOTAL POT", "TRANSFER");

// Set header kolom di Excel
foreach ($header as $index => $columnName) {
    $sheet->setCellValueByColumnAndRow($index + 1, 1, $columnName);
}

        // Tulis data ke sheet
        $nomor_baris = 2; // Mulai dari baris ke-2 karena baris ke-1 adalah header

        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValueByColumnAndRow(1, $nomor_baris, $nomor_baris - 1); // No
            $sheet->setCellValueByColumnAndRow(2, $nomor_baris, "'" . $row['nopeg']); // NIP dengan tanda kutip
            $sheet->setCellValueByColumnAndRow(3, $nomor_baris, $row['nama']); // Nama
            $sheet->setCellValueByColumnAndRow(4, $nomor_baris, $row['jabatan']);
            $sheet->setCellValueByColumnAndRow(5, $nomor_baris, $row['unit']);
            $sheet->setCellValueByColumnAndRow(6, $nomor_baris, $bulan2);
            $sheet->setCellValueByColumnAndRow(7, $nomor_baris, $tahun);
            $nomor_baris++;
}

// Simpan file Excel
$writer = new Xlsx($spreadsheet);
$writer->save($nama_file);

// Set headers untuk download file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . basename($nama_file) . '"');
header('Content-Length: ' . filesize($nama_file));

// Hapus buffer output
ob_clean();
flush();


// Baca file dan kirim ke output
readfile($nama_file);


exit;

 
?>