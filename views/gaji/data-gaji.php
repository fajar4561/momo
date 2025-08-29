<?php
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';



if (isset($_SESSION['bulan'])) {
    unset($_SESSION['bulan']);
    unset($_SESSION['tahun']);
}

// chek transaksi gaji yang belum terkirim via email

require 'env/koneksi.php';
require 'env/tgl_indo.php';
require 'env/terbilang.php';
require 'env/nama_bulan.php';

?>

<style type="text/css">
table tbody tr:hover {
    background-color: #f5f5f5; /* Warna latar saat hover */
    color: #333; /* Warna teks saat hover */
    transition: background-color 0.3s, color 0.3s; /* Animasi transisi */
}
/* Efek hover untuk baris tabel */
table tbody tr.clickable-row:hover {
    background-color: #f8f9fa;
    cursor: pointer;
}

/* Pointer khusus pada tombol dropdown */
table tbody tr .dropdown-toggle {
    cursor: pointer;
}
.context-menu {
    position: absolute;
    display: none;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    z-index: 1000;
}
.context-menu a {
    display: block;
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
}
.context-menu a:hover {
    background: #f0f0f0;
}

</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Gambar Header -->
                    <div class="col-md-3 col-sm-4 text-center">
                        <img src="public/bg/bg02.jpg" class="img-fluid rounded" alt="Header Image">
                    </div>
                    <!-- Teks Header -->
                    <div class="col-md-9 col-sm-8">
                        <h3 class="fw-bold mb-3">Informasi Halaman</h3>
                        <p class="mb-0 text-muted">
                            1. Pada tombol <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle btn-sm">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                terdapat menu tambah data transaksi penggajian baru dan import data . 
                            <br>
                            2. File import & export harus berformatkan <strong>".xlsx"</strong> , dengan syarat sudah mengisikan periode transaksi gaji <strong><a href="#">Klik Disini</a></strong> untuk detailnya<br>
                            3. Maksimalkan Fungsi pencarian data pegawai pada fitur <button type="button" class="btn btn-sm btn-de-dark">Search...</button> yang terletak di pojok kanan atas tabel<br>
                            4. Pada Tombol <i class="las la-pen font-20"></i> atau dengan klik kanan <i class="las la-mouse-pointer font-20"></i> pada kolom tabel Terdapat menu detail ,hapus dan export gaji<br>
                            5. Menu " <button type="button" class="btn btn-primary btn-de-dark dropdown-toggle btn-sm">10<i class="mdi mdi-chevron-down"></i></button> entries per page" Digunakan untuk menampilkan jumlah data tiap tabel<br>
                            6. Kolom Progressi merupakan presentasi jumlah data gaji yang terisi. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Halaman Data Transaksi Gaji</h4>
                        <p class="text-muted mb-0">Halaman ini digunakan untuk berisikan informasi transkasi penggajian pegawai dalam sistem. Anda dapat mengubah dan menambahkan data baru ke sistem.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-gaji">Tambah Data</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary">Import Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table table-responsive">
                            <table class="table table-sm" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Periode</th>
                                        <th>Jumlah Karyawan</th>
                                        <th>Terproses</th>
                                        <th>Progresi</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambildata = $koneksi->query("SELECT * FROM transaksi_gaji ORDER BY kode_transaksi DESC");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($ambildata)) { 
                                        require_once 'env/nama_bulan.php';
                                        $progres = ($data['proses']/$data['jumlah_karyawan']) * 100;
                                    ?>
                                    <tr 
                                        data-dropdown-id="<?=$data['kode_transaksi']?>"
                                        data-periode-bulan="<?=ucwords($data['periode_bulan'])?>"
                                        data-periode-tahun="<?=$data['periode_tahun']?>"
                                        data-status="<?=ucwords($data['status_transaksi'])?>"
                                    >
                                        <td><?=$no++?></td>
                                        <td><?=$data['kode_transaksi']?></td>
                                        <td><?=($data['tgl_transaksi']=='0000-00-00') ? '' : tgl_indo($data['tgl_transaksi'])?></td>
                                        <td><?=ucwords(bulan_indonesia($data['periode_bulan']))?> <?=$data['periode_tahun']?></td>
                                        <td><?=$data['jumlah_karyawan']?></td>
                                        <td><?=$data['proses']?></td>
                                        <td>
                                            <?php
                                            $warna = $progres <= 20 ? "bg-danger" : ($progres <= 40 ? "bg-warning" : ($progres <= 60 ? "bg-info" : ($progres <= 80 ? "bg-primary" : "bg-success")));
                                            ?>
                                            <small class="float-end ms-2 pt-1 font-10"><?=round($progres)?>%</small>
                                            <div class="progress mt-2" style="height:3px;">
                                                <div class="progress-bar <?=$warna?>" role="progressbar" style="width: <?=$progres?>%;" aria-valuenow="<?=$progres?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill <?=($data['status_transaksi'] == 'belum selesai') ? 'bg-danger' : 'bg-success'?>">
                                                <?=ucwords($data['status_transaksi'])?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-pen font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href="detail-transaksi-gaji/<?=$data['kode_transaksi']?>">Detail</a>
                                                    <?php if ($data['jumlah_karyawan']!=$data['proses']) { ?>
                                                        <a class="dropdown-item" href="app/controller/gaji/export-gaji-all.php?kode=<?=$data['kode_transaksi']?>&bulan=<?=$data['periode_bulan']?>&tahun=<?=$data['periode_tahun']?>">Export</a>
                                                    <?php } ?>
                                                    <?php if ($session_akses==1) {?>
                                                    <a class="dropdown-item" href="app/controller/gaji/hapus-transaksi-gaji.php?kode=<?=$data['kode_transaksi']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ???')">Hapus</a>
                                                    <?php } ?>
                                                    <!--
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary<?=$data['id']?>">Ubah</a>
                                                    -->
                                                </div>
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
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<div class="modal fade" id="exampleModalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Import Gaji Pegawai</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <form method="post" action="app/controller/gaji/import-gaji.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-grid">
                                <p class="text-muted">Pastikan File yang diupload berformatkan "xlsx".</p>
                                <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                <input type="file" id="input-file" name="input-file" onchange="handleChange()" hidden />
                                <label class="btn-upload btn btn-primary mt-4" for="input-file">Upload File</label>
                            </div>
                        </div>
                    </div>                                                   
                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-de-primary btn-sm" id="submit-btn" hidden>Save</button>
                </div><!--end modal-footer-->
            </form>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
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
    document.addEventListener("DOMContentLoaded", function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl, {
                container: 'body',
                trigger: 'hover',
                placement: 'top', // Posisi popover, bisa diubah ke 'right', 'left', atau 'bottom'
                html: true
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua baris tabel dengan kelas 'clickable-row'
        const rows = document.querySelectorAll(".clickable-row");

        rows.forEach(function (row) {
            row.addEventListener("click", function (event) {
                // Pastikan klik bukan pada dropdown menu agar tidak bertabrakan
                if (event.target.closest(".dropdown-menu") || event.target.closest(".dropdown-toggle")) return;

                // Ambil ID dropdown dari atribut data
                const dropdownId = row.getAttribute("data-dropdown-id");
                const dropdownToggle = document.getElementById(dropdownId);

                if (dropdownToggle) {
                    // Buat dropdown terbuka
                    const dropdownInstance = bootstrap.Dropdown.getOrCreateInstance(dropdownToggle);
                    dropdownInstance.show();
                }
            });
        });
    });
</script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', () => {
    const table = document.querySelector('table');
    const contextMenu = document.createElement('div');
    contextMenu.className = 'context-menu';
    contextMenu.style.position = 'absolute';
    contextMenu.style.display = 'none';
    contextMenu.style.zIndex = '1000';
    contextMenu.style.backgroundColor = '#fff';
    contextMenu.style.border = '1px solid #ccc';
    contextMenu.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.2)';
    document.body.appendChild(contextMenu);

    table.addEventListener('contextmenu', (event) => {
        event.preventDefault();

        const row = event.target.closest('tr');
        if (row) {
            const kodeTransaksi = row.getAttribute('data-dropdown-id');
            const periodeBulan = row.getAttribute('data-periode-bulan');
            const periodeTahun = row.getAttribute('data-periode-tahun');
            const status = row.getAttribute('data-status');

            contextMenu.innerHTML = `
                <a href="detail-transaksi-gaji/${kodeTransaksi}" class="dropdown-item">Detail</a>
                <a href="app/controller/gaji/export-gaji-all.php?kode=${kodeTransaksi}&bulan=${periodeBulan}&tahun=${periodeTahun}" class="dropdown-item">Export</a>
                <a href="app/controller/gaji/hapus-transaksi-gaji.php?kode=${kodeTransaksi}" class="dropdown-item" onclick="return confirm('Hapus data transaksi ini?')">Hapus</a>
            `;
            if (status === 'Belum Selesai') {
                contextMenu.innerHTML += `<a href="#" class="dropdown-item disabled">Proses Belum Selesai</a>`;
            }
            else {
                contextMenu.innerHTML += `<a href="#" class="dropdown-item disabled">Proses Selesai</a>`;
            }

            // Mendapatkan posisi dari elemen <tr> dan mengubahnya menjadi posisi absolut
            const rect = row.getBoundingClientRect();

            // Menentukan posisi menu konteks di bawah klik
            const contextMenuHeight = contextMenu.offsetHeight || 100; // Estimasi tinggi menu konteks
            const menuTop = (rect.top + window.scrollY) + event.offsetY;
            const menuLeft = (rect.left + window.scrollX) + event.offsetX;

            // Menyesuaikan posisi agar menu konteks tidak keluar dari viewport (jika perlu)
            const bottomSpace = window.innerHeight - menuTop;
            if (bottomSpace < contextMenuHeight) {
                contextMenu.style.top = `${menuTop - contextMenuHeight}px`; // Jika kurang ruang di bawah, tampilkan di atas
            } else {
                contextMenu.style.top = `${menuTop}px`; // Jika ada cukup ruang di bawah
            }

            contextMenu.style.left = `${menuLeft}px`;
            contextMenu.style.display = 'block';
        }
    });

    document.addEventListener('click', () => {
        contextMenu.style.display = 'none';
    });
});

</script>