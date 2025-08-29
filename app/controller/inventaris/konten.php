
<?php 
require '../../../env/koneksi.php';
require '../../../env/tgl_indo.php';
if (isset($_POST['id'])) {
    $unitId = $_POST['id'];
    $query = $koneksi->query("SELECT * FROM unit_inv WHERE id = $unitId");
    
    if ($data = mysqli_fetch_assoc($query)) {
        // Kembalikan konten yang ingin ditampilkan
        echo "<h3>UNIT {$data['unit']}</h3>"; // Contoh tampilan
        // echo "<p>Detail konten untuk {$data['unit']}</p>"; // Tambahkan detail lain sesuai kebutuhan
        //ambil data
        $nom = 1;
        $unit_inv = $data['unit'];
        $ambilinv = $koneksi->query("SELECT * FROM penyerahan WHERE unit='$unit_inv'");
        $jml_data = mysqli_num_rows($ambilinv); 

        $konek_inv_lama = $koneksi->query("SELECT * FROM detail_penyerahan WHERE unit='$unit_inv' AND parameter='1'");
        $ada_data_lama = mysqli_num_rows($konek_inv_lama);
        ?>

        <?php if ($ada_data_lama > 0) { ?>
           <div class="row">
               <div class="col-sm-12">
                   <a href="app/controller/inventaris/label-lama.php?unit=<?=$unit_inv?>" class="btn btn-primary"><i class="mdi mdi-printer me-2"></i>Cetak Label Lama</a>
               </div>
           </div>
       <?php } ?>

        <?php if ($jml_data > 0) { ?>


         <div class="row mt-2">
             <div class="col-sm-12">
                 <div class="table-responsive">
                    <table class="table table-sm nowrap" id="example" >
                         <thead>
                             <th>No</th>
                             <th>Nama Barang</th>
                             <th>Kode Barang</th>
                             <th>Merk</th>
                             <th>Tipe</th>
                             <th>No Inv</th>
                             <th> </th>
                         </thead>
                         <tbody>
                             <?php
                                $ambil_detail_penyerahan =  $koneksi->query("SELECT * FROM detail_penyerahan WHERE unit='$unit_inv' AND parameter ='0'");
                                while ($data_fetch = mysqli_fetch_assoc($ambil_detail_penyerahan)) { ?>
                                <tr>
                                    <td class="text-center"><?=$nom++?></td>
                                    <td><?=$data_fetch['nama_barang']?></td>
                                    <td><?=$data_fetch['kode_barang']?></td>
                                    <td><?=$data_fetch['merk']?></td>
                                    <td><?=$data_fetch['tipe']?></td>
                                    <td><?=$data_fetch['kode_inv']?></td>
                                    <td>
                                        <a href="app/print/inv/qr-inv.php?kode=<?=$data_fetch['kode_inv']?>" target="_blank" class="btn btn-icon"><i class="las la-print font-20 text-muted"></i></a>
                                    </td>
                                </tr>
                             <?php } ?>
                         </tbody>
                    </table>
                 </div>
             </div>
         </div>   

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

            

<?php  

    } else {
        echo "<p>No data found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>