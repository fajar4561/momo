<?php
include '../../../env/koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM master_rkK WHERE id = $id";
$ambil = $koneksi->query($sql);

if ($data = mysqli_fetch_assoc($ambil)) {
    ?>
    <input type="hidden" name="rkk_id" value="<?=$id?>">
    <div class="card">
        <div class="card-body"> 
            <div class="row p-3">
                <div class="col-lg-12 align-self-center">
                    <div>
                        <h1 class="my-4 font-weight-bold"><?= $data['nama_rkk'] ?> <span class="text-primary"><?= $data['unit_rkk'] ?></span>.</h1>
                        <p class="font-14 text-muted"><?= nl2br($data['keterangan_rkk']) ?>
                        </p>
                        <button class="btn btn-de-primary" onclick="showCards()">Kembali</button>
                    </div>
                </div>
            </div>
            <div class="row p-3">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="datatable_1"> 
                         <thead>
                            <tr>
                                <th rowspan="3">NO</th>
                                <th rowspan="3">DAFTAR KEWENANGAN KLINIS DIMINTA</th>
                                <th colspan="4" class="text-center">JENIS KEWENANGAN</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">MANDIRI</th>
                                <th rowspan="2">MANDAT</th>
                                <th rowspan="2">DELEGASI</th>
                            </tr>
                            <tr>
                                <th>SUPERVISI</th>
                                <th>PENUH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor_rkk = 1; 
                            $ambil_detail_rkk = $koneksi->query("SELECT * FROM detail_master_rkk WHERE id_rkk=$id");
                            while ($data_rkk = mysqli_fetch_assoc($ambil_detail_rkk)) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $nomor_rkk++ ?></td>
                                <td><?= $data_rkk['kompetensi_rkk'] ?></td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-check-input" type="radio" value="supervisi" name="kewenangan[<?= $data_rkk['id'] ?>]">
                                    </div>
                                </td>

                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-check-input" type="radio" value="mandiri" name="kewenangan[<?= $data_rkk['id'] ?>]">
                                    </div>
                                </td>

                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-check-input" type="radio" value="mandat" name="kewenangan[<?= $data_rkk['id'] ?>]">
                                    </div>
                                </td>

                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-check-input" type="radio" value="kolaborasi" name="kewenangan[<?= $data_rkk['id'] ?>]">
                                    </div>
                                </td>


                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "<p class='text-muted'>Detail tidak ditemukan</p>";
}



?>

