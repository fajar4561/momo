<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <!-- LOGO KECIL -->
        <a href="beranda" class="logo logo-metrica d-block text-center">
            <span>
                <img src="<?=$link?>public/resources/assets/images/lg.png" alt="logo-small" class="logo-sm">
            </span>
        </a>

        <div class="main-icon-menu-body">
            <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <!-- DASHBOARD -->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <a href="#MetricaDashboard" id="dashboard-tab" data-bs-toggle="tab"
                           class="nav-link <?php if (in_array($_GET['halaman'], ['beranda','profil','detail-gaji'])) echo 'active'; ?>">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a>
                    </li>

                    <!-- KEPERAWATAN -->
                    <?php 
                    $halaman_keperawatan_aktiv = ['master-form-rkk','pengajuan-kredensial','detail-kredensial','data-kredensial','data-pengajuan-kredensial'];
                    $halaman_keperawatan_yang_aktiv = in_array($halaman, $halaman_keperawatan_aktiv) ? 'active' : '';
                    ?>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Keperawatan" data-bs-trigger="hover">
                        <a href="#keperawatan" id="keperawatan-tab" data-bs-toggle="tab"
                           class="nav-link <?=$halaman_keperawatan_yang_aktiv?>">
                            <i class="ti ti-flask menu-icon"></i>
                        </a>
                    </li>

                    <!-- APPS (hanya untuk admin) -->
                    <?php if ($session_akses!=0) { ?>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Apps" data-bs-trigger="hover">
                        <a href="#MetricaApps" id="apps-tab" data-bs-toggle="tab"
                           class="nav-link <?php if (in_array($_GET['halaman'], ['detail-pegawai','transaksi-gaji','detail-transaksi-gaji','ubah-gaji'])) echo 'active'; ?>">
                            <i class="ti ti-apps menu-icon"></i>
                        </a>
                    </li>

                    <!-- MY -->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="My" data-bs-trigger="hover">
                        <a href="#MetricaUikit" id="uikit-tab" data-bs-toggle="tab" class="nav-link">
                            <i class="ti ti-planet menu-icon"></i>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <!-- PROFILE FOTO -->
        <div class="pro-metrica-end">
            <a href="" class="profile">
                <img src="<?=$link?>public/img/<?=$pecahuser['foto']?>"
                     style="aspect-ratio: 1/1; width: 100%; max-width: 100px; border-radius: 50%; object-fit: cover;"
                     alt="profile-user" class="rounded-circle thumb-sm">
            </a>
        </div>
    </div>

    <!-- MENU BESAR DI SAMPING -->
    <div class="main-menu-inner">
        <!-- LOGO BESAR -->
        <div class="topbar-left">
            <a href="<?=$link?>beranda" class="logo">
                <span><h3 class="p-2">RSPM</h3></span>
            </a>
        </div>

        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <!-- DASHBOARD -->
            <div id="MetricaDashboard"
                 class="main-icon-menu-pane tab-pane <?php if (in_array($_GET['halaman'], ['beranda','profil','detail-gaji'])) echo 'active'; ?>"
                 role="tabpanel" aria-labelledby="dashboard-tab">

                <div class="title-box">
                    <h6 class="menu-title">Dashboard</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="<?=$link?>beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=$link?>upload-berkas">Berkas Kepegawaian</a></li>
                    <?php if ($session_akses!=0) { ?>
                        <li class="nav-item"><a class="nav-link <?php if (in_array($_GET['halaman'], ['profil','detail-gaji'])) echo 'active'; ?>" href="<?=$link?>profil">Profil Saya</a></li>
                    <?php } ?>
                </ul>
            </div>

            <!-- KEPERAWATAN -->
            <div id="keperawatan"
                 class="main-icon-menu-pane tab-pane <?=$halaman_keperawatan_yang_aktiv?>"
                 role="tabpanel" aria-labelledby="keperawatan-tab">

                <div class="title-box">
                    <h6 class="menu-title">Keperawatan</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="<?=$link?>master-form-rkk">Form RKK</a></li>
                    <li class="nav-item"><a class="nav-link <?=($_GET['halaman']=='data-kredensial'?'active':'')?>" href="<?=$link?>data-kredensial">Data Kredensial</a></li>
                    <li class="nav-item"><a class="nav-link <?=($_GET['halaman']=='pengajuan-kredensial'?'active':'')?>" href="<?=$link?>pengajuan-kredensial">Pengajuan</a></li>
                    <li class="nav-item"><a class="nav-link <?=($_GET['halaman']=='data-pengajuan-kredensial'?'active':'')?>" href="<?=$link?>data-pengajuan-kredensial">Data Pengajuan</a></li>
                </ul>
            </div>

            <!-- APPS -->
            <?php if ($session_akses!=0) { ?>
            <div id="MetricaApps"
                 class="main-icon-menu-pane tab-pane <?php if (in_array($_GET['halaman'], ['detail-pegawai','transaksi-gaji','detail-transaksi-gaji','ubah-gaji'])) echo 'active'; ?>"
                 role="tabpanel" aria-labelledby="apps-tab">
                <div class="title-box">
                    <h6 class="menu-title">Apps</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="<?=$link?>transaksi-gaji">Transaksi Gaji</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=$link?>data-pegawai">Data Pegawai</a></li>
                </ul>
            </div>

            <!-- MY -->
            <div id="MetricaUikit"
                 class="main-icon-menu-pane tab-pane"
                 role="tabpanel" aria-labelledby="uikit-tab">
                <div class="title-box">
                    <h6 class="menu-title">My Menu</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="<?=$link?>pengaturan">Pengaturan</a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
