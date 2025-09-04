<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
require 'env/koneksi.php';
require_once 'env/tgl_indo.php';  
$n = $_GET['n'];
// Dekripsi data

$ambil = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$n'");
$pecah = $ambil->fetch_assoc();

$tgl_lahir = $pecah['tgl_lahir'];
// Buat objek DateTime dari tanggal lahir
$tanggal_lahir = new DateTime($tgl_lahir);

    // Buat objek DateTime dari tanggal hari ini
$today = new DateTime();

    // Hitung selisih antara tanggal lahir dan tanggal hari ini
$diff = $tanggal_lahir->diff($today);

    // Formatkan hasil usia
$usia = $diff->y . ' tahun ' . $diff->m . ' bulan';

$telepon = $pecah['telpon'];

// Menghapus karakter selain angka (jika ada)
$telepon = preg_replace('/\D/', '', $telepon);

// Mengganti awalan '08' dengan '628'
if (substr($telepon, 0, 2) === '08') {
    $telepon = '628' . substr($telepon, 2);
}

$tanggal_hari_ini = new DateTime();
$tanggal_masuk = new DateTime($pecah['tmt']);
$selisih = $tanggal_masuk->diff($tanggal_hari_ini);
$sk_tahun = $selisih->y;
$sk_bulan = $selisih->m;
$sk_bulan += $sk_tahun * 12;
$sk_tahun = floor($sk_bulan / 12);
$sk_bulan = $sk_bulan % 12;
?>
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-body">
                <div class="met-profile">
                    <div class="row">
                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                            <div class="met-profile-main">
                                <div class="met-profile-main-pic">
                                    <img src="<?=$link?>public/img/<?=$pecah['foto']?>" alt="" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; border-radius: 50%; object-fit: cover;">
                                </div>
                                <div class="met-profile_user-detail">
                                    <small><strong>
                                            <?=ucwords($pecah['nama'])?></strong></small>
                                    <p class="mb-0 met-user-name-post">
                                        <?=$pecah['jabatan']?>
                                    </p>
                                    <p class="mb-0 met-user-name-post">
                                        <?=$pecah['unit']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-0">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profil" role="tab" aria-selected="true">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Gallery" role="tab" aria-selected="false">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab" aria-selected="false">Settings</a>
                    </li>
                </ul>
                <!--- Tab Pane -->
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="profil" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body  report-card">
                                                <table class="table table-sm">
                                                    <tr>
                                                        <th>NIP</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['nopeg']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['nama']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>NO KTP</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['nik']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Agama</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['agama']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['gender']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>TTL</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=ucwords($pecah['tmpt_lahir'])?>,
                                                            <?=tgl_indo($pecah['tgl_lahir'])?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Umur</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$usia?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat KTP</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['alamat']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['alamat2']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pendidikan</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['ijazah']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Kawin</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['status_kawin']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['email']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>No Telepon</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$telepon?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Unit Kerja</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['unit']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jabatan</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$pecah['jabatan']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Masa Kerja</th>
                                                        <th>:</th>
                                                        <td>
                                                            <?=$sk_tahun?> Tahun
                                                            <?=$sk_bulan?> Bulan</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    $koneksi_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='" . $n. "'");
                                    $berkas = $koneksi_berkas->fetch_assoc();
                                                            // ktp
                                    $ktp = $berkas['KTP'];
                                    $file_extension = pathinfo($ktp, PATHINFO_EXTENSION);
                                    $file_path = 'public/file/berkas/'.$ktp;
                                    $file_size = filesize($file_path) / 1024;

                                    if ($file_extension=='pdf') {
                                        $format ='la-file-code text-danger';
                                    }
                                    else if ($file_extension=='zip') {
                                        $format ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format ='la-file text-secondary';
                                    }

                                                            // file kk
                                    $kk = $berkas['KK'];
                                    $file_kk = pathinfo($kk, PATHINFO_EXTENSION);
                                    $file_path_kk = 'public/file/berkas/'.$kk;
                                    $file_size_kk = filesize($file_path_kk) / 1024;

                                    if ($file_kk=='pdf') {
                                        $format_kk ='la-file-code text-danger';
                                    }
                                    else if ($file_kk=='zip') {
                                        $format_kk ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format_kk ='la-file text-secondary';
                                    }

                                                            // ijazah
                                    $ijazah = $berkas['IJAZAH'];
                                    $file_ijazah = pathinfo($ijazah, PATHINFO_EXTENSION);
                                    $file_path_ijazah = 'public/file/berkas/'.$ijazah;
                                    $file_size_ijazah = filesize($file_path_ijazah) / 1024;

                                    if ($file_ijazah=='pdf') {
                                        $format_ijazah ='la-file-code text-danger';
                                    }
                                    else if ($file_ijazah=='zip') {
                                        $format_ijazah ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format_ijazah ='la-file text-secondary';
                                    }

                                                            // ppni
                                    $ppni = $berkas['PPNI'];
                                    $file_ppni = pathinfo($ppni, PATHINFO_EXTENSION);
                                    $file_path_ppni = 'public/file/berkas/'.$ppni;
                                    $file_size_ppni = filesize($file_path_ppni) / 1024;

                                    if ($file_ppni=='pdf') {
                                        $format_ppni ='la-file-code text-danger';
                                    }
                                    else if ($file_ppni=='zip') {
                                        $format_ppni ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format_ppni ='la-file text-secondary';
                                    }

                                                            // sip
                                    $sip = $berkas['SIP'];
                                    $file_sip = pathinfo($sip, PATHINFO_EXTENSION);
                                    $file_path_sip = 'public/file/berkas/'.$sip;
                                    $file_size_sip = filesize($file_path_sip) / 1024;

                                    if ($file_sip=='pdf') {
                                        $format_sip ='la-file-code text-danger';
                                    }
                                    else if ($file_sip=='zip') {
                                        $format_sip ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format_sip ='la-file text-secondary';
                                    }

                                                            // str
                                    $str = $berkas['STR'];
                                    $file_str = pathinfo($str, PATHINFO_EXTENSION);
                                    $file_path_str = 'public/file/berkas/'.$str;
                                    $file_size_str = filesize($file_path_str) / 1024;

                                    if ($file_str=='pdf') {
                                        $format_str ='la-file-code text-danger';
                                    }
                                    else if ($file_str=='zip') {
                                        $format_str ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format_str ='la-file text-secondary';
                                    }

                                    $npwp = $berkas['NPWP'];
                                    $file_npwp = pathinfo($npwp, PATHINFO_EXTENSION);
                                    $file_path_npwp = 'public/file/berkas/'.$npwp;
                                    $file_size_npwp = filesize($file_path_npwp) / 1024;

                                    if ($file_npwp=='pdf') {
                                        $format_npwp ='la-file-code text-danger';
                                    }
                                    else if ($file_npwp=='zip') {
                                        $format_npwp ='la-file-archive text-warning';
                                    }
                                    else {
                                        $format_npwp ='la-file text-secondary';
                                    }
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <?php if (!empty($ktp) || !empty($kk) || !empty($ijazah) || !empty($ppni) || !empty($sip) || !empty($str) || !empty($npwp)) { ?>
                                                    <h4 class="card-title">Berkas Kepegawaian 
                                                        <?php if (!empty($ktp)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-round btn-primary btn-xs">
                                                                    KTP <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                        <?php if (!empty($kk)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-round btn-secondary btn-xs">
                                                                    KK <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                        <?php if (!empty($ijazah)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-success btn-round btn-xs">
                                                                    IJAZAH <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                        <?php if (!empty($ppni)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-warning btn-round btn-xs">
                                                                    PPNI <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                        <?php if (!empty($sip)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-danger btn-round btn-xs">
                                                                    SIP <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                        <?php if (!empty($str)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-dark btn-round btn-xs">
                                                                    STR <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                        <?php if (!empty($npwp)) { 
                                                            echo '
                                                                <button type="button" class="btn btn-info btn-round btn-xs border-1">
                                                                    NPWP <span class="badge rounded-pill bg-light text-dark"> <i class="fas fa-check"></i></span>
                                                                </button>
                                                            '; 
                                                        } ?>
                                                    </h4>
                                                <?php } ?>
                                            </div>
                                            <div class="card-body">
                                                <div class="file-box-content">
                                                    <?php if (!empty($ktp) || !empty($kk) || !empty($ijazah) || !empty($ppni) || !empty($sip) || !empty($str) || !empty($npwp)) { ?>
                                                    <?php if (!empty($ktp)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$ktp?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($kk)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path_kk?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format_kk?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$kk?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size_kk)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($ijazah)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path_ijazah?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format_ijazah?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$ijazah?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size_ijazah)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($ppni)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path_ppni?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format_ppni?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$ppni?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size_ppni)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($sip)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path_sip?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format_sip?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$sip?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size_sip)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($str)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path_str?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format_str?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$str?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size_str)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($npwp)) { ?>
                                                    <div class="file-box">
                                                        <a href="<?=$link.$file_path_npwp?>" class="download-icon-link" target='_blank'>
                                                            <i class="las la-download file-download-icon"></i>
                                                            <div class="text-center">
                                                                <i class="lar <?=$format_npwp?>"></i>
                                                                <h6 class="text-truncate">
                                                                    <?=$npwp?>
                                                                </h6>
                                                                <small class="text-muted">
                                                                    <?=round($file_size_npwp)?> Kb</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php } else { ?>
                                                    <center>
                                                        <h5>Berkas Masih Kosong</h5>
                                                    </center>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- End Of Tab Pane -->
            </div>
        </div>
    </div>
</div>
<script src="<?=$link?>env/js/notif.js"></script>
<script src="<?=$link?>env/js/tambah_user.js"></script>
<script src="<?=$link?>public/resources/assets/libs/@midzer/tobii/tobii.min.js"></script>