<?php
 require 'env/koneksi.php';
 require 'env/tgl_indo.php'; 
 $quer = mysqli_query($koneksi, "SELECT max(kode_linen) as kodeTerbesar FROM master_linen ");
 $dat = mysqli_fetch_array($quer);
 $kode = $dat['kodeTerbesar'];
 $urutan = (int) substr($kode, 3, 3);
 $urutan++;
 $huruf='LN-';
 $kode = $huruf. sprintf("%03s", $urutan);
?>

<!-- Toast -->
<?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != ''): ?>
    <div class="position-fixed top-0 end-0 mt-5 me-3" style="z-index: 1080;">
        <div id="toastPesan" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="public/resources/assets/images/logo-sm.png" alt="" height="20" class="me-1">
                <h5 class="me-auto my-0">RSPM</h5>
                <small class="text-muted">Baru saja</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong><?= $_SESSION['info']; ?></strong> <?= $_SESSION['pesan']; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toastEl = document.getElementById('toastPesan');
            const toast = new bootstrap.Toast(toastEl, {
                delay: 5000, // 5 detik
                autohide: true
            });
            toast.show();
        });
    </script>
<?php endif; ?>
<?php $_SESSION['pesan'] = ''; ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 col-sm-4 text-center">
                        <img src="public/bg/linen.webp" style="aspect-ratio: 1 / 1; width: 100%; max-width: 350px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                    </div>
                    <!-- Teks Header -->
                    <div class="col-md-9 col-sm-8">
                        <h3 class="fw-bold mb-3">Informasi Halaman</h3>
                        <ol class="text-muted mb-0 ps-3">
                            <li>Halaman ini digunakan untuk menambahkan master dari barang linen.</li>
                            <li>Yang dimaksud dengan master linen yaitu jenis linen yang ada di rumah sakit seperti alas timbangan, bantal, bed cover, dan lain sebagainya.</li>
                            <li>Pastikan Anda mengisi form sesuai dengan perintah.</li>
                            <li>Apabila mengalami kendala, hubungi tim IT untuk bantuan lebih lanjut.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Master Linen</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="mb-0" method="post" action="app/controller/linen/tambah-linen.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Kode <small class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control text-muted" name="kode" value="<?=$kode?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Jenis Linen <small class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control" name="jenis" id="lastname" required="" placeholder="Jenis Linen (ex : alas timbangan, baju, pasien dll)">
                                    </div>
                                </div><!--end col-->                                                
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group">
                                        <label class="form-label my-2">Keterangan <small class="text-danger font-13">*</small></label>
                                        <textarea class="form-control" name="keterangan" cols="3" rows="3"></textarea>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form><!--end form-->
                    </div>
                </div>
                 <div class="row mt-2">
                   <div class="col-md-12 col-sm-6 text-center">
                        <img src="public/bg/linen2.webp" style="width: 100%; max-width: 450px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Linen</h5>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-lg-12">
                        <div class="table table-responsive">
                            <table class="table table-sm" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Jenis Linen</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ambildata = $koneksi->query("SELECT * FROM master_linen ORDER BY jenis_linen ASC");
                                        $linenList = [];
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($ambildata)) {
                                            $linenList[] = $data;
                                        }
                                    ?>
                                    <?php foreach ($linenList as $index => $data): ?>
                                    <tr>
                                        <td>
                                            <?=$no++?>
                                        </td>
                                        <td>
                                            <?=$data['kode_linen']?>
                                        </td>
                                        <td>
                                            <?=strtoupper($data['jenis_linen'])?>
                                        </td>
                                        <td>
                                            <?=$data['keterangan']?>
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-pen font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href="detail-transaksi-pembelian/" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $index ?>">Ubah</a>
                                                    <a class="dropdown-item" href="detail-transaksi-pembelian/">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- Modal ubah data -->

                                    <!-- akhir modal ubah data -->
                                    
                                </tbody>
                            </table>
                        </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($linenList as $index => $data): ?>
    <div class="modal fade" id="modalUbah<?= $index ?>" tabindex="-1" aria-labelledby="modalUbah<?= $index ?> Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0">Ubah data</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!--end modal-header-->
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 text-center align-self-center">
                                <img src="public/bg/linen3.webp" alt="" class="img-fluid">
                            </div><!--end col-->
                            <div class="col-lg-8">
                                <h5><?=ucwords($data['jenis_linen'])?></h5>
                                <span class="badge bg-soft-secondary"><?=$data['kode_linen']?></span>
                                <hr>
                                <div class="row mt-1">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Jenis Linen</label>
                                        <input type="text" class="form-control" name="jenis" value="<?=$data['jenis_linen']?>" required="" placeholder="Jenis Linen (ex : alas timbangan, baju, pasien dll)">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" cols="3" rows="3" placeholder="Keterangan jenis linen"><?=$data['keterangan']?></textarea>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->   
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-de-primary btn-sm">Save changes</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div>
    </div>
<?php endforeach; ?>