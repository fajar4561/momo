<style>
    .table {
    border-radius: 10px;
    overflow: hidden;
}



.table tbody tr:hover {
    background-color: #f8f9fa !important;
    transition: 0.2s ease-in-out;
}

.table td, .table th {
    padding: 12px;
    vertical-align: middle;
}

.table .fa-check-circle {
    font-size: 18px;
}

/* Base style */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 26px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0;
  right: 0; bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
  border-radius: 34px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px; width: 20px;
  left: 3px; bottom: 3px;
  background-color: white;
  transition: 0.4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: rgba(112, 129, 185, 1); /* indigo */
}

input:checked + .slider:before {
  transform: translateX(24px);
}

.table-responsive {
    border-radius: 10px;
    overflow: hidden;
}

.table {
    border-collapse: collapse !important;
}

.table tbody tr:hover {
    background-color: #f8f9fa !important;
    transition: 0.2s ease-in-out;
}

.active-row {
    background-color: rgba(112, 129, 185, 0.15) !important;
    transition: background-color 0.3s ease-in-out;
}

.active-row td {
    border: 1px solid #dee2e6; /* jaga border tetap muncul */
}

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


/*file box*/
.file-box-content .file-box {
    border: 1px solid #eceff5;
    border-radius: 5px;
    padding: 10px;
    width: 100px;
    display: inline-block;
    margin-left: 5px;
    margin-bottom: 12px;
    background-color: #ffffff;
}

.progress {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);
}
.progress-bar {
    font-weight: bold;
}

#progressBar {
    transition: width 0.5s ease-in-out;
    font-weight: bold;
}


#datatable_1_wrapper .dataTables_filter {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
#tableTools {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* === MODERN DATATABLE STYLE === */
#datatable_2_wrapper {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    transition: box-shadow 0.3s ease;
}
#datatable_2_wrapper:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}



/* Baris data */
#datatable_2 tbody tr {
    border-bottom: 1px solid #f1f3f5;
    transition: background-color 0.3s, transform 0.1s;
}
#datatable_2 tbody tr:hover {
    background-color: rgba(112,129,185,0.07) !important;
    transform: scale(1.005);
}

/* Sel */
#datatable_2 td {
    font-size: 14px;
    color: #444;
    vertical-align: middle;
}

/* Checkbox switch alignment */
.switch {
  width: 46px;
  height: 24px;
}
.slider:before {
  height: 18px; width: 18px;
  left: 3px; bottom: 3px;
}

/* Checkbox aktif (warna indigo lebih lembut) */
input:checked + .slider {
  background: linear-gradient(135deg, rgba(112,129,185,1), rgba(152,168,220,1));
}

/* Tombol di atas tabel */
#tableTools button {
    border-radius: 8px;
    padding: 5px 12px;
    transition: all 0.2s ease;
}
#tableTools button:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* Dropdown filter */
#tableTools select {
    border-radius: 8px;
    border: 1px solid #ced4da;
    background-color: #fff;
    transition: all 0.2s ease;
}
#tableTools select:hover {
    border-color: rgba(112,129,185,1);
}

/* Pagination modern */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 6px;
    padding: 5px 10px;
    margin: 2px;
    border: 1px solid #dee2e6;
    background-color: #fff;
    transition: all 0.2s ease;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: rgba(112,129,185,0.1);
    color: rgba(112,129,185,1) !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: rgba(112,129,185,1);
    color: #fff !important;
    border-color: rgba(112,129,185,1);
}


/* Search box modern */
.dataTables_filter input {
    border-radius: 8px;
    border: 1px solid #ced4da;
    padding: 6px 10px;
    transition: all 0.3s ease;
}
.dataTables_filter input:focus {
    outline: none;
    border-color: rgba(112,129,185,1);
    box-shadow: 0 0 0 0.2rem rgba(112,129,185,0.25);
}

/* Baris aktif */
.active-row {
    background-color: rgba(112,129,185,0.12) !important;
    border-left: 4px solid rgba(112,129,185,0.8);
}
.active-row:hover {
    background-color: rgba(112,129,185,0.15) !important;
}


</style>