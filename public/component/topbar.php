<!-- Top Bar Start -->
<!-- Top Bar Start -->
<div class="topbar">            
    <!-- Navbar -->
    <nav class="navbar-custom" id="navbar-custom">    
        <ul class="list-unstyled topbar-nav float-end mb-0">
            

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" aria-expanded="false">
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
                    </div><!--end media-body-->
                </div><!--end media-->
            </a><!--end-item-->
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
                    </div><!--end media-body-->
                </div><!--end media-->
            </a><!--end-item-->
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
                    </div><!--end media-body-->
                </div><!--end media-->
            </a><!--end-item-->
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
                    </div><!--end media-body-->
                </div><!--end media-->
            </a><!--end-item-->
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
                    </div><!--end media-body-->
                </div><!--end media-->
            </a><!--end-item-->
        </div>
        <!-- All-->
        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
            View all <i class="fi-arrow-right"></i>
        </a>
    </div>
</li>

<li class="dropdown">
    <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
    aria-haspopup="false" aria-expanded="false">
    <div class="d-flex align-items-center">
        <img src="<?=$link?>public/img/<?=$pecahuser['foto']?>" alt="profile-user" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; border-radius: 50%; object-fit: cover;" class="rounded-circle me-2 thumb-sm" />
        <div>
            <small class="d-none d-md-block font-11"><?=$pecahuser['jabatan']?>-<?=$pecahuser['unit']?></small>
            <span class="d-none d-md-block fw-semibold font-12"><?=$pecahuser['nama']?> <i
                class="mdi mdi-chevron-down"></i></span>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="<?=$link?>login"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
    </div>
</li><!--end topbar-profile-->
<li class="notification-list">
    <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
        <i class="ti ti-settings ti-spin"></i>
    </a>
</li>   
</ul><!--end topbar-nav-->

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
<!-- Top Bar End -->
<!-- Top Bar End -->
<div class="modal fade" id="exampleModalDefaultmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Menu</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        
                        <a href="<?=$link?>beranda">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 p-3">
                                            <center><h3>Gaji</h3></center>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?=$link?>public/resources/assets/images/home.jpg" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 90px; height: auto; border-radius: 50%; object-fit: cover;" class="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="<?=$link?>profil">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 p-3">
                                            <center><h3>Profil</h3></center>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?=$link?>public/resources/assets/images/profil.jpg" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 80px; height: auto; border-radius: 50%; object-fit: cover;" class="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="<?=$link?>berkas-kepegawaian">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 p-3">
                                            <center><h3>Berkas Kepegawaian</h3></center>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?=$link?>public/resources/assets/images/berkas.jpg" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 80px; height: auto; border-radius: 50%; object-fit: cover;" class="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="<?=$link?>absensi">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 p-3">
                                            <center><h3>Absensi</h3></center>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?=$link?>public/resources/assets/images/k&s.jpg" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 80px; height: auto; border-radius: 50%; object-fit: cover;" class="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="<?=$link?>kritik">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 p-3">
                                            <center><h3>Kritik & Saran</h3></center>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?=$link?>public/resources/assets/images/small/beranda.jpg" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 80px; height: auto;border-radius: 50%; object-fit: cover;" class="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="<?=$link?>login">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 p-3">
                                            <center><h3>Logout</h3></center>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?=$link?>public/resources/assets/images/small/img-1.gif" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 80px; height: auto;border-radius: 50%; object-fit: cover;" class="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--end row-->                                                      
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div><!--end modal-->