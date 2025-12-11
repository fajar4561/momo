<?php
session_start();
ini_set('memory_limit', '-1'); // tak terbatas (tidak disarankan di server publik)
date_default_timezone_set('Asia/Jakarta');
$today= date("Y-m-d");
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
require '../../../env/log.php';

// deklarasi variabel
$kode = $_POST['kode']; 
$nopeg = $_POST['nopeg'];
$catatan = $_POST['catatan'];

$sesi_pengguna = $_SESSION['username'];
$ambil_sesi_pengguna = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pengguna'");
$data_user = $ambil_sesi_pengguna->fetch_assoc();
$validator = $data_user['nopeg'];

// ambil data peserta
$ambil_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$data_pegawai = $ambil_pegawai->fetch_assoc();

// ambil alamat email
$nama = $data_pegawai['nama'];
$email = $data_pegawai['email'];


if (isset($_POST['layak'])) {
	$status_pengajuan = 'selesai';
} else {
	$status_pengajuan = 'mengulang';
}

$jenis_transaksi ="Proses Penilaian Kredensial";

foreach ($_POST['validasi'] as $key => $value) {

	$ambil_data = $koneksi->query("SELECT * FROM pengajuan_kredensial_detail WHERE id='$key'");
	$data_detail = $ambil_data->fetch_assoc();
	$id_jenis_kewenangan = $data_detail['id_jenis_kewenangan'];

	// ambil data rkk
	$ambil_rkk = $koneksi->query("SELECT * FROM detail_master_rkk WHERE id='$id_jenis_kewenangan'");
	$data_rkk = $ambil_rkk->fetch_assoc();
	$id_jenis_kewenangan = $data_detail['id_jenis_kewenangan'];

	$update_nilai = $koneksi->query("UPDATE pengajuan_kredensial_detail SET penilaian=$value, status_pengajuan='$status_pengajuan' WHERE id=$key");
	if ($update_nilai) {
		$keterangan_log = "update nilai telah berhasil di database <strong>pengajaun_kredensial_detail</strong>";
	}
	else {
		$keterangan_log = "gagal update_nilai di database <strong>pengajaun_kredensial_detail</strong>".$koneksi->error;
	}

	// simpan log update nilai
	
}
simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");


// update pengajuan kredensial
$update_pengajuan = $koneksi->query("UPDATE pengajuan_kredensial SET status_pengajuan='$status_pengajuan', penguji='$validator' WHERE kode_pengajuan='$kode'");

if ($update_pengajuan) {
	$keterangan_log = "Sistem Berhasil mengupdate penilaian pada database <strong>penilaian_kredensial</strong> dengan kode pengajuan <strong>".$kode."</strong>";
}
else {
	$keterangan_log = "Gagal update pengajuan ".$koneksi->error;
}

simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");

// warna font nama pdf 0EAAC3 size 81


if (isset($_POST['layak'])) {
	// panggil sertifikat
	require 'req/sertifikat.php';

	// update pegawai 
	// digunakan untuk status saat ini / terakhir
	$id_jenjang_karir = $data_rkk['id'];
	$koneksi->query("UPDATE pegawai SET jenjang_karir = $id_jenjang_karir WHERE nopeg='$nopeg'");

	
	// kirim email berkas
	$mail = new PHPMailer(true);

	try {
	    // Server settings
	    $mail->isSMTP();                                            
	    $mail->Host       = 'smtp.gmail.com';                      
	    $mail->SMTPAuth   = true;                                   
	    $mail->Username   = 'maulanafajar752@gmail.com'; 
	    $mail->Password   = 'aciq nuly oxjx vzvm';    // App Password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
	    $mail->Port       = 587;

	    // Recipients
	    $mail->setFrom('maulanafajar751@gma2l.com', 'RSPM');
	    $mail->addAddress($email, $nama);

	    // Subject & Body
	    $mail->isHTML(true);
	    $mail->Subject = 'Hasil Kredensial '.$kode;
	    $mail->Body = "
		<div style='
		    font-family:Segoe UI, Roboto, Helvetica, Arial, sans-serif;
		    max-width:650px;
		    margin:auto;
		    border-radius:10px;
		    overflow:hidden;
		    border:1px solid #e0e0e0;
		    background:#ffffff;
		'>

		    <!-- HEADER -->
		    <div style='
		        background:linear-gradient(135deg, #1565C0, #1E88E5);
		        color:#ffffff;
		        padding:25px 20px;
		        text-align:center;
		    '>
		        <h2 style='margin:0; font-size:22px;'>Penilaian Kredensial Telah Selesai</h2>
		        <p style='margin:8px 0 0 0; font-size:14px; opacity:0.9;'>RS. Permata Medika Semarang – Sistem Kredensial</p>
		    </div>

		    <!-- ISI EMAIL -->
		    <div style='padding:30px 25px; background:#fafafa; line-height:1.7; color:#333;'>
		        <p style='margin-top:0; font-size:15px;'>
		            Halo <strong>{$data_pegawai['nama']}</strong>,
		        </p>
		        <p style='font-size:15px;'>
		            Kami informasikan bahwa proses <strong>penilaian kredensial Anda telah selesai</strong>.
		        </p>

		        <div style='
		            background:#ffffff;
		            border:1px solid #ddd;
		            border-radius:10px;
		            padding:18px 20px;
		            margin:20px 0;
		        '>
		            <p style='margin:0; font-size:15px; text-align:center;'>
		                <strong style='color:#1565C0;'>Selamat!</strong> Anda dinyatakan memenuhi syarat pada jenjang:
		            </p>
		            <h3 style='color:#0E4B6C; text-align:center; margin:10px 0 5px; font-size:18px;'>
		                {$data_rkk['nama_rkk']} {$data_rkk['unit_rkk']}
		            </h3>
		        </div>

		        <p style='font-size:14px; color:#555;'>
		            Silakan lihat hasil lengkap dan dokumen pendukung melalui tautan di bawah ini:
		        </p>

		        <!-- TOMBOL -->
		        <div style='text-align:center; margin:25px 0;'>
		            <a href='http://157.10.3.26:29/rs/' style='
		                background:#1976d2;
		                color:#ffffff;
		                padding:12px 30px;
		                border-radius:6px;
		                text-decoration:none;
		                font-weight:600;
		                letter-spacing:0.5px;
		                display:inline-block;
		                font-size:15px;
		                transition:background 0.3s ease;
		            ' onmouseover=\"this.style.background='#0D47A1'\" onmouseout=\"this.style.background='#1976d2'\">
		                🔍 Lihat Detail Hasil Kredensial
		            </a>
		        </div>

		        <hr style='border:none; border-top:1px solid #ddd; margin:25px 0;'>

		        <p style='font-size:13px; color:#666; text-align:center;'>
		            Lampiran hasil penilaian dapat ditemukan di berkas terlampir (PDF).
		        </p>
		    </div>

		    <!-- FOOTER -->
		    <div style='
		        background:#f5f5f5;
		        padding:18px;
		        text-align:center;
		        font-size:12px;
		        color:#777;
		    '>
		        Email ini dikirim otomatis oleh <strong>Sistem Kredensial RSPM</strong>.<br>
		        Mohon tidak membalas email ini.
		    </div>
		</div>
		";



	    // Attachment (contoh PDF atau gambar)
	    $mail->addAttachment("../../../public/file/keperawatan/sertifikat/sertifikat-".$kode."-".$nopeg.".pdf");
	    // bisa juga lebih dari satu:
	    // $mail->addAttachment('uploads/ijazah.jpg', 'Ijazah.jpg');

	    // Send
	    $mail->send();
	    $keterangan_log = "sertifikat berhasil Terikirim ke <strong>".$email."</strong>";
	    
	} catch (Exception $e) {
		$keterangan_log = "sertifikat Gagal terkirim <strong>".$mail->ErrorInfo."</strong>";
	}
	simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");
	$keterangan_log = "Sertifikat telah terkirim di email Anda <strong>".$email."</strong>";
	simpanriwayat($koneksi,"$nopeg", "$jenis_transaksi", "$keterangan_log");

}
else {
	// apabila tidak layak
}

// menambahkan histori kredensial.
$simpan_histori_pengajuan = $koneksi->query("INSERT INTO riwayat_kredensial (id,kode_pengajuan,nopeg,tanggal,id_jenis_kewenangan,status_pengajuan,catatan) 
		VALUES(null, '$kode', '$nopeg', '$today', '$id_jenjang_karir', '$status_pengajuan', '$catatan')");

if ($simpan_histori_pengajuan) {

}
else {
	echo "Error Simpan pengajuan kredensial .....".$koneksi->error;
}

// pindah halaman ke halaman 
	$_SESSION['pesan'] = "Penilaian Telah Berhasil";
	$_SESSION['info'] = 'Berhasil ! ';
	$_SESSION['warna'] = 'success';
	echo '<script>location="../../../data-kredensial";</script>';
?>