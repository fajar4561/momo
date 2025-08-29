<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

require 'env/koneksi.php';
require 'env/tgl_indo.php';
include "public/plugins/qr/qrlib.php";

// ambil data inventaris lama

$conn_inv_lama = $koneksi->query("SELECT * FROM detail_penyerahan WHERE parameter='1'");
while ($dta_conn_inv = mysqli_fetch_assoc($conn_inv_lama)) {
        // kode inventaris
    $kde_inv_lama = $dta_conn_inv['kode_inv'];
    // konversi kode inventaris ke format file gambar guna generated qrcode
    
    $tempdir = "public/file/inv/";
    $konversi_kde_inv_lama = str_replace('/', '_', $kde_inv_lama) . ".png";

    // Gabungkan direktori dengan nama file
    $file_path = $tempdir . $konversi_kde_inv_lama;

    // Cek apakah file ada
    // jika file qr tidak di temukan
    if (!file_exists($file_path)) {
        
        $inv_ruangan = $dta_conn_inv['ruangan'];
        $inv_unit = $dta_conn_inv['unit'];

        $nama_barang = $dta_conn_inv['nama_barang'];
        $merk = $dta_conn_inv['merk'];
        $tipe = $dta_conn_inv['tipe'];

        if ($inv_unit == $inv_ruangan) {
            $teks_qrcode = $kde_inv_lama ."\nNama Barang: " . $nama_barang." (".$merk." ".$tipe.")"."\nLokasi: ".$inv_unit;
        }
        else {
            $teks_qrcode = $kde_inv_lama ."\nNama Barang: " . $nama_barang." (".$merk." ".$tipe.")"."\nLokasi: ".$inv_unit." (".$inv_ruangan.")";
        }

        $namafile = str_replace('/', '_', $kde_inv_lama) . ".png";
        $quality        ="H";
        $ukuran  =5; 
        $padding =1;
        \QRcode::png($teks_qrcode, $tempdir . $namafile, $quality, $ukuran, $padding);

    }
}

?>






<style type="text/css">
.table {
    border-radius: 0.5rem;
    overflow: hidden;
}

.table thead th {
    background-color: #0b51b7;
    color: white;
}

.table tbody tr:hover {
    background-color: #e9ecef;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.5rem 1rem;
    margin: 0 0.1rem;
    border-radius: 0.3rem;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #007bff;
    color: white;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #0056b3;
    color: white;
}

.btn-add {
    margin-bottom: 15px;
}
</style>
<style type="text/css">
#itemContainer {
    max-height: 60px;
    /* Set desired height */
    overflow-y: hidden;
    /* Sembunyikan scrollbar secara default */
    position: relative;
    /* Posisi relatif untuk kontrol lebih lanjut */
}

#itemContainer:hover {
    overflow-y: auto;
    /* Tampilkan scrollbar saat hover */
}

/* Gaya scrollbar untuk Webkit (Chrome, Safari) */
#itemContainer::-webkit-scrollbar {
    width: 8px;
    /* Lebar scrollbar */
}

#itemContainer::-webkit-scrollbar-track {
    background: #f1f1f1;
    /* Warna track */
    border-radius: 10px;
    /* Sudut melengkung */
}

#itemContainer::-webkit-scrollbar-thumb {
    background: #888;
    /* Warna thumb */
    border-radius: 10px;
    /* Sudut melengkung */
}

#itemContainer::-webkit-scrollbar-thumb:hover {
    background: #555;
    /* Warna thumb saat hover */
}

/* Gaya scrollbar untuk Firefox */
#itemContainer {
    scrollbar-width: thin;
    /* Ukuran scrollbar */
    scrollbar-color: #888 #f1f1f1;
    /* Warna thumb dan track */
}

.nav-link1 {
    margin-bottom: 10px;
    /* Atur jarak antar item */
}
</style>
<style type="text/css">
.custom-link {
    margin-bottom: 10px;
    margin-right: 50px;
    /* Default margin */
}

/* Media queries untuk ukuran layar yang lebih kecil */
@media (max-width: 768px) {
    .custom-link {
        margin-right: auto;
        /* Ubah margin untuk layar kecil */
    }
}

@media (max-width: 576px) {
    .custom-link {
        margin-right: auto;
        /* Ubah margin untuk layar sangat kecil */
    }
}
</style>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Data Inventaris</h4>
                        <p class="text-muted mb-0">Tabel dibawah ini berisikan data penyerahan inventaris.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <!-- <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-pembelian">Tambah Data</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary">Import Data</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-sm" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Penyerahan</th>
                                        <th>Tanggal Penyerahan</th>
                                        <th>Unit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ambildata = $koneksi->query("SELECT * FROM penyerahan ORDER BY tgl_penyerahan DESC");
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($ambildata)) { 
                                        require_once 'env/nama_bulan.php';
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$no++?>
                                        </td>
                                        <td>
                                            <?=$data['kode_penyerahan']?>
                                        </td>
                                        <td>
                                            <?=tgl_indo($data['tgl_penyerahan'])?>
                                        </td>
                                        <td>
                                            <?=strtoupper($data['unit'])?>
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-pen font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href="app/print/inv/serah-terima.php?kode=<?=$data['kode_penyerahan']?>" target='_blank'>Cetak Serah Terima</a>
                                                    <a class="dropdown-item" href="detail-inventaris?kode=<?=$data['kode_penyerahan']?>">Lihat Detail</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalLarge<?=$data['id']?>">Lihat</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- modal lihat detail -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModalLarge<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel<?=$data['id']?>" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content" style="border: none;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title m-0" id="myLargeModalLabel">Detail Data Penyerahan #<?=$data['kode_penyerahan']?> </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!--end modal-header-->
                                                <div class="modal-body bg-light">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-2">
                                                            <h5></h5>
                                                        </div>
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end modal-body-->
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                <!--end modal-footer-->
                                            </div>
                                            <!--end modal-content-->
                                        </div>
                                        <!--end modal-dialog-->
                                    </div>
                                    <!--end modal-->
                                    <!-- akhir modal liha detail -->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="list-unstyled topbar-nav mb-0">
                            <li class="hide-phone app-search">
                                <form role="search" id="searchForm">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="search" name="cari" id="searchInput" class="form-control top-search mb-0" placeholder="Cari Unit...">
                                            <button type="submit"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="files-nav" id="results">
                            <div class="nav nav-pills" id="itemContainer" aria-orientation="vertical">
                                <?php
                                    $ambildata = $koneksi->query("SELECT * FROM unit_inv WHERE unit NOT IN ('BAGIAN UMUM', 'GUDANG UMUM', 'BIDANG UMUM') ORDER BY unit ASC");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($ambildata)) { 
                                ?>
                                <a href="#" class="nav-link nav-link1 d-flex align-items-center" id="files<?=$data['id']?>" data-unit-id="<?=$data['id']?>" data-unit-name="<?=$data['unit']?>">
                                    <i data-feather="folder" class="align-self-center icon-dual-file icon-sm me-2"></i>
                                    <div class="d-inline-block align-self-center">
                                        <small>
                                            <?=$data['unit']?></small>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="contentDisplay">
                        <div class="row p-3">
                            <div class="col-sm-12">
                                <?php 
                                    $ambildata->data_seek(0);
                                    while ($data = mysqli_fetch_assoc($ambildata)) {
                                ?>
                                <!-- Tampilan di sini -->
                                <div id="unitContent"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
<div class="modal fade" id="exampleModalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Import Gaji Pegawai</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <form method="post" action="app/controller/gaji/import-gaji.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-grid">
                                <p class="text-muted">Pastikan File yang diupload berformatkan "CSV".</p>
                                <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                <input type="file" id="input-file" name="input-file" onchange="handleChange()" hidden />
                                <label class="btn-upload btn btn-primary mt-4" for="input-file">Upload File</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-de-primary btn-sm" id="submit-btn" hidden>Save</button>
                </div>
                <!--end modal-footer-->
            </form>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<script src="env/js/notif.js"></script>
<script>
function handleChange() {
    // Ambil input file
    var inputFile = document.getElementById('input-file');

    // Cek apakah file telah dipilih
    if (inputFile.files.length > 0) {
        // Jika file dipilih, tampilkan tombol submit dan submitkan formulir
        document.getElementById('submit-btn').click();
    }
}
</script>
<script>
document.getElementById('searchInput').addEventListener('input', function() {
    const query = this.value.trim();

    if (query) {
        fetch(`app/controller/inventaris/cari-unit.php?query=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const itemContainer = document.getElementById('itemContainer');
                itemContainer.innerHTML = ''; // Kosongkan hasil sebelumnya

                if (data.length === 0) {
                    itemContainer.innerHTML = `<div class="col-12 text-center"><p>Unit tidak Ditemukan</p></div>`;
                } else {
                    data.forEach(item => {
                        itemContainer.innerHTML += `
                            <a href="#" class="nav-link nav-link1 d-flex align-items-center" id="files${item.id}" data-unit-id="${item.id}" data-unit-name="${item.unit}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder me-2">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <div class="d-inline-block align-self-center">
                                    <small>${item.unit}</small>                                                    
                                </div>
                            </a>`;
                    });
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }
});

// Event delegation for dynamically added items
document.getElementById('itemContainer').addEventListener('click', function(event) {
    const clickedItem = event.target.closest('.nav-link1');
    if (clickedItem) {
        event.preventDefault(); // Mencegah link default
        const unitId = clickedItem.dataset.unitId;
        console.log('Clicked unit ID:', unitId);

        // Ambil detail unit berdasarkan unitId
        // fetch(`app/controller/inventaris/konten2.php?id=${unitId}`) ketika pencarian
        fetch(`app/controller/inventaris/konten.php?id=${unitId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(unitData => {
                // Tampilkan detail unit
                const unitDetailsContainer = document.getElementById('unitDetails');
                unitDetailsContainer.innerHTML = `
                    <h3>${unitData.unit}</h3>
                    <p>Detail: ${unitData.detail}</p> <!-- Asumsikan ada field detail -->
                `;
            })
            .catch(error => console.error('Error fetching unit details:', error));
    }
});
</script>
<script>
$(document).ready(function() {
    // Event delegation untuk .nav-link1
    $(document).on('click', '.nav-link1', function(event) {
        event.preventDefault(); // Mencegah link default

        var unitId = $(this).data('unit-id'); // Ambil ID unit

        // Contoh: Fetch konten berdasarkan unitId
        $.ajax({
            url: 'app/controller/inventaris/konten.php', // Endpoint untuk mengambil konten
            method: 'POST',
            data: { id: unitId },
            success: function(response) {
                $('#unitContent').html(response); // Tampilkan konten di unitContent
            },
            error: function() {
                $('#unitContent').html('<p>Error loading content.</p>');
            }
        });
    });
});
</script>