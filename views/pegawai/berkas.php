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


function getFileFormat($file) {
    // Menentukan path file dan ekstensi file
    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_path = 'public/file/berkas/' . $file;
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
        $format = 'la-file-image text-info';
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

// Ambil data dari database
$ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$n'");
$ambil_berkas_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
$sertifikat = $ambil_berkas_sertif->num_rows;

$berkas = mysqli_fetch_assoc($ambil_berkas);

// Memanggil fungsi untuk setiap berkas
$ktpData = getFileFormat($berkas['KTP']);
$kkData = getFileFormat($berkas['KK']);
$ijazahData = getFileFormat($berkas['IJAZAH']);
$ppniData = getFileFormat($berkas['PPNI']);
$sipData = getFileFormat($berkas['SIP']);
$strData = getFileFormat($berkas['STR']);
$npwpData = getFileFormat($berkas['NPWP']);

// Anda dapat mengakses hasilnya seperti ini
$ktp = $ktpData['format'];
$file_path_ktp = $ktpData['file_path'];
$file_size_ktp = $ktpData['file_size'];
$display_name_ktp = $ktpData['display_name']; // Nama file pendek

$kk = $kkData['format'];
$file_path_kk = $kkData['file_path'];
$file_size_kk = $kkData['file_size'];
$display_name_kk = $kkData['display_name']; // Nama file pendek

$ijazah = $ijazahData['format'];
$file_path_ijazah = $ijazahData['file_path'];
$file_size_ijazah = $ijazahData['file_size'];
$display_name_ijazah = $ijazahData['display_name']; // Nama file pendek

$ppni = $ppniData['format'];
$file_path_ppni = $ppniData['file_path'];
$file_size_ppni = $ppniData['file_size'];
$display_name_ppni = $ppniData['display_name']; // Nama file pendek

$sip = $sipData['format'];
$file_path_sip = $sipData['file_path'];
$file_size_sip = $sipData['file_size'];
$display_name_sip = $sipData['display_name'];

$str = $strData['format'];
$file_path_str = $strData['file_path'];
$file_size_str = $strData['file_size'];
$display_name_str = $strData['display_name'];

$npwp = $npwpData['format'];
$file_path_npwp = $npwpData['file_path'];
$file_size_npwp = $npwpData['file_size'];
$display_name_npwp = $npwpData['display_name'];





?>

<?php if (isMobileDevice()) { ?>
    <style>
        .leftbar-tab-menu {
            display: none; /* Menyembunyikan menu saat halaman dimuat */
        }
    </style>
    <style type="text/css">
    #results {
        max-height: 210px; /* Set desired height */
        overflow-y: hidden; /* Sembunyikan scrollbar secara default */
        position: relative; /* Posisi relatif untuk kontrol lebih lanjut */
    }

    #results:hover {
        overflow-y: auto; /* Tampilkan scrollbar saat hover */
    }

    /* Gaya scrollbar untuk Webkit (Chrome, Safari) */
    #results::-webkit-scrollbar {
        width: 8px; /* Lebar scrollbar */
    }

    #results::-webkit-scrollbar-track {
        background: #f1f1f1; /* Warna track */
        border-radius: 10px; /* Sudut melengkung */
    }

    #results::-webkit-scrollbar-thumb {
        background: #888; /* Warna thumb */
        border-radius: 10px; /* Sudut melengkung */
    }

    #results::-webkit-scrollbar-thumb:hover {
        background: #555; /* Warna thumb saat hover */
    }

    /* Gaya scrollbar untuk Firefox */
    #results {
        scrollbar-width: thin; /* Ukuran scrollbar */
        scrollbar-color: #888 #f1f1f1; /* Warna thumb dan track */
    }

    .nav-link1 {
        margin-bottom: 10px; /* Atur jarak antar item */
    }

    .custom-link {
        margin-bottom: 10px;
        margin-right: 50px; /* Default margin */
    }

    /* Media queries untuk ukuran layar yang lebih kecil */
    @media (max-width: 768px) {
        .custom-link {
            margin-right: auto; /* Ubah margin untuk layar kecil */
        }
    }

    @media (max-width: 576px) {
        .custom-link {
            margin-right: auto; /* Ubah margin untuk layar sangat kecil */
        }
    }

    </style>
<?php } ?>

<style type="text/css">
.nav-link1.active {
    background-color: #007bff; /* Warna background */
    color: white; /* Warna teks */
    font-weight: bold; /* Teks lebih tebal */
}
/* Tambahkan animasi untuk dropdown-menu */
.dropdown-menu {
    opacity: 0;
    transform: scale(0.9);
    transition: opacity 0.2s ease, transform 0.2s ease;
}

.dropdown-menu.show {
    opacity: 1;
    transform: scale(1);
}
/* Gaya default dropdown-item */
.dropdown-item {
    background-color: #ffffff; /* Warna latar belakang default */
    color: #6c757d; /* Warna teks default */
    transition: background-color 0.3s ease, color 0.3s ease; /* Efek transisi */
}

/* Saat hover */
.dropdown-item:hover {
    background-color: #343a40; /* Warna latar belakang lebih gelap saat hover */
    color: #ffffff; /* Warna teks saat hover */
}

/* Saat fokus */
.dropdown-item:focus {
    background-color: #23272b; /* Warna latar belakang lebih gelap lagi saat fokus */
    color: #ffffff; /* Warna teks saat fokus */
}
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 col-sm-4 text-center">
                        <img src="public/bg/bg02.png" class="img-fluid rounded" alt="Header Image">
                    </div>
                    <!-- Teks Header -->
                    <div class="col-md-9 col-sm-8">
                        <h3 class="fw-bold mb-3">Informasi Halaman</h3>
                        <ol class="text-muted" style="text-align: justify;">
                            <li>
                                Halaman ini digunakan untuk mengupload berkas kepegawaian. Pastikan anda selalu melengkapi dan mengupdate berkas tersebut.
                            </li>
                            <li>
                                Untuk melakukan proses upload berkas, anda bisa menggunakan tombol
                                <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle">Upload <i class="mdi mdi-chevron-down"></i></button> 
                                atau dengan klik menu bertuliskan <strong> KTP,KK,IJAZAH,PPNI,SIP dan lain sebgainya</strong>

                            </li>
                            <li>
                                Pastikan file yang diupload berformatkan "jpeg,jpg,pdf,png" (hanya support File gambar dan pdf)
                            </li>
                            <li>
                                Apabila anda masih bingung untuk teknis upload berkas anda bisa melihat dokumentasinya <strong><a href="#">Klik Disini</a></strong>
                            </li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Berkas-Berkas</h4>
                    </div>
                    <!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Upload <i class="mdi mdi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadktp">Upload KTP</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadkk">Upload KK</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahijazah">Upload IJAZAH</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahppni">Upload PPNI</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahstr">Upload SIP</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahnpwp">Upload NPWP</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadsert">Upload Sertifikat</a>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="files-nav" id="results">
                    <!-- ======= KTP ======= -->
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadktp">
                            <i data-feather="users" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">KTP</h5>

                                <?php echo !empty($berkas['KTP']) ? '<small>'.$berkas['KTP'].'</small>' : '<small>KTP Belum DiUpload</small>'; ?> 
                            </div>
                        </a>
                    </div>
                    <div class="modal fade" id="uploadktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas KTP</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="<?php echo !empty($berkas['KTP']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="ktp">
                                                    <input type="file" id="input-ktp2" name="berkas" onchange="handleChange2()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-ktp2">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-ktp2" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>

                    <script>
                        function handleChange2() {
                                            // Ambil input file
                            var inputFilektp2 = document.getElementById('input-ktp2');

                                            // Cek apakah file telah dipilih
                            if (inputFilektp2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-ktp2').click();
                            }
                        }
                    </script>

                    <!-- ======= KK ======= -->
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadkk">
                            <i data-feather="trello" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">KK</h5>

                                <?php echo !empty($berkas['KK']) ? '<small>'.$berkas['KK'].'</small>' : '<small>KK Belum DiUpload</small>'; ?> 
                            </div>
                        </a>
                    </div>

                    <div class="modal fade" id="uploadkk" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas Kk</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="<?php echo !empty($berkas['KK']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="kk">
                                                    <input type="file" id="input-kk" name="berkas" onchange="handleChange3()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-kk">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-kk" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChange3() {
                                            // Ambil input file
                            var inputFilekk = document.getElementById('input-kk');

                                            // Cek apakah file telah dipilih
                            if (inputFilekk.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-kk').click();
                            }
                        }
                    </script>

                     <!-- ======= IJAZAH ======= -->
                     <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahijazah">
                            <i data-feather="file-text" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">IJAZAH</h5>
                                <?php echo !empty($berkas['IJAZAH']) ? '<small>'.$berkas['IJAZAH'].'</small>' : '<small>IJAZAH Belum DiUpload</small>'; ?> 
                            </div>
                        </a>
                    </div>

                    <div class="modal fade" id="ubahijazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas ijazah</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="<?php echo !empty($berkas['IJAZAH']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="ijazah">
                                                    <input type="file" id="input-ijazah" name="berkas" onchange="handleChangeijazah()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-ijazah">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-ijazah" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChangeijazah() {
                                            // Ambil input file
                            var inputFileijazah = document.getElementById('input-ijazah');

                                            // Cek apakah file telah dipilih
                            if (inputFileijazah.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-ijazah').click();
                            }
                        }
                    </script>

                    <!-- ======= PPNI ======= -->
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahppni">
                            <i data-feather="credit-card" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">PPNI</h5>
                                <?php echo !empty($berkas['PPNI']) ? '<small>'.$berkas['PPNI'].'</small>' : '<small>PPNI Belum DiUpload</small>'; ?> 
                            </div>
                        </a>
                    </div>

                    <div class="modal fade" id="ubahppni" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas PPNI</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="<?php echo !empty($berkas['PPNI']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="ppni">
                                                    <input type="file" id="input-ppni" name="berkas" onchange="handleChangeppni()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-ppni">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-ppni" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChangeppni() {
                                            // Ambil input file
                            var inputFileppni = document.getElementById('input-ppni');

                                            // Cek apakah file telah dipilih
                            if (inputFileppni.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-ppni').click();
                            }
                        }
                    </script>

                    <!-- ======= SIP ======= -->
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahsip">
                            <i data-feather="clipboard" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">SIP</h5>
                                <?php echo !empty($berkas['SIP']) ? '<small>'.$berkas['SIP'].'</small>' : '<small>SIP Belum DiUpload</small>'; ?> 
                            </div>
                        </a>
                    </div>

                    <div class="modal fade" id="ubahsip" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas SIP</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="<?php echo !empty($berkas['SIP']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="sip">
                                                    <input type="file" id="input-sip" name="berkas" onchange="handleChangesip()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-sip">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-sip" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChangesip() {
                                            // Ambil input file
                            var inputFilesip = document.getElementById('input-sip');

                                            // Cek apakah file telah dipilih
                            if (inputFilesip.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-sip').click();
                            }
                        }
                    </script>

                    <!-- ======= STR ======= -->
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahstr">
                            <i data-feather="hard-drive" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">STR</h5>
                                <?php echo !empty($berkas['STR']) ? '<small>'.$berkas['STR'].'</small>' : '<small>STR Belum DiUpload</small>'; ?>
                            </div>
                        </a>
                    </div>

                    <div class="modal fade" id="ubahstr" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas STR</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="<?php echo !empty($berkas['STR']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="str">
                                                    <input type="file" id="input-str" name="berkas" onchange="handleChangestr()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-str">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-str" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChangestr() {
                                            // Ambil input file
                            var inputFilestr = document.getElementById('input-str');

                                            // Cek apakah file telah dipilih
                            if (inputFilestr.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-str').click();
                            }
                        }
                    </script>


                    <!-- ======= NPWP ======= -->
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1 mb-0" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahnpwp">
                            <i data-feather="settings" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">NPWP</h5>
                                <?php echo !empty($berkas['NPWP']) ? '<small>'.$berkas['NPWP'].'</small>' : '<small>NPWP Belum DiUpload</small>'; ?>
                            </div>
                        </a>
                    </div>

                    <div class="modal fade" id="ubahnpwp" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas NPWP</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="<?php echo !empty($berkas['NPWP']) ? 'app/controller/pegawai/ubah-berkas.php' : 'app/controller/pegawai/upload-berkas.php'; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="npwp">
                                                    <input type="file" id="input-npwp" name="berkas" onchange="handleChangenpwp()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-npwp">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-npwp" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChangenpwp() {
                                            // Ambil input file
                            var inputFilenpwp = document.getElementById('input-npwp');

                                            // Cek apakah file telah dipilih
                            if (inputFilenpwp.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-npwp').click();
                            }
                        }
                    </script>

                    <!-- ======= Sertifikat ======= -->
                    <?php 
                        $ambil_berkas = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
                        $sertifikat = $ambil_berkas->num_rows;
                    ?>

                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link nav-link1  mb-0 align-items-center" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadsert">
                            <i data-feather="toggle-left" class="align-self-center icon-dual-file icon-sm me-2"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">Sertifikat</h5>
                                <?php   if ($sertifikat <= 0) { echo "<small>Sertifikat Belum DiUpload</small></small>";} else { echo "<small>".$sertifikat." Telah diupload</small>"; } ?>

                            </div>
                            <?php   if ($sertifikat >= 1) { echo '<span class="badge bg-success ms-auto font-10">'.$sertifikat.'</span>';} ?>
                            
                        </a>
                    </div>

                    <div class="modal fade" id="uploadsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Sertifikat</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="d-grid">
                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                    <input type="hidden" name="jenis" value="sertif">
                                                    <input type="file" id="input-sertif" name="berkas" onchange="handleChangesertif()" hidden />
                                                    <label class="btn-upload btn btn-primary mt-4" for="input-sertif">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>                                                   
                                    </div><!--end modal-body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-sertif" hidden>Save</button>
                                    </div><!--end modal-footer-->
                                </form>
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div>
                    <!-- Modals Ubah Berkas -->
                    <script>
                        function handleChangesertif() {
                                            // Ambil input file
                            var inputFilesertif = document.getElementById('input-sertif');

                                            // Cek apakah file telah dipilih
                            if (inputFilesertif.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                document.getElementById('submit-btn-sertif').click();
                            }
                        }
                    </script>

                    
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
        <!-- <div class="card">
            <div class="card-body">
                <small class="float-end">62%</small>
                <h6 class="mt-0">620GB / 1TB Used</h6>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 62%;" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div> -->
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-9">
        <div class="">
            <div class="tab-content" id="files-tabContent">
                <div class="float-end">
                    <div class="dropdown">
                        <a class="btn btn-primary position-relative overflow-hidden dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="las la-cloud-upload-alt me-2 font-15"></i>Upload File
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadktp">Upload KTP</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadkk">Upload KK</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahijazah">Upload IJAZAH</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahppni">Upload PPNI</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahstr">Upload SIP</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#ubahnpwp">Upload NPWP</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#uploadsert">Upload Sertifikat</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="files-projects">
                    <h4 class="card-title mt-0 mb-3">File Berkas</h4>
                    <?php if (!empty($berkas['KTP']) || !empty($berkas['KK']) || !empty($berkas['IJAZAH']) || !empty($berkas['PPNI']) || !empty($berkas['PPNI']) || !empty($berkas['PPNI']) || !empty($berkas['PPNI']) || $sertifikat>=1) { ?>
                        <div class="file-box-content">
                            <?php if (!empty($berkas['KTP'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_ktp?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$ktp?>"></i>
                                            <h6 class="text-truncate">KTP</h6>
                                            <small class="text-muted"><?=$display_name_ktp?> / <?=round($file_size_ktp)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!empty($berkas['KK'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_kk?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$kk?>"></i>
                                            <h6 class="text-truncate">KK</h6>
                                            <small class="text-muted"><?=$display_name_kk?> / <?=round($file_size_kk)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!empty($berkas['IJAZAH'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_ijazah?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$ijazah?>"></i>
                                            <h6 class="text-truncate">IJAZAH</h6>
                                            <small class="text-muted"><?=$display_name_ijazah?> / <?=round($file_size_ijazah)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!empty($berkas['PPNI'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_ppni?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$ppni?>"></i>
                                            <h6 class="text-truncate">PPNI</h6>
                                            <small class="text-muted"><?=$display_name_ppni?> / <?=round($file_size_ppni)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!empty($berkas['SIP'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_sip?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$sip?>"></i>
                                            <h6 class="text-truncate">SIP</h6>
                                            <small class="text-muted"><?=$display_name_sip?> / <?=round($file_size_sip)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!empty($berkas['STR'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_str?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$str?>"></i>
                                            <h6 class="text-truncate">STR</h6>
                                            <small class="text-muted"><?=$display_name_str?> / <?=round($file_size_str)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!empty($berkas['NPWP'])) { ?>
                                <div class="file-box">
                                    <a href="<?=$file_path_npwp?>" class="download-icon-link">
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$npwp?>"></i>
                                            <h6 class="text-truncate">NPWP</h6>
                                            <small class="text-muted"><?=$display_name_npwp?> / <?=round($file_size_npwp)?> kb</small>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ($sertifikat>=1) { ?>
                            <h4 class="card-title mt-3 mb-3">Sertifikat</h4>
                            <div class="file-box-content">
                                <?php 
                                    while ($row_file = mysqli_fetch_assoc($ambil_berkas_sertif)) {
                                        $sertifikatData = getFileFormat($row_file['berkas']);
                                        $sertif = $sertifikatData['format'];
                                        $file_path_sertif = $sertifikatData['file_path'];
                                        $file_size_sertif = $sertifikatData['file_size'];
                                        $display_name_sertif = $sertifikatData['display_name'];
                                ?>
                                    <div class="file-box">
                                        <a href="<?=$file_path_sertif?>" class="download-icon-link">
                                            <i class="las la-download file-download-icon"></i>
                                            <div class="text-center">
                                                <i class="lar <?=$sertif?>"></i>
                                                <h6 class="text-truncate">Sertifikat</h6>
                                                <small class="text-muted"><?=$display_name_sertif?> / <?=round($file_size_sertif)?> kb</small>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-8 col-sm-12 text-center">
                                <center><img src="public/bg/bg03.png" style="max-width: 50%; height: auto;" class="img-fluid rounded d-block" alt="Header Image"></center>
                                <h5 class="mt-3">Berkas Anda Masih Kosong</h5>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <!--end tab-pen-->
                <div class="tab-pane fade" id="files-hide">
                    <h4 class="mt-0 card-title mb-3">Hide</h4>
                </div>
                <!--end tab-pane-->
            </div>
            <!--end tab-content-->
        </div>
        <!--end card-body-->
    </div>
    <!--end col-->
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll('.nav-link'); // Pilih semua elemen dengan kelas "nav-link"

        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                // Hapus kelas "active" dari semua link
                navLinks.forEach(item => item.classList.remove('active'));
                
                // Tambahkan kelas "active" ke link yang diklik
                this.classList.add('active');
            });
        });
    });
</script>
