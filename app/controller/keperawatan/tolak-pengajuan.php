<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();
$today= date("d M Y");
$tgl_hari_ini = date("Y-m-d");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';
require '../../../env/koneksi.php';
require '../../../env/log.php'; 

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
$email = $data_pegawai['email'];
$nama = $data_pegawai['nama'];

// update status pengajuan
$status_pengajuan = 'mengulang';
$update_pengajuan = $koneksi->query("UPDATE pengajuan_kredensial SET status_pengajuan='$status_pengajuan',
	validator='$validator',
	tgl_validasi='$tgl_hari_ini',
	catatan='$catatan' WHERE kode_pengajuan='$kode'");

if ($update_pengajuan) {
	// code...
}
else {
	echo "error ". $koneksi->error;
}

$jenis_transaksi='Tolak Pengajuan';
$keterangan_log='Sistem berhasil membatalkan pengajuan <strong>'.$nopeg.'</strong> dengan kode pengajuan <strong>'.$kode;
simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");
$keterangan_log ='Pengajuan anda dengan kode <strong>'.$kode.'</strong> Telah ditolak dengan catatan <strong>'.$catatan.'</strong>';
simpanriwayat($koneksi,"$nopeg", "$jenis_transaksi", "$keterangan_log");

// kirim email
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
	    $mail->setFrom('maulanafajar752@gmail.com', 'RSPM');
	    $mail->addAddress($email, $nama);

	    // Subject & Body
	    $mail->isHTML(true);
		$mail->Subject = 'Hasil Kredensial '.$kode.'  Pengajuan Belum Dapat Diterima';
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
		        background:linear-gradient(135deg, #C62828, #E53935);
		        color:#ffffff;
		        padding:25px 20px;
		        text-align:center;
		    '>
		        <h2 style='margin:0; font-size:22px;'>Hasil Kredensial — Belum Dapat Disetujui</h2>
		        <p style='margin:8px 0 0 0; font-size:14px; opacity:0.9;'>RS. Permata Medika Semarang – Sistem Kredensial</p>
		    </div>

		    <!-- ISI EMAIL -->
		    <div style='padding:30px 25px; background:#fafafa; line-height:1.7; color:#333;'>
		        <p style='margin-top:0; font-size:15px;'>
		            Halo <strong>{$data_pegawai['nama']}</strong>,
		        </p>

		        <p style='font-size:15px;'>
		            Kami informasikan bahwa pengajuan kredensial Anda dengan kode <strong>{$kode}</strong> <br>
		            <strong>belum dapat disetujui</strong> pada tahap validasi saat ini.
		        </p>

		        <div style='
		            background:#ffffff;
		            border:1px solid #ddd;
		            border-radius:10px;
		            padding:18px 20px;
		            margin:20px 0;
		        '>
		            <p style='margin:0; font-size:15px;'>
		                <strong>Catatan dari validator:</strong><br>
		                <em style='color:#B71C1C;'>{$catatan}</em>
		            </p>
		        </div>

		        <p style='font-size:14px; color:#555;'>
		            Anda dapat melakukan perbaikan atau melengkapi berkas sesuai catatan di atas, kemudian mengajukan kembali proses kredensial melalui sistem.
		        </p>

		        <!-- TOMBOL -->
		        <div style='text-align:center; margin:25px 0;'>
		            <a href='http://157.10.3.26:29/rs/' style='
		                background:#E53935;
		                color:#ffffff;
		                padding:12px 30px;
		                border-radius:6px;
		                text-decoration:none;
		                font-weight:600;
		                letter-spacing:0.5px;
		                display:inline-block;
		                font-size:15px;
		                transition:background 0.3s ease;
		            ' onmouseover=\"this.style.background='#B71C1C'\" onmouseout=\"this.style.background='#E53935'\">
		                🔁 Ajukan Kembali Kredensial
		            </a>
		        </div>

		        <hr style='border:none; border-top:1px solid #ddd; margin:25px 0;'>

		        <p style='font-size:13px; color:#666; text-align:center;'>
		            Silakan hubungi admin atau tim kredensial bila membutuhkan klarifikasi lebih lanjut.<br>
		            Terima kasih atas kerja sama dan dedikasi Anda.
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

	    // Send
	    $mail->send();
	    	    
	} catch (Exception $e) {
		$keterangan_log = "sertifikat Gagal terkirim <strong>".$mail->ErrorInfo."</strong>";
	}

	$keterangan_log='Sistem berhasil membatalkan pengajuan <strong>'.$nopeg.'</strong> dengan kode pengajuan <strong>'.$kode;
	// pindah halaman ke halaman 
	$_SESSION['pesan'] = $keterangan_log;
	$_SESSION['info'] = 'Berhasil ! ';
	$_SESSION['warna'] = 'success';
	echo '<script>location="../../../data-kredensial";</script>';
?>