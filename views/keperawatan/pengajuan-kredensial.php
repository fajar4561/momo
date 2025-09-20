<?php 
require 'public/component/toast.php';
require 'req/style-pengajuan-kredensial.php';
require 'req/head-pengajuan-kredensial.php';
?>
<!-- akhir scroll file box -->
<form method="post" action="app/controller/keperawatan/simpan-pengajuan.php" id="form_rkk">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img src="public/bg/kre.png" style="width: 100%; max-width: 450px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                            </div>
                            <!--end form-group-->
                            <ol class="text-muted mb-2 my-3">
                                <li>Form di bawah ini digunakan untuk mengajukan dan memperbarui data kredensial perawat.</li>
                                <li>Pastikan Anda mengisi seluruh data dengan benar sebelum menekan tombol <strong>Simpan</strong> atau <strong>Ubah</strong>.</li>
                                <li>Jika mengalami kendala teknis atau memiliki pertanyaan terkait pengisian form, silakan hubungi tim IT atau bagian kredensial rumah sakit.</li>
                            </ol>
                            <!--end form-group--> 
                            <div class="row">
                                <div class="col-sm-8 justify-content-center align-self-center text-center">
                                    <!-- Thumbnail -->
                                    <img src="public/bg/alur.png" style="width: 100%; max-width: 300px; height: auto; object-fit: cover; cursor:pointer;" class="img-fluid rounded" alt="Header Image" data-bs-toggle="modal" data-bs-target="#imageModal">
                                    <!-- Modal -->
                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content bg-transparent border-0">
                                                <button type="button" class="btn-close ms-auto me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <img src="public/bg/alur.png" class="img-fluid rounded" alt="Header Image Besar">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="team-leader">Project team members</label>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img src="public/resources/assets/images/users/user-10.jpg" alt="user" class="rounded-circle thumb-xs">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="public/resources/assets/images/users/user-9.jpg" alt="user" class="rounded-circle thumb-xs">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="public/resources/assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-xs">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="public/resources/assets/images/users/user-5.jpg" alt="user" class="rounded-circle thumb-xs">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="public/resources/assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-xs">
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="" class="user-avatar">
                                                    <span class="thumb-xs justify-content-center d-flex align-items-center bg-soft-info rounded-circle fw-semibold">+6</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- <input id="add-member" type="file" name="files[]" multiple style='display: none;'> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-6 mb-lg-0">
                                        <label for="projectName" class="form-label">Nama Lengkap : <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" required value="<?=$data_diri['nama']?>">
                                    </div>
                                    <div class="col-lg-4 col-6 mb-lg-0">
                                        <label for="projectName" class="form-label">NIK : <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="nik" placeholder="Nomor induk Karyawan" required value="<?=$data_diri['nopeg']?>">
                                    </div>
                                    <div class="col-lg-4 col-12 mb-lg-0">
                                        <label for="projectName" class="form-label">Unit : <code class="highlighter-rouge">*</code></label>
                                        <select class="form-select" name="unit" required>
                                            <option value="<?=$data_diri['unit']?>">
                                                <?=$data_diri['unit']?>
                                            </option>
                                            <option>---Pilih Unit Kerja---</option>
                                            <?php 
                                            $sql=$koneksi->query("SELECT * FROM master_unit ORDER BY unit_kerja ASC");
                                            while ($data=mysqli_fetch_assoc($sql)) 
                                            {
                                                ?>
                                            <option value="<?=$data['unit_kerja']?>">
                                                <?=$data['unit_kerja']?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                                        <label class="form-label mt-2">Alamat Email <code class="highlighter-rouge">*</code></label>
                                        <input type="email" class="form-control" name="email" placeholder="Alamat Email Aktif" required value="<?=$data_diri['email']?>">
                                        <small class="form-text text-muted">Pastikan alamat email terisi dengan benar karena hasil pengajuan akan dikirimkan melalui alamat email.</small>
                                    </div>
                                    <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                                        <label class="form-label mt-2">Nomor Telepon <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="telepon" placeholder="Nomor Telepon / Whatsapp" required value="<?=$data_diri['telpon']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-12 col-12 mb-lg-0">
                                    <h4 class="mt-0 card-title mb-2">
                                        Dokumen
                                        <button type="button" class="btn btn-icon-circle btn-icon-circle-sm custom-tooltip text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Pastikan Anda Mengupload semua berkas yang diperlukan sesuai dengan sistem">
                                            <i class="mdi mdi-alert-circle"></i>
                                        </button>
                                    </h4>
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-de-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                    Upload Berkas
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <?php if (!$isComplete): ?>
                                                        <?php foreach ($missingKeys as $key): ?>
                                                            <?php if (isset($files[$key])): ?>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="<?= strtolower($key); ?>">
                                                                    Upload <?= $files[$key]; ?>
                                                                </a>
                                                            <?php elseif ($key === "sertifikat"): ?>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="sertifikat">
                                                                    Upload Sertifikat
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <span class="dropdown-item text-muted">✔ Semua berkas sudah lengkap</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-de-primary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#modaldetail"> Lihat Detail</a>
                                        </div>
                                    </div>
                                    <p class="text-muted"><small>Kelengkapan Dokumen :</small></p>
                                    <?php foreach ($files as $kolom => $judul): ?>
                                        <?php 
                                            $key = strtolower($kolom);
                                            $status = "belum"; // default
                                            if (!empty($berkas[$kolom])) {
                                                $cekDetail = $koneksi->query("SELECT * FROM file_detail WHERE nopeg='$n' AND jenis_file='$key'");
                                                if ($cekDetail && $cekDetail->num_rows > 0) {
                                                    $status = "valid"; // sudah divalidasi
                                                } else {
                                                    $status = "ada"; // ada file tapi belum divalidasi
                                                }
                                            }
                                        ?>
                                        <span class="badge 
                                            <?= $status == "valid" ? 'bg-success' : ($status == "ada" ? 'bg-warning text-dark' : 'bg-soft-dark'); ?> 
                                            px-3 py-2 fw-semibold mb-2">
                                            <?= $judul ?>
                                            <?php if ($status == "valid"): ?>
                                                <strong>✔</strong>
                                            <?php elseif ($status == "ada"): ?>
                                                <strong>❗</strong>
                                            <?php endif; ?>
                                        </span>
                                    <?php endforeach; ?>

                                    <?php 
                                    // --- SERTIFIKAT ---
                                    $sertifStatus = "belum";
                                    if ($sertifikat >= 1) {
                                        $cekDetailSertif = $koneksi->query("SELECT * FROM detail_file WHERE nopeg='$n' AND field='sertifikat'");
                                        if ($cekDetailSertif && $cekDetailSertif->num_rows > 0) {
                                            $sertifStatus = "valid";
                                        } else {
                                            $sertifStatus = "ada";
                                        }
                                    }
                                    ?>
                                    <span class="badge 
                                        <?= $sertifStatus == "valid" ? 'bg-success' : ($sertifStatus == "ada" ? 'bg-warning text-dark' : 'bg-soft-dark'); ?> 
                                        px-3 py-2 fw-semibold mb-2">
                                        Sertifikat
                                        <?php if ($sertifStatus == "valid"): ?>
                                            <strong>✔</strong>
                                        <?php elseif ($sertifStatus == "ada"): ?>
                                            <strong>❗</strong>
                                        <?php endif; ?>
                                    </span>
                                    <div class="file-box-content mt-2">
                                        <?php
                                        $colors = ['text-primary', 'text-success', 'text-danger', 'text-warning', 'text-info', 'text-secondary'];

                                        foreach ($files as $field => $label): 
                                            if (!empty($berkas[$field])):
                                                // pilih warna random
                                                $randColor = $colors[array_rand($colors)];
                                        ?>
                                        <div class="file-box">
                                            <div class="dropdown dropend">
                                                <a href="#" data-bs-toggle="dropdown" class="download-icon-link" download>
                                                    <i class="las la-download file-download-icon"></i>
                                                    <div class="text-center">
                                                        <i class="lar la-file-alt <?= $randColor ?>"></i>
                                                        <h6 class="text-truncate">
                                                            <?= htmlspecialchars($berkas[$field]) ?>
                                                        </h6>
                                                        <small class="text-muted">
                                                            <?= $label ?></small>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Download</a>
                                                    <a class="dropdown-item" href="#">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            endif;
                                        endforeach;
                                        if ($sertifikat >= 1) {
                                            while ($data_sertifikat= mysqli_fetch_assoc($ambil_berkas_sertif)) {
                                                $randColor2 = $colors[array_rand($colors)];
                                         
                                        ?>
                                        <div class="file-box">
                                            <a href="public/file/berkas/<?= htmlspecialchars($data_sertifikat['berkas']) ?>" class="download-icon-link" download>
                                                <i class="las la-download file-download-icon"></i>
                                            </a>
                                            <div class="text-center">
                                                <i class="lar la-file-alt <?= $randColor2 ?>"></i>
                                                <h6 class="text-truncate">
                                                    <?= htmlspecialchars($data_sertifikat['berkas']) ?>
                                                </h6>
                                                <small class="text-muted">Sertifikat</small>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-lg-12 col-12 mb-2 mb-lg-0">
                                        <label class="form-label mt-2">Jenjang Saat ini <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="jenjang_saat_ini" placeholder="Jenjang Karir Saat ini" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-12 col-12 mb-lg-0">
                                    <h4 class="mt-0 card-title mb-3">Jenjang Yang Diajukan</h4>
                                    <div class="row" id="searchBar">
                                        <div class="col-sm-6 col-12">
                                            <div class="input-group mb-1">
                                                <button class="btn btn-secondary" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <input type="text" id="search" class="form-control" placeholder="Pencarian......" />
                                                <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
                                                    <i class="fas fa-filter"></i>
                                                </button>
                                            </div>
                                            <small class="form-text text-muted text-center">
                                                Anda bisa mencari katagori RKK di form pencarian diatas
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="scroll-x">
                                            <div id="card-container" class="d-flex flex-nowrap">
                                                <!-- Data card akan dimuat di sini lewat AJAX -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" id="detailContainer">
                                            <!-- konten di sini -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end form-group-->

                            <?php if ($isComplete): ?>
                            <!-- Kalau sudah lengkap -->
                            <button type="submit" class="btn btn-secondary btn-sm">Simpan Pengajuan</button>
                            <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                            <?php else: ?>
                            <!-- Kalau belum lengkap -->
                            <button type="button" class="btn btn-secondary btn-sm" onclick='showWarning(<?= json_encode($missingFiles) ?>)'>
                                Simpan Pengajuan
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                            <?php endif; ?>
                            <!--end form-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
</form>
<!-- modal upload berkas -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white" id="modalTitle">Upload Berkas</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="app/controller/keperawatan/upload-berkas.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row justify-content-center align-self-center align-items-center text-center">
                        <div class="col-md-12">
                            <img src="public/bg/upload.webp" style="width: 100%; max-width: 300px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                        </div>
                    </div>
                    <p class="text-muted">Pastikan file berformat "pdf / jpeg / jpg / png".</p>
                    <input type="hidden" name="jenis" id="jenisInput">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="fileInput" name="berkas" accept=".pdf,.jpeg,.jpg,.png" required>
                        <label class="input-group-text" for="fileInput">Upload</label>
                    </div>
                    <div class="row mb-2" id="tgl">
                        <div class="col-lg-6">
                            <label class="form-label">Tgl Dibuat :</label>
                            <input type="date" class="form-control" name="tgl_dibuat">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Tgl Berakhir :</label>
                            <input type="date" class="form-control" name="tgl_berakhir">
                        </div>
                    </div>
                    <div class="row" id="nosurat">
                        <div class="col-lg-12">
                            <label class="form-label">No surat :</label>
                            <input type="text" name="nomor" class="form-control" placeholder="Nomor dari Surat/Sertifikat/Kartu">
                        </div>
                    </div>
                    <div class="row" id="keteranganGroup" style="display: none;">
                        <div class="col-lg-12">
                            <label class="form-label">Keterangan :</label>
                            <textarea name="keterangan" class="form-control" placeholder="Tuliskan keterangan sertifikat... misalnya nama pelatihan, seminar dll"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal filter -->
<div class="modal fade" id="exampleModalDefault" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Filter</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <form>
                <div class="modal-body">
                    <div class="row p-3">
                        <div class="col-lg-12">
                            <h5>Filter Pencarian RKK</h5>
                            <small class="text-muted ml-2">Anda bisa memilih berdasarkan 2 parameter dibawah ini</small>
                            <div class="row mb-3 mt-3">
                                <label class="col-md-3 control-label">Jenis</label>
                                <div class="col-md-9">
                                    <!-- Jenis -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenisPerawat" value="perawat">
                                        <label class="form-check-label" for="jenisPerawat">Perawat</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenisBidan" value="bidan">
                                        <label class="form-check-label" for="jenisBidan">Bidan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <label class="col-md-3 control-label">Jenjang</label>
                                <div class="col-md-9">
                                    <!-- Jenjang -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenjang" id="jenjang1" value="PK-1">
                                        <label class="form-check-label" for="jenjang1">PK-I</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenjang" id="jenjang2" value="PK-2">
                                        <label class="form-check-label" for="jenjang2">PK-II</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenjang" id="jenjang3" value="PK-3">
                                        <label class="form-check-label" for="jenjang3">PK-III</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-primary btn-sm" id="applyFilter">Proses</button>
                </div>
            </form>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!-- modal detail -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0">Detail Berkas Yang Diupload</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-3">
                    <div class="col-lg-12">
                        <div class="table-responsive-sm">
                            <table class="table table-sm nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Tgl Buat</th>
                                        <th>Expired</th>
                                        <th>No Surat</th>
                                    </tr>
                                </thead>
                                <?php
                                    $no = 1; 
                                    foreach ($files as $jenis_file => $data_jenis_file) : 
                                    $ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$jenis_file]'");
                                    $data_detail = $ambil_detail_file->fetch_assoc();
                                ?>
                                <tr>
                                    <td>
                                        <?=$no++?>
                                    </td>
                                    <td><a href="public/file/berkas/<?= htmlspecialchars($berkas[$field]) ?>">
                                            <?=$data_jenis_file?></a></td>
                                    <td>
                                        <?php
                                                if ($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_keluar'])) {
                                                    echo '';
                                                } else {
                                                    echo date("d/m/Y", strtotime($data_detail['tgl_keluar']));
                                                }
                                            ?>
                                    </td>
                                    <td>
                                        <?php
                                                if ($data_detail['tgl_berakhir'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) {
                                                    echo '';
                                                } else {
                                                    echo date("d/m/Y", strtotime($data_detail['tgl_berakhir']));
                                                }
                                            ?>
                                    </td>
                                    <td class="text-center">
                                        <?= in_array($data_detail['jenis_file'], ['FOTO','PORTOFOLIO']) 
                                                  ? '✔' 
                                                  : $data_detail['no_file']; 
                                            ?>
                                    </td>
                                    <!-- <td></td> -->
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'req/js-pengajuan-kredensial.php'; ?>