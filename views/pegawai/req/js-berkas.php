<script>
document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link'); // Pilih semua elemen dengan kelas "nav-link"

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Hapus kelas "active" dari semua link
            navLinks.forEach(item => item.classList.remove('active'));

            // Tambahkan kelas "active" ke link yang diklik
            this.classList.add('active');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const fileBoxes = document.querySelectorAll('[data-filebox]');

    fileBoxes.forEach(box => {
        const dropdownToggle = box.querySelector('[data-bs-toggle="dropdown"]');
        
        dropdownToggle.addEventListener('click', function() {
            // Hapus fokus dari semua box
            fileBoxes.forEach(b => b.classList.remove('active'));
            // Tambahkan fokus ke box yang diklik
            box.classList.add('active');
        });
    });

    // Jika dropdown ditutup, hilangkan highlight
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-menu') && !e.target.closest('[data-bs-toggle="dropdown"]')) {
            fileBoxes.forEach(b => b.classList.remove('active'));
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.querySelectorAll('.custom-alert').forEach(alert => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        });
    }, 7000); // 7 detik
});

$(document).on('click', '.btn-hapus', function (e) {
    e.preventDefault(); // Mencegah link langsung berjalan

    const url = $(this).attr('href'); // ambil URL dari href
    const deskripsi = $(this).data('deskripsi'); // ambil deskripsi dari data atribut

    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus?',
        html: `<strong>${deskripsi}</strong>`,
        imageUrl: 'public/bg/hapus2.webp',
        imageWidth: 270,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger px-4 me-3',
            cancelButton: 'btn btn-secondary px-4'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url; // arahkan ke link jika dikonfirmasi
        }
    });
});

</script>



<?php if (!isMobileDevice()) {  ?>
<script>
function initPopovers() {
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        if (bootstrap.Popover.getInstance(el)) {
            bootstrap.Popover.getInstance(el).dispose();
        }
    });

    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        new bootstrap.Popover(el, {
            trigger: 'focus',   // <-- lebih stabil di mobile
            html: true,
            container: 'body',
            customClass: 'custom-popover'
        });
    });
}

// AUTO CLOSE untuk klik di luar
document.addEventListener('click', function (e) {
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        const pop = bootstrap.Popover.getInstance(el);
        if (pop && !el.contains(e.target)) {
            pop.hide();
        }
    });
});

document.addEventListener('DOMContentLoaded', initPopovers);
</script>
<?php } else { ?>
<script>
    // Fungsi untuk inisialisasi ulang popover


// Fungsi untuk inisialisasi ulang popover
function initPopovers() {
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        // Jika sudah ada instance, dispose dulu
        if (bootstrap.Popover.getInstance(el)) {
            bootstrap.Popover.getInstance(el).dispose();
        }
    });

    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        const pop = new bootstrap.Popover(el, {
            trigger: 'focus',       // Lebih stabil di mobile
            html: true,
            container: 'body',
            customClass: 'custom-popover'
        });

        // === AUTO HIDE SETELAH 5 DETIK ===
        el.addEventListener('shown.bs.popover', function() {
            setTimeout(() => {
                pop.hide();
            }, 1000); // 5000ms = 5 detik
        });
    });
}
document.addEventListener('DOMContentLoaded', initPopovers);
</script>
<?php } ?>

