<?php
include '../../../env/koneksi.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';

$sql = "SELECT * FROM master_rkK";
if ($q != '') {
    $sql .= " WHERE nama_rkk LIKE '%" . mysqli_real_escape_string($koneksi, $q) . "%' 
          OR unit_rkk LIKE '%" . mysqli_real_escape_string($koneksi, $q) . "%'";

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
    echo "<p class='text-muted'>Data tidak ada</p>";
}
?>
