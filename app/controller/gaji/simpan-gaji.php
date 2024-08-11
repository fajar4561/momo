<?php 
session_start();

require '../../../env/koneksi.php';


$tanggal_hari_ini = date("Y-m-d");
$bulan = $_SESSION['bulan'];
$tahun = $_SESSION['tahun'];

$length = count($_POST['nopeg']);

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
    $total_potongan1          = $bpjs_tenaga+$bpjs_kesehatan+$pph21+$ppni+$lain;

    // Potongan lainnya
    $obat                     = (int) preg_replace("/[^0-9]/", "", $_POST['obat'][$i]);
    $seragam                  = (int) preg_replace("/[^0-9]/", "", $_POST['seragam'][$i]);
    $kredit                   = (int) preg_replace("/[^0-9]/", "", $_POST['kredit'][$i]);
    $pelatihan                = (int) preg_replace("/[^0-9]/", "", $_POST['lain2'][$i]);
    // Total potongan lainnya
    $total_potongan_lainnya   = $obat+$seragam+$kredit+$pelatihan ;
    //total potongan keseluruhan
    $total_potongan           = $total_potongan1 + $total_potongan_lainnya;

    // gaji bruto
    $bruto                    = $upah_akhir+$total_tunjangan;

    // gaji netto
    $netto                    = $bruto - $total_potongan1;

    // gaji yang di transfer
    $transfer                 = $netto - $total_potongan_lainnya;

    // update ke database
    // tambah kondisi untuk mengatasi apabila form tidak terisi

    if ($transfer>0) {
        $koneksi->query("UPDATE gaji SET tgl_gaji='$tanggal_hari_ini',
            upah_awal='$upah_awal',
            penambahan='$penambahan',
            revisi='$upah_akhir',
            tj_jbtn='$tj_jabatan',
            tj_fungsional='$tj_fungsional',
            tj_resiko='$tj_resiko',
            fee_for_servis='$fee_for_service',
            tj_tpbri =$tj_tpbri,
            lembur='$lembur',
            thr='$thr',
            tj_lain='$tj_lain',
            bruto='$bruto',
            total_potongan='$total_potongan1',
            total_pendapatan='$netto',
            obat='$obat',
            seragam='$seragam',
            kredit='$kredit',
            pelatihan='$pelatihan',
            total_potongan_slip ='$total_potongan_lainnya'
            transfer='$transfer',
            status='1' WHERE nopeg='$nopeg' AND bulan ='$bulan' AND tahun='$tahun'");

    }
   
}

 // ambil data transaksi yang status 1
$ambil = $koneksi->query("SELECT * FROM gaji WHERE bulan='$bulan' AND tahun='$tahun' AND status='1'");
$jml_keinput = mysqli_num_rows($ambil);
while ($dta_gaji=mysqli_fetch_array($ambil))
{
  $array_total_gaji[] = $dta_gaji['total_pendapatan'];
}
$total_pendapatan = array_sum($array_total_gaji);

// update master transaksi gaji
$koneksi_master = $koneksi->query("SELECT * FROM transaksi_gaji WHERE periode_bulan='$bulan' AND periode_tahun='$tahun'");
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



// alihkan halaman
$_SESSION['pesan'] = 'Data Transaksi Gaji Periode '.$bulan.' Tahun '.$tahun.' Berhasil di Simpan !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';

unset($_SESSION['tahun']);
unset($_SESSION['bulan']);

echo "<script>location='../../../data-gaji';</script>";


?>