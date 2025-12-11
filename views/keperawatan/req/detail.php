<?php
include '../../../env/koneksi.php';
include '../../../env/cek-perangkat.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM master_rkk WHERE id = $id";
$ambil = $koneksi->query($sql);

if ($data = mysqli_fetch_assoc($ambil)) {
    ?>
    <input type="hidden" name="rkk_id" id="rkk_id" value="<?=$id?>" required>
    <div class="card">
        <div class="card-body"> 
            <div class="row p-3">
                <div class="col-lg-12 align-self-center">
                    <div>
                        <h1 class="my-4 font-weight-bold"><?= $data['nama_rkk'] ?> <span class="text-primary"><?= $data['unit_rkk'] ?></span>.</h1>
                        <p class="font-14 text-muted"><?= nl2br($data['keterangan_rkk']) ?>
                        </p>
                        <button class="btn btn-de-primary" onclick="showCards()">batal</button>
                    </div>
                </div>
            </div>
            <div class="row p-3">
                <?php if (isMobileDevice()) { ?>
                    <!-- form wizard -->

                    <style>
                    /* ====== WIZARD CONTAINER ====== */
                    #wizard {
                        background: #ffffff;
                        border-radius: 14px;
                        padding: 18px 18px 10px;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
                        margin-top: 10px;
                        transition: 0.3s ease;
                        font-family: "Segoe UI", sans-serif;
                    }

                    /* ====== HEADER RKK ====== */
                    #wizard h4 {
                        font-size: 18px;
                        font-weight: 700;
                        margin-bottom: 10px;
                        color: #333;
                    }

                    /* ====== STEP BOX ====== */
                    .wizard-step {
                        display: none;
                        padding: 10px 0;
                        animation: fadeStep 0.3s ease;
                    }

                    @keyframes fadeStep {
                        from { opacity: 0; transform: translateY(5px); }
                        to   { opacity: 1; transform: translateY(0); }
                    }

                    /* ====== JUDUL SETIAP DETAIL ====== */
                    .wizard-step h5 {
                        font-size: 16px;
                        font-weight: 600;
                        color: #2c3e50;
                        margin-bottom: 12px;
                    }

                    /* ====== RADIO GROUP ====== */
                    .wizard-step label {
                        display: flex;
                        align-items: center;
                        padding: 10px 12px;
                        margin-bottom: 8px;
                        background: #f8fafc;
                        border: 1px solid #e5e8eb;
                        border-radius: 10px;
                        cursor: pointer;
                        transition: 0.2s ease;
                        font-size: 14px;
                        color: #333;
                    }

                    .wizard-step label:hover {
                        background: #eef4ff;
                        border-color: #bfd3ff;
                    }

                    /* ====== RADIO INPUT (hidden) ====== */
                    .wizard-step input[type="radio"] {
                        margin-right: 10px;
                        accent-color: #1d4ed8; /* biru elegan */
                        transform: scale(1.15);
                    }

                    /* ====== NAVIGASI BUTTON ====== */
                    .wizard-buttons {
                        margin-top: 12px;
                        display: flex;
                        justify-content: space-between;
                    }

                    .wizard-buttons .btn {
                        padding: 8px 18px;
                        border-radius: 10px;
                        font-size: 14px;
                        font-weight: 600;
                        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
                    }

                    #prevBtn {
                        background: #e5e7eb;
                        border: none;
                        color: #374151;
                    }

                    #nextBtn {
                        background: #2563eb;
                        border: none;
                    }

                    #nextBtn:hover {
                        background: #1e47c4;
                    }

                    /* ====== RESPONSIVE ====== */
                    @media (max-width: 480px) {
                        #wizard {
                            padding: 15px;
                        }
                        .wizard-buttons .btn {
                            width: 48%;
                        }
                    }

                    </style>

                    <div id="wizard">

                        <!-- STEP 0 (Deskripsi RKK) -->
                        <div class="wizard-step active">
                            <h4><?= $data['nama_rkk']; ?></h4>
                            <p><?= nl2br($data['keterangan_rkk']) ?></p>
                        </div>

                        <!-- STEP BERULANG (Detail RKK) -->
                        <?php
                        $nomor_rkk = 1; 
                        $ambil_detail_rkk = $koneksi->query("SELECT * FROM detail_master_rkk WHERE id_rkk=$id");
                        while ($detail = mysqli_fetch_assoc($ambil_detail_rkk)) {
                        ?>
                            <div class="wizard-step">
                                <h5>
                                    <span class="step-number"><?= $nomor_rkk++ ?>.</span>
                                    <?= htmlspecialchars($detail['kompetensi_rkk']) ?>
                                </h5>


                                <label><input type="radio" name="kewenangan[<?= $detail['id'] ?>]" value="supervisi"> Supervisi</label><br>
                                <label><input type="radio" name="kewenangan[<?= $detail['id'] ?>]" value="mandiri"> Mandiri</label><br>
                                <label><input type="radio" name="kewenangan[<?= $detail['id'] ?>]" value="mandat"> Mandat</label><br>
                                <label><input type="radio" name="kewenangan[<?= $detail['id'] ?>]" value="kolaborasi"> Kolaborasi</label>
                            </div>
                        <?php } ?>

                    </div>

                    <!-- NAVIGASI WIZARD -->
                    <div class="wizard-buttons text-center mt-3">
                        <button type="button" id="prevBtn" onclick="prevStep()" class="btn btn-secondary btn-sm">Kembali</button>
                        <button type="button" id="nextBtn" onclick="nextStep()" class="btn btn-primary btn-sm">Lanjut</button>
                    </div>


                
                <?php } else { ?>
                    <div class="table-responsive table-responsive-custom">
                        <table class="table table-sm table-bordered align-middle"  id="datatable_1"> 
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
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "<p class='text-muted'>Detail tidak ditemukan</p>";
}



?>

