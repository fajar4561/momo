<?php
date_default_timezone_set('Asia/Jakarta');
require 'env/koneksi.php';
require 'env/tgl_indo.php';
require 'public/component/toast.php';
require 'views/keperawatan/req/style-data-kredensial.php';
require 'req/style-data-sp.php';
?>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card border-0 rounded-3">
            <div class="card-header bg-white border-0 pb-2">
                <h4 class="card-title mb-1 fw-bold">Manajemen Berkas Pegawai</h4>
                <p class="text-muted small mb-0">
                    Halaman ini digunakan oleh bagian HRD untuk memantau kelengkapan, memvalidasi, dan memperbarui berkas pegawai secara terpusat.
                </p>
            </div>
            <div class="row align-items-center">
                <!-- Gambar Header -->
                <div class="col-md-3 text-center">
                    <img src="public/bg/sp.webp" class="img-fluid rounded-3" alt="Informasi Pegawai">
                </div>
                <!-- Teks Informasi -->
                <div class="col-md-9">
                    <h4 class="fw-bold mb-3 text-primary">
                        <i class="bi bi-info-circle"></i> Informasi Halaman
                    </h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Gunakan tombol <button type="button" class="btn btn-primary btn-sm">Opsi</button>
                            untuk menambah berkas baru, memperbarui data, atau melakukan validasi dokumen pegawai.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Pastikan format file yang diunggah sesuai dengan ketentuan sistem.
                            Hanya file dengan ekstensi <code>.xls</code> atau <code>.xlsx</code> yang diperbolehkan.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Gunakan fitur <button type="button" class="btn btn-outline-secondary btn-sm">Search...</button>
                            di pojok kanan atas tabel untuk mencari pegawai berdasarkan nama atau nomor induk.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-chevron-right text-primary"></i>
                            Klik ikon <i class="las la-eye"></i> untuk melihat detail berkas,
                            <i class="las la-pen"></i> untuk memperbarui, atau <i class="las la-trash"></i> untuk menghapus berkas.
                        </li>
                        <li>
                            <i class="bi bi-chevron-right text-primary"></i>
                            Gunakan menu <strong>Entries per page</strong> untuk mengatur jumlah data pegawai yang ditampilkan di tabel.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs modern-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <i class="fas fa-folder-open"></i> Data SP
                            <span class="badge bg-primary ms-2"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <i class="fas fa-hdd"></i> Import Data
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="tab-pane-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-sm nowrap" id="datatable_1">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>No Surat</th>
                                                    <th>Jenis SP</th>
                                                    <th>Nopeg</th>
                                                    <th>Nama</th>
                                                    <th>Unit</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <div class="tab-pane-box">
                            <div class="import-section">
                                <div class="import-header text-center mb-4">
                                    <h3 class="fw-bold text-primary mb-1">Import Berkas SP</h3>
                                    <p class="text-muted">Unggah file Excel untuk memperbarui data secara massal.</p>
                                </div>
                                <div class="upload-card mx-auto">
                                    <form action="app/controller/pegawai/import-sp.php" method="POST" enctype="multipart/form-data" id="upload-sp">
                                        <div class="upload-box" id="drop-area">
                                            <dotlottie-wc src="public/bg/aw.lottie" class="upload-lottie" autoplay loop>
                                            </dotlottie-wc>
                                            <h3>Tarik & Lepas File</h3>
                                            <p>Atau klik area ini untuk memilih file dari komputer</p>
                                            <input type="file" id="fileInput" name="berkas" hidden>
                                        </div>
                                        <div id="file-preview" class="file-preview"></div>
                                        <button type="submit" class="upload-button shadow-sm">
                                            <i class="fas fa-cloud-upload-alt me-2"></i> Upload Sekarang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@latest/dist/dotlottie-wc.js" type="module"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>



const dropArea = document.getElementById("drop-area");
const fileInput = document.getElementById("fileInput");
const preview = document.getElementById("file-preview");

// Klik area
dropArea.addEventListener("click", () => fileInput.click());

// Jika pilih manual
fileInput.addEventListener("change", (e) => {
    showFile(e.target.files[0]);
});

// Drag over
dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
});

// Drag leave
dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("active");
});

// Drop file
dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dropArea.classList.remove("active");

    let file = e.dataTransfer.files[0];
    fileInput.files = e.dataTransfer.files;

    showFile(file);
});

// Tampilkan preview
function showFile(file) {
    preview.style.display = 'block';
    preview.innerHTML = `
        <strong>Nama File:</strong> ${file.name}<br>
        <strong>Ukuran:</strong> ${(file.size / 1024).toFixed(2)} KB
    `;
}


// form
$('#upload-sp').on('submit', function(e) {
    // dikasih jeda untuk animasi
    e.preventDefault(); // ❗ cegah submit langsung

    let form = this; // simpan form yang sedang diproses

    // 🔹 tampilkan SweetAlert2 loading
    Swal.fire({
        title: 'Sedang diproses...',
        html: `
            <div style="padding:10px;">
                <lottie-player 
                    src="public/bg/loading.json" 
                    background="transparent"
                    speed="1"
                    style="width: 220px; height: 220px; margin:auto;"
                    loop autoplay>
                </lottie-player>

                <h4 style="margin-top: 10px; font-weight:600; color:#2b2b2b;">
                    Sedang Diproses...
                </h4>
                <p id="loadingText" style="font-size:14px; color:#555;">
                    Mohon tunggu sebentar
                </p>
            </div>
        `,
        allowOutsideClick: false,
        showConfirmButton: false,
        background: 'rgba(255,255,255,0.9)',
        width: 380,
        didOpen: () => {
            let steps = [
                "Mengecek data file...",
                "Validasi data...",
                "Menyimpan ke database...",
            ];
            let i = 0;
            setInterval(() => {
                document.getElementById('loadingText').innerText = steps[i];
                i = (i + 1) % steps.length;
            }, 1500);

            // ⏳ submit form setelah 1 detik
            setTimeout(() => {
                form.submit(); // SUBMIT manual
            }, 1000);
        }
    });

});
</script>