<?php

echo "<pre>";
print_r($_SESSION);
echo '</pre>';

$no=1;
require 'env/koneksi.php';

$today = date("Ymd");
$quer = mysqli_query($koneksi, "SELECT max(kode_transaksi) as kodeTerbesar FROM pembelian_barang WHERE kode_transaksi LIKE '%".$today."%' ");
$dat = mysqli_fetch_array($quer);
$kode= $dat['kodeTerbesar'];
$urutan = (int) substr($kode, 8, 3);
$urutan++;
$kode = $today. sprintf("%03s", $urutan);
?>
<style>
    .form-control-with-badge {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 5px;
        padding: 0.5rem;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        min-height: 40px;
    }

    .form-control-with-badge input {
        border: none;
        outline: none;
        flex: 1;
        min-width: 120px;
        margin-top: 3px;
    }

    .badge {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .badge .remove-badge {
        cursor: pointer;
        color: #fff;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 col-sm-4 text-center">
                        <img src="public/bg/objek3.jpg" class="img-fluid rounded" alt="Header Image">
                    </div>
                    <!-- Teks Header -->
                    <div class="col-md-9 col-sm-8">
                        <h3 class="fw-bold mb-2">Pembelian Barang</h3>
                        <ol class="text-muted" style="text-align: justify;">
                            <li>
                               Transaksi Pembelian barang berlaku untuk tiap nota pembelian saja.
                            </li>
                            <li>
                                Pastikan anda mengisikan form sesuai dengan perintah yang ada. Dalam sistem ini disedian beberapa fitur yang memudahkan untuk prosesi pengisian

                            </li>
                            <li>
                               Apabila masih mengalami kesulitan bisa menghubungi pihak IT
                            </li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

?>
<div class="row">
    <?php if (!empty($_SESSION['nama_inv'])) { ?>
    <div class="col-md-6">
    <?php } else { ?>
    <div class="col-md-12">
    <?php } ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Pembelian Barang</h4>
                <p class="text-muted mb-0">Halaman ini digunakan untuk Mengisikan Transaksi pembelian Barang Inventaris dari supplier.
                </p>
            </div><!--end card-header-->
            <div class="card-body">
            </div>
            <div class="card-body">  
                <form action="app/controller/inventaris/tambah-sesi-beli.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Master Barang</label>
                                <div class="col-sm-10">
                                    <select id="default" onchange="changeValueKode(this.value)">
                                        <option value="">--- Pilih Master Barang ---</option>
                                        <?php 
                                        $sql=$koneksi->query("SELECT * FROM stok_barang ");
                                        $jsArrayKode = "var prdKode = new Array();\n";
                                        while ($dat=mysqli_fetch_assoc($sql)) {
                                            echo '<option value="'.$dat['nama_barang'].'">'.$dat['nama_barang'].' ('.$dat['merk'].' '.$dat['tipe'].')</option> ';
                                            $jsArrayKode .= "prdKode['" . $dat['nama_barang'] . "'] = {nama:'" . addslashes($dat['nama_barang']) . "', kode:'" . addslashes($dat['kode_barang']) . "', merk:'" . addslashes($dat['merk']) . "', tipe:'" . addslashes($dat['tipe']) . "', id:'" . addslashes($dat['id']) . "'} ;\n";
                                        }

                                        ?>
                                    </select>
                                    <small class="form-text text-muted">Data Barang Yang pernah Dibeli.<br>
                                        <code>Notes : </code> Gunakan opsi ini apabila ingin mengisikan pembelian barang yang
                                    sudah pernah dibeli </small>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Nama Barang <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nama" placeholder="Nama Barang" required id="nama">
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="kode2" value="<?=$kode?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Kode Barang <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kode" required id="kode">
                                        <option value="">---Pilih Kode Barang---</option>
                                        <?php 
                                        $sql=$koneksi->query("SELECT * FROM master_barang ");
                                        while ($data=mysqli_fetch_assoc($sql)) 
                                        {
                                            ?>
                                            <option value="<?=$data['kode_barang']?>"><?=$data['kode_barang']?> - <small>(<?=$data['keterangan']?>)</small></option>
                                        <?php } ?>
                                    </select>
                                </div> 
                            </div> 
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Merk </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="merk" placeholder="Merk / Brand" id="merk">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tipe / Model </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="tipe" placeholder="Tipe Barang yang dibeli" id="tipe">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Jumlah <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="jumlah" placeholder="Jumlah Barang Yang dibeli" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">No Seri </label>
                                <div class="col-sm-10">
                                    <div class="form-control-with-badge" id="badgeInputContainer">
                                        <input
                                            type="text"
                                            id="badgeInput"
                                            name="no_seri_temp"
                                            placeholder="Masukkan nomor seri, pisahkan dengan koma"
                                        />
                                    </div>
                                    <!-- Hidden input to store badge values -->
                                    <input type="hidden" id="badgeHiddenInput" name="no_seri">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Harga <code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="harga" id="rupiah" placeholder="Harga Barang" required>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Satuan Barang<code class="highlighter-rouge">*</code></label>
                                <div class="col-sm-10">
                                    <select class="form-select form-control" name="satuan" required>
                                        <option value="">---Pilih Satuan---</option>
                                        <option value="unit">Unit</option>
                                        <option value="set">Set</option>
                                        <option value="pcs">PCS</option>
                                        <option value="Kg">Kg</option>
                                        <option value="box">Box</option>
                                        <option value="liter">Liter</option>
                                        <option value="pack">Pack</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Masa Garansi </label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-8 col-8">
                                            <input class="form-control" type="number" name="garansi" placeholder="Masa Garansi">
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <select class="form-select form-control" name="bulan_garansi">
                                                <option value="bulan">Bulan</option>
                                                <option value="tahun">Tahun</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Foto Barang </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="foto">
                                    <small class="form-text text-muted">Data Barang Yang pernah Dibeli.<br>
                                        <code>Notes : </code> Gunakan opsi ini apabila ingin mengisikan pembelian barang yang sudah pernah dibeli 
                                    </small>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end"> </label>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                    
                                </div>
                            </div>                              
                        </div>
                        
                    </div>
                </form>                                                                      
            </div>
        </div><!--end card-->
    </div><!--end col-->
    <?php if (!empty($_SESSION['nama_inv'])) { ?>
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="card-header">
                            <h4 class="card-title">Form Pembelian</h4>
                       </div>
                       <div class="card-body">
                           <form method="post" enctype="multipart/form-data" action="app/controller/inventaris/simpan-pembelian.php">
                                 <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Kode <code class="highlighter-rouge">*</code></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="kode" value="<?=$kode?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tgl Beli <code class="highlighter-rouge">*</code></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="tgl_beli" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Suplier<code class="highlighter-rouge">*</code></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="suplier" list="datalistOptions" placeholder="Suplier Pembelian Barang" required>
                                        <datalist id="datalistOptions">
                                            <?php 
                                                $sql=$koneksi->query("SELECT DISTINCT suplier FROM pembelian_barang ORDER BY suplier ASC ");
                                                while ($dat=mysqli_fetch_assoc($sql)) {  
                                                echo '<option value="'.ucwords($dat['suplier']).'">'; }
                                            ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">No Faktur</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="faktur" placeholder="Nomor Faktur Pembelian Barang">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Berkas-berkas</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="file">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Catatan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="catatan"></textarea>
                                        <small class="form-text text-muted">(Opsional Guna memperjelas transaksi pembelian).</small>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end"> </label>
                                    <div class="col-sm-6">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>    
                           </form>
                       </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Pembelian Barang</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total =0;
                                                    foreach ($_SESSION["nama_inv"] as $id => $jml):
                                                    $tot = $_SESSION["harga_inv"][$id]*$_SESSION["jumlah_inv"][$id];
                                                    $total += $tot;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?=$no++?></td>
                                                    <td>
                                                        <img src="public/inv/<?=$_SESSION["foto_inv"][$id]?>" alt="" style=" aspect-ratio: 1 / 1; width: 100%; max-width: 40px; height: auto; object-fit: cover;">
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <a href="" class="d-inline-block align-middle mb-0 product-name"><?=$_SESSION["nama_inv"][$id]?></a> 
                                                            <br>
                                                            <span class="text-muted font-13"><?=$_SESSION["merk_inv"][$id]?> (<?=$_SESSION["tipe_inv"][$id]?>)</span> 
                                                        </p>
                                                    </td>
                                                    <td><?=$_SESSION["kode_inv"][$id]?></td>
                                                    <td><?=$_SESSION["jumlah_inv"][$id]?> <?=$_SESSION["satuan_inv"][$id]?></td>
                                                    <td>Rp.<?=number_format($_SESSION["harga_inv"][$id])?> <small>/<?=$_SESSION["satuan_inv"][$id]?></small></td>
                                                    <td>Rp.<?=number_format($tot)?></td>
                                                    <td class="text-center">                                                       
                                                        <a href="app/controller/inventaris/hapus-sesi-inv.php?id=<?=$id?>" class="delete-link"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Total Pembelian</th>
                                                    <th>Rp.<?=number_format($total)?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div><!--end row-->
<script src="env/js/notif.js"></script>
<script src="env/js/rupiah.js"></script>
<script type="text/javascript"> 
    <?php echo $jsArrayKode; ?>  
    function changeValueKode(x)
    {  
        document.getElementById('nama').value = prdKode[x].nama;
        document.getElementById('merk').value = prdKode[x].merk;
        document.getElementById('tipe').value = prdKode[x].tipe;
        document.getElementById('id').value = prdKode[x].id;
        document.getElementById('kode').value = prdKode[x].kode;      
    }; 
</script>
<script>
    const badgeInputContainer = document.getElementById("badgeInputContainer");
    const badgeInput = document.getElementById("badgeInput");
    const badgeHiddenInput = document.getElementById("badgeHiddenInput");
    let badgeValues = []; // Array untuk menyimpan semua nilai badge

    badgeInput.addEventListener("input", function () {
        const inputValue = badgeInput.value;

        // Jika pengguna mengetikkan koma
        if (inputValue.includes(",")) {
            const parts = inputValue.split(","); // Pisahkan berdasarkan koma
            const badgeText = parts[0].trim(); // Ambil teks sebelum koma

            if (badgeText) {
                // Tambahkan ke array badgeValues
                badgeValues.push(badgeText);

                // Buat elemen badge
                const badge = document.createElement("span");
                badge.className = "badge bg-primary";
                badge.textContent = badgeText;

                // Tambahkan tombol hapus
                const removeButton = document.createElement("span");
                removeButton.className = "remove-badge";
                removeButton.innerHTML = "&times;";
                removeButton.onclick = function () {
                    // Hapus badge dari container
                    badgeInputContainer.removeChild(badge);

                    // Hapus nilai dari array
                    badgeValues = badgeValues.filter((val) => val !== badgeText);

                    // Perbarui input tersembunyi
                    badgeHiddenInput.value = badgeValues.join(",");
                };

                badge.appendChild(removeButton);

                // Masukkan badge ke dalam container sebelum input
                badgeInputContainer.insertBefore(badge, badgeInput);

                // Perbarui input tersembunyi
                badgeHiddenInput.value = badgeValues.join(",");
            }

            // Hapus teks yang sudah diproses dan sisakan yang belum
            badgeInput.value = parts.slice(1).join(",");
        }
    });

    badgeInput.addEventListener("keydown", function (event) {
        // Jika tombol Backspace ditekan dan input kosong
        if (event.key === "Backspace" && badgeInput.value === "") {
            const lastBadge = badgeInputContainer.querySelector(".badge:last-child");
            if (lastBadge) {
                const badgeText = lastBadge.textContent.trim();

                // Hapus badge dari container
                badgeInputContainer.removeChild(lastBadge);

                // Hapus nilai dari array
                badgeValues = badgeValues.filter((val) => val !== badgeText);

                // Perbarui input tersembunyi
                badgeHiddenInput.value = badgeValues.join(",");
            }
        }
    });
</script>

