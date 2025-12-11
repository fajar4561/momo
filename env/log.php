<?php 
function simpanLog($koneksi, $jenis_transaksi, $keterangan) {
    // ambil jam sekarang otomatis
    $jam = date("Y-m-d H:i:s"); 
    
    // query insert
    $sql = "INSERT INTO log (jenis_transaksi, jam, keterangan) 
            VALUES ('$jenis_transaksi', '$jam', '$keterangan')";
    
    return $koneksi->query($sql);
}

function simpanriwayat($koneksi, $nopeg, $jenis_transaksi, $keterangan) {
    // ambil jam sekarang otomatis
    $jam = date("Y-m-d H:i:s"); 
    
    // query insert
    $sql = "INSERT INTO riwayat_pengguna (nopeg, jenis_transaksi, jam, keterangan) 
            VALUES ('$nopeg', '$jenis_transaksi', '$jam', '$keterangan')";
    
    return $koneksi->query($sql);
}
?>