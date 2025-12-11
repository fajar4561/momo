<!-- Top Bar Start -->
<!-- Top Bar Start -->
<?php 
    if (isMobileDevice()) { 
        require 'style-topbar.php';
        $jen_kes = $pecahuser['jenis_pegawai'];
?>
<div class="pwa-shell" id="pwaShell">
    <!-- TOP BAR -->
    <div class="pwa-topbar">
        <button class="btn-hamburger" id="btnHamburger" aria-label="Open menu">
            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.5" width="18" height="2" rx="1" fill="#111" />
                <rect y="6" width="18" height="2" rx="1" fill="#111" opacity="0.65" />
                <rect y="11.5" width="18" height="2" rx="1" fill="#111" opacity="0.35" /></svg>
        </button>
        <div class="app-title">RSPM</div>
        <div class="search-box d-none d-md-flex" style="display:none;">
            <input type="search" placeholder="Cari..." />
        </div>
        <div class="topbar-actions">
            <button class="btn-hamburger" id="btnNotif" title="Notifications" aria-label="Notifications">
                <svg width="18" height="18" viewBox="0 0 24 24">
                    <path fill="#0d6efd" d="M12 22a2 2 0 0 0 2-2H10a2 2 0 0 0 2 2Z" />
                    <path fill="#0d6efd" d="M19 17h-14v-1a6 6 0 0 1 6-6V8a4 4 0 1 1 8 0v2a6 6 0 0 1 0 12v-1Z" opacity="0.6" /></svg>
            </button>
            <!-- profile -->
            <img src="<?=$link?>public/img/<?=$pecahuser['foto']?>" alt="me" class="avatar-sm" />
        </div>
    </div>
    <!-- DRAWER -->
    <div class="pwa-drawer" id="pwaDrawer" aria-hidden="true">
        <div class="drawer-header">
            <div style="width:56px;height:56px;border-radius:12px;background:#eef6ff;display:grid;place-items:center;font-weight:700;color:var(--primary)">R</div>
            <div>
                <div class="drawer-title">
                    <?=$pecahuser['nama']?>
                </div>
                <div class="drawer-sub">
                    <?= $pecahuser['jabatan'] ?> •
                    <?= $pecahuser['unit'] ?>
                </div>
            </div>
        </div>
        <div class="drawer-list">
            <a class="drawer-item" href="<?=$link?>beranda">
                <div class="drawer-icon">🏠</div>
                <div>
                    <div class="drawer-label">Beranda</div>
                    <div class="drawer-subtext">Ringkasan & Notifikasi</div>
                </div>
            </a>
            <a class="drawer-item" href="<?=$link?>profil">
                <div class="drawer-icon">👤</div>
                <div>
                    <div class="drawer-label">Profil</div>
                    <div class="drawer-subtext">Data diri & pengaturan</div>
                </div>
            </a>
            <a class="drawer-item" href="<?=$link?>upload-berkas">
                <div class="drawer-icon">📁</div>
                <div>
                    <div class="drawer-label">Berkas</div>
                    <div class="drawer-subtext">Upload & status file</div>
                </div>
            </a>
            <?php if ($jen_kes==1) { ?>
                <a class="drawer-item" href="<?=$link?>pengajuan-kredensial">
                    <div class="drawer-icon">🩺</div>
                    <div>
                        <div class="drawer-label">Pengajuan Kredensial</div>
                        <div class="drawer-subtext">Proses pengajuan kredensial perawat / bidan</div>
                    </div>
                </a>
            <?php } ?>
            <a class="drawer-item" href="<?=$link?>absensi">
                <div class="drawer-icon">⏰</div>
                <div>
                    <div class="drawer-label">Absensi</div>
                    <div class="drawer-subtext">Presensi & riwayat</div>
                </div>
            </a>
            <a class="drawer-item" href="<?=$link?>kritik">
                <div class="drawer-icon">✉️</div>
                <div>
                    <div class="drawer-label">Kritik & Saran</div>
                    <div class="drawer-subtext">Sampaikan umpan balik</div>
                </div>
            </a>
            <a class="drawer-item" href="<?=$link?>login">
                <div class="drawer-icon">➜]</div>
                <div>
                    <div class="drawer-label">Logout</div>
                    <div class="drawer-subtext">Keluar Dari Aplikasi</div>
                </div>
            </a>
        </div>
        <div class="drawer-footer">
            <button class="btn-logout" onclick="location.href='<?=$link?>login'">Logout</button>
            <div style="flex:1"></div>
            <div class="badge-dot">v3.0.1</div>
        </div>
    </div>
    <div class="pwa-overlay" id="pwaOverlay"></div>
    <!-- MAIN CONTENT -->
    <main class="pwa-content" id="pwaContent">
        <a class="card-app" href="<?=$link?>beranda">
            <div class="icon">🏦</div>
            <div class="meta">
                <div class="title">Gaji</div>
                <div class="desc">Cek slip & transaksi</div>
            </div>
        </a>
        <a class="card-app" href="<?=$link?>profil">
            <div class="icon">👩‍⚕️</div>
            <div class="meta">
                <div class="title">Profil</div>
                <div class="desc">Informasi akun</div>
            </div>
        </a>
        <a class="card-app" href="<?=$link?>upload-berkas">
            <div class="icon">📂</div>
            <div class="meta">
                <div class="title">Upload Berkas</div>
                <div class="desc">Unggah & cek status</div>
            </div>
        </a>
        <a class="card-app" href="<?=$link?>absensi">
            <div class="icon">🕘</div>
            <div class="meta">
                <div class="title">Absensi</div>
                <div class="desc">Presensi kerja</div>
            </div>
        </a>
    </main>
    <!-- BOTTOM NAV -->
    <nav class="pwa-bottom" role="navigation" aria-label="Bottom navigation">
        <a class="bottom-item active" href="<?=$link?>beranda" data-page="home">
            <div class="bicon">🏠</div>
            <span>Home</span>
        </a>
        <?php if ($jen_kes==1) { ?>
            <a class="bottom-item" href="<?=$link?>data-pengajuan-kredensial" data-page="data-kredensial">
                <div class="bicon">💌</div>
                <span>Kredensial</span>
            </a>
        <?php } else { ?>
        <a class="bottom-item" href="#" data-page="pegawai">
            <div class="bicon">📇</div>
            <span>Cuti</span>
        </a>
        <?php } ?>
        <a class="bottom-item" href="<?=$link?>upload-berkas" data-page="berkas">
            <div class="bicon">📁</div>
            <span>Berkas</span>
        </a>
        <a class="bottom-item" href="<?=$link?>profil" data-page="me">
            <div class="bicon">👤</div>
            <span>Me</span>
        </a>
    </nav>

<script>
        // Drawer + overlay control
  const btnHamburger = document.getElementById('btnHamburger');
  const drawer = document.getElementById('pwaDrawer');
  const overlay = document.getElementById('pwaOverlay');

  function openDrawer(){
    drawer.classList.add('open');
    overlay.classList.add('show');
    drawer.setAttribute('aria-hidden','false');
  }
  function closeDrawer(){
    drawer.classList.remove('open');
    overlay.classList.remove('show');
    drawer.setAttribute('aria-hidden','true');
  }

  btnHamburger.addEventListener('click', openDrawer);
  overlay.addEventListener('click', closeDrawer);

  // Close drawer on ESC
  document.addEventListener('keydown', e => {
    if(e.key === 'Escape') closeDrawer();
  });

  // bottom nav active state handler (simple)
  document.querySelectorAll('.bottom-item').forEach(item=>{
    item.addEventListener('click', (e)=>{
      document.querySelectorAll('.bottom-item').forEach(i=>i.classList.remove('active'));
      item.classList.add('active');
      // navigate (if anchors) - default behavior will do it
    });
  });

  // Register a service worker for basic offline caching (optional but recommended)
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('sw-pwa.js').then(function(reg) {
        console.log('ServiceWorker registered: ', reg.scope);
      }).catch(function(err) {
        console.log('ServiceWorker registration failed: ', err);
      });
    });
  }
</script>
    <?php } else { ?>
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-bell"></i>
                        <span class="alert-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
                        <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                            Notifications <span class="badge bg-soft-primary badge-pill">2</span>
                        </h6>
                        <div class="notification-menu" data-simplebar>
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">2 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-chart-arcs"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">10 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-device-computer-camera"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">40 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-diamond"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">1 hr ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-drone"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">2 hrs ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <img src="<?=$link?>public/img/<?=$pecahuser['foto']?>" alt="profile-user" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; border-radius: 50%; object-fit: cover;" class="rounded-circle me-2 thumb-sm" />
                            <div>
                                <small class="d-none d-md-block font-11">
                                    <?php
                                    $pj = strlen($pecahuser['jabatan']);
                                    if ($pj <= 20) {
                                        echo $pecahuser['jabatan'].'-'.$pecahuser['unit'];
                                    }
                                    else {
                                        echo $pecahuser['unit'];
                                    }
                                ?>
                                </small>
                                <span class="d-none d-md-block fw-semibold font-12">
                                    <?=$pecahuser['nama']?> <i class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="<?=$link?>login"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                    </div>
                </li>
                <!--end topbar-profile-->
                <li class="notification-list">
                    <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
                        <i class="ti ti-settings ti-spin"></i>
                    </a>
                </li>
            </ul>
            <!--end topbar-nav-->
            <ul class="list-unstyled topbar-nav mb-0">
                <?php if (isMobileDevice()) { ?>
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" data-bs-toggle="modal" data-bs-target="#exampleModalDefaultmenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li>
                <?php } else { ?>
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li>
                <?php } ?>
                <li class="hide-phone app-search">
                    <form role="search" action="#" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">
                        <button type="submit"><i class="ti ti-search"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <?php } ?>
    <!-- Top Bar End -->
    <!-- Top Bar End -->
    <div class="modal fade" id="exampleModalDefaultmenu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h6 class="modal-title">Menu</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mobile-menu-grid">
                        <a href="<?=$link?>beranda" class="mobile-menu-item">
                            <div class="icon-box">
                                <i class="ti ti-cash"></i>
                            </div>
                            <span>Gaji</span>
                        </a>
                        <a href="<?=$link?>profil" class="mobile-menu-item">
                            <div class="icon-box">
                                <i class="ti ti-user"></i>
                            </div>
                            <span>Profil</span>
                        </a>
                        <a href="<?=$link?>upload-berkas" class="mobile-menu-item">
                            <div class="icon-box">
                                <i class="ti ti-folder"></i>
                            </div>
                            <span>Berkas</span>
                        </a>
                        <a href="<?=$link?>absensi" class="mobile-menu-item">
                            <div class="icon-box">
                                <i class="ti ti-calendar-check"></i>
                            </div>
                            <span>Absensi</span>
                        </a>
                        <a href="<?=$link?>kritik" class="mobile-menu-item">
                            <div class="icon-box">
                                <i class="ti ti-message-dots"></i>
                            </div>
                            <span>Kritik</span>
                        </a>
                        <a href="<?=$link?>login" class="mobile-menu-item">
                            <div class="icon-box">
                                <i class="ti ti-logout"></i>
                            </div>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal-->