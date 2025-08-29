<?php 
session_start();
require '../../../env/koneksi.php';

require '../../../vendor/autoload.php'; // Pastikan path ini sesuai dengan instalasi Composer Anda

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file = $_FILES['input-file']['tmp_name'];

$file_info = pathinfo($_FILES['input-file']['name']);
$file_ext = strtolower($file_info['extension']);

$reader = new Xlsx();
$spreadsheet = $reader->load($file);

// Ambil sheet aktif
$sheet = $spreadsheet->getActiveSheet();

// Konversi sheet ke array
$data = $sheet->toArray();

/*
echo '<pre>';
print_r($data);
echo '</pre>';
*/

if (!empty($data)) {
    // Mengabaikan baris header jika ada
    $header = array_shift($data); // Menghapus dan mendapatkan baris header
    
    // Loop melalui setiap baris data
    foreach ($data as $index => $row) {
        // Simpan setiap elemen data dari baris ke variabel
        $nama = trim($row[2]);
		$nopeg = str_replace("'", "", $row[1]);
		$gen = $row[3];
		// gender
		if ($gen == 'L') {
			$gender ='Laki-laki';
		}
		else {
			$gender ='Perempuan';
		}

		$nik = str_replace("'", "", $row[4]);
		$tmpt_lahir = $row[10];
		$tgl_lahir =$row[11];
		
		// jabatan
		$jabatan0 = $row[5];
		$baris = explode("\n", $jabatan0);
		$baris = array_map('trim', $baris);
		$baris = array_filter($baris);
		$jabatan = implode("\n", $baris);
		//akhir jabatan
		// unit
		$unit0 = $row[6];
		$baris2 = explode("\n", $unit0);
		$baris2 = array_map('trim', $baris2);
		$baris2 = array_filter($baris2);
		$unit = implode("\n", $baris2);
		// akhir unit
		$tmt = $row[7];
		$skpt = $row[8];
		$alamat = $row[9];
		$status_kawin = $row[12];
		$status_pegawai = $row[13];
		$telpon = str_replace("'", "", $row[14]);
		$email = $row[15];
		// menghitung umur
		$tanggal_lahir_obj = new DateTime($tgl_lahir);
		$tanggal_hari_ini = new DateTime();
		$diff = $tanggal_lahir_obj->diff($tanggal_hari_ini);
		$umur_tahun = $diff->y;
		$umur_bulan = $diff->m;
		$umur_bulan += $umur_tahun * 12;
		$umur_tahun = floor($umur_bulan / 12);
		$umur_bulan = $umur_bulan % 12;

		$umur = $umur_tahun." Th ".$umur_bulan." bln";

		// MENGITUNG Masa kerja
		/*
		$tanggal_masuk = new DateTime($tmt);
		$selisih = $tanggal_masuk->diff($tanggal_hari_ini);
		$sk_tahun = $selisih->y;
		$sk_bulan = $selisih->m;
		$sk_bulan += $sk_tahun * 12;
		$sk_tahun = floor($sk_bulan / 12);
		$sk_bulan = $sk_bulan % 12;
		*/
		$tahun_sekarang = date("Y");
		$sk_tahun = $tahun_sekarang - $tmt;
		$masa =  $sk_tahun." Th ";

		$password = md5($nopeg);

        
        //echo "Nama: $tmt<br><br>";
        //chek apakah nopeg sudah terdaftar apa belum
		$ambil= $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
		$cocok = $ambil->num_rows;

		if ($cocok!=1) {
			$ambil2 = $koneksi->query("SELECT * FROM master_pegawai WHERE jabatan='$jabatan'");
			$cocok2 = $ambil2->num_rows;
			if ($cocok2!=1) {
				// simpan ke master_pegawai sebagai jabatan baru
				$koneksi->query("INSERT INTO master_pegawai (id, jabatan) VALUES(null, '$jabatan')");
			}
			// simpan data pegawai
			if ($gender=='Laki-laki') {
				$fotobaru = 'man.png';
			}
			else {
				$fotobaru = 'woman.png';
			}
			// chek apakah unit kerja sudah ada apa belum
			$ambil3= $koneksi->query("SELECT * FROM master_unit WHERE unit_kerja='$unit'");
			$cocok3 = $ambil3->num_rows;
			if ($cocok3!=1) {
				$koneksi->query("INSERT INTO master_unit (id, unit_kerja) VALUES(null, '$unit')");
			}

			$stmt = $koneksi->prepare("INSERT INTO pegawai (id, nopeg, nama, nik, gender, tmpt_lahir, tgl_lahir, umur, jabatan, unit, tmt, skpt, masa, alamat, email, telpon, status_kawin, status_pegawai, username, password, foto) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

			// Bind parameter ke prepared statement
			$stmt->bind_param("ssssssssssssssssssss", $nopeg, $nama, $nik, $gender, $tmpt_lahir, $tgl_lahir, $umur, $jabatan, $unit, $tmt, $skpt, $masa, $alamat, $email, $telpon, $status_kawin, $status_pegawai,  $nopeg, $password, $fotobaru);

			$stmt->execute();

		}
    }
    
    $_SESSION['pesan'] = 'Data pegawai Berhasil di Import dan di Perbaharui !';
	$_SESSION['info'] = 'Berhasil !';
	$_SESSION['warna'] = 'success';
	echo "<script>location='../../../data-pegawai';</script>"; 
}

?>