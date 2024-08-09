<?php 


include $link."public/plugins/qr/qrlib.php";
$tempdir = $link."public/file/qr/"; 
// ambil data pegawai
$ambil_data_peg = $koneksi->query("SELECT * FROM pegawai WHERE nopeg !=123");
while ($data_master_pegawai = mysqli_fetch_assoc($ambil_data_peg)) 
{
	$nopeg_for_qr = $data_master_pegawai['nopeg'];
	$nama_for_qr = $data_master_pegawai['nama'];

	$files_qr = glob($tempdir . $nopeg_for_qr.'.png');

	if (count($files_qr) <= 0) {
		$teks_qrcode = $nama_for_qr;
		$namafile    = $nopeg_for_qr.".png";
		$quality        ="H";
		$ukuran  =5; 
		$padding =1;
		\QRcode::png($teks_qrcode, $tempdir . $namafile, $quality, $ukuran, $padding);
	} 
}

?>