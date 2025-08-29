<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

require 'env/koneksi.php';
require 'vendor/autoload.php'; // Pastikan path ini sesuai dengan instalasi Composer Anda

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$sql = "SELECT nopeg, nama, gender,CAST(nik AS CHAR) AS nik, jabatan, unit, tmt, skpt, alamat, tmpt_lahir, tgl_lahir, status_kawin, Status_pegawai, telpon, email FROM pegawai ORDER BY unit ASC, nama ASC";
$result = $koneksi->query($sql);

// hapus file
unlink('public/file/pegawai/data-pegawai.xlsx');

if ($result->num_rows > 0) {
    // Nama file Excel
    $nama_file = 'public/file/pegawai/data-pegawai.xlsx';
    // Buat instance Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $header = array("No", "NIP", "Nama", "Gender", 'NIK', "Jabatan", "UNIT", "TMT", "SKPT", "Alamat", "Tempat Lahir", "Tanggal Lahir", "Status Perkawinan", "Status Pegawai", "Nomor Telepon", "Email");

    // Set header kolom di Excel
    foreach ($header as $index => $columnName) {
        $sheet->setCellValueByColumnAndRow($index + 1, 1, $columnName);
    }

    // Tulis data ke sheet
    $nomor_baris = 2; // Mulai dari baris ke-2 karena baris ke-1 adalah header

    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValueByColumnAndRow(1, $nomor_baris, $nomor_baris - 1); // No
        $sheet->setCellValueByColumnAndRow(2, $nomor_baris, "'" . $row['nopeg']); // NIP dengan tanda kutip
        $sheet->setCellValueByColumnAndRow(3, $nomor_baris, $row['nama']); // Nama
        $sheet->setCellValueByColumnAndRow(4, $nomor_baris, $row['gender']); // Gender
        $sheet->setCellValueByColumnAndRow(5, $nomor_baris, "'" . $row['nik']); // NIK dengan tanda kutip
        $sheet->setCellValueByColumnAndRow(6, $nomor_baris, $row['jabatan']); // Jabatan
        $sheet->setCellValueByColumnAndRow(7, $nomor_baris, $row['unit']); // UNIT
        $sheet->setCellValueByColumnAndRow(8, $nomor_baris, $row['tmt']); // TMT
        $sheet->setCellValueByColumnAndRow(9, $nomor_baris, $row['skpt']); // SKPT
        $sheet->setCellValueByColumnAndRow(10, $nomor_baris, $row['alamat']); // Alamat
        $sheet->setCellValueByColumnAndRow(11, $nomor_baris, $row['tmpt_lahir']); // Tempat Lahir
        $sheet->setCellValueByColumnAndRow(12, $nomor_baris, $row['tgl_lahir']); // Tanggal Lahir
        $sheet->setCellValueByColumnAndRow(13, $nomor_baris, $row['status_kawin']); // Status Perkawinan
        $sheet->setCellValueByColumnAndRow(14, $nomor_baris, $row['Status_pegawai']); // Status Pegawai
        $sheet->setCellValueByColumnAndRow(15, $nomor_baris, "'" . $row['telpon']); // Nomor Telepon dengan tanda kutip
        $sheet->setCellValueByColumnAndRow(16, $nomor_baris, $row['email']); // Email

        $nomor_baris++;
    }

    // Simpan file Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save($nama_file);

    //echo "File Excel berhasil dibuat: <a href='$nama_file' download>$nama_file</a>";
}

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
    max-width: 90%; /* Membatasi lebar menu konteks di perangkat kecil */
    overflow: hidden; /* Mencegah elemen dalam menu meluap */
    word-wrap: break-word; /* Membungkus teks panjang dalam menu */
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
                        <img src="public/bg/bg01.jpg" class="img-fluid rounded" alt="Header Image">
                    </div>
                    <!-- Teks Header -->
                    <div class="col-md-9 col-sm-8">
                        <h3 class="fw-bold mb-3">Informasi Halaman</h3>
                        <p class="mb-0 text-muted">
                            1. Pada tombol <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle btn-sm">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                terdapat menu tambah data pegawai baru, export data dan import data . 
                            <br>
                            2. File import & export harus berformatkan <strong>".xlsx"</strong> , untuk teknis Tambah data pegawai baru melalui fitur import & export bisa <strong><a href="#">Klik Disini</a></strong><br>
                            3. Maksimalkan Fungsi pencarian data pegawai pada fitur <button type="button" class="btn btn-sm btn-de-dark">Search...</button> yang terletak di pojok kanan atas tabel<br>
                            4. Pada Tombol <i class="las la-pen font-20"></i> atau dengan klik kanan <i class="las la-mouse-pointer font-20"></i> pada kolom tabel Terdapat menu detail pegawai, ubah, hapus dan reset password<br>
                            5. Menu " <button type="button" class="btn btn-primary btn-de-dark dropdown-toggle btn-sm">10<i class="mdi mdi-chevron-down"></i></button> entries per page" Digunakan untuk menampilkan jumlah data tiap tabel
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
                        <h4 class="card-title">Tabel Pegawai</h4>
                        <p class="text-muted mb-0">Halaman ini digunakan untuk berisikan informasi pegawai baru ke dalam sistem. Anda dapat mengubah dan menambahkan data baru ke sistem.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-pegawai">Tambah Data</a>
                                    <a class="dropdown-item" href="<?=$nama_file?>">Export Data</a>
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
                        <div class="table-responsive">
                            <table class="table table-sm nowrap" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nopeg</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Jabatan</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cacheFile = 'public/cache/pegawai_data.cache';
                                        $cacheTime = 3; // Cache untuk 1 jam

                                        if (file_exists($cacheFile) && (time() - $cacheTime < filemtime($cacheFile))) {
                                            // Menggunakan cache jika tersedia
                                            $data = file_get_contents($cacheFile);
                                        } else {
                                            // Ambil data dari database jika cache tidak tersedia
                                            $ambildata = $koneksi->query("SELECT * FROM pegawai WHERE nopeg !=123 ORDER BY nama ASC");
                                            $data = '';
                                            $no = 1;
                                            while ($row = mysqli_fetch_assoc($ambildata)) {
                                                $totalColumns = count($row); // Total kolom dalam tabel
                                                $filledColumns = 0;

                                                // Hitung kolom yang terisi (tidak NULL atau tidak kosong)
                                                foreach ($row as $value) {
                                                    if (!is_null($value) && trim($value) !== '') {
                                                        $filledColumns++;
                                                    }
                                                }

                                                // Hitung persentase kelengkapan data
                                                $kelengkapan = ($filledColumns / $totalColumns) * 100;

                                                $foto = htmlspecialchars($row['foto']); // Pastikan 'foto' adalah path yang benar dari database
                                                $nama = htmlspecialchars(ucwords($row['nama']));
                                                $unit = htmlspecialchars($row['unit']);
                                                $jabatan = htmlspecialchars(ucwords($row['jabatan']));
                                                $gender = htmlspecialchars(ucwords($row['gender']));

                                                $data .= '
                                                <tr data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                                                    data-bs-content="
                                                        <div>
                                                            <strong>Nama Pegawai:</strong> ' . $nama . '<br>
                                                            <strong>Jenis Kelamin:</strong> ' . $gender . '<br>
                                                            <strong>Unit:</strong> ' . $unit . '<br>
                                                            <strong>Jabatan:</strong> ' . $jabatan . '<br>
                                                            <strong>kelengkapan Biodata:</strong> ' . $kelengkapan . '%<br
                                                        </div>"
                                                        class="clickable-row" data-dropdown-id="'.htmlspecialchars($row['nopeg']).'">
                                                    <td>' . $no++ . '</td>
                                                    <td>' . htmlspecialchars($row['nopeg']) . '</td>
                                                    <td>' . $nama . '</td>
                                                    <td>' . $gender . '</td>
                                                    <td>' . $jabatan . '</td>
                                                    <td>' . $unit . '</td>
                                                    <td>' . htmlspecialchars($row['status_pegawai']) . '</td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel' . htmlspecialchars($row['nopeg']). '" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-pen font-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel' . htmlspecialchars($row['nopeg']) . '">
                                                            <a class="dropdown-item" href="detail-pegawai/' . htmlspecialchars($row['nopeg']) . '">Detail Pegawai</a>
                                                            <a class="dropdown-item" href="ubah-pegawai/' . htmlspecialchars($row['nopeg']) . '">Ubah</a>
                                                            <a class="dropdown-item" href="app/controller/pegawai/reset-password.php?n=' . htmlspecialchars($row['nopeg']) . '" onclick="return confirm(\'Dengan Mereset password maka password akan berubah menjadi password defaultnya yaitu menggunakan Nomor induk pegawai. Apakah Anda yakin ingin Mereset password ' . $nama . ' ?\')">Reset Password</a>
                                                            <a class="dropdown-item" href="app/controller/pegawai/hapus-pegawai.php?n=' . htmlspecialchars($row['nopeg']) . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ' . $nama . ' ?\')">Hapus</a>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>';
                                            }

                                            // Cache hasil query ke file
                                            file_put_contents($cacheFile, $data);
                                        }

                                        // Tampilkan data
                                        echo $data;
                                        ?>
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
                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Import Data Pegawai</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <form method="post" action="app/controller/pegawai/import-pegawai.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-grid">
                                <p class="text-muted">Pastikan File yang diupload berformatkan "xlsx".</p>
                                <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                <input type="file" id="input-file" name="input-file" onchange="handleChange()" hidden />
                                <label class="btn-upload btn btn-primary mt-4" for="input-file">Pilih File</label>
                            </div>
                        </div>
                    </div>                                                   
                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-de-primary btn-sm"  id="submit-btn" hidden>Save</button>
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
    // Fungsi untuk menginisialisasi popover
    function initializePopover() {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.forEach(function (popoverTriggerEl) {
            new bootstrap.Popover(popoverTriggerEl, {
                container: 'body',
                trigger: 'hover',
                placement: 'top',
                html: true
            });
        });
    }

    // Inisialisasi popover pertama kali
    initializePopover();

    // Setup MutationObserver untuk mendeteksi perubahan DOM pada tabel
    var observer = new MutationObserver(function(mutationsList, observer) {
        // Periksa apakah ada perubahan pada elemen dengan id 'datatable_1'
        mutationsList.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                // Memastikan popover diinisialisasi ulang setelah data baru dimuat
                initializePopover();
            }
        });
    });

    // Memulai observer pada tabel
    var targetNode = document.getElementById('datatable_1');
    var config = { childList: true, subtree: true };
    observer.observe(targetNode, config);
});

</script>

<!-- <script>
     document.addEventListener("DOMContentLoaded", function () {
        // Inisialisasi DataTables
        var table = $('#datatable_2').DataTable({
            responsive: true, // Membuat tabel responsif
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
            pageLength: 10,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                infoEmpty: "Tidak ada data tersedia",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });

        // Inisialisasi Popover
        function initPopover() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.forEach(function (popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl, {
                    container: 'body',
                    trigger: 'hover',
                    placement: 'top',
                    html: true
                });
            });
        }

        initPopover();
        table.on('draw', function () {
            initPopover();
        });
    });
</script> -->


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

    document.body.appendChild(contextMenu);

    table.addEventListener('contextmenu', (event) => {
        event.preventDefault();

        const row = event.target.closest('tr');
        if (row) {
            const nopeg = row.getAttribute('data-dropdown-id');
            contextMenu.innerHTML = `
                <a href="detail-pegawai/${nopeg}">Detail Pegawai</a>
                <a href="ubah-pegawai/${nopeg}">Ubah</a>
                <a href="app/controller/pegawai/reset-password.php?n=${nopeg}" onclick="return confirm('Reset password pegawai?')">Reset Password</a>
                <a href="app/controller/pegawai/hapus-pegawai.php?n=${nopeg}" onclick="return confirm('Hapus data pegawai?')">Hapus</a>
            `;

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

    // Hide the context menu when clicking elsewhere
    document.addEventListener('click', () => {
        contextMenu.style.display = 'none';
    });
});
</script>
