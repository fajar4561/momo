<style>

.file-box-content {
    display: flex; /* biar berjejer ke samping */
    gap: 15px;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin; 
    scroll-behavior: smooth;
    scrollbar-color: transparent transparent; /* awalnya transparan */
    transition: scrollbar-color 0.3s ease;
}

/* Untuk Chrome, Edge, Safari */
.file-box-content::-webkit-scrollbar {
    height: 8px;
    background-color: transparent; /* awalnya transparan */
    transition: background-color 0.3s ease;
}
.file-box-content::-webkit-scrollbar-thumb {
    background-color: transparent; /* awalnya transparan */
    border-radius: 4px;
}

/* Saat hover baru muncul scrollbar */
.file-box-content:hover {
    scrollbar-color: #bbb #eee; /* Firefox */
}
.file-box-content:hover::-webkit-scrollbar {
    background-color: #eee; /* track */
}
.file-box-content:hover::-webkit-scrollbar-thumb {
    background-color: #bbb; /* thumb */
}

.scroll-x {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: transparent transparent; /* awalnya transparan */
    transition: scrollbar-color 0.3s ease;
}

/* Untuk Chrome, Edge, Safari */
.scroll-x::-webkit-scrollbar {
    height: 8px;
    background-color: transparent; /* awalnya transparan */
    transition: background-color 0.3s ease;
}
.scroll-x::-webkit-scrollbar-thumb {
    background-color: transparent; /* awalnya transparan */
    border-radius: 4px;
}

/* Saat hover baru muncul scrollbar */
.scroll-x:hover {
    scrollbar-color: #bbb #eee; /* Firefox */
}
.scroll-x:hover::-webkit-scrollbar {
    background-color: #eee; /* track */
}
.scroll-x:hover::-webkit-scrollbar-thumb {
    background-color: #bbb; /* thumb */
}
/* ==== RESPONSIVE TABLE ==== */
.table-responsive-custom {
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  border-radius: 8px;
}

/* Batasi lebar kolom agar tidak terlalu sempit di HP */
#datatable_1 th, #datatable_1 td {
  white-space: nowrap; /* Supaya teks tidak pecah */
  vertical-align: middle;
  font-size: 0.9rem;
}

/* Styling header agar tetap jelas */
#datatable_1 thead th {
  background-color: #f8f9fa;
  color: #333;
  font-weight: 600;
  text-align: center;
}

/* Responsive tweak untuk HP kecil */
@media (max-width: 768px) {
  #datatable_1 {
    min-width: 700px; /* biar tabel bisa digeser horizontal */
  }
  #datatable_1 th, #datatable_1 td {
    font-size: 0.8rem;
    padding: 6px 8px;
  }
}

/* Opsional: tambahkan sedikit efek scroll */
.table-responsive-custom::-webkit-scrollbar {
  height: 8px;
}
.table-responsive-custom::-webkit-scrollbar-thumb {
  background-color: rgba(0,0,0,0.2);
  border-radius: 10px;
}
.table-responsive-custom::-webkit-scrollbar-track {
  background-color: #f1f1f1;
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

@media (max-width: 576px) {
  .swal2-popup {
    width: 90% !important;
  }
}

</style>