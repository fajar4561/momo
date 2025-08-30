<?php
include '../../../env/koneksi.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';
$jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';
$jenjang = isset($_GET['jenjang']) ? $_GET['jenjang'] : '';

$sql = "SELECT * FROM master_rkk WHERE 1=1";

// filter pencarian teks
if ($q != '') {
    $esc = mysqli_real_escape_string($koneksi, $q);
    $sql .= " AND (nama_rkk LIKE '%$esc%' OR unit_rkk LIKE '%$esc%')";
}

// filter jenis
if ($jenis != '') {
    $escJenis = mysqli_real_escape_string($koneksi, $jenis);
    $sql .= " AND jenis_rkk = '$escJenis'";
}

// filter jenjang
if ($jenjang != '') {
    $escJenjang = mysqli_real_escape_string($koneksi, $jenjang);
    $sql .= " AND nama_rkk = '$escJenjang'";
}

$ambil = $koneksi->query($sql);

// Cek apakah ada data
if (mysqli_num_rows($ambil) > 0) {
    while ($data = mysqli_fetch_assoc($ambil)) {
        ?>
        <div class="card mb-3 me-3" style="min-width: 400px; max-width: 400px; cursor: pointer;" onclick="loadDetail(<?= $data['id'] ?>)">
            <img src="public/resources/assets/images/small/ico/bg/<?= $data['id'] ?>.webp"
            style="aspect-ratio: 5 / 2; max-width: 400px; height: auto; object-fit: cover;"
            class="card-img-top bg-light-alt" alt="...">
            <div class="card-body">
                <h5 class="card-title"><strong><?= $data['nama_rkk'] ?> <?= $data['unit_rkk'] ?></strong></h5>
                <p class="card-text text-muted"><?= $data['keterangan_rkk'] ?></p>
            </div>
        </div>
        <?php
    }
} else { 
?>
<div class="row mt-3 mb-3 justify-content-center align-self-center text-center">
    <div class="col-md-12">
        <img src="public/bg/notfound.webp" style="width: 100%; max-width: 300px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
    </div>
    <div class="col-md-12 col-sm-6 text-center">
        <h5 class="text-muted">Data Tidak Ditemukan</h5>
    </div>
</div>
<?php } ?>
