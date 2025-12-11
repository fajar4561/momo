<style>
    /* Efek glass minimalis */
.bg-glass {
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.15);
}

/* Efek hover lembut */
.bg-glass:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: scale(1.02);
  transition: all 0.25s ease-in-out;
}

/* Teks */
.welcome-section h6 {
  font-size: 0.95rem;
}
.welcome-section p {
  font-size: 0.8rem;
}

/* Animasi scaling ringan */
.welcome-section dotlottie-wc {
  transition: transform 0.3s ease; 
}
.welcome-section dotlottie-wc:hover {
  transform: scale(1.05);
}
[data-theme="dark"] .bg-glass {
  background: rgba(20, 20, 20, 0.5);
  border: 1px solid rgba(255, 255, 255, 0.08);
} 
[data-theme="dark"] .welcome-section h6 {
  color: #eaeaea;
}
@media (max-width: 992px) {
  .leftbar-tab-menu {
    width: 70px;
  }
  .main-menu-inner {
    width: 220px;
  }
  .bg-glass {
    display: none; /* sembunyikan card di layar sempit */
  }
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<div class="leftbar-tab-menu">
    <!-- Main Icon Menu -->
    <div class="main-icon-menu">
        <!-- Logo -->
        <a href="beranda" class="logo logo-metrica d-block text-center">
            <span>
                <img src="<?= $link ?>public/resources/assets/images/lg.png" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <!-- Icon Menu Body -->
        <div class="main-icon-menu-body">
            <div class="position-relative h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <!-- Dashboard Tab -->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <?php
                        $halaman_dashboard = ['beranda', 'profil', 'upload-berkas'];
                        $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
                        $active_class = in_array($halaman, $halaman_dashboard) ? ' active' : '';
                        ?>
                        <a href="#MetricaDashboard" id="dashboard-tab" class="nav-link<?= $active_class; ?>">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a>
                    </li>
                    <!-- Keperawatan -->
                    <?php 
                        $jen_kes = $pecahuser['jenis_pegawai']; 
                        if (in_array($session_akses, [1, 4]) || $jen_kes==1) { 
                        $halaman_keperawatan_aktiv = ['master-form-rkk', 'pengajuan-kredensial', 'detail-kredensial', 'penilaian-kredensial', 'detail-data-kredensial'];
                        $halaman_keperawatan_yang_aktiv = in_array($halaman, $halaman_keperawatan_aktiv) ? ' active' : '';
                        // Ambil jumlah data
                        $ada_pengajuan = $koneksi->query("SELECT * FROM pengajuan_kredensial WHERE status_pengajuan='menunggu'");
                        $data_ditemukan_pengajuan = $ada_pengajuan->num_rows;
                        $jml_menunggu_pengajuan = $koneksi->query("SELECT COUNT(*) AS total FROM pengajuan_kredensial WHERE status_pengajuan='menunggu'")->fetch_assoc()['total'];
                    ?>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Keperawatan" data-bs-trigger="hover">
                        <a href="#keperawatan" id="kredensial" class="nav-link <?= $halaman_keperawatan_yang_aktiv ?>">
                            <i class="ti ti-flask menu-icon"></i><?php if ($data_ditemukan_pengajuan > 0) { ?> <span class="badge badge-dot online d-flex align-items-center position-absolute end-0 top-50"></span><?php } ?>
                        </a>
                    </li>
                    <?php } ?>
                    <!-- Apps -->
                    <?php if (!in_array($session_akses, [0, 3, 4], false)) { 
                        $halaman_apps = ['detail-pegawai', 'ubah-pegawai', 'detail-transaksi-gaji', 'transaksi-gaji', 'ubah-gaji'];
                        $active_class = in_array($halaman, $halaman_apps) ? ' active' : '';
                    ?>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Apps" data-bs-trigger="hover">
                        <a href="#MetricaApps" id="apps-tab" class="nav-link<?= $active_class; ?>">
                            <i class="ti ti-apps menu-icon"></i>
                        </a>
                    </li>
                    <?php } ?>
                    <!-- Inventaris -->
                    <?php
                    $halaman_aktif = [
                        'data-pembelian', 'detail-inventaris', 'detail-transaksi-pembelian',
                        'penyerahan-inventaris', 'ubah-transaksi-pembelian', 'stok-inventaris',
                        'input-pembelian', 'data-penyerahan', 'unit-inv', 'input-unit', 'ubah-unit'
                    ];
                    $active_class = in_array($halaman, $halaman_aktif) ? ' active' : '';
                    ?>
                    <?php if (in_array($session_akses, [1, 3])) { ?>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventaris" data-bs-trigger="hover">
                        <a href="#MetricaUikit" id="uikit-tab" class="nav-link<?= $active_class; ?>">
                            <i class="ti ti-briefcase menu-icon"></i>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- Profile Section -->
        <div class="pro-metrica-end">
            <a href="" class="profile">
                <img src="<?= $link ?>public/img/<?= $pecahuser['foto'] ?>" alt="profile-user" class="rounded-circle thumb-sm" style="aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; border-radius: 50%; object-fit: cover;">
            </a>
        </div>
    </div>
    <!-- Main Menu Inner -->
    <div class="main-menu-inner">
        <!-- Logo -->
        <div class="topbar-left">
            <a href="<?= $link ?>beranda" class="logo">
                <span>
                    <h3 class="p-2">RSPM</h3>
                </span>
            </a>
        </div>
        <!-- Menu Body -->
        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <!-- Dashboard Content -->
            <div id="MetricaDashboard" class="main-icon-menu-pane tab-pane<?php 
                if (in_array($_GET['halaman'], ['profil', 'beranda', 'upload-berkas'])) echo ' active'; 
            ?>" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="title-box">
                    <h6 class="menu-title">Dashboard</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="<?= $link ?>beranda">Beranda</a></li>
                    <?php if ($session_akses != 0) { ?>
                    <li class="nav-item">
                        <a class="nav-link<?php if ($_GET['halaman'] == 'profil') echo ' active'; ?>" href="<?= $link ?>profil">Profil Saya</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item"><a href="<?= $link ?>upload-berkas" class="nav-link">Upload Berkas</a></li>
                </ul>
                <div class="card rounded-3 border-0 bg-glass mt-3 mx-2">
                    <div class="card-body text-center py-3">
                        <div class="welcome-section">
                            <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
                            <dotlottie-wc src="https://lottie.host/c43d8c60-9ed1-4f95-b560-ad8ce91672fb/U81whCkntz.lottie" style="width: 100%; max-width: 180px; height: auto;" autoplay loop>
                            </dotlottie-wc>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $hour = date('H');
                            if ($hour < 12) $greeting = 'Selamat Pagi ☀️';
                            elseif ($hour < 18) $greeting = 'Selamat Siang 🌤️';
                            else $greeting = 'Selamat Malam 🌙';
                            ?>
                            <p class="small text-muted mb-0">
                                <?= $greeting ?> <strong>
                                    <?= $pecahuser['nama'] ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Apps Content -->
            <?php if ($session_akses != 3) { ?>
            <div id="MetricaApps" class="main-icon-menu-pane tab-pane<?php 
                    if (in_array($_GET['halaman'], ['detail-pegawai','ubah-pegawai','detail-transaksi-gaji','detail-gaji','transaksi-gaji','ubah-gaji'])) echo ' active'; 
                ?>" role="tabpanel" aria-labelledby="apps-tab">
                <div class="title-box">
                    <h6 class="menu-title">Apps</h6>
                </div>
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <!-- Pegawai -->
                        <li class="nav-item">
                            <a class="nav-link<?php if (in_array($_GET['halaman'], ['detail-pegawai','ubah-pegawai'])) echo ' active'; ?>" href="#sidebarPegawai" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPegawai">
                                Pegawai
                            </a>
                            <div class="<?php if ($_GET['halaman'] != 'detail-pegawai') echo ' collapse'; ?>" id="sidebarPegawai">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a href="<?= $link ?>input-pegawai" class="nav-link">Tambah Pegawai</a></li>
                                    <li class="nav-item"><a href="<?= $link ?>data-pegawai" class="nav-link<?php if (in_array($_GET['halaman'], ['detail-pegawai','ubah-pegawai'])) echo ' active'; ?>">Data Pegawai</a></li>
                                    <li class="nav-item"><a href="<?= $link ?>master-jabatan" class="nav-link<?php if ($_GET['halaman'] == 'master-jabatan') echo ' active'; ?>">Master Jabatan</a></li>
                                    <li class="nav-item"><a href="<?= $link ?>kepegawaian" class="nav-link">Berkas-berkas</a></li>
                                    <li class="nav-item"><a href="<?= $link ?>data-sp" class="nav-link">Data SP</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Gaji -->
                        <li class="nav-item">
                            <a class="nav-link<?php if (in_array($_GET['halaman'], ['detail-transaksi-gaji','detail-gaji','transaksi-gaji','ubah-gaji'])) echo ' active'; ?>" href="#sidebarGaji" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGaji">
                                Gaji
                            </a>
                            <div class="<?php if (!in_array($_GET['halaman'], ['detail-transaksi-gaji','detail-gaji','transaksi-gaji','ubah-gaji'])) echo ' collapse'; ?>" id="sidebarGaji">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="<?= $link ?>input-gaji">Input Gaji</a></li>
                                    <li class="nav-item"><a class="nav-link<?php if (in_array($_GET['halaman'], ['detail-transaksi-gaji','detail-gaji','transaksi-gaji','ubah-gaji'])) echo ' active'; ?>" href="<?= $link ?>data-gaji">Data Gaji</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Absensi -->
                        <li class="nav-item"><a class="nav-link" href="<?= $link ?>absensi">Absensi</a></li>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <!-- Inventaris Content -->
            <?php if (in_array($session_akses, [1, 3])) { ?>
            <div id="MetricaUikit" class="main-icon-menu-pane tab-pane <?= $active_class ?>">
                <div class="title-box">
                    <h6 class="menu-title">Inventaris</h6>
                </div>
                <div class="collapse navbar-collapse" id="sidebarCollapse_2">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link<?php if (in_array($_GET['halaman'], ['data-pembelian','detail-transaksi-pembelian','input-pembelian','data-pembelian-pembelian'])) echo ' active'; ?>" href="#sidebarpem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGaji">
                                Pembelian
                            </a>
                            <div class="<?php if (!in_array($_GET['halaman'], ['input-pembelian','data-pembelian','data-inventaris'])) echo ' collapse'; ?>" id="sidebarpem">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="<?= $link ?>input-pembelian">Input Pembelian</a></li>
                                    <li class="nav-item"><a class="nav-link<?php if (in_array($_GET['halaman'], ['data-pembelian','detail-transaksi-pembelian','ubah-transaksi-pembelian'])) echo ' active'; ?>" href="<?= $link ?>data-pembelian">Data Pembelian</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= $link ?>stok-barang">Stok Barang</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="<?= $link ?>penyerahan-inventaris">Penyerahan Inventaris</a></li>
                        <li class="nav-item"><a class="nav-link<?php if (in_array($_GET['halaman'], ['unit-inv','input-unit','ubah-unit'])) echo ' active'; ?>" href="<?= $link ?>unit-inv">Unit Inv</a></li>
                        <li class="nav-item"><a class="nav-link<?php if (in_array($_GET['halaman'], ['data-inventaris','detail-inventaris'])) echo ' active'; ?>" href="<?= $link ?>data-inventaris">Data Inventaris</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link<?php if (in_array($_GET['halaman'], ['laporan-pembelian','laporan-penyusutan'])) echo ' active'; ?>" href="#laporan" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGaji">
                                Laporan
                            </a>
                            <div class="<?php if ($_GET['halaman'] != 'laporan-pembelian') echo ' collapse'; ?>" id="laporan">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="<?= $link ?>laporan-pembelian">Lap. Pembelian</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= $link ?>laporan-penyusutan">Lap. Penyusutan</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <!-- Keperawatan -->
           <?php
            if (in_array($session_akses, [1, 4]) || $jen_kes == '1') {
            ?>
            <div id="keperawatan" class="main-icon-menu-pane tab-pane <?= $halaman_keperawatan_yang_aktiv ?>" role="tabpanel" aria-labelledby="keperawatan">
                <div class="title-box">
                    <h6 class="menu-title">Keperawatan</h6>
                </div>
                <div class="collapse navbar-collapse" id="kredensial-keperawatan">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if ($session_akses == 0) { ?>
                                <a class="nav-link" href="<?= $link ?>pengajuan-kredensial">Pengajuan</a>
                                <a class="nav-link" href="<?= $link ?>data-pengajuan-kredensial">Data Pengajuan</a>
                            <?php } elseif ($session_akses == 4) { ?>
                                <a class="nav-link" href="<?= $link ?>master-form-rkk">Form RKK</a>
                                <a class="nav-link<?= ($_GET['halaman'] == 'detail-kredensial' || $_GET['halaman'] == 'penilaian-kredensial' || $_GET['halaman'] == 'detail-data-kredensial' ? ' active' : '') ?>" href="<?= $link ?>data-kredensial">Keperawatan <?php if ($data_ditemukan_pengajuan > 0) { ?> &nbsp;<span class="badge badge-outline-primary"><?=$jml_menunggu_pengajuan?></span><?php } ?></a>
                            <?php } else { ?>
                                <a class="nav-link" href="<?= $link ?>master-form-rkk">Form RKK</a>
                                <a class="nav-link<?= ($_GET['halaman'] == 'detail-kredensial' || $_GET['halaman'] == 'penilaian-kredensial' || $_GET['halaman'] == 'detail-data-kredensial' ? ' active' : '') ?>" href="<?= $link ?>data-kredensial">Keperawatan <?php if ($data_ditemukan_pengajuan > 0) { ?> &nbsp;<span class="badge badge-outline-primary"><?=$jml_menunggu_pengajuan?></span><?php } ?></a>
                                <a class="nav-link" href="<?= $link ?>pengajuan-kredensial">Pengajuan</a>
                                <a class="nav-link" href="<?= $link ?>data-pengajuan-kredensial">Data Pengajuan</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div> 