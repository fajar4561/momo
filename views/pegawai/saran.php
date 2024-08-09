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
<div class="row p-3 justify-content-center">
    <?php if ($session_akses==1) { ?>
        <div class="col-12">
            <div class="email-leftbar">
                <button type="button" class="btn btn-primary btn-sm w-100 " data-bs-toggle="modal" data-animation="bounce" data-bs-target="#compose-modal">
                    <i class="fas fa-feather-alt me-2"></i>Compose
                </button>

                <div class="card mt-3">
                    <div class="card-body">
                        <div class="mail-list">
                            <a href="#" class="active pt-0"><i class="las la-inbox font-15 me-1"></i>Inbox <span class="ms-1">(5)</span></a>
                            <a href="#"><i class="las la-star font-15 me-1"></i>Starred</a>
                            <a href="#"><i class="las la-tag font-15 me-1"></i>Important</a>
                            <a href="#"><i class="las la-file-alt font-15 me-1"></i>Draft</a>
                            <a href="#"><i class="las la-paper-plane font-15 me-1"></i>Sent Mail</a>
                            <a href="#"><i class="las la-trash-alt font-15 me-1"></i>Trash</a>
                        </div>   
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- End Left sidebar -->


            <!-- Right Sidebar -->
            <div class="email-rightbar">
                <div class="float-end d-flex justify-content-between">
                    <div class="btn-group ms-1">
                        <button type="button" class="btn btn-sm btn-de-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-question-circle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>
                    <div class="btn-group ms-1">
                        <button type="button" class="btn btn-sm btn-de-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Display density</a>
                            <a class="dropdown-item" href="#">Themes</a>
                            <a class="dropdown-item" href="#">Help</a>
                        </div>
                    </div>
                </div><!-- end div -->
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-de-secondary "><i class="fas fa-inbox"></i></button>
                        <button type="button" class="btn btn-sm btn-de-secondary "><i class="fas fa-exclamation-circle"></i></button>
                        <button type="button" class="btn btn-sm btn-de-secondary "><i class="fas fa-trash"></i></button>
                    </div>
                    <div class="btn-group ms-1">
                        <button type="button" class="btn btn-sm btn-de-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-folder"></i><i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>
                    <div class="btn-group ms-1">
                        <button type="button" class="btn btn-sm btn-de-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-tag"></i><i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>

                    <div class="btn-group ms-1">
                        <button type="button" class="btn btn-sm btn-de-secondary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            More<i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Mark as Unread</a>
                            <a class="dropdown-item" href="#">Mark as Important</a>
                            <a class="dropdown-item" href="#">Add to Tasks</a>
                            <a class="dropdown-item" href="#">Add Star</a>
                            <a class="dropdown-item" href="#">Mute</a>
                        </div>
                    </div>                                        
                </div><!-- end toolbar -->


                <div class="card my-3">
                    <?php if (isset($_GET['pesan'])) {?>
                        <div class="card-body">
                            <div class="media mb-4">
                                <?php
                                $pesan = $_GET['pesan']; 
                                $stmt = $koneksi->prepare("SELECT * FROM saran INNER JOIN pegawai ON pegawai.nopeg = saran.nopeg WHERE saran.id = ?");
                                                    // Bind parameter
                                $stmt->bind_param("s", $pesan);

                                                    // Jalankan query
                                $stmt->execute();

                                                    // Ambil hasil query
                                $result = $stmt->get_result();
                                $data_pesan = $result->fetch_assoc();
                                ?>
                                <img class="d-flex me-2 rounded-circle thumb-md" src="<?=$link?>public/img/<?=$data_pesan['foto']?>" alt="Generic placeholder image">
                                <div class="media-body align-self-center">
                                    <h5 class="font-14 m-0"><?=$data_pesan['nama']?></h5>
                                    <small class="text-muted"><?=$data_pesan['unit']?> - <?=$data_pesan['jabatan']?></small>
                                </div>
                            </div>
                            <p><?=nl2br($data_pesan['saran'])?></p>
                            <a href="../profil" class="btn btn-de-primary btn-sm"><i class="mdi mdi-reply"></i> Kembali</a>
                            
                        </div>

                    <?php } else { ?>
                        <ul class="message-list">
                            <?php
                            require_once 'env/tgl_indo.php';  
                            $ambil_saran = $koneksi->query("SELECT * FROM saran ORDER BY tgl_saran ASC");
                            while ($data_saran = mysqli_fetch_assoc($ambil_saran)) {
                                $saran_nopeg = $data_saran['nopeg'];
                                            // ambil data beradasarkan nopeg
                                $ambil_nopeg = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$saran_nopeg'");
                                $data_nopeg = $ambil_nopeg->fetch_assoc();
                                ?>
                                <li>                                           
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <input type="checkbox" id="chk7">
                                            <label for="chk7" class="toggle"></label>
                                        </div>
                                        <a href="profil/<?=$data_saran['id']?>">
                                            <p class="title"><?=$data_nopeg['nama']?></p><span class="star-toggle far fa-star"></span>
                                        </a>                                                     
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="profil/<?=$data_saran['id']?>" class="subject"> <span class="teaser"><?=$data_saran['saran']?></span>
                                        </a>
                                        <div class="date"><?=tgl_indo($data_saran['tgl_saran'])?></div>
                                    </div>                                           
                                </li>
                            <?php }  ?>
                        </ul>
                    <?php } ?>
                </div> <!-- panel -->

                <div class="row mb-3">
                    <div class="col-7 align-self-center">
                        Showing 1 - 20 of 1,524
                    </div><!-- end Col -->
                    <div class="col-5">
                        <div class="btn-group float-end">
                            <button type="button" class="btn btn-sm btn-de-secondary waves-effect mb-0"><i class="fa fa-chevron-left"></i></button>
                            <button type="button" class="btn btn-sm btn-de-secondary waves-effect mb-0"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div><!-- end Col -->
                </div> <!--end row-->   
            </div>
        </div>
    <?php } else { ?>
        <div class="col-md-9">
         
            <div class="card">
                <div class="card-header" style="background-image: url('<?=$link?>public/resources/assets/images/small/feed.jpg'); background-size: cover; background-position: center center;">
                    <h2 class="card-title text-white">Bantu Kami Menjadi Lebih Baik</h2>
                    <p>Masukan Anda sangat berharga bagi kami. Silakan sampaikan kritik dan saran Anda melalui formulir di bawah ini.</p>
                </div>
                <form method="post" action="<?=$link?>app/controller/pengguna/kirim-masukan.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="nopeg" value="<?=$n?>">
                                <textarea name="input" class="form-control" rows="5" placeholder="Tinggalkan pesan di sini .........."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 offset-lg-5">
                                <button type="submit" class="btn btn-de-primary">Kirm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
