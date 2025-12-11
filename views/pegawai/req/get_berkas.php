<?php
include '../../../env/koneksi.php';
include '../../../env/tgl_indo.php';
$today = new DateTime();
$nopeg = $_GET['nopeg'];

$q = $koneksi->query("SELECT * FROM file_detail WHERE nopeg='$nopeg' AND jenis_file !='FOTO' ORDER BY tgl_upload DESC");
$kon_pegawai = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
$konek_file = $koneksi->query("SELECT * FROM file WHERE nopeg='$nopeg' ");
$ambil_berkas_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$nopeg'");
$sertifikat = $ambil_berkas_sertif->num_rows;
$berkas = $konek_file->fetch_assoc();
$row_pegawai = $kon_pegawai->fetch_assoc();

function getFileFormat($file) {
    // Menentukan path file dan ekstensi file
    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_path = '../../../public/file/berkas/' . $file;
    $file_size = file_exists($file_path) ? filesize($file_path) / 1024 : 0; // Cek apakah file ada

    // Pemendekan nama file jika terlalu panjang
    $maxLength = 10;
    if (strlen($file) > $maxLength) {
        $shortName = substr($file, -$maxLength); // Ambil bagian akhir dari nama file
        $displayName = '...' . $shortName; // Format nama file pendek
    } else {
        $displayName = $file;
    }

    // Menentukan format berdasarkan ekstensi file 
    if ($file_extension == 'pdf') {
        $format = 'la-file-pdf text-danger';
    } elseif ($file_extension == 'png') {
        $format = 'la-file-image text-warning';
    } elseif ($file_extension == 'jpg') {
        $format = 'la-file-image text-secondary';
    } elseif ($file_extension == 'jpeg') {
        $format = 'la-file-image text-success';
    } else {
        $format = 'la-file text-secondary';
    }

    return [
        'format' => $format,
        'file_size' => $file_size,
        'file_path' => $file_path,
        'display_name' => $displayName, // Nama file pendek
    ];
}

// Daftar file utama
$fileList = array(
    "KTP" => "KTP",
    "KK" => "Kartu Keluarga",
    "IJAZAH" => "Ijazah",
    "PPNI" => "PPNI",
    "SIP" => "SIP",
    "STR" => "STR",
    "NPWP" => "NPWP"
);


if ($q->num_rows > 0) {
    echo "
    <div class='row'>
        <div class='col-md-12'>
            <div class='card card border-0'>
                <div class='card-body' style='background: url('../../../public/bg/bg_kredensial.webp') no-repeat center center; background-size: cover;''>
                    <div class='media'>
                        <img src='/app/public/img/{$row_pegawai['foto']}' class='rounded' style='width:150px; aspect-ratio: 1/1; height:auto;object-fit:cover;'>
                        <div class='media-body align-self-center ms-3 text-truncate'>
                            <h3 class='my-0 fw-bold'>{$row_pegawai['nama']}</h3>
                            <p class='text-muted mb-2 font-13'>{$row_pegawai['unit']}</p>";
                            

                            foreach ($fileList as $kolom => $judul) {
                                $status = "belum"; // default
                                if (!empty($berkas[$kolom])) {
                                    $status = "valid";
                                } else {
                                    $status = "ada";
                                }

                                // Tentukan kelas CSS berdasarkan status
                                if ($status == "valid") {
                                    $badgeClass = "badge-status badge-valid";
                                    $icon = "<i class='las la-check-circle'></i>";
                                } elseif ($status == "ada") {
                                    $badgeClass = "badge-status badge-warning";
                                    $icon = "<i class='las la-exclamation-circle'></i>";
                                } else {
                                    $badgeClass = "badge-status badge-warning";
                                    $icon = "<i class='las la-times-circle'></i>";
                                }

                                echo "
                                    <span class='{$badgeClass}'>{$icon}{$judul}</span>
                                ";
                            }

                        // Sertifikat
                        $sertifStatus = "belum";
                        if ($sertifikat > 0) {
                            $cekDetailSertif = $koneksi->query("SELECT * FROM file_detail WHERE nopeg='$nopeg' AND jenis_file='SERTIFIKAT'");
                            if ($cekDetailSertif && $cekDetailSertif->num_rows > 0) {
                                $sertifStatus = "valid";
                            } else {
                                $sertifStatus = "ada";
                            }
                        }

                        if ($sertifStatus == "valid") {
                            $badgeClass = "badge-status badge-valid";
                            $icon = "<i class='las la-check-circle'></i>";
                        } elseif ($sertifStatus == "ada") {
                            $badgeClass = "badge-status badge-warning";
                            $icon = "<i class='las la-exclamation-circle'></i>";
                        } else {
                            $badgeClass = "badge-status badge-warning";
                            $icon = "<i class='las la-times-circle'></i>";
                        }

                        // Cetak badge sertifikat terakhir
                        echo "
                            <span class='{$badgeClass}'>{$icon}Sertifikat</span>
                        ";



    echo "
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
    ";


        echo "
        <div class='tab-content' id='files-tabContent'>
            <div class='tab-pane fade show active' id='files-projects' style='padding: 10px 16px;'>
                <h4 class='card-title mt-0 mb-3'>Manager Berkas</h4>                                         
                <div class='file-box-content mt-3'>
    ";
    while ($d = mysqli_fetch_assoc($q)) {
        $nama_file = $d['nama_file'];
        $info = getFileFormat($d['nama_file']);
        $format = $info['format'];
        $display_name = $info['display_name'];
        $file_size = round($info['file_size']);
        $file_path = $info['file_path'];
        $status = !empty($d['validasi']) ? $d['validasi'] : 'Belum Validasi';
        $badgeClass = ($status == 'ada') ? 'badge bg-success' : 
            (($status == 'proses') ? 'badge bg-warning text-dark' :
            (($status == 'tidak') ? 'badge bg-danger text-danger' : 'badge bg-secondary'));
        $status2 = ($status == 'ada')      ? 'Divalidasi' :
            (($status == 'proses') ? 'On Proses'  :
            (($status == 'tidak')  ? 'Tidak Valid' : 'Menunggu Validasi'));
        $upload = tgl_indo($d['tgl_upload']);

        $sisaMasa = '-';
        $interval = null;

        // Cek apakah tanggal berakhir valid
        if (!empty($d['tgl_berakhir']) && $d['tgl_berakhir'] != '0000-00-00') {
            $tglBerakhir = date_create($d['tgl_berakhir']);
            if ($tglBerakhir && $tglBerakhir >= $today) {
                $interval = date_diff($today, $tglBerakhir);
                $sisaMasa = $interval->y . " tahun, " . $interval->m . " bulan, " . $interval->d . " hari";
            } else {
                $sisaMasa = "Sudah Kadaluarsa";
            }
        }
        
        // Konten popover (pakai htmlspecialchars biar aman)
        if ($d['jenis_file']=='SERTIFIKAT') {
            $ambil_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE berkas='$nama_file'");
            $data_sertif = $ambil_sertif->fetch_assoc();
            $popoverContent = htmlspecialchars("
                <strong>Nama File:</strong> {$display_name}<br>
                <strong>Ukuran:</strong> {$file_size} KB<br>
                <strong>Status:</strong> {$status2}<br>
                <strong>Tgl Upload:</strong> {$upload}<br>
                <strong>Sisa Aktif:</strong> {$sisaMasa}<br>
                <strong>Ket:</strong> {$data_sertif['keterangan']}
            ");
        } else {
            $popoverContent = htmlspecialchars("
                <strong>Nama File:</strong> {$display_name}<br>
                <strong>Ukuran:</strong> {$file_size} KB<br>
                <strong>Status:</strong> {$status2}<br>
                <strong>Tgl Upload:</strong> {$upload}<br>
                <strong>Sisa Aktif:</strong> {$sisaMasa}<br>
            ");
        }


        echo "
            <a href='/app/public/file/berkas/{$d['nama_file']}'> 
                <div class='file-box' 
                     data-bs-toggle='popover' 
                     data-bs-trigger='hover focus'
                     data-bs-html='true' 
                     data-bs-placement='top' 
                     data-bs-content='{$popoverContent}'>
                    <span class='$badgeClass position-absolute top-0 end-0 m-1'><i data-feather=''></i></span>
                    <div class='text-center'>
                        <i class='lar {$format}'></i>
                        <h6 class='text-truncate'>{$d['jenis_file']}</h6>
                        <small class='text-muted'>{$file_size} kb</small>
                    </div>                                                        
                </div>
            </a>
        ";
    }

    echo "
                </div> 
            </div>
        </div>
    ";


    echo "
        <div class='row'>
            <div class='col-md-4'>    
                <h5>Keterangan :</h5>
                <ul class='list-unstyled text-muted mb-0'>
                    <li>
                        <span class='badge bg-success'><i data-feather=''></i></span> = Telah Tervalidasi
                    </li>
                    <li>
                        <span class='badge bg-secondary'><i data-feather=''></i></span> = Belum Divalidasi
                    </li>
                    <li>
                        <span class='badge bg-warning text-dark'><i data-feather=''></i></span> = Dalam Proses (Perbaikan, ganti dll)
                    </li>
                    <li>
                        <span class='badge bg-danger text-danger'><i data-feather=''></i></span> = Tidak Valid
                    </li>
                </ul>
            </div>
        </div>
    ";
} else {
    echo '
        <div class="text-center">
        <img src="public/bg/no-results.webp" class="img-fluid" style="max-width:40%">
        <h6>Berkas Masih Kosong</h6>
        <p class="small">Silakan pilih pegawai di panel kiri untuk melihat berkasnya.</p>
        </div>
    ';
}
?>
