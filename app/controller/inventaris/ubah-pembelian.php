<?php 
session_start();

require '../../../env/koneksi.php';
// deklarasi variabel
$kode = $_POST['kode'];
$tgl = $_POST['tgl_beli'];
$suplier = $_POST['suplier'];
$faktur = $_POST['faktur'];
$total = 0;

// mengambil data transaksi lama
$ambil_lama = $koneksi->query("SELECT * FROM detail_pembelian WHERE kode_transaksi='$kode'");
while ($data = mysqli_fetch_assoc($ambil_lama)) {
	// deklarasi variabel data pembelian berdasarkan kode transaksi
	$nama_barang_lama = $data['nama_barang'];
	$kode_barang_lama = $data['kode_barang'];
	$merk_lama = $data['merk'];
	$tipe_lama = $data['tipe'];
	$no_seri_lama = $data['no_seri'];
	$jumlah_lama = $data['jumlah'];

	// ambil data yang ada di stok
	$ambil_stok = $koneksi->query("SELECT * FROM stok_barang WHERE LOWER(nama_barang) = LOWER('$nama_barang_lama') AND kode_barang = '$kode_barang_lama' AND LOWER(merk) = LOWER('$merk_lama') AND LOWER(tipe) = LOWER('$tipe_lama')");
	$data_stok = $ambil_stok->fetch_assoc();

	$jml_stok = $data_stok['stok'];
	$stok_kurang = $jml_stok-$jumlah_lama;

	if ($stok_kurang < 0) {
		$_SESSION['pesan'] = 'Data Pembelian dengan Kode Transaksi <strong>'.$kode.'</strong> Gagal di simpan !';
		$_SESSION['info'] = 'Gagal !';
		$_SESSION['warna'] = 'danger';
		echo "<script>location='../../../data-pembelian';</script>"; 
	}
	else {
		$koneksi->query("UPDATE stok_barang SET stok='$stok_kurang' WHERE LOWER(nama_barang) = LOWER('$nama_barang_lama') AND kode_barang = '$kode_barang_lama' AND LOWER(merk) = LOWER('$merk_lama') AND LOWER(tipe) = LOWER('$tipe_lama')");
		
	}
}

// hapus data detail pembelian   
$koneksi->query("DELETE FROM detail_pembelian WHERE kode_transaksi='$kode'");
$koneksi->query("DELETE FROM pembelian_barang WHERE kode_transaksi='$kode'");


foreach ($_SESSION["nama_inv"] as $id => $jml)
{
	$nama = $_SESSION['nama_inv'][$id];
	$kode_barang = $_SESSION['kode_inv'][$id];
	$merk = $_SESSION['merk_inv'][$id];
	$tipe = $_SESSION['tipe_inv'][$id];
	$no_seri = $_SESSION['no_seri_inv'][$id];
	$harga = $_SESSION['harga_inv'][$id];
	$jumlah = $_SESSION['jumlah_inv'][$id];
	$satuan = $_SESSION['satuan_inv'][$id];
	$garansi = $_SESSION['garansi_inv'][$id];
	$bulan_garansi = $_SESSION['bulan_garansi_inv'][$id];
	$fotobaru = $_SESSION['foto_inv'][$id];
	$tot = $_SESSION["harga_inv"][$id]*$_SESSION["jumlah_inv"][$id];
	$total += $tot;


	// simpan data ke database tabel detail pembelian barang

	$simpan_detail = $koneksi->query("INSERT INTO detail_pembelian (id,kode_transaksi,tgl_transaksi,nama_barang,kode_barang,merk,tipe,no_seri,harga,jumlah,satuan,masa_garansi,garansi,foto_barang) 
		VALUES(null, '$kode', '$tgl', '$nama', '$kode_barang', '$merk', '$tipe', '$no_seri', '$harga', '$jumlah', '$satuan', '$garansi', '$bulan_garansi', '$fotobaru')");

	if ($simpan_detail) {
		// code...
	}
	else {
		echo "Gagal Simpan detail pembelian barang  ".$koneksi->error ;
	}

	// simpan stok barang
	// chek apakah barang sudah ada di database apa belum
	$ambil = $koneksi->query("SELECT * FROM stok_barang WHERE LOWER(nama_barang) = LOWER('$nama') AND kode_barang = '$kode_barang' AND LOWER(merk) = LOWER('$merk') AND LOWER(tipe) = LOWER('$tipe')");
	$sama = $ambil->num_rows;
	$pecah = $ambil->fetch_assoc();

	if ($sama == 1) {
		// update stok
		// ambil jumlah stok yang lama
		$stok_lama = $pecah['stok'];
		$stok = $stok_lama+$jumlah;
		// simpan data
		$koneksi->query("UPDATE stok_barang SET stok='$stok' WHERE LOWER(nama_barang) = LOWER('$nama') AND kode_barang = '$kode_barang' AND LOWER(merk) = LOWER('$merk') AND LOWER(tipe) = LOWER('$tipe') ");

	}
	else {
		// tambahkan data baru di stok
		$simpan_stok = $koneksi->query("INSERT INTO stok_barang (id,nama_barang,kode_barang,merk,tipe,foto_barang,stok) 
		VALUES(null, '$nama', '$kode_barang', '$merk', '$tipe', '$fotobaru', '$jumlah')");

		if ($simpan_stok) {
		// code...
		}
		else {
			echo "Gagal Tambah Data Stok Barang  ".$koneksi->error ;
		}

	}

}

// simpan data ke tabel pembelian barang
// ambil petugas yang ngisi form
$idUser = $_SESSION["username"];
    // ambil data user yg login
$sqlUser = "SELECT * FROM pegawai WHERE username = '$idUser' ";
$ambilUser = $koneksi->query($sqlUser);
$pecahuser = $ambilUser->fetch_assoc();

$admin = $pecahuser['nopeg'];
$simpan_beli = $koneksi->query("INSERT INTO pembelian_barang (id,kode_transaksi,tgl_transaksi,suplier,faktur,total_pembelian,admin) VALUES(null, '$kode', '$tgl', '$suplier', '$faktur', '$total', '$admin')");

if ($simpan_beli) {
		// code...
}
else {
	echo "Gagal Tambah Data pembelian Barang  ".$koneksi->error ;
}

// unset session
unset($_SESSION['nama_inv']);
unset($_SESSION['kode_inv']);
unset($_SESSION['merk_inv']);
unset($_SESSION['tipe_inv']);
unset($_SESSION['no_seri_inv']);
unset($_SESSION['harga_inv']);
unset($_SESSION['jumlah_inv']);
unset($_SESSION['satuan_inv']);
unset($_SESSION['garansi_inv']);
unset($_SESSION['bulan_garansi_inv']);
unset($_SESSION['foto_inv']);

$_SESSION['pesan'] = 'Data Pembelian dengan Kode Transaksi <strong>'.$kode.'</strong> Berhasil di simpan !';
$_SESSION['info'] = 'Berhasil !';
$_SESSION['warna'] = 'success';
echo "<script>location='../../../data-pembelian';</script>"; 



?>