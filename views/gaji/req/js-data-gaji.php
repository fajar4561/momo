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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script>
function showLoading(){
    Swal.fire({
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
            Swal.showLoading();

            // --- ANIMASI PERUBAHAN TEKS ---
            let steps = [
                "Mengecek data file...",
                "Validasi data...",
                "Menyimpan ke database...",
                "Selesai!"
            ];
            let i = 0;
            setInterval(() => {
                document.getElementById('loadingText').innerText = steps[i];
                i = (i + 1) % steps.length;
            }, 1500);
        }
    });
}
</script>
