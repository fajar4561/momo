<?php
ob_start();
date_default_timezone_set('Asia/Jakarta');
session_start();
$jenis_transaksi = 'validasi berkas kredensial';
$today= date("d M Y");
$today2 = date("Y-m-d");
$tgl_hari_ini = date("Y-m-d H:i:s");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require '../../../env/tgl_indo2.php';
require '../../../env/terbilang.php';
require '../../../env/nama_bulan.php';
require('../../../public/plugins/fpdf/fpdf.php'); 


// Deklarasi Variabel
$nopeg = $_POST['nopeg'];
$kode_pengajuan=$_POST['kode_pengajuan'];
$tanggalInput = $_POST['tanggal'];
$dt = new DateTime($tanggalInput);
$tanggal = $dt->format("Y-m-d");
$jam = $dt->format("H:i");
$ruangan = $_POST['tempat'];
$catatan = $_POST['catatan'];
$status_pengajuan = 'penilaian';

// ambil data session yang digunakan untuk validator
$sesi_pengguna = $_SESSION['username'];
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();
$validator_berkas = $data_user['nopeg'];

// Simpan pengajuan kredensial
// dengan mengupdate tabel pengajuan kredensial
$simpan_pengajuan = $koneksi->query("UPDATE pengajuan_kredensial SET status_pengajuan='$status_pengajuan',
	tgl_ujian='$tanggal', validator='$validator_berkas', tgl_validasi='$today2' WHERE nopeg='$nopeg'");

if ($simpan_pengajuan) {
	$keterangan_log = 'sistem berhasil memproses validasi berkas kredensial yang divalidasi oleh '.$data_user['nama'].' dengan kode pengajuan '.$kode_pengajuan;
}
else {
	$keterangan_log = 'Eror sistem gagal memproses validasi berkas kredensial dikarenakan masalah di  '.$koneksi->error;
}

// simpan log simpan validasi berkas
$koneksi->query("INSERT INTO log (id,jenis_transaksi,jam,keterangan) VALUES (null, '$jenis_transaksi', '$tgl_hari_ini', '$keterangan_log')");


// biodata pemohon kredensial 
$ambil_peserta = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$pecah = $ambil_peserta->fetch_assoc();
$email_pemohon = $pecah['email'];
$nama_pemohon = $pecah['nama'];

$koenk_pengajuan = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE nopeg='$nopeg' AND kode_pengajuan='$kode_pengajuan'");
$data_pengajuan = $koenk_pengajuan->fetch_assoc();
$id_rkk = $data_pengajuan['jenjang_diajukan'];

$konek_master_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_rkk'");
$data_rkk = $konek_master_rkk->fetch_assoc();


// ambil data pengguna yang memvalidasi
// buat jaga-jaga kedepannya kalau diperlukan aksi dengan mendownload
$validator = $data_pengajuan['validator'];
$konek_Validator = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$validator'");
$data_validator = $konek_Validator->fetch_assoc();

// Simpan PDF hasil validasi berkas
require 'req/hasil-verifikasi.php';

// Kirim emal ke pemohon (peserta kredensial)
$tanggal_ujian = tgl_indo($tanggal);
$jam_ujian = $jam.' s/d Selesai';
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                      
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'maulanafajar751@gmail.com';  // ==> WAJIB DIUBAH
    $mail->Password   = 'scpf fpyi pyrz fsce';    // ==> WAJIB DIUBAH
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('maulanafajar751@gmail.com', 'Fajar Maulana Shidiq');
    $mail->addAddress($email_pemohon, $nama_pemohon);

    // Subject & Body
    $mail->isHTML(true);
    $mail->Subject = 'Validasi Berkas Kredensial '.$nama_pemohon;
    $mail->Body = "
	<div style='font-family:Segoe UI, sans-serif; max-width:640px; margin:auto; border:1px solid #e0e0e0; border-radius:12px; overflow:hidden; background:#ffffff;'>

	    <!-- Header -->
	    <div style='background:linear-gradient(135deg, #0d47a1, #1976d2); color:#fff; padding:25px; text-align:center;'>
	        <h2 style='margin:0; font-size:22px; font-weight:600;'>Hasil Validasi Berkas</h2>
	    </div>

	    <!-- Konten -->
	    <div style='padding:30px; background:#fafafa; line-height:1.7; font-size:15px; color:#333;'>
	        <p style='margin-top:0;'>
	            Halo <strong style='color:#0d47a1;'>{$nama_pemohon}</strong>,<br><br>
	            Selamat 🎉, berkas Anda telah <strong style='color:green;'>tervalidasi</strong> oleh Admin Kredensial.
	            Silakan persiapkan diri untuk mengikuti <strong>ujian kredensial</strong>. Berikut detail informasi Anda:
	        </p>

	        <div style='background:#fff; border:1px solid #ddd; border-radius:10px; padding:20px; margin:20px 0;'>
	            <table style='width:100%; font-size:14px; color:#444;'>
	                <tr><td style='padding:6px 0;'><strong>Nama</strong></td><td>: {$nama_pemohon}</td></tr>
	                <tr><td style='padding:6px 0;'><strong>NIP / NIK</strong></td><td>: {$nopeg}</td></tr>
	                <tr><td style='padding:6px 0;'><strong>Unit</strong></td><td>: {$pecah['unit']}</td></tr>
	                <tr><td style='padding:6px 0;'><strong>Jenjang</strong></td><td>: {$data_rkk['nama_rkk']} {$data_rkk['unit_rkk']}</td></tr>
	                <tr><td style='padding:6px 0;'><strong>Tanggal Ujian</strong></td><td>: {$tanggal_ujian}</td></tr>
	                <tr><td style='padding:6px 0;'><strong>Jam</strong></td><td>: {$jam_ujian}</td></tr>
	                <tr><td style='padding:6px 0;'><strong>Ruangan</strong></td><td>: {$ruangan}</td></tr>
	            </table>
	        </div>

	        <p style='margin:15px 0; font-size:14px;'>
	            Untuk informasi lebih lengkap, silakan cek <strong>lampiran</strong> atau klik tombol berikut:
	        </p>

	        <!-- Tombol Aksi -->
	        <div style='text-align:center; margin:25px 0;'>
	            <a href='http://157.10.3.26:29/rs/' style='background:#0d47a1; color:#fff; padding:14px 28px; border-radius:8px; text-decoration:none; font-size:15px; font-weight:500; display:inline-block;'>
	                📄 Lihat Detail Ujian
	            </a>
	        </div>
	    </div>

	    <!-- Footer -->
	    <div style='background:#f5f5f5; padding:18px; text-align:center; font-size:12px; color:#777;'>
	        Email ini dikirim otomatis dari <strong>Sistem Kredensial</strong>.<br>
	        Mohon untuk tidak membalas email ini.
	    </div>

	</div>
	";



    // Attachment (contoh PDF atau gambar)
    $mail->addAttachment("../../../public/file/keperawatan/permohonan/hasil-verifikasi-".$kode_pengajuan."-".$nopeg.".pdf");
    // bisa juga lebih dari satu:
    // $mail->addAttachment('uploads/ijazah.jpg', 'Ijazah.jpg');

    // Send
    $mail->send();
    //echo "Email berhasil dikirim dengan lampiran!";
} catch (Exception $e) {
    echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
}





?>