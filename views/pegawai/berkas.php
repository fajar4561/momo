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

$ambil = $koneksi->query("SELECT * FROM file WHERE nopeg='$n'");
$berkas = $ambil->fetch_assoc();

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

<?php if (isMobileDevice()) { ?>
    <style>
        .leftbar-tab-menu {
            display: none; /* Menyembunyikan menu saat halaman dimuat */
        }
    </style>
<?php } ?>

<div class="row p-3 mt-3">
    <div class="col-md-6">
        <div class="car">
            <div class="card-header">
                <h5 class="card-title">File Upload</h5>
            </div>
            <div class="card-body">
               <div class="row p-3">
                   <table class="table table-sm">
                       <tr>
                           <th>KTP</th>
                           <td>:</td>
                           <td><?php if (!empty($ktp)) { echo $ktp; }?></td>
                           <td>
                                <?php if (!empty($ktp)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahktp">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas KTP</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="ktp">
                                                                    <input type="file" id="input-ktp" name="berkas" onchange="handleChange()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-ktp">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-ktp" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChange() {
                                            // Ambil input file
                                            var inputFilektp = document.getElementById('input-ktp');

                                            // Cek apakah file telah dipilih
                                            if (inputFilektp.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-ktp').click();
                                            }
                                        }
                                    </script>
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadktp">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas KTP</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
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
                                    <!-- Modals Ubah Berkas -->
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
                                <?php } ?>
                           </td>
                       </tr>
                       <tr>
                           <th>KK</th>
                           <td>:</td>
                           <td><?php if (!empty($kk)) { echo $kk; }?></td>
                           <td>
                               <?php if (!empty($kk)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahkk">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahkk" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas Kk</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
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
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadkk">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadkk" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas Kk</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="kk">
                                                                    <input type="file" id="input-kk2" name="berkas" onchange="handleChange4()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-kk2">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-kk2" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChange4() {
                                            // Ambil input file
                                            var inputFilekk2 = document.getElementById('input-kk2');

                                            // Cek apakah file telah dipilih
                                            if (inputFilekk2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-kk2').click();
                                            }
                                        }
                                    </script>
                                <?php } ?>
                           </td>
                       </tr>
                       <tr>
                           <th>IJAZAH</th>
                           <td>:</td>
                           <td><?php if (!empty($ijazah)) { echo $ijazah; }?></td>
                           <td>
                               <?php if (!empty($ijazah)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahijazah">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahijazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas ijazah</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
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
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadijazah">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadijazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas ijazah</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="ijazah">
                                                                    <input type="file" id="input-ijazah2" name="berkas" onchange="handleChangeijazah2()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-ijazah2">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-ijazah2" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChangeijazah2() {
                                            // Ambil input file
                                            var inputFileijazah2 = document.getElementById('input-ijazah2');

                                            // Cek apakah file telah dipilih
                                            if (inputFileijazah2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-ijazah2').click();
                                            }
                                        }
                                    </script>
                                <?php } ?>
                           </td>
                       </tr>
                       <tr>
                           <th>PPNI</th>
                           <td>:</td>
                           <td><?php if (!empty($ppni)) { echo $ppni; }?></td>
                           <td>
                               <?php if (!empty($ppni)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahppni">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahppni" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas PPNI</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
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
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadppni">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadppni" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas PPNI</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="ppni">
                                                                    <input type="file" id="input-ppni2" name="berkas" onchange="handleChangeppni2()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-ppni2">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-ppni2" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChangeppni2() {
                                            // Ambil input file
                                            var inputFileppni2 = document.getElementById('input-ppni2');

                                            // Cek apakah file telah dipilih
                                            if (inputFileppni2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-ppni2').click();
                                            }
                                        }
                                    </script>
                                <?php } ?>
                           </td>
                       </tr>
                       <tr>
                           <th>SIP</th>
                           <td>:</td>
                           <td><?php if (!empty($sip)) { echo $sip; }?></td>
                           <td>
                              <?php if (!empty($sip)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahsip">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahsip" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas SIP</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
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
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadsip">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadsip" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas SIP</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="sip">
                                                                    <input type="file" id="input-sip2" name="berkas" onchange="handleChangesip2()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-sip2">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-sip2" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChangesip2() {
                                            // Ambil input file
                                            var inputFilesip2 = document.getElementById('input-sip2');

                                            // Cek apakah file telah dipilih
                                            if (inputFilesip2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-sip2').click();
                                            }
                                        }
                                    </script>
                                <?php } ?>
                           </td>
                       </tr>
                       <tr>
                           <th>STR</th>
                           <td>:</td>
                           <td><?php if (!empty($str)) { echo $str; }?></td>
                           <td>
                              <?php if (!empty($str)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahstr">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahstr" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas STR</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
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
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadstr">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadstr" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas STR</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="str">
                                                                    <input type="file" id="input-str2" name="berkas" onchange="handleChangestr2()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-str2">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-str2" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChangestr2() {
                                            // Ambil input file
                                            var inputFilestr2 = document.getElementById('input-str2');

                                            // Cek apakah file telah dipilih
                                            if (inputFilestr2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-str2').click();
                                            }
                                        }
                                    </script>
                                <?php } ?>
                           </td>
                       </tr>
                       <tr>
                           <th>NPWP</th>
                           <td>:</td>
                           <td><?php if (!empty($npwp)) { echo $npwp; }?></td>
                           <td>
                              <?php if (!empty($npwp)) { ?>
                                    <a class="btn btn-primary btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#ubahnpwp">Ubah</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="ubahnpwp" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Ubah Berkas NPWP</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/ubah-berkas.php" enctype="multipart/form-data">
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
                                <?php } else { ?>
                                    <a class="btn btn-info btn-square btn-outline-dashed" href="#" data-bs-toggle="modal" data-bs-target="#uploadnpwp">Upload</a>
                                    <!-- Modals Ubah Berkas -->
                                    <div class="modal fade" id="uploadnpwp" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Upload Berkas NPWP</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div><!--end modal-header-->
                                                <form method="post" action="app/controller/pegawai/upload-berkas.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="d-grid">
                                                                    <p class="text-muted">Pastikan File yang diupload berformatkan "pdf / jpeg / jpg / png".</p>
                                                                    <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                                                    <input type="hidden" name="jenis" value="npwp">
                                                                    <input type="file" id="input-npwp2" name="berkas" onchange="handleChangenpwp2()" hidden />
                                                                    <label class="btn-upload btn btn-primary mt-4" for="input-npwp2">Pilih File</label>
                                                                </div>
                                                            </div>
                                                        </div>                                                   
                                                    </div><!--end modal-body-->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn-npwp2" hidden>Save</button>
                                                    </div><!--end modal-footer-->
                                                </form>
                                            </div><!--end modal-content-->
                                        </div><!--end modal-dialog-->
                                    </div>
                                    <!-- Modals Ubah Berkas -->
                                    <script>
                                        function handleChangenpwp2() {
                                            // Ambil input file
                                            var inputFilenpwp2 = document.getElementById('input-npwp2');

                                            // Cek apakah file telah dipilih
                                            if (inputFilenpwp2.files.length > 0) {
                                            // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
                                                document.getElementById('submit-btn-npwp2').click();
                                            }
                                        }
                                    </script>
                                <?php } ?>
                           </td>
                       </tr>
                   </table>
               </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="car">
            <div class="card-header">
                <h5 class="card-title">Berkas</h5>
            </div>
            <div class="card-body">
                <div class="row p-3">
                    <div class="file-box-content">
                        <?php if (!empty($ktp) || !empty($kk) || !empty($ijazah) || !empty($ppni) || !empty($sip) || !empty($str) || !empty($npwp)) { ?>
                            <?php if (!empty($ktp)) { ?>
                                <div class="file-box">
                                    <a href="<?=$link.$file_path?>" class="download-icon-link" target='_blank'>
                                        <i class="las la-download file-download-icon"></i>
                                        <div class="text-center">
                                            <i class="lar <?=$format?>"></i>
                                            <h6 class="text-truncate"><?=$ktp?></h6>
                                            <small class="text-muted"><?=round($file_size)?> Kb</small>
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
                                            <h6 class="text-truncate"><?=$kk?></h6>
                                            <small class="text-muted"><?=round($file_size_kk)?> Kb</small>
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
                                            <h6 class="text-truncate"><?=$ijazah?></h6>
                                            <small class="text-muted"><?=round($file_size_ijazah)?> Kb</small>
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
                                            <h6 class="text-truncate"><?=$ppni?></h6>
                                            <small class="text-muted"><?=round($file_size_ppni)?> Kb</small>
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
                                            <h6 class="text-truncate"><?=$sip?></h6>
                                            <small class="text-muted"><?=round($file_size_sip)?> Kb</small>
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
                                            <h6 class="text-truncate"><?=$str?></h6>
                                            <small class="text-muted"><?=round($file_size_str)?> Kb</small>
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
                                            <h6 class="text-truncate"><?=$npwp?></h6>
                                            <small class="text-muted"><?=round($file_size_npwp)?> Kb</small>
                                        </div>                                                        
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } else { ?> 
                            <center><h5>Berkas Masih Kosong</h5></center>
                        <?php } ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function handleChange() {
    // Ambil input file
    var inputFilektp = document.getElementById('input-ktp');
    
    // Cek apakah file telah dipilih
    if (inputFilektp.files.length > 0) {
        // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
        document.getElementById('submit-btn-ktp').click();
    }
}
</script>