<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
	echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
date_default_timezone_set('Asia/Jakarta');
require 'env/koneksi.php';
$n = $pecahuser['nopeg'];
// Dekripsi data

$ambil = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$n'");
$pecah = $ambil->fetch_assoc();

// ambil gaji terbaru

$ambil_baru = $koneksi->query("SELECT * FROM gaji WHERE nopeg='$n' ORDER BY tgl_gaji DESC");
$data_gaji_baru = $ambil_baru->fetch_assoc();


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

$tanggal_hari_ini = date("Y-m-d");
$jam = date('H');

// ucapan sistem
if ($jam >= 5 && $jam < 12) {
    $ucapan = "Selamat Pagi";
} elseif ($jam >= 12 && $jam < 18) {
    $ucapan = "Selamat Siang";
} else {
    $ucapan = "Selamat Malam";
}

?>
<?php 
require 'env/nama_bulan.php';
if (isMobileDevice()) { ?>
<style>
    .leftbar-tab-menu {
			display: none; /* Menyembunyikan menu saat halaman dimuat */
		}

	.hidden {
	    display: none;
	}
	.scrollable-content {
	    display: flex; /* Menyusun elemen secara horizontal */
	    overflow-x: auto; /* Menampilkan scroll horizontal jika konten melebihi lebar */
	    padding: 10px 0; /* Optional: padding untuk ruang sekitar konten */
	}

	.scrollable-content::-webkit-scrollbar { /* Menyembunyikan tampilan scrollnya */
	    display: none;
	  }

	.scrollable-item {
	    flex-shrink: 0; /* Mencegah elemen untuk mengecil */
	    margin-right: 8px; /* Optional: margin antar card */
	    width: 49%; /* Pastikan lebar sesuai dengan lebar card */
	}

	.scrollable-item .card {
	    width: 100%; /* Mengatur card untuk mengisi kontainer */
	}

	/* ////////// */
	 .scrollable-container {
	    display: flex;
	    overflow-x: auto;
	    padding: 10px 0;
	  }

	  .col-2 {
	    flex: 0 0 auto; /* Prevent column from stretching */
	    margin-right: 5px;
	    display: flex;
	    flex-direction: column;
	    align-items: center; /* Center content horizontally */
	    justify-content: center; /* Center content vertically */
	  }

	  /* Additional styling for the button and text */
	  .btn2 {
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    justify-content: center;
	    height: 40px; /* Adjust the height to ensure there’s enough space */
	    width: 40px; /* Adjust width to your preference */
	  }

	  /* Optional: Hide scrollbar but still allow scrolling */
	  .scrollable-container::-webkit-scrollbar {
	    display: none;
	  }

	  /* For Firefox */
	  .scrollable-container {
	    scrollbar-width: none; /* Hide scrollbar in Firefox */
	  }

	  /* Align text below the button */
	  .col-2 small {
	    margin-top: 5px;
	  }

	  /* footer card agar melengkung */
	  .card2 {
		  border: 1px solid #ddd;
		  border-radius: 10px; /* Melengkungkan keseluruhan card */
		  overflow: hidden; /* Agar konten tidak keluar dari area melengkung */
		}
	  .card-footer2 {
		  background-color: #f8f9fa;
		  padding: 10px;
		  border-radius: 0 0 10px 10px; /* Melengkungkan hanya sudut bawah */
		  border-top: 1px solid #ddd; /* Menambah garis pemisah dengan body */
		}
		/* Overlay untuk blur dan gelap */
		.overlay-blur {
		    position: fixed; /* Agar overlay mencakup seluruh layar */
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    background: rgba(0, 0, 0, 0.5); /* Warna gelap dengan transparansi */
		    backdrop-filter: blur(5px); /* Efek blur */
		    z-index: 998; /* Di bawah dropdown */
		    display: none; /* Default tersembunyi */
		}

		/* Menampilkan overlay */
		.overlay-blur.active {
		    display: block;
		}

		/* Dropdown menu tetap di atas overlay */
		.dropdown-menu {
		    position: relative;
		    z-index: 999;
		}
</style>
<!-- TAMPILAN DARI HALAMAN BERANDA MENGGUNAKAN HANDPHONE -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card2 shadow-sm">
            <div class="card-body" style="height: 50px;">
                <div class="row">
                    <div class="col-4" style="border-right: 1px solid #ccc;">
                        <center><strong><span><small>INCOME</small></span></strong></center>
                    </div>
                    <div class="col-4" style="border-right: 1px solid #ccc;">
                        <center><strong><span><small>Rp.
                                        <?=number_format($data_gaji_baru['total_pendapatan'])?></small></span></strong></center>
                    </div>
                    <div class="col-4">
                        <center><span class="badge rounded-pill badge-outline-primary">
                                <?=bulan_indonesia($data_gaji_baru['bulan'])?>
                                <?=$data_gaji_baru['tahun']?></span></center>
                    </div>
                </div>
            </div>
            <div class="card-footer card-footer2 bg-primary">
                <div class="row justify-content-end">
                    <div class="col-8 mt-1">
                        <span class="text-white">Klik Di sini untuk melihat gaji</span>
                    </div>
                    <!--end col-->
                    <div class="col-4 text-end">
                        <a href="#" class="btn text-white " id="toggleButton">
                            <i class="las la-hand-point-down" style="font-size: 20px;"></i>
                        </a>
                    </div>
                </div>
                <div class="row hidden" id="additionalContent">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <small><span class="text-white">Berikut ini merupakan list gaji anda. Silahkan Hub IT / HRD apabila ada problem</span></small>
                            </div>
                        </div>
                    </div>
                    <div class="scrollable-content p-2">
                        <?php 
			                $ambildata = $koneksi->query("SELECT * FROM gaji WHERE nopeg='$n' AND status=1 ORDER BY tgl_gaji DESC");
			                $no = 1;
			                require 'env/tgl_indo.php';
			                
			                while ($data = mysqli_fetch_assoc($ambildata)) {
		                ?>
                        <div class="scrollable-item">
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">
                                        <?=bulan_indonesia($data['bulan'])?>
                                        <?=$data['tahun']?></span>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm-12">
                                            <small><span class="text-muted"> Update
                                                    <?= date("d, M Y", strtotime($data['tgl_gaji'])) ?></small></p></span>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="text-muted">Rp.
                                                <?=number_format($data['total_pendapatan'])?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dropdownMenu<?=$data['id'] ?>" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-caret-square-down font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu<?= $data['id'] ?>">
                                                    <a class="dropdown-item" href="<?=$link?>detail-gaji/<?=$data['kode_transaksi']?>&nopeg=<?=$n?>">Lihat</a>
                                                    <a class="dropdown-item" href="<?=$link?>app/print/gaji/pdf.php?kode=<?=$data['kode_transaksi']?>&nopeg=<?=$n?>" target="_blank">Download PDF</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimaryy<?=$data['id']?>">Slip Potongan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalPrimaryy<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Slip Potongan</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!--end modal-header-->
                                    <div class="modal-body">
                                        <div class="row p-3">
                                            <div class="col-lg-12">
                                                <h5>Potongan
                                                    <?=bulan_indonesia($data['bulan'])?>
                                                    <?=$data['tahun']?>
                                                </h5>
                                                <span class="badge bg-soft-secondary">
                                                    <?=$pecah['nama']?></span>
                                                <small class="text-muted ml-2">No :
                                                    <?=$data['no_gaji']?></small>
                                                <ul class="mt-3 mb-0">
                                                    <li>Gaji Netto : Rp.
                                                        <?=number_format($data['total_pendapatan'])?>
                                                    </li>
                                                    <li>Obat : Rp.
                                                        <?=number_format($data['obat'])?>
                                                    </li>
                                                    <li>Seragam : Rp.
                                                        <?=number_format($data['seragam'])?>
                                                    </li>
                                                    <li>Kredit BTN : Rp.
                                                        <?=number_format($data['kredit'])?>
                                                    </li>
                                                    <li>Pelatihan : Rp.
                                                        <?=number_format($data['pelatihan'])?>
                                                    </li>
                                                    <li>Uang Gedung PPNI : Rp.
                                                        <?=number_format($data['uang_gedung'])?>
                                                    </li>
                                                    <li>Total Potongan : Rp.
                                                        <?=number_format($data['total_potongan_slip'])?>
                                                    </li>
                                                    <li>Transfer : Rp.
                                                        <?=number_format($data['transfer'])?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <!--end modal-footer-->
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div id="carouselCards" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <!-- Carousel Inner -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="card card2">
                        <div class="card-body" style="
						    background: url('<?=$link?>public/bg/bg05.webp'); 
						    background-size: cover; 
						    background-blend-mode: overlay; 
						    background-position: center center;">
                            <div class="row">
                                <!-- Teks Header -->
                                <div class="col-8">
                                    <h5 class="fw-bold">Perbaharui Profil Anda !!</h5>
                                    <p class="text-muted"><small>Pastikan Anda selalu mengupdate profil anda. klik <a href="profil"><strong>disini</strong></a> untuk update profil</small></p>
                                </div>
                                <!-- Gambar Header -->
                                <div class="col-4 text-center">
                                    <img src="public/bg/objek2.webp" class="img-fluid rounded" alt="Header Image" style="aspect-ratio: 1 / 1; width: 100%; max-width: 150px; height: auto; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="card card2">
                        <div class="card-body" style="
						    background: url('<?=$link?>public/bg/bg06.webp'); 
						    background-size: cover; 
						    background-blend-mode: overlay; 
						    background-position: center center;">
                            <div class="row">
                                <!-- Gambar Header -->
                                <div class="col-4 text-center">
                                    <img src="public/bg/9.webp" class="img-fluid rounded" alt="Header Image" style="aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; object-fit: cover;">
                                </div>
                                <!-- Teks Header -->
                                <div class="col-8">
                                    <h5 class="fw-bold">Berkas Kepegawaian</h5>
                                    <p class="text-muted"><small>Upload Berkas anda sekarang juga seperti KTP,KK,Sertifikat dll. klik <a href="upload-berkas"><strong>disini</strong></a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="card card2">
                        <div class="card-body" style="
						    background: url('<?=$link?>public/bg/bg07.webp'); 
						    background-size: cover; 
						    background-blend-mode: overlay; 
						    background-position: center center;">
                            <div class="row">
                                <!-- Gambar Header -->
                                <div class="col-4 text-center">
                                    <img src="public/bg/6531.webp" class="img-fluid rounded" alt="Header Image" style="aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto; border-radius: 50%; object-fit: cover;">
                                </div>
                                <!-- Teks Header -->
                                <div class="col-8">
                                    <h5 class="fw-bold">Info</h5>
                                    <p><small>Anda Bisa menghubungi Team IT / HRD apabila mengalami kesulitan dalam proses penggunaan aplikasi</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Wrapper for horizontal scroll -->
        <div class="scrollable-container">
            <div class="col-2">
                <a href="profil" type="button" class="btn btn2 btn-icon-square-xl">
                    <img src="public/bg/3.gif" alt="Icon" style="width: 50px; height: 50px;">
                </a>
                <center><small class="text-center">Profil</small></center>
            </div>
            <div class="col-2">
                <a href="upload-berkas" type="button" class="btn btn2 btn-icon-square-xl">
                    <img src="public/bg/2.gif" alt="Icon" style="width: 50px; height: 50px;">
                </a>
                <center><small class="text-center">Berkas</small></center>
            </div>
            <div class="col-2">
                <a href="absensi" type="button" class="btn btn2 btn-icon-square-xl">
                    <img src="public/bg/4.gif" alt="Icon" style="width: 40px; height: 40px;">
                </a>
                <center><small class="text-center">Absensi</small></center>
            </div>
            <div class="col-2">
                <a href="kritik" type="button" class="btn btn2 btn-icon-square-xl">
                    <img src="public/bg/1.gif" alt="Icon" style="width: 50px; height: 50px;">
                </a>
                <center><small class="text-center">Q&A</small></center>
            </div>
            <div class="col-2">
                <a href="#" type="button" class="btn btn2 btn-icon-square-xl">
                    <img src="public/bg/5.gif" alt="Icon" style="width: 50px; height: 50px;">
                </a>
                <center><small class="text-center">INV</small></center>
            </div>
            <div class="col-2">
                <a href="login" type="button" class="btn btn2 btn-icon-square-xl">
                    <img src="public/bg/6.gif" alt="Icon" style="width: 50px; height: 50px;">
                </a>
                <center><small class="text-center">Logout</small></center>
            </div>
            <!-- Add more if needed -->
        </div>
    </div>
</div>
<?php 
$nama = strtolower($pecah['nama']);
$nama_parts = explode(' ', $nama);
$dua_kata_pertama = implode(' ', array_slice($nama_parts, 0, 2));

?>
<div class="row justify-content-center align-items-center mt-2">
    <div class="col-lg-12 text-center">
        <center>
            <img src="public/bg/dashboard.webp" style="max-width: 70%; height: auto;" class="img-fluid rounded d-block" alt="Header Image">
        </center>
        <small>
            <h5>
                <?=$ucapan?>
                <?=ucfirst($dua_kata_pertama)?>
            </h5>
        </small>
    </div>
</div>
<script>
    document.getElementById('toggleButton').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tindakan default (navigasi ke `#`)
        const additionalContent = document.getElementById('additionalContent');
        if (additionalContent.classList.contains('hidden')) {
            additionalContent.classList.remove('hidden'); // Tampilkan elemen
        } else {
            additionalContent.classList.add('hidden'); // Sembunyikan elemen
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
        const overlay = document.createElement("div");
        overlay.className = "overlay-blur";
        document.body.appendChild(overlay);

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener("click", function (e) {
                e.stopPropagation(); // Mencegah bubbling event
                const isActive = overlay.classList.contains("active");
                overlay.classList.toggle("active", !isActive);
                
                // Klik overlay menutup dropdown
                if (!isActive) {
                    overlay.addEventListener("click", function () {
                        overlay.classList.remove("active");
                        const openDropdown = document.querySelector(".dropdown-menu.show");
                        if (openDropdown) {
                            openDropdown.classList.remove("show");
                        }
                    });
                }
            });
        });

        // Menutup overlay saat klik di luar dropdown
        document.addEventListener("click", function (e) {
            if (!e.target.closest(".dropdown-menu") && !e.target.closest(".dropdown-toggle")) {
                overlay.classList.remove("active");
                const openDropdown = document.querySelector(".dropdown-menu.show");
                if (openDropdown) {
                    openDropdown.classList.remove("show");
                }
            }
        });
    });
</script>
<?php } else { ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body" style="background-image: url('<?=$link?>public/resources/assets/images/bg1.jpg'); background-size: cover; background-position: center center;">
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
                        <!--end col-->
                        <div class="col-lg-4 ms-auto align-self-center">
                        </div>
                        <!--end col-->
                        <div class="col-lg-3 align-self-center">
                            <div class="row">
                            </div>
                            <!--end row-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end f_profile-->
            </div>
            <!--end card-body-->
            <div class="card-body p-0">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_GET['pesan']) {echo "";} else {echo " active";}?>" data-bs-toggle="tab" href="#Post" role="tab" aria-selected="
                            <?php if ($_GET['pesan']) {echo "false";} else {echo "true";}?>" >Gajiku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab" aria-selected="false">Pengaturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#absensi" role="tab" aria-selected="false">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_GET['pesan']) {echo " active";}?>" data-bs-toggle="tab" href="#saran" role="tab" aria-selected="
                            <?php if ($_GET['pesan']) {echo "active";} else {echo "false";}?>">Kritik & Saran</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane p-3 <?php if ($_GET['pesan']) {echo "";} else {echo " active";}?>" id="Post" role="tabpanel">
                        <div class="row mt-2 p-2">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="datatable_1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Gaji</th>
                                                    <th>Tanggal Update</th>
                                                    <th>Periode Gaji</th>
                                                    <th>Total Pendapatan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
													$ambildata = $koneksi->query("SELECT * FROM gaji WHERE nopeg='$n' AND status=1");
													$no = 1;
													require 'env/tgl_indo.php';
													require_once 'env/nama_bulan.php';
													while ($data = mysqli_fetch_assoc($ambildata)) {
												?>
                                                <tr>
                                                    <td>
                                                        <?=$no++?>
                                                    </td>
                                                    <td>
                                                        <?=$data['kode_transaksi']?> - (
                                                        <?=$data['no_gaji']?>)</td>
                                                    <td>
                                                        <?=tgl_indo($data['tgl_gaji'])?>
                                                    </td>
                                                    <td>
                                                        <?=bulan_indonesia($data['bulan'])?>
                                                        <?=$data['tahun']?>
                                                    </td>
                                                    <td>Rp.
                                                        <?=number_format($data['total_pendapatan'])?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-square btn-outline-dashed" data-bs-toggle="dropdown" aria-expanded="true">Lihat</a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?=$link?>detail-gaji/<?=$data['kode_transaksi']?>&nopeg=<?=$n?>">Slip Gaji</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary<?=$data['id']?>">Slip Potongan</a>
                                                        </div>
                                                        <a class="btn btn-secondary btn-square btn-outline-dashed" href="<?=$link?>app/print/gaji/pdf.php?kode=<?=$data['kode_transaksi']?>&nopeg=<?=$n?>" target="_blank">Download</a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModalPrimary<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Slip Potongan</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!--end modal-header-->
                                                            <div class="modal-body">
                                                                <div class="row p-3">
                                                                    <div class="col-lg-12">
                                                                        <h5>Potongan
                                                                            <?=bulan_indonesia($data['bulan'])?>
                                                                            <?=$data['tahun']?>
                                                                        </h5>
                                                                        <span class="badge bg-soft-secondary">
                                                                            <?=$pecah['nama']?></span>
                                                                        <small class="text-muted ml-2">No :
                                                                            <?=$data['no_gaji']?></small>
                                                                        <ul class="mt-3 mb-0">
                                                                            <li>Gaji Netto : Rp.
                                                                                <?=number_format($data['total_pendapatan'])?>
                                                                            </li>
                                                                            <li>Obat : Rp.
                                                                                <?=number_format($data['obat'])?>
                                                                            </li>
                                                                            <li>Seragam : Rp.
                                                                                <?=number_format($data['seragam'])?>
                                                                            </li>
                                                                            <li>Kredit BTN : Rp.
                                                                                <?=number_format($data['kredit'])?>
                                                                            </li>
                                                                            <li>Pelatihan : Rp.
                                                                                <?=number_format($data['pelatihan'])?>
                                                                            </li>
                                                                            <li>Uang Gedung PPNI : Rp.
                                                                                <?=number_format($data['uang_gedung'])?>
                                                                            </li>
                                                                            <li>Total Potongan : Rp.
                                                                                <?=number_format($data['total_potongan_slip'])?>
                                                                            </li>
                                                                            <li>Transfer : Rp.
                                                                                <?=number_format($data['transfer'])?>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--end col-->
                                                                </div>
                                                                <!--end row-->
                                                            </div>
                                                            <!--end modal-body-->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                            <!--end modal-footer-->
                                                        </div>
                                                        <!--end modal-content-->
                                                    </div>
                                                    <!--end modal-dialog-->
                                                </div>
                                                <!--end modal-->
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!-- Pengaturan pegawai -->
                    <div class="tab-pane p-3" id="Settings" role="tabpanel">
                        <!--Start-->
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title">Personal Information</h4>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
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
                                                            <?=$pecah['jabatan']?> <a href="#" class="btn btn-primary btn-sm btn-square btn-outline-dashed" id="btnTambah" name="btn_tmbh"><i class="fas fa-plus"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <?php 
					                                // chek apakah ada jabatan lainnya
					                                $ambil_jab = $koneksi->query("SELECT * FROM pegawai_jabatan WHERE nopeg='$n'");
					                                $ada_jabatan = $ambil_jab->num_rows;

					                                if ($ada_jabatan >= 0) {
					                            ?>
                                                        <th></th>
                                                        <th></th>
                                                        <td>
                                                            <?php 
					                                        // Array warna
					                                        $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-secondary'];

					                                        // Inisialisasi index warna
					                                        $colorIndex = 0;

					                                        while ($fetch_jabatan = mysqli_fetch_assoc($ambil_jab)) {
					                                            // Ambil warna berdasarkan index
					                                            $badgeColor = $colors[$colorIndex];

					                                            // Tingkatkan index, reset jika sudah mencapai akhir array
					                                            $colorIndex = ($colorIndex + 1) % count($colors);
					                                    ?>
                                                            <span class="badge <?=$badgeColor?>">
                                                                <?=$fetch_jabatan['jabatan']?> <a href="app/controller/pegawai/hapus-jabatan.php?id=<?=$fetch_jabatan['id']?>"> &nbsp;<i class="fas fa-times"></i></a></span>
                                                            <?php 
					                                        }
					                                    ?>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr id="formRow" style="display: none;">
                                                        <td colspan="3">
                                                            <form method="post" action="app/controller/pegawai/simpan-jabatan.php" id="mainForm">
                                                                <div id="formContainer">
                                                                    <div class="form-group mt-2">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" name="jabatan[]" placeholder="Masukkan Jabatan" list="datalistOptions" style="width: 200px;">
                                                                            <input type="hidden" name="nopeg" value="<?=$pecah['nopeg']?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <datalist id="datalistOptions">
                                                                    <?php 
					                                                // Query untuk mendapatkan daftar jabatan unik
					                                                $sql = $koneksi->query("SELECT * FROM master_pegawai ORDER BY jabatan ASC");
					                                                while ($dat = mysqli_fetch_assoc($sql)) {  
					                                                    echo '<option value="'.ucwords($dat['jabatan']).'">';
					                                                }
					                                            ?>
                                                                </datalist>
                                                                <div class="row mt-3">
                                                                    <div class="col-lg-12">
                                                                        <button type="submit" class="btn btn-success btn-sm btn-square btn-outline-dashed">Simpan</button>
                                                                        <button type="button" class="btn btn-danger btn-sm btn-square btn-outline-dashed" id="btnBatal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </form>
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
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6 col-xl-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Ubah profil</h4>
                                            </div>
                                            <!--end card-header-->
                                            <form action="<?=$link?>app/controller/pengguna/ubah-password.php" method="post" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Pendidikan</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <select class="form-select form-control" name="ijazah">
                                                                <option value="">---Pilih Ijazah---</option>
                                                                <option value="SMA">SMA/SMK</option>
                                                                <option value="DI">DI</option>
                                                                <option value="DII">DII</option>
                                                                <option value="DIII">DIII</option>
                                                                <option value="DIV">DIV</option>
                                                                <option value="SI">SI</option>
                                                                <option value="SII">SII</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NO KTP</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control" type="text" name="noktp" placeholder="Nomor KTP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Agama</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <select class="form-select" name="agama">
                                                                <option value="">---Pilih Agama---</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <textarea class="form-control" name="alamat" placeholder="Alamat Sesuai KTP"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat Saat ini</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <textarea class="form-control" name="alamat2" placeholder="Alamat Tempat Tinggal Saat ini (Kosongkan Apabila sama dengan alamat KTP)" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Status Perkawinan</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <select class="form-select" name="kawin">
                                                                <option value="">--- Pilih Status Perkawinan ---</option>
                                                                <option value="Belum Kawin">Belum Kawin</option>
                                                                <option value="Kawin">Kawin</option>
                                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                                <option value="Cerai Mati">Cerai Mati</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Tanggal Lahir</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control" type="date" name="tgl_lahir">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control" type="email" name="email" placeholder="Alamat Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NO Telephone</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control" type="text" name="telepon" placeholder="Nomor Telephone / Whtasapp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input type="hidden" name="id" value="<?=$pecah['id']?>">
                                                            <input class="form-control" type="password" name="password" id="password" placeholder="Kata Sandi Baru">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Ulangi Password</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control" type="password" id="konfirmasiPassword" placeholder="Ulangi Password" onkeyup="confirmPassword()">
                                                            <div class="invalid-feedback">
                                                                * Password tidak sama!<br>
                                                                * Pastikan password sama !<br>
                                                                * Pastikan Jumlah password 6 karakter
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"> </label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="form-check form-check-inline switch">
                                                                <input type="checkbox" class="form-check-input" id="lihatPassword" onclick="showHide()">
                                                                <label class="form-label" for="lihatPassword">Lihat Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control" type="file" name="foto">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                            <button type="submit" class="btn btn-de-primary" name="btn_simpan">Ubah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-body-->
                                            </form>
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <div class="col-lg-12">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!--end row-->
                        <!--end-->
                    </div>
                    <div class="tab-pane p-3" id="absensi" role="tabpanel">
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
                                    </div>
                                    <!--end card-body-->
                                    <div class="card-body bg-light-alt text-center">
                                        &copy; <script>
                                            document.write(new Date().getFullYear())
								</script> Team IT RSPM
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                    <div class="tab-pane p-3 <?php if ($_GET['pesan']) {echo " active";} else {echo " " ;}?>" id="saran" role="tabpanel">
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
                                                    <h5 class="font-14 m-0">
                                                        <?=$data_pesan['nama']?>
                                                    </h5>
                                                    <small class="text-muted">
                                                        <?=$data_pesan['unit']?> -
                                                        <?=$data_pesan['jabatan']?></small>
                                                </div>
                                            </div>
                                            <p>
                                                <?=nl2br($data_pesan['saran'])?>
                                            </p>
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
                                                        <p class="title">
                                                            <?=$data_nopeg['nama']?>
                                                        </p><span class="star-toggle far fa-star"></span>
                                                    </a>
                                                </div>
                                                <div class="col-mail col-mail-2">
                                                    <a href="profil/<?=$data_saran['id']?>" class="subject"> <span class="teaser">
                                                            <?=$data_saran['saran']?></span>
                                                    </a>
                                                    <div class="date">
                                                        <?=tgl_indo($data_saran['tgl_saran'])?>
                                                    </div>
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
                                    </div>
                                    <!--end row-->
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
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
</div>
<!--end row-->
<?php } ?>
<script src="<?=$link?>env/js/notif.js"></script>
<script src="<?=$link?>env/js/tambah_user.js"></script>
<script src="<?=$link?>public/resources/assets/libs/@midzer/tobii/tobii.min.js"></script>
<script src="<?=$link?>public/resources/assets/libs/hopscotch/js/hopscotch.min.js"></script>
<script src="<?=$link?>public/resources/assets/js/pages/tour.init.js"></script>
<script type="text/javascript">
document.getElementById("startButton").addEventListener("click", async () => {
    try {
        const reader = new NDEFReader();

        reader.addEventListener("reading", ({ message, serialNumber }) => {
            console.log("Message read:", message);
            console.log("Serial number:", serialNumber);
            document.getElementById("output").innerHTML = `Message read: ${JSON.stringify(message)} <br> Serial number: ${serialNumber}`;
        });

        await reader.scan();

        console.log("NFC reader started.");
    } catch (error) {
        console.error("Error starting NFC reader:", error);
        alert("Error starting NFC reader: " + error.message);
    }
});
</script>
<script>
const btnTambah = document.getElementById("btnTambah");
const formRow = document.getElementById("formRow");
const formContainer = document.getElementById("formContainer");
const btnBatal = document.getElementById("btnBatal");

// Fungsi ketika tombol Tambah ditekan
btnTambah.addEventListener("click", function(event) {
    event.preventDefault();

    // Tampilkan form jika belum tampil
    if (formRow.style.display === "none") {
        formRow.style.display = ""; // Tampilkan form
    } else {
        // Tambahkan input baru dengan tombol hapus
        const newInputGroup = document.createElement("div");
        newInputGroup.classList.add("form-group", "mt-2");
        newInputGroup.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" name="jabatan[]" placeholder="Masukkan Jabatan" list="datalistOptions" style="width: 200px;">
                    <button type="button" class="btn btn-danger btn-sm btn-remove" style="margin-left: 5px;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        formContainer.appendChild(newInputGroup);

        // Tambahkan event listener untuk tombol hapus
        const btnRemove = newInputGroup.querySelector(".btn-remove");
        btnRemove.addEventListener("click", function() {
            newInputGroup.remove(); // Hapus input group
        });
    }
});

// Fungsi untuk menyembunyikan form ketika tombol Batal ditekan
btnBatal.addEventListener("click", function() {
    formRow.style.display = "none"; // Sembunyikan form
    formContainer.innerHTML = `
            <div class="form-group mt-2">
                <div class="input-group">
                    <input type="text" class="form-control" name="jabatan[]" placeholder="Masukkan Jabatan" list="datalistOptions" style="width: 200px;">
                </div>
            </div>
        `; // Reset form menjadi hanya satu input

    // Tambahkan event listener untuk tombol hapus awal
    const initialRemoveButton = formContainer.querySelector(".btn-remove");
    if (initialRemoveButton) {
        initialRemoveButton.addEventListener("click", function() {
            initialRemoveButton.parentElement.parentElement.remove();
        });
    }
});
</script>