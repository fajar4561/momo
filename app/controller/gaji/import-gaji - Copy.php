<?php
// error_reporting(0);
// ini_set('display_errors', 0); 
session_start();
require '../../../env/koneksi.php';
require '../../../vendor/autoload.php'; // Pastikan path ini sesuai dengan instalasi Composer Anda

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx; 


// File CSV yang diunggah
$tanggal_hari_ini = date("Y-m-d");
$file = $_FILES['input-file']['tmp_name'];

$file_info = pathinfo($_FILES['input-file']['name']);
$file_ext = strtolower($file_info['extension']);

$reader = new Xlsx();
$spreadsheet = $reader->load($file);

// Ambil sheet aktif
$sheet = $spreadsheet->getActiveSheet();

// Konversi sheet ke array
$data = $sheet->toArray();

// Buang baris pertama (judul kolom)
//fgetcsv($handle, 1000, ",");
if ($file_ext !='xlsx') {
	$_SESSION['pesan'] = 'File Harus berformatkan ".xlsx" silahkan periksa kembali';
	$_SESSION['info'] = 'Gagal Import File !';
	$_SESSION['warna'] = 'danger';
	echo "<script>window.location=history.go(-1);</script>";
}
else {
    $quer = mysqli_query($koneksi, "SELECT max(kode_transaksi) as kodeTerbesar FROM transaksi_gaji ");
    $dat = mysqli_fetch_array($quer);
    $kode_baru = $dat['kodeTerbesar'];
    $urutan = (int) substr($kode_baru, 3, 3);
    $urutan++;
    $huruf='GJ-';
    $kode_baru = $huruf. sprintf("%03s", $urutan);

    

	//Loop untuk membaca setiap baris data dari file CSV
	function clean_number($value) {
		    $clean_value = str_replace([',', ' '], '', trim($value)); // Hapus koma dan spasi
		    return is_numeric($clean_value) ? (float) $clean_value : 0;
		}

    // function clean_number($value) {
    //     $value = trim($value); // Hapus spasi di awal & akhir
        
    //     // Jika angka pakai format ribuan dengan titik (misal "1.500,75"), ubah titik ke kosong
    //     if (preg_match('/^\d{1,3}(\.\d{3})*,\d+$/', $value)) {
    //         $value = str_replace('.', '', $value); // Hapus titik ribuan
    //         $value = str_replace(',', '.', $value); // Ganti koma desimal ke titik
    //     } elseif (preg_match('/^\d{1,3}(,\d{3})*\.\d+$/', $value)) {
    //         $value = str_replace(',', '', $value); // Hapus koma ribuan
    //     }

    //     return is_numeric($value) ? (float) $value : 0;
    // }
    $no = 0;
	foreach ($data as $index => $row) {
		// echo "<pre>";
		// print_r($row);
		// echo "</pre>";

		$nopeg = str_replace("'", "", $row[1]);
		$bulan = $row[5];
		$tahun = $row[6];

		$upah_awal = isset($row[7]) ? clean_number($row[7]) : 0;
		$penambahan = isset($row[8]) ? clean_number($row[8]) : 0;
		$revisi = isset($row[9]) ? clean_number($row[9]) : 0;

		$tj_jabatan = isset($row[10]) ? clean_number($row[10]) : 0;
        $tj_fungsional = isset($row[11]) ? clean_number($row[11]) : 0;
        $tj_resiko = isset($row[12]) ? clean_number($row[12]) : 0;
        $tj_tpbri = isset($row[13]) ? clean_number($row[13]) : 0;
        $fee_for_service = isset($row[14]) ? clean_number($row[14]) : 0;
        $tj_mcu = isset($row[15]) ? clean_number($row[15]) : 0;
        $tj_bpjs = isset($row[16]) ? clean_number($row[16]) : 0;
        $lembur = isset($row[17]) ? clean_number($row[17]) : 0;
        $thr = isset($row[18]) ? clean_number($row[18]) : 0;
        $tj_lain = isset($row[19]) ? clean_number($row[19]) : 0;

        $gaji_bruto = $revisi+ $tj_jabatan + $tj_fungsional + $tj_resiko + $tj_tpbri + $fee_for_service +$tj_mcu + $tj_bpjs+ $lembur + $thr + $tj_lain;

        $bpjs_tenaga = isset($row[21]) ? clean_number($row[21]) : 0;
        $bpjs_kesehatan = isset($row[22]) ? clean_number($row[22]) : 0;

        $pph21 = isset($row[23]) ? clean_number($row[23]) : 0;
        $ppni = isset($row[24]) ? clean_number($row[24]) : 0;
        $lain = isset($row[25]) ? clean_number($row[25]) : 0;

        $total_potongan = $bpjs_tenaga + $bpjs_kesehatan+$pph21+$ppni+$lain;

        $gaji_netto = $gaji_bruto-$total_potongan;

        $obat = isset($row[28]) ? clean_number($row[28]) : 0;
        $seragam = isset($row[29]) ? clean_number($row[29]) : 0;
        $kredit = isset($row[30]) ? clean_number($row[30]) : 0;
        $pelatihan = isset($row[31]) ? clean_number($row[31]) : 0;
        $uang_gedung = isset($row[32]) ? clean_number($row[32]) : 0;

        $total_potongan_slip = $obat + $seragam + $kredit+$pelatihan + $uang_gedung;

        $transfer = $gaji_netto-$total_potongan_slip;

        $ambil_data_gaji = $koneksi->query("SELECT * FROM gaji WHERE bulan='$bulan' AND tahun='$tahun'");
        $ada_data = $ambil_data_gaji->num_rows;

        if ($ada_data>=1) { // jika ada data gaji berdasarkan bulan

            if ($gaji_netto > 0) {
                $update = $koneksi->query("UPDATE gaji SET
                    tgl_gaji='$tanggal_hari_ini', 
                    upah_awal ='$upah_awal',
                    penambahan='$penambahan',
                    revisi='$revisi',
                    bpjs_kerja='$bpjs_tenaga',
                    bpjs_kes='$bpjs_kesehatan',
                    pph21='$pph21',
                    ppni='$ppni',
                    lain='$lain',
                    tj_jbtn='$tj_jabatan',
                    tj_fungsional='$tj_fungsional',
                    tj_resiko='$tj_resiko',
                    fee_for_servis='$fee_for_service',
                    tj_tpbri =$tj_tpbri,
                    tj_mcu = $tj_mcu,
                    tj_bpjs = $tj_bpjs,
                    lembur='$lembur',
                    thr='$thr',
                    tj_lain='$tj_lain',
                    bruto='$gaji_bruto',
                    total_potongan ='$total_potongan',
                    total_pendapatan = '$gaji_netto',
                    obat = '$obat',
                    seragam ='$seragam',
                    kredit = '$kredit',
                    pelatihan = '$pelatihan',
                    uang_gedung = $uang_gedung,
                    total_potongan_slip = '$total_potongan_slip',
                    transfer ='$transfer',
                    status='1' WHERE nopeg='$nopeg' AND bulan ='$bulan' AND tahun='$tahun' ");
            }

        }
        // apabila tidak ada data gaji dari hasil file import excel
        else { 
            // tambah data insert=>into
            if ($gaji_netto > 0) {
                $no ++;
                 $koneksi->query("INSERT INTO gaji 
                    (id,kode_transaksi,bulan,tahun,no_gaji,tgl_gaji,nopeg,upah_awal,penambahan,revisi,bpjs_kerja,bpjs_kes,pph21,ppni,lain,tj_jbtn,tj_fungsional,tj_resiko,fee_for_servis,tj_tpbri,tj_mcu,tj_bpjs,lembur,thr,tj_lain,bruto,total_pendapatan,total_potongan,obat,seragam,kredit,pelatihan,uang_gedung,total_potongan_slip,transfer,status)
                     VALUES(null, '$kode_baru', '$bulan', '$tahun', '$no', '$tanggal_hari_ini', '$nopeg', '$upah_awal', '$penambahan', '$revisi', '$bpjs_tenaga', '$bpjs_kesehatan', '$pph21', '$ppni',
                        '$lain', '$tj_jabatan', '$tj_fungsional', '$tj_resiko', '$fee_for_service', '$tj_tpbri', '$tj_mcu', '$tj_bpjs', '$lembur', '$thr', '$tj_lain', '$gaji_bruto', '$gaji_netto', '$total_potongan', '$obat', '$seragam', '$kredit', '$pelatihan', '$uang_gedung', '$total_potongan_slip', '$transfer' ,'1')");
                 // if ($tambah) {
                 //     echo "berhasil simpan data";
                 // }
                 // else {
                 //    echo "Error....".$koneksi->error;
                 // }
            }
        }
	}

    // opsi untuk import secara otomatis tanpa menambahkan data yang ada di halaman transakai input gaji
	$bulan2 = $_SESSION['bulan2']=$bulan;
    $tahun2 = $_SESSION['tahun2']=$tahun;
    
    $ambil_gaji_bulan = $koneksi->query("SELECT * FROM transaksi_gaji WHERE periode_bulan='$bulan2' AND periode_tahun='$tahun2'");
    $gaji_bulan_cocok = $ambil_gaji_bulan->num_rows;

    if ($gaji_bulan_cocok==1) {
            // $ambil = $koneksi->query("SELECT * FROM gaji WHERE bulan='$bulan2' AND tahun='$tahun2' AND status='1'");
            // Inisialisasi array untuk menyimpan total pendapatan
        $array_total_gaji = array();
        
        $ambil = $koneksi->query("SELECT total_pendapatan FROM gaji WHERE bulan='$bulan2' AND tahun='$tahun2' AND status='1'");
        $jml_keinput = mysqli_num_rows($ambil);

        while ($dta_gaji = $ambil->fetch_assoc()) {
            // Masukkan total pendapatan dari setiap baris ke dalam array
            $array_total_gaji[] = $dta_gaji['total_pendapatan'];
        }

            // Hitung total pendapatan dari semua elemen array
        $total_pendapatan = array_sum($array_total_gaji);

    // update master transaksi gaji
        $koneksi_master = $koneksi->query("SELECT * FROM transaksi_gaji WHERE periode_bulan='$bulan2' AND periode_tahun='$tahun2'");
        $data = $koneksi_master->fetch_assoc();

        $jml_karyawan= $data['jumlah_karyawan'];
        $kode_transaksi= $data['kode_transaksi'];
        $status_gaji ='selesai';


        if ($jml_karyawan==$jml_keinput) {
            // update data transaksi gaji
            $koneksi->query("UPDATE transaksi_gaji SET tgl_transaksi='$tanggal_hari_ini',
                proses='$jml_keinput',
                total_gaji='$total_pendapatan',
                status_transaksi='$status_gaji' WHERE kode_transaksi='$kode_transaksi'");
        }
        else {
            $koneksi->query("UPDATE transaksi_gaji SET tgl_transaksi='$tanggal_hari_ini',
                proses='$jml_keinput',
                total_gaji='$total_pendapatan' WHERE kode_transaksi='$kode_transaksi'");
        }

        $_SESSION['pesan'] = 'Data Transaksi Gaji Periode '.$bulan.' Tahun '.$tahun.' Berhasil di Simpan !';
        $_SESSION['info'] = 'Berhasil !';
        $_SESSION['warna'] = 'success';

        unset($_SESSION['bulan2']);
        unset($_SESSION['tahun2']);

        echo "<script>location='../../../data-gaji';</script>";
    }
    else {
        // tambahkan ke database transaksi_gaji
    }
}


?>