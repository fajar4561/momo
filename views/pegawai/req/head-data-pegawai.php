<?php 
require 'env/koneksi.php';
require 'vendor/autoload.php'; // Pastikan path ini sesuai dengan instalasi Composer Anda

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$sql = "SELECT nopeg, nama, gender,CAST(nik AS CHAR) AS nik, jabatan, unit, tmt, skpt, alamat, tmpt_lahir, tgl_lahir, status_kawin, Status_pegawai, telpon, email FROM pegawai ORDER BY unit ASC, nama ASC";
$result = $koneksi->query($sql);

// hapus file
unlink('public/file/pegawai/data-pegawai.xlsx');

if ($result->num_rows > 0) {
    // Nama file Excel
    $nama_file = 'public/file/pegawai/data-pegawai.xlsx';
    // Buat instance Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $header = array("No", "NIP", "Nama", "Gender", 'NIK', "Jabatan", "UNIT", "TMT", "SKPT", "Alamat", "Tempat Lahir", "Tanggal Lahir", "Status Perkawinan", "Status Pegawai", "Nomor Telepon", "Email");

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
        $sheet->setCellValueByColumnAndRow(4, $nomor_baris, $row['gender']); // Gender
        $sheet->setCellValueByColumnAndRow(5, $nomor_baris, "'" . $row['nik']); // NIK dengan tanda kutip
        $sheet->setCellValueByColumnAndRow(6, $nomor_baris, $row['jabatan']); // Jabatan
        $sheet->setCellValueByColumnAndRow(7, $nomor_baris, $row['unit']); // UNIT
        $sheet->setCellValueByColumnAndRow(8, $nomor_baris, $row['tmt']); // TMT
        $sheet->setCellValueByColumnAndRow(9, $nomor_baris, $row['skpt']); // SKPT
        $sheet->setCellValueByColumnAndRow(10, $nomor_baris, $row['alamat']); // Alamat
        $sheet->setCellValueByColumnAndRow(11, $nomor_baris, $row['tmpt_lahir']); // Tempat Lahir
        $sheet->setCellValueByColumnAndRow(12, $nomor_baris, $row['tgl_lahir']); // Tanggal Lahir
        $sheet->setCellValueByColumnAndRow(13, $nomor_baris, $row['status_kawin']); // Status Perkawinan
        $sheet->setCellValueByColumnAndRow(14, $nomor_baris, $row['Status_pegawai']); // Status Pegawai
        $sheet->setCellValueByColumnAndRow(15, $nomor_baris, "'" . $row['telpon']); // NIP dengan tanda kutip
        $sheet->setCellValueByColumnAndRow(16, $nomor_baris, $row['email']); // Email

        $nomor_baris++;
    }

    // Simpan file Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save($nama_file);

    //echo "File Excel berhasil dibuat: <a href='$nama_file' download>$nama_file</a>";
}

?>
