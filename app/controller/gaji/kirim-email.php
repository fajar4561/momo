<?php
ini_set('max_execution_time', 0); // Tidak ada batas waktu
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php'; 
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';

$kode = $_GET['kode'];
$koneksi_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE email != '' AND email != 'maulanafajar751@gmail.com'");
$folder = "../../../public/file/gaji/".$kode."/";

$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'maulanafajar751@gmail.com';
    $mail->Password   = 'oidi dfxv uike ifkl';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->setFrom('maulanafajar751@gmail.com', 'Fajar Maulana Shidiq');
    $mail->addReplyTo('maulanafajar751@gmail.com', 'Fajar Maulana Shidiq');
    $mail->isHTML(true);

    // Tambahan pengaturan performa
    $mail->Timeout = 30;
    $mail->SMTPKeepAlive = true;

    $total_pegawai = mysqli_num_rows($koneksi_pegawai);
    if ($total_pegawai == 0) {
        exit;
    }

    $counter = 0;
    while ($data_peg = mysqli_fetch_assoc($koneksi_pegawai)) {
        $nomor_pegawai = $data_peg['nopeg'];
        $alamat_email  = $data_peg['email'];
        $nama_peg      = $data_peg['nama'];

        $koneksi_potongan = $koneksi->query("SELECT * FROM gaji WHERE kode_transaksi='$kode' AND nopeg ='$nomor_pegawai'");
        $row_pegawai = $koneksi_potongan->fetch_assoc();

        $bulan = (int)$row_pegawai['bulan'];
        $tahun = (int)$row_pegawai['tahun'];

        if ($bulan == 12) {
            $bulan_terima = 1;
            $tahun_terima = $tahun + 1;
        } else {
            $bulan_terima = $bulan + 1;
            $tahun_terima = $tahun;
        }

        $mail->clearAddresses();
        $mail->clearAttachments();

        $mail->addAddress($alamat_email, $nama_peg);
        $mail->Subject = strtoupper('Gaji ' . bulan_indonesia($bulan) . ' Diterimakan ' . bulan_indonesia($bulan_terima) . ' ' . $tahun_terima);
        $mail->Body = "
        <h1>Halo, $nama_peg!</h1>
        <p>Berikut Kami lampirkan Slip Gaji dan Slip Potongan</p>
        <table border='1' cellspacing='0' cellpadding='8' style='border-collapse: collapse; width: 100%;'>
            <tr><th style='background-color: #f2f2f2;'>Field</th><th>Data</th></tr>
            <tr><td>Gaji Netto</td><td>Rp. " . number_format($row_pegawai['total_pendapatan'], 0, ',', '.') . "</td></tr>
            <tr><td>Potongan Obat</td><td>Rp. " . number_format($row_pegawai['obat'], 0, ',', '.') . "</td></tr>
            <tr><td>Potongan Seragam</td><td>Rp. " . number_format($row_pegawai['seragam'], 0, ',', '.') . "</td></tr>
            <tr><td>Kredit BTN</td><td>Rp. " . number_format($row_pegawai['kredit'], 0, ',', '.') . "</td></tr>
            <tr><td>Potongan Pelatihan</td><td>Rp. " . number_format($row_pegawai['pelatihan'], 0, ',', '.') . "</td></tr>
            <tr><td>Uang Gedung PPNI</td><td>Rp. " . number_format($row_pegawai['uang_gedung'], 0, ',', '.') . "</td></tr>
            <tr><td>Uang Yang Di Transfer</td><td>Rp. " . number_format($row_pegawai['transfer'], 0, ',', '.') . "</td></tr>
        </table>";

        $attachment_path = $folder . $nomor_pegawai . '.pdf';
        if (file_exists($attachment_path)) {
            $mail->addAttachment($attachment_path);
        }

        try {
            $mail->send();
            // echo "Email berhasil dikirim ke $nama_peg ($alamat_email)<br>";
        } catch (Exception $e) {
            // echo "Gagal kirim ke $alamat_email: {$mail->ErrorInfo}<br>";
        }

        flush();
        ob_flush();
        $counter++;

        // Istirahat tiap 10 email
        if ($counter % 10 == 0) {
            sleep(3);
        }
    }

} catch (Exception $e) {
    // echo "Terjadi kesalahan global: {$mail->ErrorInfo}";
}

$koneksi->query("UPDATE transaksi_gaji SET email=1 WHERE kode_transaksi='$kode'");
echo "<script>location='../../../data-gaji';</script>";
?>
