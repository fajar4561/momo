<?php 
session_start();

require '../../../env/koneksi.php';


$tanggal_hari_ini = date("Y-m-d");
$bulan = $_SESSION['bulan'];
$tahun = $_SESSION['tahun'];

$length = count($_POST['nopeg']);

echo '<pre>';
print_r($_POST);
echo '</pre>';

// Loop melalui setiap data
for ($i = 0; $i < $length; $i++) {
    // Mengambil nilai untuk setiap kunci
    $nopeg                    = $_POST['nopeg'][$i];
    $upah_awal                = (int) preg_replace("/[^0-9]/", "", $_POST['upah_awal'][$i]);
    $penambahan               = (int) preg_replace("/[^0-9]/", "", $_POST['penambahan'][$i]);
    // upah setelah penambahan
    $upah_akhir               = $upah_awal + $penambahan;
    //Tunjangan
    $tj_jabatan               = (int) preg_replace("/[^0-9]/", "", $_POST['tj_jabatan'][$i]);
    $tj_fungsional            = (int) preg_replace("/[^0-9]/", "", $_POST['tj_fungsional'][$i]);
    $tj_resiko                = (int) preg_replace("/[^0-9]/", "", $_POST['tj_resiko'][$i]);
    $tj_tpbri                 = (int) preg_replace("/[^0-9]/", "", $_POST['tj_tpbri'][$i]);
    $fee_for_service          = (int) preg_replace("/[^0-9]/", "", $_POST['fee_for_service'][$i]);
    $lembur                   = (int) preg_replace("/[^0-9]/", "", $_POST['lembur'][$i]);
    $thr                      = (int) preg_replace("/[^0-9]/", "", $_POST['thr'][$i]);
    $tj_lain                  = (int) preg_replace("/[^0-9]/", "", $_POST['tj_lain'][$i]);
    // total tunjangan
    $total_tunjangan          = $tj_jabatan+$tj_fungsional+$tj_resiko+$tj_tpbri+$fee_for_service+$lembur+$thr+$tj_lain;


    // potongan
    $bpjs_tenaga              = (int) preg_replace("/[^0-9]/", "", $_POST['bpjs_tenaga'][$i]);
    $bpjs_kesehatan           = (int) preg_replace("/[^0-9]/", "", $_POST['bpjs_kesehatan'][$i]);
    $pph21                    = (int) preg_replace("/[^0-9]/", "", $_POST['pph21'][$i]);
    $ppni                     = (int) preg_replace("/[^0-9]/", "", $_POST['ppni'][$i]);
    $lain                     = (int) preg_replace("/[^0-9]/", "", $_POST['lain'][$i]);
    // total potongan
    $total_potongan           = $bpjs_tenaga+$bpjs_kesehatan+$pph21+$ppni+$lain;

    echo '<pre>';
print_r($nopeg);
echo '</pre>';
}



?>