<?php 
function tgl_ind($tanggal) {
    $nama_hari = array (
        0 => 'Minggu',
        1 => 'Senin',
        2 => 'Selasa',
        3 => 'Rabu',
        4 => 'Kamis',
        5 => 'Jumat',
        6 => 'Sabtu'
    );

    // Mengubah format tanggal dari database ke format yang lebih mudah dipahami
    $tgl = date('Y-m-d', strtotime($tanggal));
    $hari = date('w', strtotime($tgl)); // Mengambil hari dalam bentuk angka (0-6)
    
    // Mengambil bagian tanggal, bulan, dan tahun
    $tanggal = date('d', strtotime($tgl));
    $bulan = date('n', strtotime($tgl));
    $tahun = date('Y', strtotime($tgl));
    
    // Mengembalikan string dengan format "Hari, Tanggal Bulan Tahun"
    return $nama_hari[$hari] . ', ' . $tanggal . ' ' . get_bulan($bulan) . ' ' . $tahun;
}

// Fungsi untuk mendapatkan nama bulan
function get_bulan($bln) {
    $nama_bulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );
    return $nama_bulan[$bln];
}

?>