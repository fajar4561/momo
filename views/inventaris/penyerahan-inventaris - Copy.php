<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
$no=1;
require 'env/koneksi.php';

echo "<pre>";
print_r($_SESSION);
echo "</pre>";


?>
<style type="text/css">
.overflow-auto {
    overflow-x: auto;
    white-space: nowrap;
    /* Mencegah pembungkus */
}

@media (max-width: 576px) {
    .card-body {
        padding: 0.5rem;
    }

    .card-text {
        font-size: 0.9rem;
        /* Ukuran font lebih kecil di layar kecil */
    }
}
</style>
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <img class="card-img-top img-fluid bg-light-alt" src="public/bg/inv01.jpg" alt="Card image cap">
                </div>
            </div>
            <?php if (isset($_SESSION['inv'])) { ?>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Penyerahan Barang</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Tipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($_SESSION["inv"] as $id => $jml):
                                    $ambil = $koneksi->query("SELECT * FROM stok_barang WHERE id='$id'");
                                    $pecah = $ambil->fetch_assoc();
                                ?>
                                <tr>
                                    <td>
                                        <?=$no++?>
                                    </td>
                                    <td>
                                        <?=$pecah['nama_barang']?>
                                    </td>
                                    <td>
                                        <?=$pecah['merk']?>
                                    </td>
                                    <td>
                                        <?=$pecah['tipe']?>
                                    </td>
                                    <td>
                                        <form>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <select id="room-select" name="ruangan[]" class="form-control form-select" style="display: none;" name="ruangan">
                                                        <option value="">--- Pilih Ruangan ---</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form id="searchForm">
                                <div class="input-group">
                                    <button class="btn btn-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                                    <input type="text" class="form-control" id="searchInput" placeholder="Cari Barang ........" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="results" class="overflow-auto">
                    <div class="row flex-nowrap" id="itemContainer">
                        <?php
                            // Tampilkan semua barang saat halaman pertama kali dimuat
                            $ambildata = $koneksi->query("SELECT * FROM stok_barang WHERE stok > 0 ORDER BY nama_barang ASC");
                            while ($data = mysqli_fetch_assoc($ambildata)) { 
                        ?>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="text-center">
                                    <img class="card-img-top img-fluid bg-light-alt" src="public/inv/<?=$data['foto_barang']?>" alt="" style="aspect-ratio: 1 / 1; width: 80%; max-width: 300px; height: auto; object-fit: cover;">
                                </div>
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">
                                                <?=$data['nama_barang']?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column align-items-center">
                                    <p class="card-text text-muted" style="width: 100%; margin-bottom: 1rem;">
                                        <small class="text-muted">
                                            Merk:
                                            <?=$data['merk']?><br>
                                            Tipe:
                                            <?=$data['tipe']?>
                                        </small>
                                    </p>
                                    <form method="post" action="app/controller/inventaris/tambah-ses.php">
                                        <input type="hidden" name="id" value="<?=$data['id']?>">
                                        <button type="submit" class="btn btn-primary btn-sm w-100">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3 mt-3">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Penyerahan Barang</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="app/controller/inventaris/penyerahan.php">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tanggal <code class="highlighter-rouge">*</code></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="tgl" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Barang <code class="highlighter-rouge">*</code> </label>
                                    <div class="col-sm-10">
                                        <select id="default" name="barang" required>
                                            <option value="">---Pilih Barang---</option>
                                            <?php 
                                                $sql=$koneksi->query("SELECT * FROM stok_barang WHERE stok > 0 ORDER BY nama_barang ASC");
                                                while ($data=mysqli_fetch_assoc($sql)) 
                                                {
                                                    ?>
                                            <option value="<?=$data['id']?>">
                                                <?=$data['nama_barang']?>
                                                <?php if (!empty($data['merk']) && !empty($data['tipe'])): ?>
                                                <small class="text-muted">(
                                                    <?=$data['merk']?>,
                                                    <?=$data['tipe']?>)</small>
                                                <?php endif; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <small class="form-text text-muted">
                                            <code>Notes : </code> Sumber Data berasal dari stok barang.
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="unit-select" class="col-sm-2 col-form-label text-end">Unit <code class="highlighter-rouge">*</code></label>
                                    <div id="unit-column" class="col-sm-10 mb-3">
                                        <select id="unit-select" class="form-control form-select" name="unit">
                                            <option value="">--- Pilih Unit ---</option>
                                            <?php 
                                                $sq = $koneksi->query("SELECT * FROM unit_inv ORDER BY unit ASC");
                                                while ($data = mysqli_fetch_assoc($sq)) {
                                                    echo "<option value=\"{$data['unit']}\">{$data['unit']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div id="room-column" class="col-sm-5 mb-3">
                                        <select id="room-select" class="form-control form-select" style="display: none;" name="ruangan">
                                            <option value="">--- Pilih Ruangan ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-de-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const unitSelect = document.getElementById('unit-select');
    const roomSelect = document.getElementById('room-select');
    const unitColumn = document.getElementById('unit-column');
    const roomColumn = document.getElementById('room-column');

    unitSelect.addEventListener('change', function() {
        const selectedUnit = unitSelect.value;

        if (selectedUnit) {
            fetch(`app/controller/inventaris/get_rooms.php?unit=${encodeURIComponent(selectedUnit)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok. Status: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    // Reset dropdown
                    roomSelect.innerHTML = '<option value="">--- Pilih Ruangan ---</option>';

                    if (Array.isArray(data) && data.length > 0) {
                        // Tampilkan dropdown jika ada data ruangan
                        roomSelect.style.display = 'block';

                        // Mengubah kelas kolom untuk room-column menjadi col-sm-5
                        roomColumn.className = 'col-sm-5 mb-2';

                        // Mengubah kelas kolom untuk unit-column menjadi col-sm-5
                        unitColumn.className = 'col-sm-5 mb-2';

                        // Ambil hanya nilai 'ruangan' dari data
                        const rooms = data.map(item => item.ruangan);

                        rooms.forEach(ruangan => {
                            const option = document.createElement('option');
                            option.value = ruangan;
                            option.textContent = ruangan;
                            roomSelect.appendChild(option);
                        });
                    } else {
                        // Sembunyikan dropdown jika tidak ada data ruangan
                        roomSelect.style.display = 'none';

                        // Mengubah kelas kolom untuk room-column menjadi col-sm-10
                        roomColumn.className = 'col-sm-10 mb-3';

                        // Mengubah kelas kolom untuk unit-column menjadi col-sm-10
                        unitColumn.className = 'col-sm-10 mb-3';

                        // Tambahkan opsi 'No rooms available'
                        const option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'No rooms available';
                        roomSelect.appendChild(option);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            // Sembunyikan dropdown jika tidak ada unit yang dipilih
            roomSelect.style.display = 'none';

            // Mengubah kelas kolom untuk room-column menjadi col-sm-10
            roomColumn.className = 'col-sm-10 mb-3';

            // Mengubah kelas kolom untuk unit-column menjadi col-sm-10
            unitColumn.className = 'col-sm-10 mb-3';

            roomSelect.innerHTML = '<option value="">--- Pilih Ruangan ---</option>';
        }
    });
});
</script>
<script>
document.getElementById('searchInput').addEventListener('input', function() {
    const query = this.value;

    fetch(`app/controller/inventaris/cari.php?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            const itemContainer = document.getElementById('itemContainer');
            itemContainer.innerHTML = ''; // Kosongkan hasil sebelumnya

            if (data.length === 0) {
                // Tampilkan pesan jika tidak ada barang ditemukan
                itemContainer.innerHTML = `<div class="col-12 text-center"><p>Barang tidak Ditemukan</p></div>`;
            } else {
                data.forEach(item => {
                    itemContainer.innerHTML += `
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="text-center">
                                    <img class="card-img-top img-fluid bg-light-alt" src="public/inv/${item.foto_barang}" alt="" style="aspect-ratio: 1 / 1; width: 80%; max-width: 300px; height: auto; object-fit: cover;">
                                </div>
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">${item.nama_barang}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column align-items-center">
                                    <p class="card-text text-muted" style="width: 100%; margin-bottom: 1rem;">
                                        <small class="text-muted">
                                            Merk: ${item.merk}<br>
                                            Tipe: ${item.tipe}
                                        </small>
                                    </p>
                                    <a href="#" class="btn btn-de-primary btn-sm w-100">Go somewhere</a>
                                </div>
                            </div>
                        </div>`;
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>