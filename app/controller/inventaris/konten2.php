<?php 
require '../../../env/koneksi.php';
if (isset($_POST['id'])) {
    $unitId = $_POST['id'];
    $query = $koneksi->query("SELECT * FROM unit_inv WHERE id = $unitId");
    
    if ($data = mysqli_fetch_assoc($query)) {
        // Kembalikan konten yang ingin ditampilkan
        echo "<h3>{$data['unit']}</h3>"; // Contoh tampilan
        echo "<p>Detail konten untuk {$data['unit']}</p>"; // Tambahkan detail lain sesuai kebutuhan

        $unit_inv = $data['unit'];
        $ambilinv = $koneksi->query("SELECT * FROM penyerahan WHERE unit='$unit_inv'");
        $jml_data = mysqli_num_rows($ambilinv); ?>

        <?php if ($jml_data > 0) { ?>

         <div class="tab-content" id="files-tabContent">
            <div class="tab-pane fade show active" id="files-projects">
                <div class="file-box-content">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title my-3">Surat Serah Terima</h4>
                        </div>
                    </div>
                     <?php  while ($row = mysqli_fetch_assoc($ambilinv)) { ?>
                    <div class="file-box">
                        <a href="app/print/inv/serah-terima.php?kode=<?=$row['kode_penyerahan']?>" class="download-icon-link" target='_blank'>
                            <i class="las la-download file-download-icon"></i>
                            <div class="text-center">
                                <i class="lar la-file-code text-danger"></i>
                                <h6 class="text-truncate"><?=$row['kode_penyerahan']?>.pdf</h6>
                                <small class="text-muted"><?=tgl_indo($row['tgl_penyerahan'])?></small>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title my-3">Qrcode Inventaris</h4>
                    </div>
                </div>
                <div class="file-box-content">
                    <?php 
                        $ambilqr = $koneksi->query("SELECT * FROM detail_penyerahan WHERE unit='$unit_inv'");
                        while ($data_qr= mysqli_fetch_assoc($ambilqr)) 
                        {
                            $filePath = "public/file/inv/" . str_replace('/', '_', $data_qr['kode_inv']) . ".png";
                    ?>
                    <div class="file-box">
                        <a href="app/print/inv/qr-inv.php?kode=<?=$data_qr['kode_inv']?>" class="download-icon-link" target='_blank'>
                            <i class="las la-download file-download-icon"></i>
                            <div class="text-center">
                                <img src="<?=htmlspecialchars($filePath)?>"  alt="Gambar Inventaris" style="aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto;object-fit: cover;">
                                <h6 class="text-truncate"><?=$data_qr['kode_inv']?></h6>
                                <small class="text-muted"><?=$data_qr['nama_barang']?> (<?=$data_qr['merk']?> <?=$data_qr['tipe']?>)</small>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title my-3">Foto Inventaris</h4>
                    </div>
                </div>
                <div class="file-box-content">
                    <?php 
                        $ambilqr->data_seek(0);
                        while ($data_qr = mysqli_fetch_assoc($ambilqr)) { 
                    ?>
                    <div class="file-box">
                         <a href="#">
                            <div class="text-center">
                                <img src="public/inv/<?=$data_qr['foto_barang']?>"  alt="Gambar Inventaris" style="aspect-ratio: 1 / 1; width: 100%; max-width: 100px; height: auto;object-fit: cover;">
                                <h6 class="text-truncate"><?=$data_qr['kode_inv']?></h6>
                                <small class="text-muted"><?=$data_qr['nama_barang']?> (<?=$data_qr['merk']?> <?=$data_qr['tipe']?>)</small>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>

        <?php } ?>


    } else {
        echo "<p>No data found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>