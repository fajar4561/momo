<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
$no=1;
require 'env/koneksi.php';


?>

<style type="text/css">
#results {
    max-height: 500px; /* Set desired height */
    overflow-y: hidden; /* Sembunyikan scrollbar secara default */
    position: relative; /* Posisi relatif untuk kontrol lebih lanjut */
}

#results:hover {
    overflow-y: auto; /* Tampilkan scrollbar saat hover */
}

/* Gaya scrollbar untuk Webkit (Chrome, Safari) */
#results::-webkit-scrollbar {
    width: 8px; /* Lebar scrollbar */
}

#results::-webkit-scrollbar-track {
    background: #f1f1f1; /* Warna track */
    border-radius: 10px; /* Sudut melengkung */
}

#results::-webkit-scrollbar-thumb {
    background: #888; /* Warna thumb */
    border-radius: 10px; /* Sudut melengkung */
}

#results::-webkit-scrollbar-thumb:hover {
    background: #555; /* Warna thumb saat hover */
}

/* Gaya scrollbar untuk Firefox */
#results {
    scrollbar-width: thin; /* Ukuran scrollbar */
    scrollbar-color: #888 #f1f1f1; /* Warna thumb dan track */
}

.nav-link1 {
    margin-bottom: 10px; /* Atur jarak antar item */
}

</style>

<style type="text/css">
.custom-link {
    margin-bottom: 10px;
    margin-right: 50px; /* Default margin */
}

/* Media queries untuk ukuran layar yang lebih kecil */
@media (max-width: 768px) {
    .custom-link {
        margin-right: auto; /* Ubah margin untuk layar kecil */
    }
}

@media (max-width: 576px) {
    .custom-link {
        margin-right: auto; /* Ubah margin untuk layar sangat kecil */
    }
}</style>


<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <ul class="list-unstyled topbar-nav mb-0">
                        <li class="hide-phone app-search">
                            <form role="search" id="searchForm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="search" name="cari" id="searchInput" class="form-control top-search mb-0 form-control" placeholder="Cari......" style="width : 200px;">
                                        <button type="submit"><i class="ti ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="files-nav" id="results">
                    <div>
                        <div id="itemContainer" class="nav flex-column nav-pills">
                            <?php
                            // Tampilkan semua barang saat halaman pertama kali dimuat
                            $ambildata = $koneksi->query("SELECT * FROM stok_barang WHERE stok > 0 ORDER BY nama_barang ASC");
                            while ($data = mysqli_fetch_assoc($ambildata)) { 
                            ?>
                            <a class="nav-link nav-link1  align-items-center">
                                <img class="rounded-circle me-3 t" src="public/inv/<?=$data['foto_barang']?>" alt="" style="aspect-ratio: 1 / 1; width: 100%; max-width: 50px; height: auto; border-radius: 50%; object-fit: cover; border: 1px solid black;">
                                <div class="d-inline-block align-self-center">
                                    <h5 class="m-0 text-uppercase">
                                        <?=strtoupper($data['nama_barang'])?> <small>(
                                            <?=$data['merk']?>
                                            <?=$data['tipe']?>)</small></h5>
                                    <small>
                                        <?=$data['stok']?> (
                                        <?=$data['satuan']?>)</small>
                                </div>
                                <span class="ms-auto font-10">&nbsp;</span>
                                <form method="post" action="app/controller/inventaris/tambah-ses.php">
                                    <input type="hidden" name="id" value="<?=$data['id']?>">
                                    <button type="submit" class="btn btn-xs btn-outline-secondary"><i class="mdi mdi-plus"></i></button>
                                </form>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Penyerahan Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row p-3">
                            <div class="col-md-12">
                                <form method="post" action="app/controller/inventaris/penyerahan.php">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tanggal <code class="highlighter-rouge">*</code></label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" name="tgl" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="unit-select" class="col-sm-2 col-form-label text-end">Unit <code class="highlighter-rouge">*</code></label>
                                        <div id="unit-column" class="col-sm-10 mb-3">
                                            <select id="unit-select" class="form-control form-select" name="unit" required>
                                                <option value="">--- Pilih Unit ---</option>
                                                <?php 
                                                $sq = $koneksi->query("SELECT * FROM unit_inv ORDER BY unit ASC");
                                                while ($data = mysqli_fetch_assoc($sq)) {
                                                    echo "<option value=\"{$data['unit']}\">{$data['unit']}</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
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
                                        <th id="ruangan-header" style="display: none;">Ruangan</th> <!-- Tambahkan ID -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($_SESSION["inv"] as $id => $jml):
                                        $ambil = $koneksi->query("SELECT * FROM stok_barang WHERE id='$jml'");
                                        $pecah = $ambil->fetch_assoc();
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$no++?>
                                        </td>
                                        <td>
                                            <?=strtoupper($pecah['nama_barang'])?>
                                        </td>
                                        <td>
                                            <?=strtoupper($pecah['merk'])?>
                                        </td>
                                        <td>
                                            <?=strtoupper($pecah['tipe'])?>
                                        </td>
                                         <input type="hidden" name="id[]" value="<?=$jml?>">
                                        <td class="room-cell" style="display: none;">
                                            <div class="row">

                                                <div class="col-auto">
                                                    <select data-id="<?=$id?>" name="ruangan[]" class="form-control form-select room-select" style="display: none;" required>
                                                        <option value="">--- Pilih Ruangan ---</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="app/controller/inventaris/hapus-sesi-penyerahan.php?id=<?=$id?>" class="delete-link"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const unitSelect = document.getElementById('unit-select');
    const ruanganHeader = document.getElementById('ruangan-header'); // Ambil elemen header ruangan

    unitSelect.addEventListener('change', function() {
        const selectedUnit = unitSelect.value;
        const roomCells = document.querySelectorAll('.room-cell'); // Ambil semua <td> dengan kelas "room-cell"
        const roomSelects = document.querySelectorAll('.room-select'); // Ambil semua dropdown ruangan

        roomSelects.forEach(roomSelect => {
            roomSelect.innerHTML = '<option value="">--- Pilih Ruangan ---</option>';
            roomSelect.style.display = 'none'; // Sembunyikan dropdown ruangan awalnya
            const roomCell = roomSelect.closest('td'); // Ambil elemen <td> terdekat
            roomCell.style.display = 'none'; // Sembunyikan <td> untuk ruangan secara default
            roomSelect.removeAttribute('required'); // Hapus atribut required secara default

            if (selectedUnit) {
                fetch(`app/controller/inventaris/get_rooms.php?unit=${encodeURIComponent(selectedUnit)}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok. Status: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (Array.isArray(data) && data.length > 0) {
                            roomSelect.style.display = 'block'; // Tampilkan dropdown jika ada data ruangan
                            roomCell.style.display = ''; // Tampilkan <td> jika ada data
                            ruanganHeader.style.display = ''; // Tampilkan header ruangan
                            roomSelect.setAttribute('required', 'required'); // Tambahkan kembali atribut required

                            // Tambahkan opsi ruangan ke dropdown
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.ruangan;
                                option.textContent = item.ruangan;
                                roomSelect.appendChild(option);
                            });
                        } else {
                            roomSelect.style.display = 'none'; // Sembunyikan dropdown jika tidak ada data
                            roomCell.style.display = 'none'; // Sembunyikan <td> jika tidak ada data
                            ruanganHeader.style.display = 'none'; // Sembunyikan header ruangan
                            roomSelect.removeAttribute('required'); // Hapus atribut required jika tidak ada data
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            } else {
                roomSelect.style.display = 'none'; // Sembunyikan dropdown jika tidak ada unit yang dipilih
                roomCell.style.display = 'none'; // Sembunyikan <td> jika tidak ada unit yang dipilih
                ruanganHeader.style.display = 'none'; // Sembunyikan header ruangan
                roomSelect.removeAttribute('required'); // Hapus atribut required jika tidak ada unit
            }
        });
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
                        <a class="nav-link align-items-center">
                                <img class="rounded-circle me-3 t" src="public/inv/${item.foto_barang}" alt="" style="aspect-ratio: 1 / 1; width: 100%; max-width: 50px; height: auto; border-radius: 50%; object-fit: cover; border: 1px solid black;">
                                <div class="d-inline-block align-self-center">
                                    <h5 class="m-0 text-uppercase">${item.nama_barang} <small>(${item.merk} ${item.tipe})</small></h5>
                                   <small>${item.stok} (${item.satuan})</small>                                                
                                </div>
                                <form method="post" action="app/controller/inventaris/tambah-ses.php">
                                    <input type="hidden" name="id" value="${item.id}">
                                    <button type="submit" class="btn btn-xs btn-outline-secondary"><i class="mdi mdi-plus"></i></button>
                                </form>
                            </a>
                        `;
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>