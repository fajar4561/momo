<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require '../../../env/koneksi.php';
require '../../../vendor/autoload.php';
require '../../../env/log.php'; 


use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


$total_gaji_netto = 0;
$jumlah_data_input = 0;
$tanggal_hari_ini = date("Y-m-d");
$parameter_update = false;
$parameter_insert = false;
$bulan_insert = null;
$tahun_insert = null;

// =======================================================
// VALIDASI FILE
// =======================================================
if (!isset($_FILES['input-file']) || $_FILES['input-file']['error'] !== 0) {
    $_SESSION['pesan'] = 'File tidak ditemukan!';
    $_SESSION['info']  = 'Gagal Import';
    $_SESSION['warna'] = 'danger';
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
}

$file = $_FILES['input-file']['tmp_name'];
$ext  = strtolower(pathinfo($_FILES['input-file']['name'], PATHINFO_EXTENSION));

if ($ext !== 'xlsx') {
    $_SESSION['pesan'] = 'Format file wajib .xlsx';
    $_SESSION['info']  = 'Gagal Import';
    $_SESSION['warna'] = 'danger';
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
}

// =======================================================
// FUNGSI CLEAN NUMBER
// =======================================================
function clean_number($value) {
    $clean = str_replace(['.', ',', ' '], '', trim($value));
    return is_numeric($clean) ? (float)$clean : 0;
}

// =======================================================
// LOAD EXCEL
// =======================================================
$reader = new Xlsx();
$sheet  = $reader->load($file)->getActiveSheet();
$data   = $sheet->toArray();
// array_shift($data);

// =======================================================
// GENERATE KODE TRANSAKSI BARU
// =======================================================
$q = $koneksi->query("SELECT MAX(kode_transaksi) AS max_code FROM transaksi_gaji");
$r = $q->fetch_assoc();
$last   = $r['max_code'];
$urut   = (int)substr($last, 3, 3) + 1;
$kode_baru = "GJ-" . sprintf("%03d", $urut);

// =======================================================
// PREPARED STATEMENT: CEK DATA GAJI SUDAH ADA
// =======================================================
$stmt_cek = $koneksi->prepare("
    SELECT id, kode_transaksi FROM gaji WHERE nopeg=? AND bulan=? AND tahun=?
");

// =======================================================
// PREPARED STATEMENT UPDATE GAJI
// =======================================================
$stmt_update = $koneksi->prepare("
    UPDATE gaji SET 
        tgl_gaji=?, 
        upah_awal=?, penambahan=?, revisi=?,
        bpjs_kerja=?, bpjs_kes=?, pph21=?, ppni=?, lelayu=?, lain=?,
        tj_jbtn=?, tj_fungsional=?, tj_resiko=?, fee_for_servis=?,
        tj_tpbri=?, tj_mcu=?, tj_bpjs=?, fee_pembimbing=?, lembur=?, thr=?, tj_lain=?,
        bruto=?, total_pendapatan=?, total_potongan=?,
        obat=?, seragam=?, kredit=?, pelatihan=?, acls_rs=?, acls_ppni=?,
        total_potongan_slip=?, transfer=?, status='1'
        WHERE nopeg=? AND bulan=? AND tahun=?
");

// =======================================================
// PREPARED STATEMENT INSERT GAJI
// =======================================================
$stmt_insert = $koneksi->prepare("
    INSERT INTO gaji (
        kode_transaksi, bulan, tahun, no_gaji, tgl_gaji, nopeg,
        upah_awal, penambahan, revisi,
        bpjs_kerja, bpjs_kes, pph21, ppni, lelayu, lain,
        tj_jbtn, tj_fungsional, tj_resiko, fee_for_servis,
        tj_tpbri, tj_mcu, tj_bpjs, fee_pembimbing, lembur, thr, tj_lain,
        bruto, total_pendapatan, total_potongan,
        obat, seragam, kredit, pelatihan, acls_rs, acls_ppni,
        total_potongan_slip, transfer, status
    )
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
");


// =======================================================
// LOOP DATA EXCEL
// =======================================================
$tanggal = date("Y-m-d");
$no = 0;

foreach ($data as $row) {

    // echo "<pre>";
    // print_r($row); 
    // echo "</pre>";

    $nopeg = str_replace("'", "", $row[1]);
    $bulan = $row[5];
    $tahun = $row[6];

    if (!$nopeg || !$bulan || !$tahun) continue;

    // Angka numeric
   // 1. Total Gaji
    $upah_awal = isset($row[7]) ? clean_number($row[7]) : 0;
    $penambahan = isset($row[8]) ? clean_number($row[8]) : 0;
    $revisi = isset($row[9]) ? clean_number($row[9]) : 0;

        // 2. tunjangan
    $tj_jabatan = isset($row[10]) ? clean_number($row[10]) : 0;
    $tj_fungsional = isset($row[11]) ? clean_number($row[11]) : 0;
    $tj_resiko = isset($row[12]) ? clean_number($row[12]) : 0;
    $tj_tpbri = isset($row[13]) ? clean_number($row[13]) : 0;
    $fee_for_service = isset($row[14]) ? clean_number($row[14]) : 0;
    $tj_mcu = isset($row[15]) ? clean_number($row[15]) : 0;
    $tj_bpjs = isset($row[16]) ? clean_number($row[16]) : 0;
    $fee_pembimbing = isset($row[17]) ? clean_number($row[17]) : 0;
    $lembur = isset($row[18]) ? clean_number($row[18]) : 0;
    $thr = isset($row[19]) ? clean_number($row[19]) : 0;
    $tj_lain = isset($row[20]) ? clean_number($row[20]) : 0;

        // 3. total gaji kotor
    $gaji_bruto = isset($row[21]) ? clean_number($row[21]) : 0;

        //4. potongan
    $bpjs_tk = isset($row[22]) ? clean_number($row[22]) : 0;
    $bpjs_kes =  isset($row[23]) ? clean_number($row[23]) : 0;
    $pph21 = isset($row[24]) ? clean_number($row[24]) : 0;
    $ppni = isset($row[25]) ? clean_number($row[25]) : 0;
    $lelayu = isset($row[26]) ? clean_number($row[26]) : 0;
    $potongan_lain = isset($row[27]) ? clean_number($row[27]) : 0;
    $total_potongan = isset($row[28]) ? clean_number($row[28]) : 0;

    //5. Gaji bersih
    $gaji_netto = isset($row[29]) ? clean_number($row[29]) : 0;

    // 6. Potongan diluar slip
    $obat = isset($row[30]) ? clean_number($row[30]) : 0;
    $seragam = isset($row[31]) ? clean_number($row[31]) : 0;
    $kredit = isset($row[32]) ? clean_number($row[32]) : 0;
    $pelatihan = isset($row[33]) ? clean_number($row[33]) : 0;
    $acls_rs = isset($row[34]) ? clean_number($row[34]) : 0;
    $acls_ppni = isset($row[35]) ? clean_number($row[35]) : 0;
    $total_potongan_slip = isset($row[36]) ? clean_number($row[36]) : 0;
    $transfer = isset($row[37]) ? clean_number($row[37]) : 0;

    // ===================================================
    // CEK SUDAH ADA / TIDAK
    // ===================================================
    $stmt_cek->bind_param("sss", $nopeg, $bulan, $tahun);
    $stmt_cek->execute();
    $cek = $stmt_cek->get_result();

    if ($cek->num_rows > 0) {
            if ($gaji_netto > 0 && $transfer > 0) {
                // update data.
                $stmt_update->bind_param(
                    "s" . str_repeat("d", 31) . "sss",   // total 36 parameter
                    $tanggal,
                    $upah_awal, $penambahan, $revisi,
                    $bpjs_tk, $bpjs_kes, $pph21, $ppni, $lelayu, $potongan_lain,
                    $tj_jabatan, $tj_fungsional, $tj_resiko, $fee_for_service,
                    $tj_tpbri, $tj_mcu, $tj_bpjs, $fee_pembimbing, $lembur, $thr, $tj_lain,
                    $gaji_bruto, $gaji_netto, $total_potongan,
                    $obat, $seragam, $kredit, $pelatihan, $acls_rs, $acls_ppni,
                    $total_potongan_slip, $transfer,
                    $nopeg, $bulan, $tahun
                );



            if ($stmt_update->execute()) {
                // Periksa jumlah row yang berubah
                if ($stmt_update->affected_rows > 0) {
                    $row_cek = $cek->fetch_assoc();
                    $kode_transaksi_lama = $row_cek['kode_transaksi'];
                    $parameter_update = true ;
                    $keterangan_log =" Berhasil UPDATE data <strong>{$nopeg}</strong> kode gaji <strong>{$kode_baru}</strong>";
                    $jenis_transaksi = 'Import Gaji';
                    $jumlah_data_input++;            // tambah jumlah data
                    $total_gaji_netto += $gaji_netto; // akumulasi nilai gaji netto
                    simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");
                } else {
                    echo "Query sukses, tapi tidak ada data yang berubah <br>";
                }
            } else {
                // Jika error
                echo "Gagal UPDATE! Error: " . $stmt_update->error . "<br>";
            }
        }
    }
    else {

        if ($gaji_netto > 0 && $transfer > 0) {
            $no++;
            $status =1;

            $stmt_insert->bind_param(
                // 6 string  + 31 double + 1 string (status)
                "ssssss" .           // kode_transaksi, bulan, tahun, no_gaji, tgl_gaji, nopeg
                str_repeat("d", 31) . // semua nilai numeric (31 kolom)
                "s",                 // status (string)
                
                $kode_baru, $bulan, $tahun, $no, $tanggal, $nopeg,
                $upah_awal, $penambahan, $revisi,
                $bpjs_tk, $bpjs_kes, $pph21, $ppni, $lelayu, $lain,
                $tj_jabatan, $tj_fungsional, $tj_resiko, $fee_for_service,
                $tj_tpbri, $tj_mcu, $tj_bpjs, $fee_pembimbing, $lembur, $thr, $tj_lain,
                $gaji_bruto, $gaji_netto, $total_potongan,
                $obat, $seragam, $kredit, $pelatihan, $acls_rs, $acls_ppni,
                $total_potongan_slip, $transfer, $status
            );


            if ($stmt_insert->execute()) {
                $bulan_insert = $bulan;    // SIMPAN bulan dari excel
                $tahun_insert = $tahun;    // SIMPAN tahun dari excel
                $parameter_insert = true ;
                $jumlah_data_input++;            // tambah jumlah data
                $total_gaji_netto += $gaji_netto; // akumulasi nilai gaji netto
                $keterangan_log = "Berhasil INSERT data, ID baru: <strong>" . $stmt_insert->insert_id . "</strong>";
                $jenis_transaksi = 'Import Gaji';
                simpanLog($koneksi, "$jenis_transaksi", "$keterangan_log");
            } else {
                echo "Gagal INSERT! Error: " . $stmt_insert->error . "<br>";
            }
        }
    }
}

// =======================================================
// Update / insert data transaksi_gaji
// =======================================================
// jika insert maka di transaksi_gaji juga insert jika update maka di transaksi_gaji juga update
if ($parameter_update) {
    $update_transaksi_gaji = $koneksi->query("UPDATE transaksi_gaji SET tgl_transaksi='$tanggal_hari_ini', proses=$jumlah_data_input, total_gaji=$total_gaji_netto, status_transaksi='selesai', email='1' WHERE kode_transaksi='$kode_transaksi_lama' ");
    if ($update_transaksi_gaji) {
        echo "Berhasil update data transaksi gaji";
    }
    else {
        echo "gagal update transaksi gaji.... ".$koneksi->error;
    }

    // =======================================================
    // SELESAI
    // =======================================================
    header("Location: simpan-pdf.php?kode=".$kode_transaksi_lama);
    exit;

} elseif ($parameter_insert) {
    $tambah_transaksi_gaji = $koneksi->query("INSERT INTO transaksi_gaji (id,kode_transaksi,tgl_transaksi,periode_bulan,periode_tahun,jumlah_karyawan,proses,total_gaji,status_transaksi,email) 
        VALUES(null, '$kode_baru', '$tanggal_hari_ini', '$bulan_insert', '$tahun_insert', '$jumlah_data_input', '$jumlah_data_input', '$total_gaji_netto', 'selesai' ,'0')");

    if ($tambah_transaksi_gaji) {
        echo "Berhasil tambah data transaksi gaji";
    }
    else {
        echo "gagal tambah transaksi gaji.... ".$koneksi->error;
    }
    // =======================================================
    // SELESAI
    // =======================================================
    header("Location: simpan-pdf.php?kode=".$kode_baru);
    exit;
}




?>
