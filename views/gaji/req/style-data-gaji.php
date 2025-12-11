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

.swal2-popup {
    border-radius: 18px !important;
    backdrop-filter: blur(6px) !important;
    box-shadow: 0px 5px 25px rgba(0,0,0,0.2) !important;
}

.swal2-title {
    font-size: 22px !important;
    font-weight: 600 !important;
}

</style>