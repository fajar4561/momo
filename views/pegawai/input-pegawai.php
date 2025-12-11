<?php 
require 'public/component/toast.php';
require 'req/style-input-pegawai.php';
?>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card border-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 text-center">
                        <img src="public/bg/pegawai.webp" class="img-fluid rounded-3" alt="Informasi Pegawai">
                    </div>
                    <!-- Teks Informasi -->
                    <div class="col-md-9">
                        <h4 class="fw-bold mb-3 text-primary">
                            <i class="bi bi-info-circle"></i> Informasi Halaman
                        </h4>
                        <ul class="list-unstyled text-muted mb-0">
                            <li class="mb-2">
                                <i class="bi bi-chevron-right text-primary"></i>
                                Gunakan tombol <button type="button" class="btn btn-primary btn-sm">Opsi</button>
                                untuk menambah, mengimpor, atau mengekspor data pegawai.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-chevron-right text-primary"></i>
                                Format file <strong>import/export</strong> yang didukung adalah <code>.xlsx</code>.
                                <a href="#" class="text-decoration-underline">Klik di sini</a> untuk panduan teknis.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-chevron-right text-primary"></i>
                                Gunakan fitur <button type="button" class="btn btn-outline-secondary btn-sm">Search...</button>
                                di pojok kanan atas tabel untuk mencari data pegawai.
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-chevron-right text-primary"></i>
                                Klik ikon <i class="las la-pen"></i> atau klik kanan pada baris tabel untuk melihat
                                detail, ubah, hapus, atau reset password pegawai.
                            </li>
                            <li>
                                <i class="bi bi-chevron-right text-primary"></i>
                                Menu <strong>entries per page</strong> digunakan untuk mengatur jumlah data yang tampil di tabel.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
              <div>
                <h4 class="card-title mb-1"><i class="bi bi-person-plus"></i> Tambah Data Pegawai</h4>
                <small class="text-muted">Lengkapi data berikut dengan benar.</small>
              </div>
              <span class="badge bg-primary">Formulir Pegawai</span>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form class="needs-validation" novalidate method="post" action="app/controller/pegawai/simpan-pegawai.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="text-uppercase text-muted mt-4 mb-3">
                                <i class="bi bi-person-badge"></i> Data Pribadi
                            </h6>
                            <hr class="mt-0 mb-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-sm-2 col-form-label text-end">Nama <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-secondary"><i data-feather="users"></i></span>
                                        <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap Pegawai" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-tel-input" class="col-sm-2 col-form-label text-end">NIK</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-secondary"><i data-feather="book-open"></i></span>
                                        <input class="form-control" type="text" name="nik" placeholder="Nomor Induk Keluarga">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Agama <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-secondary"><i data-feather="server"></i></span>
                                        <select class="form-select" name="agama" required>
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
                            </div>
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-end">Gender <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10 d-flex flex-wrap gap-3 radio-card">
                                    <!-- Medis -->
                                    <input type="radio" id="radio-laki" name="gender" value="Laki-laki" checked>
                                    <label for="radio-laki">
                                        <img src="public/bg/man.webp" alt="Laki-laki">
                                        <div>
                                            <strong><i class="fas fa-venus text-primary"></i> Laki-laki</strong>
                                        </div>
                                    </label>
                                    <!-- Non Medis -->
                                    <input type="radio" id="radio-perempuan" name="gender" value="Perempuan">
                                    <label for="radio-perempuan">
                                        <img src="public/bg/woman.webp" alt="Non Medis">
                                        <div>
                                            <strong><i class="fas fa-venus text-danger"></i> Perempuan</strong>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Tempat Lahir <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-secondary"><i data-feather="map-pin"></i></span>
                                        <input class="form-control" type="text" name="tmpt_lahir" placeholder="Tempat Lahir Pegawai" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Tgl Lahir <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-secondary"><i data-feather="clipboard"></i></span>
                                        <input class="form-control" type="date" name="tgl_lahir" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Ijazah <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="ijazah" required>
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
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Alamat <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Tempat Tinggal Karyawan" required></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Email </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" placeholder="Alamat Email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Telpon</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="telpon" placeholder="Nomor Telepon / WA Pegawai">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label text-end">Status Perkawinan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kawin">
                                        <option value="">--- Pilih Status Perkawinan ---</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Foto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="foto" accept="image/*" onchange="previewImage(event)">
                                    <center><img id="preview" class="mt-2 rounded shadow-sm border" width="120"></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="text-uppercase text-muted mt-4 mb-3">
                                <i class="bi bi-person-badge"></i> Kepegawaian
                            </h6>
                            <hr class="mt-0 mb-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">NIP <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                      <span class="input-group-text bg-light text-secondary"><i data-feather="book"></i></span>
                                      <input class="form-control" type="text" name="nopeg" placeholder="Nomor Induk Pegawai" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label text-end">
                                    Jenis Pegawai <code class="text-danger">*</code>
                                </label>
                                <div class="col-sm-10">
                                    <div class="radio-card-wrapper">
                                        <!-- Medis -->
                                        <input type="radio" id="radio-medis" name="jenis_pegawai" value="Medis" checked>
                                        <label for="radio-medis">
                                            <img src="public/bg/doctor.webp" alt="Medis">
                                            <div>
                                                <strong>Medis</strong>
                                                <small>Dokter, Perawat, Bidan</small>
                                            </div>
                                        </label>
                                        <!-- Non Medis -->
                                        <input type="radio" id="radio-nonmedis" name="jenis_pegawai" value="Non Medis">
                                        <label for="radio-nonmedis">
                                            <img src="public/bg/non-medis.webp" alt="Non Medis">
                                            <div>
                                                <strong>Non Medis</strong>
                                                <small>Pendaftaran, Keuangan, IT</small>
                                            </div>
                                        </label>
                                        <!-- Penunjang Medis -->
                                        <input type="radio" id="radio-penunjang" name="jenis_pegawai" value="Penunjang Medis">
                                        <label for="radio-penunjang">
                                            <img src="public/bg/support.webp" alt="Penunjang Medis">
                                            <div>
                                                <strong>Penunjang Medis</strong>
                                                <small>Analis, Radiografer, Farmasi</small>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- SUB PILIHAN MEDIS -->
                            <div class="row mb-3" id="subMedis" style="display: none;">
                                <label class="col-sm-2 col-form-label text-end">Sub Kategori <code class="text-danger">*</code></label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="sub_medis">
                                        <option value="">--- Pilih Sub Kategori Medis ---</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Perawat">Perawat</option>
                                        <option value="Bidan">Bidan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Jabatan <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <select id="default" name="jabatan" required>
                                        <option>---Pilih Jabatan---</option>
                                        <?php 
                                        require 'env/koneksi.php';
                                        $sql=$koneksi->query("SELECT * FROM master_pegawai ORDER BY jabatan ASC");
                                        while ($data=mysqli_fetch_assoc($sql)) 
                                        {
                                            ?>
                                        <option value="<?=$data['jabatan']?>">
                                            <?=$data['jabatan']?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Unit Kerja <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="unit" required>
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
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">SKPT <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="skpt" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">TMT <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="tmt" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Status Pegawai <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status_pegawai" required>
                                        <option value="">--- Pilih Status Pegawai ---</option>
                                        <option value="KONTRAK">KONTRAK</option>
                                        <option value="TETAP">TETAP</option>
                                        <option value="RESIGN">RESIGN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end"> </label>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<script src="env/js/notif.js"></script>
<?php require 'req/js-input-pegawai.php';?>