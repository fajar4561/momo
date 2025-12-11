<?php if (isMobileDevice()) { ?>
    <style>
        .leftbar-tab-menu {
            display: none; /* Menyembunyikan menu saat halaman dimuat */
        }
    </style>
    <style type="text/css">
    #results {
        max-height: 210px; /* Set desired height */
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
    }

    </style>
<?php } ?>

<style type="text/css">
.nav-link1.active {
    background-color: #007bff; /* Warna background */
    color: white; /* Warna teks */
    font-weight: bold; /* Teks lebih tebal */
}
/* ======================================================
   DROPDOWN STYLING
   ====================================================== */

/* Animasi muncul dropdown */
.dropdown-menu {
    opacity: 0;
    transform: translateY(5px) scale(0.98);
    transition: opacity 0.2s ease, transform 0.2s ease;
    border-radius: 10px;
    border: none;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    background-color: #ffffff;
    padding: 5px 0;
}

.dropdown-menu.show {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* Dropdown item */
.dropdown-item {
    background-color: transparent;
    color: #6c757d;
    font-size: 14px;
    transition: background-color 0.25s ease, color 0.25s ease, padding-left 0.25s ease;
    padding: 8px 16px;
    border-radius: 5px;
}

/* Hover dan Focus */
.dropdown-item:hover,
.dropdown-item:focus {
    background-color: #343a40;
    color: #ffffff;
    padding-left: 20px;
}

/* Active (misal saat klik atau keyboard navigate) */
.dropdown-item.active,
.dropdown-item:active {
    background-color: #0d6efd !important;
    color: #fff !important;
}

/* Divider (pemisah antar grup item) */
.dropdown-divider {
    margin: 6px 0;
    opacity: 0.3;
}



/* === FILE BOX STYLING === */
.file-box-content {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 1.2rem;
    padding: 10px;
}

.file-box {
    position: relative;
    z-index: 1; 
    background: #fff;
    border: 1px solid #e3e7ef;
    border-radius: 12px;
    padding: 16px 10px;
    text-align: center;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    cursor: pointer;
}

/* Hover effect modern */
.file-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    border-color: #d0d7ff;
}

/* Ikon download bulat */
/* Ikon file */
.file-box i.lar {
    font-size: 42px;
    margin-bottom: 10px;
    transition: color 0.25s ease;
}

/* Nama dan ukuran file */
.file-box h6 {
    font-size: 14px;
    font-weight: 600;
    color: #2b2f42;
    margin-bottom: 4px;
}
.file-box small {
    color: #6c757d;
    font-size: 12px;
}

/* Efek aktif (misal saat diklik) */
.file-box.active {
    z-index: 2;
    border: 1px solid #4c6ef5;
    background: linear-gradient(180deg, #f6f8ff, #ffffff);
    box-shadow: 0 0 0 3px rgba(76,110,245,0.15);
    animation: glowPulse 2s infinite;
}
@keyframes glowPulse {
    0% { box-shadow: 0 0 0 0 rgba(76,110,245,0.4); }
    70% { box-shadow: 0 0 0 8px rgba(76,110,245,0); }
    100% { box-shadow: 0 0 0 0 rgba(76,110,245,0); }
}


/* ==== ALERT STYLE MINIMALIS ==== */
.custom-alert {
    position: relative;
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    border-radius: 10px;
    padding: 0.9rem 1rem;
    margin-bottom: 0.75rem;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03);
    transition: all 0.25s ease;
    animation: slideFade 0.35s ease;
}

.custom-alert:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.04);
}

/* Warna Variasi - subtle flat tone */
.custom-alert-danger {
    border-color: #f0cfcf;
    background: #fffafa;
}

.custom-alert-warning {
    border-color: #f8e6b0;
    background: #fffdf4;
}

.custom-alert-success {
    border-color: #bde3cc;
    background: #f7fff9;
}

/* Icon */
.custom-alert .alert-icon {
    font-size: 1.4rem;
    line-height: 1;
    margin-top: 2px;
    opacity: 0.8;
}

.custom-alert-danger .alert-icon {
    color: #dc3545;
}
.custom-alert-warning .alert-icon {
    color: #ffc107;
}
.custom-alert-success .alert-icon {
    color: #198754;
}

/* Teks */
.custom-alert .alert-text h5 {
    font-size: 0.95rem;
    margin: 0 0 2px;
    color: #222;
    font-weight: 600;
}

.custom-alert .alert-text span {
    font-size: 0.85rem;
    color: #555;
}

/* Tombol close */
.custom-alert .btn-close {
    margin-left: auto;
    opacity: 0.6;
    transition: opacity 0.2s ease;
}
.custom-alert .btn-close:hover {
    opacity: 1;
}

/* Animasi masuk dan keluar */
@keyframes slideFade {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

.fade-out {
    opacity: 0;
    transform: translateY(-8px);
    transition: all 0.4s ease;
}



.custom-popover {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  color: #333;
  font-size: 0.85rem;
  max-width: 240px;
  
}
.custom-popover .popover-body {
  padding: 10px 14px;
}
.popover {
  background-color: #f8f9fa !important;
  color: #212529 !important;
  border: 1px solid #dee2e6 !important;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  border-radius: 8px;
}
.popover-header {
  background-color: #e9ecef;
  border-bottom: 1px solid #dee2e6;
  color: #212529;
}
.popover .popover-arrow::before,
.popover .popover-arrow::after {
  border-top-color: #f8f9fa !important;
  border-bottom-color: #f8f9fa !important;
}

.badge.custom-badge {
    font-size: 0.65rem;   /* ukuran teks */
    padding: 1px 5px;     /* tinggi & lebar */
    border-radius: 30%;   /* kalau ingin bulat */
}


/* Tombol merah */
.swal-btn-danger {
    background-color: #e63946;
    color: #fff;
    padding: 8px 26px;
    border-radius: 8px;
    font-size: 0.9rem;
    margin-right: 8px;
    border: none;
    transition: 0.2s ease-in-out;
}
.swal-btn-danger:hover {
    background-color: #d62839;
}

/* Tombol batal */
.swal-btn-secondary {
    background-color: #adb5bd;
    color: #fff;
    padding: 8px 26px;
    border-radius: 8px;
    font-size: 0.9rem;
    border: none;
    transition: 0.2s ease-in-out;
}
.swal-btn-secondary:hover {
    background-color: #868e96;
}

/* Animasi agar lebih halus */
.animate__animated {
    animation-duration: .25s;
}


</style>

