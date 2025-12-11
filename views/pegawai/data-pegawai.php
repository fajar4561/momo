<?php 
require 'req/head-data-pegawai.php';
require 'req/style-data-pegawai.php';
require 'public/component/toast.php';
?>
<div class="row mb-3">
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


<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Tabel Pegawai</h4>
                        <p class="text-muted mb-0">Halaman ini digunakan untuk berisikan informasi pegawai baru ke dalam sistem. Anda dapat mengubah dan menambahkan data baru ke sistem.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-pegawai">Tambah Data</a>
                                    <a class="dropdown-item" href="<?=$nama_file?>">Export Data</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary">Import Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-sm nowrap" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nopeg</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Jabatan</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cacheFile = 'public/cache/pegawai_data.cache';
                                        $cacheTime = 3; // Cache untuk 1 jam

                                        if (file_exists($cacheFile) && (time() - $cacheTime < filemtime($cacheFile))) {
                                            // Menggunakan cache jika tersedia
                                            $data = file_get_contents($cacheFile);
                                        } else {
                                            // Ambil data dari database jika cache tidak tersedia
                                            $ambildata = $koneksi->query("SELECT * FROM pegawai WHERE nopeg !=123 ORDER BY nama ASC");
                                            $data = '';
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($ambildata)) {
                                                $totalColumns = count($row); // Total kolom dalam tabel
                                                $filledColumns = 0;

                                                // Hitung kolom yang terisi (tidak NULL atau tidak kosong)
                                                foreach ($row as $value) {
                                                    if (!is_null($value) && trim($value) !== '') {
                                                        $filledColumns++;
                                                    }
                                                }

                                                // Hitung persentase kelengkapan data
                                                $kelengkapan = ($filledColumns / $totalColumns) * 100;

                                                $foto = htmlspecialchars($row['foto']); // Pastikan 'foto' adalah path yang benar dari database
                                                $nama = htmlspecialchars(ucwords($row['nama']));
                                                $unit = htmlspecialchars($row['unit']);
                                                $jabatan = htmlspecialchars(ucwords($row['jabatan']));
                                                $gender = htmlspecialchars(ucwords($row['gender']));

                                                $data .= '
                                                <tr data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                                                    data-bs-content="
                                                        <div>
                                                            <strong>Nama Pegawai:</strong> ' . $nama . '<br>
                                                            <strong>Jenis Kelamin:</strong> ' . $gender . '<br>
                                                            <strong>Unit:</strong> ' . $unit . '<br>
                                                            <strong>Jabatan:</strong> ' . $jabatan . '<br>
                                                            <strong>kelengkapan Biodata:</strong> ' . $kelengkapan . '%<br
                                                        </div>"
                                                        class="clickable-row" data-dropdown-id="'.htmlspecialchars($row['nopeg']).'">
                                                    <td>' . $no++ . '</td>
                                                    <td>' . htmlspecialchars($row['nopeg']) . '</td>
                                                    <td>' . $nama . '</td>
                                                    <td>' . $gender . '</td>
                                                    <td>' . $jabatan . '</td>
                                                    <td>' . $unit . '</td>
                                                    <td>' . htmlspecialchars($row['status_pegawai']) . '</td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel' . htmlspecialchars($row['nopeg']). '" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-pen font-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel' . htmlspecialchars($row['nopeg']) . '">
                                                            <a class="dropdown-item" href="detail-pegawai/' . htmlspecialchars($row['nopeg']) . '">Detail Pegawai</a>
                                                            <a class="dropdown-item" href="ubah-pegawai/' . htmlspecialchars($row['nopeg']) . '">Ubah</a>
                                                            <a class="dropdown-item" href="app/controller/pegawai/reset-password.php?n=' . htmlspecialchars($row['nopeg']) . '" onclick="return confirm(\'Dengan Mereset password maka password akan berubah menjadi password defaultnya yaitu menggunakan Nomor induk pegawai. Apakah Anda yakin ingin Mereset password ' . $nama . ' ?\')">Reset Password</a>
                                                            <a class="dropdown-item" href="app/controller/pegawai/hapus-pegawai.php?n=' . htmlspecialchars($row['nopeg']) . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ' . $nama . ' ?\')">Hapus</a>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>';
                                            }

                                            // Cache hasil query ke file
                                            file_put_contents($cacheFile, $data);
                                        }

                                        // Tampilkan data
                                        echo $data;
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<div class="modal fade" id="exampleModalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Import Data Pegawai</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <form method="post" action="app/controller/pegawai/import-pegawai.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-grid">
                                <p class="text-muted">Pastikan File yang diupload berformatkan "xlsx".</p>
                                <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                <input type="file" id="input-file" name="input-file" onchange="handleChange()" hidden />
                                <label class="btn-upload btn btn-primary mt-4" for="input-file">Pilih File</label>
                            </div>
                        </div>
                    </div>                                                   
                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn" hidden>Save</button>
                </div><!--end modal-footer-->
            </form>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
<script src="env/js/notif.js"></script>
<?php require 'req/js-data-pegawai.php' ?>