<?php
date_default_timezone_set('Asia/Jakarta');
$n = $pecahuser['nopeg'];
require 'env/koneksi.php';
require 'env/tgl_indo.php';
require 'req/head-berkas.php';
require 'req/style-berkas.php';
require 'public/component/toast.php';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 col-sm-4 text-center">
                        <img src="public/bg/objek3.webp" class="img-fluid rounded" alt="Header Image">
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
                                <?php
                                foreach ($fileList  as $label => $target) {
                                ?>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#modal_<?=strtolower($label)?>"><?=$label?></a>
                                <?php } ?>
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
                    <?php
                    function buatModal($key, $info, $berkas, $sertifikat)
                    {
                    $adaFile = !empty($berkas[$key]);
                    $label = $info['label'];
                    $icon = $info['icon'];
                    $idModal = strtolower("modal_" . $key);
                    $formAction = $adaFile
                    ? 'app/controller/pegawai/ubah-berkas.php'
                    : 'app/controller/pegawai/upload-berkas.php';
                    ?>
                    <!-- Tombol -->
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link nav-link1 mb-0 d-flex align-items-center justify-content-between" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#<?php echo $idModal; ?>">
                            <div class="d-flex align-items-center">
                                <i data-feather="<?php echo $icon; ?>" class="align-self-center icon-dual-file icon-sm me-2"></i>
                                <div class="d-inline-block align-self-center">
                                    <h5 class="m-0">
                                    <?php echo $label; ?>
                                    </h5>
                                    <?php
                                    // ==== Bagian teks status ====
                                    if ($key == "SERTIFIKAT") {
                                    echo $sertifikat <= 0
                                    ? '<small>Sertifikat Belum DiUpload</small>'
                                    : '<small>' . $sertifikat . ' Telah DiUpload</small>';
                                    } else {
                                    echo $adaFile
                                    ? '<small>' . htmlspecialchars($berkas[$key]) . '</small>'
                                    : '<small>' . $label . ' Belum DiUpload</small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            // ==== Badge untuk sertifikat ====
                            if ($key == "SERTIFIKAT" && $sertifikat >= 1) {
                            echo '<span class="badge bg-success ms-auto font-10">' . $sertifikat . '</span>';
                            } ?>
                        </a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo $idModal; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h6 class="modal-title m-0 text-white">Upload Berkas
                                    <?php echo $label; ?>
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="text-center mb-3">
                                            <img src="public/bg/upload.webp" class="img-fluid rounded" style="max-width:300px;">
                                        </div>
                                        <p class="text-muted">Pastikan file berformat "pdf / jpeg / jpg / png".</p>
                                        <input type="hidden" name="jenis" value="<?php echo strtolower($key); ?>">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="berkas" accept=".pdf,.jpeg,.jpg,.png" required>
                                            <label class="input-group-text">Upload</label>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Tanggal Dibuat:</label>
                                            <input type="date" class="form-control" name="tgl_dibuat">
                                        </div>
                                        <?php
                                        // STR dan SERTIFIKAT punya tanggal berakhir
                                        if (in_array($key, array("SIP", "STR", "SERTIFIKAT"))) {
                                        echo '
                                        <div class="mb-2">
                                            <label class="form-label">Tanggal Berakhir:</label>
                                            <input type="date" class="form-control" name="tgl_berakhir">
                                        </div>';
                                        } else {
                                        echo '<input type="hidden" name="tgl_berakhir">';
                                        }
                                        ?>
                                        <div class="mb-2">
                                            <label class="form-label">No Surat: <code class="highlighter-rouge">*</code></label>
                                            <input type="text" name="nomor" class="form-control" placeholder="Nomor Surat/Sertifikat/Kartu" required>
                                        </div>
                                        <?php
                                        // Tambahan kolom keterangan khusus sertifikat
                                        if ($key == "SERTIFIKAT") {
                                        echo '
                                        <div class="mb-2">
                                            <label class="form-label">Keterangan:</label>
                                            <textarea name="keterangan" class="form-control" placeholder="Nama pelatihan, seminar, dll"></textarea>
                                        </div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- ===== Render Semua Modal ===== -->
                    <?php
                    foreach ($files as $key => $info) {
                    if (in_array($key, ['STR', 'SIP', 'PPNI']) && (!isset($jenis_pegawai) || $jenis_pegawai != 1)) continue;
                    buatModal($key, $info, $berkas, $sertifikat);
                    }
                    ?>
                </div>
            </div>
            <!--end card-body-->
        </div>
    </div>
    <!--end col-->
    <div class="col-lg-9">
        <div class="">
            <div class="tab-content" id="files-tabContent">
                <div class="row">
                    <?php
                    $berkas_ada = false;
                    $today = new DateTime();
                    // Cek apakah ada berkas yang tidak kosong
                    foreach ($fileList as $key => $label) {
                    if (!empty($berkas[$key])) {
                    $berkas_ada = true;
                    break;
                    }
                    }
                    // --- CEK UNTUK FILE BIASA ---
                    if ($berkas_ada) {
                    foreach ($fileList as $key => $label) {
                    if (empty($berkas[$key])) continue;
                    $ambil_detail = $koneksi->query("SELECT * FROM file_detail WHERE jenis_file='$key' AND nopeg='$n'");
                    if (!$ambil_detail) continue;
                    $data_detail = $ambil_detail->fetch_assoc();
                    $sisaMasa = '-';
                    $interval = null;
                    // Cek apakah tanggal berakhir valid
                    if (!empty($data_detail['tgl_berakhir']) && $data_detail['tgl_berakhir'] != '0000-00-00') {
                    $tglBerakhir = date_create($data_detail['tgl_berakhir']);
                    if ($tglBerakhir && $tglBerakhir >= $today) {
                    $interval = date_diff($today, $tglBerakhir);
                    $sisaMasa = $interval->y . " tahun, " . $interval->m . " bulan, " . $interval->d . " hari";
                    } else {
                    $sisaMasa = "Sudah Kadaluarsa";
                    }
                    }
                    // Alert merah
                    if ($sisaMasa == "Sudah Kadaluarsa") {
                    ?>
                    <div class="col-lg-12">
                        <div class="alert custom-alert custom-alert-danger icon-custom-alert fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon text-danger align-self-center font-30 me-3"></i>
                            <div class="alert-text my-1">
                                <h5 class="mb-1 fw-bold mt-0"><?= htmlspecialchars($label) ?></h5>
                                <span>Berkas <b><?= htmlspecialchars($label) ?></b> sudah kadaluarsa!</span>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    // Alert kuning (masa aktif < 3 bulan)
                    if ($sisaMasa != "Sudah Kadaluarsa" && $interval && $interval->m <= 3) {
                    ?>
                    <div class="col-lg-12">
                        <div class="alert custom-alert custom-alert-warning icon-custom-alert fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon text-warning align-self-center font-30 me-3"></i>
                            <div class="alert-text my-1">
                                <h5 class="mb-1 fw-bold mt-0"><?= htmlspecialchars($label) ?></h5>
                                <span>Masa aktif berkas <b><?= htmlspecialchars($label) ?></b> tinggal <?= htmlspecialchars($sisaMasa) ?></span>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    }
                    // --- CEK UNTUK SERTIFIKAT ---
                    if ($sertifikat > 0) {
                    $qSertifikatDetail = $koneksi->query("SELECT * FROM file_detail WHERE jenis_file ='SERTIFIKAT' AND nopeg='$n'");
                    while ($sert = $qSertifikatDetail->fetch_assoc()) {
                    $nama_berkas = $sert['nama_file'];
                    $konek_sert = $koneksi->query("SELECT * FROM sertifikat WHERE berkas='$nama_berkas'");
                    $data_sert = $konek_sert->fetch_assoc();
                    $sisaMasa = '-';
                    $interval = null;
                    if (!empty($sert['tgl_berakhir']) && $sert['tgl_berakhir'] != '0000-00-00') {
                    $tglBerakhir = date_create($sert['tgl_berakhir']);
                    if ($tglBerakhir && $tglBerakhir >= $today) {
                    $interval = date_diff($today, $tglBerakhir);
                    $sisaMasa = $interval->y . " tahun, " . $interval->m . " bulan, " . $interval->d . " hari";
                    } else {
                    $sisaMasa = "Sudah Kadaluarsa";
                    }
                    }
                    // Jika sertifikat sudah kadaluarsa
                    if ($sisaMasa == "Sudah Kadaluarsa") {
                    ?>
                    <div class="col-lg-12">
                        <div class="alert custom-alert custom-alert-danger icon-custom-alert fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon text-danger align-self-center font-30 me-3"></i>
                            <div class="alert-text my-1">
                                <h5 class="mb-1 fw-bold mt-0">Sertifikat: <?= htmlspecialchars($data_sert['keterangan']) ?></h5>
                                <span>Sertifikat <b><?= htmlspecialchars($data_sert['keterangan']) ?></b> sudah kadaluarsa!</span>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    // Jika masa aktif sertifikat < 3 bulan
                    if ($sisaMasa != "Sudah Kadaluarsa" && $interval && $interval->m <= 3) {
                    ?>
                    <div class="col-lg-12">
                        <div class="alert custom-alert custom-alert-warning icon-custom-alert fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon text-warning align-self-center font-30 me-3"></i>
                            <div class="alert-text my-1">
                                <h5 class="mb-1 fw-bold mt-0">Sertifikat: <?= htmlspecialchars($data_sert['keterangan']) ?></h5>
                                <span>Masa aktif sertifikat <b><?= htmlspecialchars($data_sert['keterangan']) ?></b> tinggal <?= htmlspecialchars($sisaMasa) ?></span>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    }
                    ?>
                </div>
                <div class="float-end">
                    <div class="dropdown">
                        <a class="btn btn-primary position-relative overflow-hidden dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="las la-cloud-upload-alt me-2 font-15"></i>Upload File
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <?php
                            foreach ($fileList  as $label => $target) {
                            if ($label == "---") {
                            echo '<div class="dropdown-divider"></div>';
                            } else {
                            echo '<a class="dropdown-item" href="#" data-bs-toggle="modal" data-animation="bounce" data-bs-target="#modal_' . strtolower($label) . '">Upload ' . $label . '</a>';
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="files-projects">
                    <h4 class="card-title mt-0 mb-3">File Berkas</h4>
                    <?php
                    // Cek apakah ada file terupload atau sertifikat
                    $adaBerkas = false;
                    foreach ($fileList as $key => $label) {
                    if (!empty($berkas[$key])) { $adaBerkas = true; break; }
                    }
                    if ($sertifikat >= 1) $adaBerkas = true;
                    ?>
                    <?php if ($adaBerkas) { ?>
                    <div class="file-box-content">
                        <?php
                        foreach ($fileList as $key => $label) {
                        if (empty($berkas[$key])) continue;
                        $fileData = getFileFormat($berkas[$key]);
                        $nama_file = $berkas[$key];
                        $format = $fileData['format'];
                        $file_path = $fileData['file_path'];
                        $file_size = round($fileData['file_size']);
                        $display_name = $fileData['display_name'];
                        $ambil_detail_berkas = $koneksi->query("SELECT * FROM file_detail WHERE nama_file='$nama_file'");
                        $row_berkas = $ambil_detail_berkas->fetch_assoc();
                        $status = !empty($row_berkas['validasi']) ? $row_berkas['validasi'] : 'Belum Validasi';
                        $status2 = ($status == 'ada') ? 'Divalidasi' : (($status == 'proses') ? 'On Proses' : 'Menunggu Validasi');
                        $badgeClass = ($status == 'ada') ? 'badge bg-success' : (($status == 'proses') ? 'badge bg-warning text-dark' : 'badge bg-secondary');
                        $upload = tgl_indo($row_berkas['tgl_upload']);
                        $popoverContent = htmlspecialchars("
                        <strong>Nama File:</strong> {$display_name}<br>
                        <strong>Ukuran:</strong> {$file_size} KB<br>
                        <strong>Status:</strong> {$status2}<br>
                        <strong>Tgl Upload:</strong> {$upload}
                        ");
                        ?>
                        <div class="file-box" data-filebox data-bs-toggle="popover"
                            data-bs-trigger="hover focus"
                            data-bs-html="true"
                            data-bs-placement="top"
                            data-bs-content="<?=$popoverContent?>">
                            <div class="dropdown dropend">
                                <span class="<?=$badgeClass?> position-absolute top-0 end-0 m-1"><i data-feather=''></i></span>
                                <a href="#" data-bs-toggle="dropdown" class="download-icon-link" download>
                                    <div class="text-center">
                                        <i class="lar <?= $format ?>"></i>
                                        <h6 class="text-truncate"><?= $label ?></h6>
                                        <small class="text-muted">
                                        <?= $display_name ?> / <?= round($file_size) ?> kb
                                        </small>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= $file_path ?>">Download</a>
                                    <a href="app/controller/pegawai/hapus-berkas.php?id=<?= $berkas[$key] ?>&jenis=<?= $key ?>"
                                        class="dropdown-item btn-hapus"
                                        data-deskripsi="Berkas <?= htmlspecialchars($label) ?> akan dihapus!">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Bagian Sertifikat -->
                    <?php if ($sertifikat >= 1) { ?>
                    <h4 class="card-title mt-3 mb-3">Sertifikat</h4>
                    <div class="file-box-content">
                        <?php while ($row_file = mysqli_fetch_assoc($ambil_berkas_sertif)) {
                        $data = getFileFormat($row_file['berkas']);
                        $format = $data['format'];
                        $file_path = $data['file_path'];
                        $file_size = $data['file_size'];
                        $display_name = $data['display_name'];
                        $ambil_detail_berkas = $koneksi->query("SELECT * FROM file_detail WHERE nama_file='$nama_file'");
                        $row_berkas = $ambil_detail_berkas->fetch_assoc();
                        $ambil_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE berkas='$row_file[berkas]'");
                        $data_sertif = $ambil_sertif->fetch_assoc();
                        $popoverContent = htmlspecialchars("
                        <strong>Nama File:</strong> {$display_name}<br>
                        <strong>Ukuran:</strong> {$file_size} KB<br>
                        <strong>Status:</strong> {$status2}<br>
                        <strong>Tgl Upload:</strong> {$upload}<br>
                        <strong>Ket:</strong> {$data_sertif['keterangan']}
                        ");
                        ?>
                        <div class="file-box" data-filebox data-filebox data-bs-toggle="popover"
                            data-bs-trigger="hover focus"
                            data-bs-html="true"
                            data-bs-placement="top"
                            data-bs-content="<?=$popoverContent?>">
                            <div class="dropdown dropend">
                                <span class="<?=$badgeClass?> position-absolute top-0 end-0 m-1"><i data-feather=''></i></span>
                                <a href="#" class="download-icon-link" data-bs-toggle="dropdown">
                                    <div class="text-center">
                                        <i class="lar <?= $format ?>"></i>
                                        <h6 class="text-truncate">Sertifikat</h6>
                                        <small class="text-muted">
                                        <?= $display_name ?> / <?= round($file_size) ?> kb
                                        </small>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= $file_path ?>" download>Download</a>
                                    <a href="app/controller/pegawai/hapus-berkas.php?id=<?= $row_file['berkas'] ?>&jenis=SERTIFIKAT"
                                        class="dropdown-item btn-hapus"
                                        data-deskripsi="Berkas Sertifikat akan dihapus!">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class='row mb-3'>
                        <div class='col-md-4'>
                            <h5>Keterangan :</h5>
                            <ul class='list-unstyled text-muted mb-0'>
                                <li>
                                    <span class='badge bg-success'><i data-feather=''></i></span> = Telah Tervalidasi
                                </li>
                                <li>
                                    <span class='badge bg-secondary'><i data-feather=''></i></span> = Belum Divalidasi
                                </li>
                                <li>
                                    <span class='badge bg-warning text-dark'><i data-feather=''></i></span> = Dalam Proses (Perbaikan, ganti dll)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } else { ?>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-8 col-sm-12 text-center">
                            <center>
                            <img src="public/bg/bg03.png" style="max-width: 50%; height: auto;" class="img-fluid rounded d-block" alt="Header Image">
                            </center>
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
<?php require 'req/js-berkas.php'; ?>