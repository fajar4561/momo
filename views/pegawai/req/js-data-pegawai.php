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