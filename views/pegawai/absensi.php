<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
require 'env/koneksi.php';
require 'env/tgl_indo.php';
$n = $pecahuser['nopeg'];
// Dekripsi data

$ambil = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$n'");
$pecah = $ambil->fetch_assoc();





?>

<?php if (isMobileDevice()) { ?>
    <style>
        .leftbar-tab-menu {
            display: none; /* Menyembunyikan menu saat halaman dimuat */
        }
    </style>
<?php } ?>

<div class="row" style="background-image: url('<?=$link?>public/resources/assets/images/p-1.png'); background-size: cover; background-position: center center;">
    <div class="col-lg-5 mx-auto">
        <div class="card">
            <div class="card-body p-0 auth-header-box bg-dark">
                <div class="text-center p-3">
                    <a href="<?=$link?>beranda" class="logo logo-admin">
                        <img src="<?=$link?>public/resources/assets/images/lg.png" height="60" alt="logo" class="auth-logo">
                    </a>
                    <h4 class="mt-2 mb-1 fw-semibold text-white font-18">Coming Soon !!!</h4>   
                    <p class="text-muted  mb-0">Fitur ini akan segera hadir di update berikutnya.</p>  
                </div>
            </div>
            <div class="card-body">
                <div class="ex-page-content text-center">
                    <img src="<?=$link?>public/resources/assets/images/error.svg" alt="0" class="" height="170">
                    <h1 class="mt-5 mb-4">404!</h1>  
                    <h5 class="font-16 text-muted mb-5">Please Wait Until Next Update</h5>                                    
                </div>          
                <a class="btn btn-primary w-100" href="<?=$link?>beranda">Back to Dashboard <i class="fas fa-redo ml-1"></i></a>                         
            </div><!--end card-body-->
            <div class="card-body bg-light-alt text-center">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> Team IT RSPM                                           
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>