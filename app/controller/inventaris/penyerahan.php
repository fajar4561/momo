<?php 
session_start();


ob_start();
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
require('../../../public/plugins/fpdf/fpdf.php');
include "../../../public/plugins/qr/qrlib.php";
$tempdir = "../../../public/file/inv/";


// kode transaksi penyerahan inv
$today = date("Ymd");
$konek= mysqli_query($koneksi, "SELECT max(kode_penyerahan) as kodebesar FROM penyerahan ");
    if ($row = mysqli_fetch_array($konek)) {
        // Ambil nilai kode_penyerahan
        $kode_penyerahan = $row['kodebesar'];

        // Jika tidak ada kode_penyerahan yang ada, atur urut ke 1
        if (is_null($kode_penyerahan)) {
            $urut = 1; // Mulai dari 1 jika tidak ada data
        } else {
            $urut = (int) $kode_penyerahan; // Ambil nilai kode terakhir
            $urut++; // Increment urut
        }

        // Format kode_penyerahan baru menjadi 6 digit
        $kode_penyerahan = sprintf("%06d", $urut);
    }



function toRoman($number) {
    $map = [
        1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
        100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
        10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV',
        1 => 'I'
    ];
    
    $roman = '';
    
    foreach ($map as $value => $symbol) {
        while ($number >= $value) {
            $roman .= $symbol;
            $number -= $value;
        }
    }
    
    return $roman;
}


$tgl    =       $_POST['tgl'];
$unit   =       $_POST['unit'];
$unit2  =       $_POST['unit'];
$tahun =        date("y", strtotime($tgl));

// ambil lantai
$konek_lanti = $koneksi->query("SELECT * FROM unit_inv WHERE unit='$unit' ");
$data = $konek_lanti->fetch_assoc();
$lantai = toRoman($data['lantai']);


// penentuan ruangan dan unitnya
if ($unit == 'CASEMIX') {
    $unit = 'CASEMIX BPJS';
} else if ($unit == 'HUMAS') {
    $unit = 'R.H&M';
} else if ($unit == 'DIREKSI') {
    $unit = 'DIREKTUR';
} else if ($unit == 'SEKRETARIAT') {
    $unit = 'SEKRETARIS'; // Koreksi penulisan
} else {
    $unit = $_POST['unit']; // Menggunakan nilai aslinya jika tidak ada kondisi yang cocok
}

foreach ($_POST['ruangan'] as $index => $key ) 
{
    
    if (empty($_POST['ruangan']) || count(array_filter($_POST['ruangan'])) === 0) {
        $ruangan = $unit;
    }
    else {
        $ruangan= $key;
    }

        $id =$_POST['id'][$index];
        $ambil= $koneksi->query("SELECT * FROM stok_barang WHERE id='$id'");
        $pecah = $ambil->fetch_assoc();
        $kode_barang = $pecah['kode_barang'];
        $nama_barang = $pecah['nama_barang'];
        $merk = $pecah['merk'];
        $tipe = $pecah['tipe'];
        $foto = $pecah['foto_barang'];
        $stok = $pecah['stok']-1;
        $koneksi->query("UPDATE stok_barang SET stok='$stok' WHERE id='$id'");


        $lantai = toRoman($data['lantai']);

        $kode = 'RSPM/' . $kode_barang . '/' . $ruangan . '/' . $lantai . '/' . $tahun . '/';

        $kode2 = 'RSPM/' . $kode_barang . '/' . $ruangan . '/' . $lantai . '/';

        $quer = mysqli_query($koneksi, "SELECT max(kode_inv) as kodeTerbesar FROM detail_penyerahan WHERE kode_inv LIKE '$kode2%'");
        $dat = mysqli_fetch_array($quer);

        $kodeProduk = $dat['kodeTerbesar'];

        // Cek jika $kodeProduk null
        if ($kodeProduk) 
        {
            $urutan = (int) substr($kodeProduk, strrpos($kodeProduk, '/') + 1); // Ambil angka setelah karakter terakhir '/'
            $urutan++;
        } else {
            $urutan = 1; // Jika tidak ada, mulai dari 1
        }

        $huruf = $kode;
        $kodeProduk = $huruf . sprintf("%03s", $urutan);


        $koneksi->query("INSERT INTO detail_penyerahan (id,kode_penyerahan,kode_inv,unit,ruangan,nama_barang,kode_barang,merk,tipe,foto_barang) VALUES(null, '$kode_penyerahan', '$kodeProduk', '$unit2', '$ruangan', '$nama_barang', '$kode_barang', '$merk', '$tipe', '$foto')");


        // QR KODE
        if ($unit == $ruangan) {
            $teks_qrcode = $kodeProduk ."\nNama Barang: " . $nama_barang." (".$merk." ".$tipe.")"."\nLokasi: ".$unit;
        }
        else {
            $teks_qrcode = $kodeProduk ."\nNama Barang: " . $nama_barang." (".$merk." ".$tipe.")"."\nLokasi: ".$unit." (".$ruangan.")";
        }

        // simpan file ke qrcode png
        $namafile = str_replace('/', '_', $kodeProduk) . ".png";
        $quality        ="H";
        $ukuran  =5; 
        $padding =1;
        \QRcode::png($teks_qrcode, $tempdir . $namafile, $quality, $ukuran, $padding);


}

// petugas entri
$idUser = $_SESSION["username"];
$sqlUser = "SELECT * FROM pegawai WHERE username = '$idUser' ";
$ambilUser = $koneksi->query($sqlUser);
$pecahuser = $ambilUser->fetch_assoc();
$nopeg = $pecahuser['nopeg'];

// simpan ke penyerahan

$koneksi->query("INSERT INTO penyerahan (id,kode_penyerahan,tgl_penyerahan,unit,petugas) VALUES(null, '$kode_penyerahan', '$tgl', '$unit2', '$nopeg')");

unset($_SESSION['inv']);

// ambil beradasarkan kode_penyerahan
$konek_penyerahan = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_penyerahan='$kode_penyerahan'");

// Buat objek FPDF satu kali di luar loop
$pdf = new FPDF();

while ($konek = mysqli_fetch_assoc($konek_penyerahan)) {
    $kode_get = $konek['kode_inv'];
    $ambil_get = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_inv ='$kode_get'");
    $fetch = $ambil_get->fetch_assoc();

    $unit_get = $fetch['unit'];
    $ruangan_get = $fetch['ruangan'];
    $kod = $fetch['kode_inv'];
    $kode_penyerahan_get  = $fetch['kode_penyerahan'];

    $ambil_utama = $koneksi->query("SELECT * FROM penyerahan WHERE kode_penyerahan='$kode_penyerahan_get'");
    $data2 = $ambil_utama->fetch_assoc();

    // ambil tgl stok
    $nama_bar = $fetch['nama_barang'];
    $merk_bar = $fetch['merk'];
    $tipe_bar = $fetch['tipe'];
    $kode_bar = $fetch['kode_barang'];
    $konek_beli = $koneksi->query("SELECT * FROM detail_pembelian WHERE nama_barang='$nama_bar' AND kode_barang='$kode_bar' AND merk='$merk_bar' AND tipe='$tipe_bar' ");
    $dat1 = $konek_beli->fetch_assoc(); 

    $tempdir = "../../../public/file/inv/";
    $namafile = str_replace('/', '_', $kode_get) . ".png";

    // Tambahkan halaman baru untuk setiap item
    $pdf->AddPage('L', 'A4');  // Dipanggil di dalam loop, cukup satu kali per item

    $pageWidth = 60;  
    $pageHeight = 30; 
    $gambarPath = $tempdir . $namafile;

    $lebar_logo = 60;
    $tinggi_logo = 0; 
    $x_logo = ($pageWidth - $lebar_logo) / 2;
    $y_logo = 0;
    $logo_path = '../../../public/img/kop2.png'; 

    $pdf->Image($gambarPath, 5, 10, 18, 0);
    $pdf->Image($logo_path, $x_logo + 2.5, $y_logo, $lebar_logo, $tinggi_logo, 'png');

    $pdf->SetXY(23, 9);
    $pdf->SetFont('Arial', 'B', 5.5);
    $pdf->Cell(1, 5, $kod, 0, 0);

    $pdf->SetFont('Arial', '', 5.5);
    $pdf->SetXY(23, 12);
    $pdf->Cell(1, 5, 'Nama', 0, 0);
    $pdf->SetXY(32, 12);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 12);
    $pdf->Cell(1, 5, $fetch['nama_barang'], 0, 0);

    $pdf->SetXY(23, 14);
    $pdf->Cell(1, 5, 'Merk/Tipe', 0, 0);
    $pdf->SetXY(32, 14);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 14);
    $pdf->Cell(1, 5, $fetch['merk'].' '.$fetch['tipe'], 0, 0);

    $pdf->SetXY(23, 16);
    $pdf->Cell(1,5,'Tgl Beli',0,0);
    $pdf->SetXY(32, 16);
    $pdf->Cell(1,5,':',0,0);
    $pdf->SetXY(34, 16);
    $pdf->Cell(1,5,tgl_indo($dat1['tgl_transaksi']),0,0);

    $pdf->SetXY(23, 18);
    $pdf->Cell(1, 5, 'Tgl Pasang', 0, 0);
    $pdf->SetXY(32, 18);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 18);
    $pdf->Cell(1, 5, tgl_indo($data2['tgl_penyerahan']), 0, 0);

    $pdf->SetXY(23, 20);
    $pdf->Cell(1, 5, 'Unit', 0, 0);
    $pdf->SetXY(32, 20);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 20);
    $pdf->Cell(1, 5, $unit_get, 0, 0);

    $pdf->SetXY(23, 22);
    $pdf->Cell(1, 5, 'Ruangan', 0, 0);
    $pdf->SetXY(32, 22);
    $pdf->Cell(1, 5, ':', 0, 0);
    $pdf->SetXY(34, 22);
    $pdf->Cell(1, 5, $ruangan_get, 0, 0);
}

// Bersihkan buffer output dan tampilkan PDF

$filename = 'Label-'.$unit.'-'.$kode_penyerahan.'.pdf';
$tempFile = '../../../public/file/inv/pdf' . $filename; // Folder temp untuk menyimpan sementara

// Simpan PDF di server
$pdf->Output('F', $tempFile); // 'F' untuk menyimpan file di server

if (ob_get_length()) ob_end_clean();

echo "<script>
    function downloadFile() {
        const link = document.createElement('a');
        link.href = '$tempFile';
        link.download = '$filename';
        link.click();
        
        window.location.href = '../../../data-inventaris';
    }
    downloadFile();
</script>";




?>
