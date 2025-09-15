<div class="leftbar-tab-menu">
    <!-- Main Icon Menu -->
    <div class="main-icon-menu">
        <!-- Logo -->
        <a href="beranda" class="logo logo-metrica d-block text-center">
            <span>
                <img src="<?=$link?>public/resources/assets/images/lg.png" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <!-- Icon Menu Body -->
        <div class="main-icon-menu-body">
            <div class="position-relative h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <!-- Dashboard Tab -->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <?php
                        $halaman_dashboard = [
                            'beranda',
                            'profil',
                            'kepegawaian',
                            'upload-berkas'
                        ];
                        $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
                        $active_class = in_array($halaman, $halaman_dashboard) ? ' active' : '';
                        ?>
                        <a href="#MetricaDashboard" id="dashboard-tab" class="nav-link<?= $active_class; ?>">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a><!-- end nav-link -->
                    </li><!-- end nav-item -->

                    <?php if (!in_array($session_akses, [0, 3], false)) { ?>
                    <!-- Apps Tab -->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Apps" data-bs-trigger="hover">
                        <?php
                        $halaman_apps = [
                            'detail-pegawai',
                            'ubah-pegawai',
                            'detail-transaksi-gaji',
                            'transaksi-gaji',
                            'ubah-gaji'
                        ];
                        // $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
                        $active_class = in_array($halaman, $halaman_apps) ? ' active' : '';
                        ?>
                        <a href="#MetricaApps" id="apps-tab" class="nav-link<?= $active_class; ?>">
                            <i class="ti ti-apps menu-icon"></i>
                        </a><!-- end nav-link -->
                    </li><!-- end nav-item -->

                    <?php } ?>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventaris" data-bs-trigger="hover">
                        <?php
                        $halaman_aktif = [
                            'data-pembelian',
                            'detail-inventaris',
                            'detail-transaksi-pembelian',
                            'penyerahan-inventaris',
                            'ubah-transaksi-pembelian',
                            'stok-inventaris',
                            'input-pembelian',
                            'data-penyerahan',
                            'unit-inv',
                            'input-unit',
                            'ubah-unit'
                        ];
                        // $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
                        $active_class = in_array($halaman, $halaman_aktif) ? ' active' : '';
                        ?>
                        <?php if (in_array($session_akses, [1, 3])) { ?>
                        <a href="#MetricaUikit" id="uikit-tab" class="nav-link<?= $active_class; ?>">
                            <i class="ti ti-briefcase menu-icon"></i>
                        </a>
                        <?php } ?>
                    </li>

                    <!-- keperawatan -->

                    <?php  if (in_array($session_akses, [1])) { ?>
                        <?php 
                            $halaman_keperawatan_aktiv = [
                                'master-form-rkk',
                                'pengajuan-kredensial',
                            ];
                            $halaman_keperawatan_yang_aktiv = in_array($halaman, $halaman_keperawatan_aktiv) ? ' active' : '';

                        ?>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="keperawatan" data-bs-trigger="hover">
                            <a href="#keperawatan" id="kredensial" class="nav-link <?=$halaman_keperawatan_yang_aktiv?>">
                                <i class="ti ti-flask menu-icon"></i>
                            </a>
                        </li>
                    <?php } ?>

                    
                    <!-- Uncomment if needed
                    
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Pages" data-bs-trigger="hover">
                        <a href="#MetricaPages" id="pages-tab" class="nav-link">
                            <i class="ti ti-files menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Authentication" data-bs-trigger="hover">
                        <a href="#MetricaAuthentication" id="authentication-tab" class="nav-link">
                            <i class="ti ti-shield-lock menu-icon"></i>
                        </a>
                    </li>
                    -->
                </ul><!-- end nav -->
            </div><!-- end /div -->
        </div><!-- end main-icon-menu-body -->
        <!-- Profile Section -->
        <div class="pro-metrica-end">
            <a href="" class="profile">
                <img src="<?=$link?>public/img/<?=$pecahuser['foto']?>" style="aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; border-radius: 50%; object-fit: cover;" alt="profile-user" class="rounded-circle thumb-sm">
            </a>
        </div><!-- end pro-metrica-end -->
    </div><!-- end main-icon-menu -->
    <!-- Main Menu Inner -->
    <div class="main-menu-inner">
        <!-- Logo -->
        <div class="topbar-left">
            <a href="<?=$link?>beranda" class="logo">
                <span>
                    <h3 class="p-2">RSPM</h3>
                    <!-- Uncomment if needed
                    <img src="public/resources/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                    <img src="public/resources/assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                    -->
                </span>
            </a><!-- end logo -->
        </div><!-- end topbar-left -->
        <!-- Menu Body -->
        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <!-- Dashboard Content -->
            <div id="MetricaDashboard" class="main-icon-menu-pane tab-pane <?php if ($_GET['halaman']=='profil' || $_GET['halaman']=='kepegawaian' || $_GET['halaman']=='beranda' || $_GET['halaman']=='upload-berkas') {echo " active";} ?>" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="title-box">
                    <h6 class="menu-title">Dashboard</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$link?>beranda">Beranda</a>
                    </li><!-- end nav-item -->
                    <?php if ($session_akses != 0) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_GET['halaman']=='profil') {echo " active";} ?>" href="
                            <?=$link?>profil">Profil Saya</a>
                    </li><!-- end nav-item -->
                    <?php } ?>
                </ul><!-- end nav -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_GET['halaman']=='kepegawaian' || $_GET['halaman']=='upload-berkas') {echo " active";} ?>" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAnalytics">
                            Berkas Kepegawaian
                        </a>
                        <div class="<?php if ($_GET['halaman'] != 'detail-pegawai') {echo " collapse";} ?>" id="sidebarAnalytics">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="<?=$link?>upload-berkas" class="nav-link">Upload Berkas</a>
                                </li><!-- end nav-item -->
                                <?php if (!in_array($session_akses, [0, 3], false)) { ?>
                                <li class="nav-item">
                                    <a href="<?=$link?>kepegawaian" class="nav-link">Berkas-berkas</a>
                                </li><!-- end nav-item -->
                                <?php } ?>
                            </ul><!-- end nav -->
                        </div><!-- end sidebarAnalytics -->
                    </li><!-- end nav-item -->
                </ul>
            </div><!-- end Dashboard Content -->
            <?php if ($session_akses != 3 ) { ?>
            <!-- Apps Content -->
            <div id="MetricaApps" class="main-icon-menu-pane tab-pane <?php if ($_GET['halaman']=='detail-pegawai' || $_GET['halaman']=='ubah-pegawai' || $_GET['halaman']=='detail-transaksi-gaji' || $_GET['halaman']=='detail-gaji' || $_GET['halaman']=='transaksi-gaji' || $_GET['halaman']=='ubah-gaji') {echo " active";} ?>" role="tabpanel" aria-labelledby="apps-tab">
                <div class="title-box">
                    <h6 class="menu-title">Apps</h6>
                </div>
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <!-- Pegawai Section -->
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET['halaman']=='detail-pegawai'|| $_GET['halaman']=='ubah-pegawai') {echo " active";} ?>" href="#sidebarPegawai" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPegawai">
                                Pegawai
                            </a>
                            <div class="<?php if ($_GET['halaman'] != 'detail-pegawai') {echo " collapse";} ?>" id="sidebarPegawai">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="<?=$link?>input-pegawai" class="nav-link">Tambah Pegawai</a>
                                    </li><!-- end nav-item -->
                                    <li class="nav-item">
                                        <a href="<?=$link?>data-pegawai" class="nav-link <?php if ($_GET['halaman']=='detail-pegawai' || $_GET['halaman']=='ubah-pegawai') {echo " active";} ?>">Data Pegawai</a>
                                    </li><!-- end nav-item -->
                                    <li class="nav-item">
                                        <a href="<?=$link?>master-jabatan" class="nav-link <?php if ($_GET['halaman']=='master-jabatan') {echo " active";} ?>">Master Jabatan</a>
                                    </li>
                                </ul><!-- end nav -->
                            </div><!-- end sidebarPegawai -->
                        </li><!-- end nav-item -->
                        <!-- Gaji Section -->
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET['halaman']=='detail-transaksi-gaji' || $_GET['halaman']=='detail-gaji' || $_GET['halaman']=='transaksi-gaji' || $_GET['halaman']=='ubah-gaji') {echo " active";} ?>" href="#sidebarGaji" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGaji">
                                Gaji
                            </a>
                            <div class="<?php if ($_GET['halaman'] != 'detail-transaksi-gaji' && $_GET['halaman'] != 'detail-gaji' && $_GET['halaman'] != 'transaksi-gaji' && $_GET['halaman'] != 'ubah-gaji') {echo " collapse";} ?>" id="sidebarGaji">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$link?>input-gaji">Input Gaji</a>
                                    </li><!-- end nav-item -->
                                    <li class="nav-item">
                                        <a class="nav-link <?php if ($_GET['halaman']=='detail-transaksi-gaji' || $_GET['halaman']=='detail-gaji' || $_GET['halaman']=='transaksi-gaji' || $_GET['halaman']=='ubah-gaji') {echo " active";} ?>" href="
                                            <?=$link?>data-gaji">Data Gaji</a>
                                    </li><!-- end nav-item -->
                                </ul><!-- end nav -->
                            </div><!-- end sidebarGaji -->
                        </li><!-- end nav-item -->
                        <!-- Absensi Section -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$link?>absensi">Absensi</a>
                        </li><!-- end nav-item -->
                    </ul><!-- end navbar-nav -->
                </div><!-- end sidebarCollapse -->
            </div><!-- end Apps Content -->
            <?php } ?>
            <?php if (in_array($session_akses, [1, 3])) { ?>
            <!-- inventarsi tab -->
            <div id="MetricaUikit" class="main-icon-menu-pane  tab-pane <?php $active_class ?>" >
                <div class="title-box">
                    <h6 class="menu-title">Inventaris</h6>
                </div>
                <div class="collapse navbar-collapse" id="sidebarCollapse_2">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET['halaman']=='data-pembelian' || $_GET['halaman']=='detail-transaksi-pembelian'  || $_GET['halaman']=='input-pembelian' || $_GET['halaman']=='data-pembelian-pembelian') {echo " active";} ?>" href="#sidebarpem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGaji">
                                Pembelian
                            </a>
                            <div class="<?php if ($_GET['halaman'] != 'input-pembelian' || $_GET['halaman'] != 'data-pembelian' || $_GET['halaman'] != 'data-inventaris') {echo " collapse";} ?>" id="sidebarpem">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$link?>input-pembelian">Input Pembelian</a>
                                    </li><!-- end nav-item -->
                                    <li class="nav-item">
                                        <a class="nav-link <?php if ($_GET['halaman']=='data-pembelian' || $_GET['halaman']=='detail-transaksi-pembelian' || $_GET['halaman']=='ubah-transaksi-pembelian' ) {echo " active";} ?>"  href="<?=$link?>data-pembelian">Data Pembelian</a>
                                    </li><!-- end nav-item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$link?>stok-barang">Stok Barang</a>
                                    </li><!-- end nav-item -->
                                </ul><!-- end nav -->
                            </div><!-- end sidebarGaji -->
                        </li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$link?>penyerahan-inventaris">Penyerahan Inventaris</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET['halaman']=='unit-inv' || $_GET['halaman']=='input-unit' || $_GET['halaman']=='ubah-unit') {echo " active";} ?>" href="<?=$link?>unit-inv">Unit Inv</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($_GET['halaman']=='data-inventaris' || $_GET['halaman']=='detail-inventaris') {echo " active";} ?>" href="<?=$link?>data-inventaris">Data Inventaris</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                             <a class="nav-link <?php if ($_GET['halaman']=='laporan-pembelian' || $_GET['halaman']=='laporan-penyusutan') {echo " active";} ?>" href="#laporan" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGaji">
                                Laporan
                            </a>
                            <div class="<?php if ($_GET['halaman'] != 'laporan-pembelian') {echo " collapse";} ?>" id="laporan">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$link?>laporan-pembelian">Lap. Pembelian</a>
                                    </li><!-- end nav-item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$link?>laporan-penyusutan">Lap. Penyusutan</a>
                                    </li>
                                </ul><!-- end nav -->
                            </div><!-- end sidebarGaji -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Keperawatan -->
            <?php } if (in_array($session_akses, [1,4])) { ?>
                <div id="keperawatan" class="main-icon-menu-pane tab-pane <?= $halaman_keperawatan_yang_aktiv ?>"  role="tabpanel" aria-labelledby="keperawatan">
                    <div class="title-box">
                        <h6 class="menu-title">Keperawatan</h6>
                    </div>
                    <div  class="collapse navbar-collapse" id="kredensial">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="#sidebarkeperawartan" data-bs-toggle="collapse" role="button" aria-expanded="false" id="sidebarkeperawartan">
                                    Master
                                </a>
                                <div class="collapse" id="sidebarkeperawartan">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="master-form-rkk">Form RKK</a>
                                        </li>
                                    </ul>
                                </div> -->
                                <a class="nav-link" href="<?=$link?>master-form-rkk">Form RKK</a>
                                <a class="nav-link" href="<?=$link?>data-kredensial">Data Kredensial</a>
                                <a class="nav-link" href="<?=$link?>pengajuan-kredensial">Pengajuan</a>
                                <a class="nav-link" href="<?=$link?>data-pengajuan-kredensial">Data Pengajuan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <!-- Akhir keperawatan -->
            <!-- end of inventaris -->
        </div><!-- end menu-body -->
    </div><!-- end main-menu-inner -->
</div><!-- end leftbar-tab-menu -->