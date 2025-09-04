<?php
ini_set('max_execution_time', 300);
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Jika menggunakan Composer
require '../env/koneksi.php';



$kode = 'GJ-001';
$koneksi_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE email != '' AND email != 'maulanafajar751@gmail.com'");
$folder = "../public/file/gaji/GJ-001/";

$mail = new PHPMailer(true);



try {
    // Aktifkan debugging SMTP (jika ingin melihat detail error)
    // $mail->SMTPDebug = 2; 
    // $mail->Debugoutput = 'html';

    // Konfigurasi SMTP (hanya dilakukan sekali)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'maulanafajar751@gmail.com'; // Ganti dengan email Anda
    $mail->Password   = 'oidi dfxv uike ifkl'; // Ganti dengan App Password Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->setFrom('maulanafajar751@gmail.com', 'Fajar Maulana Shidiq');
    $mail->addReplyTo('maulanafajar751@gmail.com', 'Fajar Maulana Shidiq');
    $mail->isHTML(true); // Set email dalam format HTML

    // Periksa apakah ada pegawai dalam database
    $total_pegawai = mysqli_num_rows($koneksi_pegawai);
    echo "📢 Total pegawai ditemukan: $total_pegawai <br>";
    flush();
    ob_flush();

    if ($total_pegawai == 0) {
        echo "❌ Tidak ada pegawai dalam database. Email tidak dikirim.<br>";
        exit;
    }

    // Loop untuk mengirim email ke setiap pegawai
    while ($data_peg = mysqli_fetch_assoc($koneksi_pegawai)) {
        $nomor_pegawai = $data_peg['nopeg'];
        $alamat_email  = $data_peg['email'];
        $nama_peg      = $data_peg['nama'];

        // ambil data slip potongan
        $koneksi_potongan = $koneksi->query("SELECT * FROM gaji WHERE kode_transaksi='$kode' AND nopeg ='$nomor_pegawai'");
        $row_pegawai = $koneksi_potongan->fetch_assoc();


        echo "📩 Mengirim email ke: $nama_peg ($alamat_email)...<br>";
        flush();
        ob_flush();

        // Bersihkan penerima & lampiran sebelum menambahkan baru
        $mail->clearAddresses();
        $mail->clearAttachments();

        // Tambah penerima email
        $mail->addAddress($alamat_email, $nama_peg);

        // Subjek & isi email
        $mail->Subject = 'Slip Gaji Periode';
        $mail->Body = "
    <h1>Halo, $nama_peg!</h1>
    <p>Berikut Kami lampirkan Slip Gaji dan Slip Potongan</p>
    <table border='1' cellspacing='0' cellpadding='8' style='border-collapse: collapse; width: 100%;'>
        <tr>
            <th style='background-color: #f2f2f2;'>Field</th>
            <th>Data</th>
        </tr>
        <tr>
            <td>Gaji Netto</td>
            <td>Rp. " . number_format($row_pegawai['total_pendapatan'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <td>Potongan Obat</td>
            <td>Rp. " . number_format($row_pegawai['obat'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <td>Potongan Seragam</td>
            <td>Rp. " . number_format($row_pegawai['seragam'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <td>Kredit BTN</td>
            <td>Rp. " . number_format($row_pegawai['kredit'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <td>Potongan Pelatihan</td>
            <td>Rp. " . number_format($row_pegawai['pelatihan'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <td>Uang Gedung PPNI</td>
            <td>Rp. " . number_format($row_pegawai['uang_gedung'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <td>Uang Yang Di Transfer</td>
            <td>Rp. " . number_format($row_pegawai['transfer'], 0, ',', '.') . "</td>
        </tr>
    </table>
";


        // Cek apakah file slip gaji ada
        $attachment_path = $folder . $nomor_pegawai . '.pdf';
        if (file_exists($attachment_path)) {
            $mail->addAttachment($attachment_path);
        } else {
            echo "⚠️ Lampiran tidak ditemukan untuk $nama_peg ($nomor_pegawai).<br>";
        }

        // Kirim email
        if ($mail->send()) {
            echo "✅ Email berhasil dikirim ke $nama_peg ($alamat_email)!<br>";
        } else {
            echo "❌ Email gagal dikirim ke $nama_peg ($alamat_email): {$mail->ErrorInfo}<br>";
        }

        flush();
        ob_flush();
        sleep(2); // Tunggu 2 detik sebelum lanjut ke email berikutnya
    }
} catch (Exception $e) {
    echo "❌ Error: {$mail->ErrorInfo}";
}





?>