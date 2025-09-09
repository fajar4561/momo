<?php

if (empty($_POST['rkk_id']) || $_POST['rkk_id'] == 0) {
    echo "
    <html>
    <head>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css'>
    </head>
    <body>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                imageUrl: '../../../public/bg/nodata.webp',
		        imageWidth: 290,
		        imageHeight: 270,
		        imageAlt: 'Custom Icon',
                title: 'Data tidak valid',
                text: 'RKK tidak boleh kosong.'
            }).then(() => {
                window.history.back();
            });
        </script>
    </body>
    </html>";
    exit;
}


date_default_timezone_set('Asia/Jakarta');
session_start();
$today= date("d M Y");
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

// kode pengajuan
$today = date("Ymd");
$quer = mysqli_query($koneksi, "SELECT max(kode_pengajuan) as kodeTerbesar FROM pengajuan_kredensial WHERE kode_pengajuan LIKE '%".$today."%' ");
$dat = mysqli_fetch_array($quer);
$kode= $dat['kodeTerbesar'];
if ($dat['kodeTerbesar']) {
    $urutan = (int) substr($dat['kodeTerbesar'], 8, 3);
} else {
    $urutan = 0;
}
$urutan++;
$kode = $today. sprintf("%03s", $urutan);

// deklarasi variabel
// biodata diri
$nopeg = $_POST['nik'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$unit = $_POST['unit'];
$telepon = $_POST['telepon'];
$jenjang_saat_ini = $_POST['jenjang_saat_ini'];
// RKK
$rkk_id = $_POST['rkk_id'];
$ambil_karir = $koneksi->query("SELECT * FROM master_rkk WHERE id='$rkk_id'");
$data_karir = $ambil_karir->fetch_assoc();
$jenjang_yang_dipilih = $data_karir['nama_rkk'].' '.$data_karir['unit_rkk'];
$status ='menunggu';

// update biodata diri
$update_biodata = $koneksi->query("UPDATE pegawai SET email='$email', telpon='$telepon', unit='$unit' WHERE nopeg='$nopeg' ");

if ($update_biodata) {
	// code...
}
else {
	echo "Gagal Update data diri".$koneksi->error ;
}

$simpan_pengajuan_kredensial = $koneksi->query("INSERT INTO pengajuan_kredensial (id,kode_pengajuan,tgl_pengajuan,nopeg,unit,jenjang_diajukan,status_pengajuan) 
	VALUES(null, '$kode', '$tgl_hari_ini', '$nopeg', '$unit', '$rkk_id', '$status')");

if ($simpan_pengajuan_kredensial) {
	// code...
}
else {
	echo "Gagal simpan data simpan_pengajuan_kredensial ".$koneksi->error ;
}

// simpan detail pengajuan kredensial

foreach ($_POST['kewenangan'] as $key => $value) {
	$simpan_pengajuan_kredensial_detail = $koneksi->query("INSERT INTO pengajuan_kredensial_detail (id,kode_pengajuan,nopeg,id_rkk,jenis_kewenangan,id_jenis_kewenangan,status_pengajuan) 
		VALUES(null, '$kode', '$nopeg', '$rkk_id', '$value', '$key', '$status')");
	if ($simpan_pengajuan_kredensial_detail) {
	// code...
	}
	else {
		echo "Gagal simpan data simpan_pengajuan_kredensial_detail ".$koneksi->error ;
	}
}

// disini kirim email ke admin. dan generate surat permohonan kredensial
// 1.permohonan pengajuan
require 'req/surat-permohonan.php';

// 2. Lembar Verifikasi
require 'req/lembar-verifikasi.php';

// 3. Log Book
require 'req/log-book.php';

// kirim email ke hak akses terkait
// fungsinya untk menampilkan notifikasi atas pengajuan
// Ambil Data Pegawai
$data_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'")->fetch_assoc();
$mail = new PHPMailer(true);

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                      
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'maulanafajar751@gmail.com'; 
    $mail->Password   = 'scpf fpyi pyrz fsce';    // App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('maulanafajar751@gmail.com', 'Fajar Maulana Shidiq');
    $mail->addAddress('maulanafajar752@gmail.com', 'Fajar');

    // Subject & Body
    $mail->isHTML(true);
    $mail->Subject = 'Pengajuan Kredensial '.$nama;
    $mail->Body = "
    <div style='font-family:Segoe UI, sans-serif; max-width:600px; margin:auto; border:1px solid #e0e0e0; border-radius:10px; overflow:hidden; background:#ffffff;'>

        <!-- Header -->
        <div style='background:linear-gradient(135deg, #1976d2, #2196f3); color:#fff; padding:20px; text-align:center;'>
            <h2 style='margin:0; font-size:22px;'>Pengajuan Kredensial Baru</h2>
        </div>

        <!-- Konten -->
        <div style='padding:25px; background:#fafafa; line-height:1.6;'>
            <p style='font-size:15px; color:#333; margin-top:0;'>
                Halo <strong>Admin</strong>, ada pengajuan baru dari:
            </p>

            <div style='background:#fff; border:1px solid #ddd; border-radius:8px; padding:15px; margin:15px 0;'>
                <p style='margin:8px 0;'><strong>Nama:</strong> {$data_pegawai['nama']}</p>
                <p style='margin:8px 0;'><strong>NIP / NIK:</strong> {$data_pegawai['nopeg']}</p>
                <p style='margin:8px 0;'><strong>Unit:</strong> {$data_pegawai['unit']}</p>
                <p style='margin:8px 0;'><strong>Jenjang:</strong> {$jenjang_yang_dipilih}</p>
            </div>

            <p style='margin:15px 0; font-size:14px;'>
                Silakan periksa <strong>lampiran</strong> untuk detail lengkap pengajuan.
            </p>

            <!-- Tombol Aksi -->
            <div style='text-align:center; margin:25px 0;'>
                <a href='http://157.10.3.26:29/rs/' style='background:#1976d2; color:#fff; padding:12px 25px; border-radius:6px; text-decoration:none; font-size:15px; display:inline-block;'>
                    Lihat Detail
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div style='background:#f5f5f5; padding:15px; text-align:center; font-size:12px; color:#777;'>
            Email ini dikirim otomatis dari <strong>Sistem Kredensial</strong>.<br>
            Mohon tidak membalas email ini.
        </div>

    </div>
    ";


    // Attachment (contoh PDF atau gambar)
    $mail->addAttachment("../../../public/file/keperawatan/permohonan/surat-permohonan-".$kode."-".$nopeg.".pdf");
    $mail->addAttachment("../../../public/file/keperawatan/permohonan/lembar-verifikasi-".$kode."-".$nopeg.".pdf");
    //$mail->addAttachment("../../../public/file/keperawatan/permohonan/log-book-".$kode."-".$nopeg.".pdf"); 
    // bisa juga lebih dari satu:
    // $mail->addAttachment('uploads/ijazah.jpg', 'Ijazah.jpg');

    // Send
    $mail->send();
    //echo "Email berhasil dikirim dengan lampiran!";
} catch (Exception $e) {
    echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
}




$_SESSION['pesan'] = 'Pengajuan Kredensial dengan kode'.$kode.' Berhasil disimpan !';
$_SESSION['info'] = 'Berhasil ! ';
$_SESSION['warna'] = 'success';
echo "<script>location='../../../data-pengajuan-kredensial';</script>";


?>