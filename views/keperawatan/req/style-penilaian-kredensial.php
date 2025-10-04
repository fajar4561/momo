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

</style>