<?php
include '../../../env/koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM master_rkk WHERE id = $id";
$ambil = $koneksi->query($sql);
if (!$ambil) {
    die("Query error: " . $koneksi->error);
}

if ($data = mysqli_fetch_assoc($ambil)) {
    ?>
    <div class="card">
        <div class="card-body">
            <div class="row p-3">
                <div class="col-lg-5 align-self-center">
                    <div>
                        <span class="bg-soft-pink p-2 rounded">Halaman</span>
                        <h1 class="my-4 font-weight-bold"><?= $data['nama_rkk'] ?> <span class="text-primary"><?= $data['unit_rkk'] ?></span>.</h1>
                        <p class="font-14 text-muted"><?= nl2br($data['keterangan_rkk']) ?>
                        </p>
                        <button type="button" class="btn btn-de-primary">Get Started</button>
                    </div>
                </div>
                <div class="col-lg-7 text-end">
                    <img src="public/bg/kre.png" style="width: 100%; max-width: 450px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                </div>
            </div>
            <div class="row p-3">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table" id="datatable_1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kompetensi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $nomor_rkk = 1; 
                            $ambil_detail_rkk = $koneksi->query("SELECT * FROM detail_master_rkk WHERE id_rkk=$id");
                            while ($data_rkk = mysqli_fetch_assoc($ambil_detail_rkk)) {
                            ?>
                            <tr>
                                <td><?= $nomor_rkk++ ?></td>
                                <td><?= $data_rkk['kompetensi_rkk'] ?></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle arrow-none" id="dLabel<?= $data_rkk['id'] ?>" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <i class="las la-pen font-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel<?= $data_rkk['id'] ?>">
                                            <a href="#" class="dropdown-item btn-edit" data-id="<?= $data_rkk['id'] ?>" data-keterangan="<?= $data_rkk['kompetensi_rkk'] ?>">Ubah</a>
                                            <a href="#" class="dropdown-item btn-hapus" data-id="<?= $data_rkk['id'] ?>" data-keterangan="<?= $data_rkk['kompetensi_rkk'] ?>">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row p-3">
                        <h5 class="fw-bold mb-3">Form Tambah / Ubah data RKK</h5>
                        <ol class="text-muted mb-0 ps-3">
                            <li>From dibawah ini digunakan untuk mengubah dan menambah data RKK.</li>
                            <li>Pastikan apa yang anda memperhatikan dengan benar tombol ubah ataupun simpan pada form.</li>
                            <li>Jika terdapat kendala teknis atau pertanyaan terkait pengisian form, silakan hubungi tim IT atau bagian kredensial rumah sakit.</li>
                        </ol>
                    </div>
                   <div class="row p-3">
                        <form class="mb-0"  id="form-detail-rkk" action="app/controller/keperawatan/simpan-rkk.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Daftar RKK <small class="text-danger font-13">*</small></label>
                                        <textarea placeholder="Daftar kewenangan Klinis Diminta" class="form-control" name="keterangan" id="input-keterangan" required></textarea>
                                        <input type="hidden" name="id_rkk" class="form-control" id="id-rkk" required="" value="<?=$id?>">
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <button class="btn btn-primary" type="submit" id="btn-submit">Simpan</button>
                                    </div>              
                                </div><!--end col-->
                            </div><!--end row-->                                            
                        </form>
                   </div>
                   <div class="row p-3">
                       <div class="row mt-3">
                            <div class="col-md-12 col-sm-6 text-center">
                                <img src="public/resources/assets/images/small/ico/5.webp" style="width: 100%; max-width: 200px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                            </div>
                            <div class="col-md-12 col-sm-6 text-center">
                                <h5 class="text-muted">From tambah & ubah data RKK</h5>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "<p class='text-muted'>Detail tidak ditemukan</p>";
}



?>

