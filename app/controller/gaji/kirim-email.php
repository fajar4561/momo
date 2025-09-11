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
    $mail->Password   = 'scpf fpyi pyrz fsce';
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
        <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6; background-color:#f4f6f8; padding:20px;'>
          <div style='max-width:600px; margin:0 auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);'>

            <!-- Header -->
            <div style='background:#0b51b7; padding:20px; text-align:center; color:#fff;'>
              <h1 style='margin:0; font-size:22px; letter-spacing:1px;'>RS Permata Medika</h1>
              <h2 style='margin:10px 0 0; font-size:18px;'>Slip Gaji Karyawan</h2>
              <p style='margin:5px 0 0; font-size:14px;'>Bulan " . bulan_indonesia($bulan) . " - Diterimakan " . bulan_indonesia($bulan_terima) . " $tahun_terima</p>
            </div>

            <!-- Body -->
            <div style='padding:20px;'>
              <p>Halo <b>$nama_peg</b>,</p>
              <p>Berikut adalah rincian gaji Anda. Slip resmi dalam bentuk PDF juga kami lampirkan.</p>

              <table cellpadding='10' cellspacing='0' width='100%' style='border-collapse:collapse; font-size:14px; margin-top:10px;'>
                <tr style='background:#f8f9fa; border-bottom:1px solid #ddd;'>
                  <th align='left'>Keterangan</th>
                  <th align='right'>Jumlah</th>
                </tr>
                <tr><td>Gaji Netto</td><td align='right'>Rp " . number_format($row_pegawai['total_pendapatan'],0,',','.') . "</td></tr>
                <tr><td>Potongan Obat</td><td align='right'>Rp " . number_format($row_pegawai['obat'],0,',','.') . "</td></tr>
                <tr><td>Potongan Seragam</td><td align='right'>Rp " . number_format($row_pegawai['seragam'],0,',','.') . "</td></tr>
                <tr><td>Kredit BTN</td><td align='right'>Rp " . number_format($row_pegawai['kredit'],0,',','.') . "</td></tr>
                <tr><td>Potongan Pelatihan</td><td align='right'>Rp " . number_format($row_pegawai['pelatihan'],0,',','.') . "</td></tr>
                <tr><td>Uang Gedung PPNI</td><td align='right'>Rp " . number_format($row_pegawai['uang_gedung'],0,',','.') . "</td></tr>
                <tr style='background:#eaf4ff; font-weight:bold;'>
                  <td>Total Ditransfer</td>
                  <td align='right'>Rp " . number_format($row_pegawai['transfer'],0,',','.') . "</td>
                </tr>
              </table>

              <p style='margin-top:20px;'>Jika ada pertanyaan terkait slip gaji ini, silakan hubungi <b>Bagian Keuangan HRD</b>.</p>
            </div>

            <!-- Footer -->
            <div style='background:#f8f9fa; text-align:center; padding:15px; font-size:12px; color:#666;'>
              <p style='margin:0;'>© " . date('Y') . " RS Permata Medika | Sistem Informasi Penggajian</p>
              <p style='margin:5px 0 0; font-size:11px; color:#999;'>Email ini dikirim secara otomatis oleh sistem, mohon tidak membalas langsung ke alamat ini.</p>
            </div>
          </div>
        </div>";



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
