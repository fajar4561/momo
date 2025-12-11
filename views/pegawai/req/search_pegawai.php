<?php
include '../../../env/koneksi.php';
$q = isset($_GET['q']) ? $koneksi->real_escape_string($_GET['q']) : '';
$sql = "SELECT * FROM pegawai WHERE nopeg != 123";
if ($q != '') {
    $sql .= " AND (nama LIKE '%$q%' OR nopeg LIKE '%$q%' OR unit LIKE '%$q%')";
}
$sql .= " ORDER BY nama ASC";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    while ($d = $result->fetch_assoc()) {
        echo "
        <div class='nav-link custom-card d-flex align-items-center py-2 px-3 mb-2 shadow-sm rounded hover-effect' 
             data-nopeg='{$d['nopeg']}' style='cursor:pointer; background-color:#f9fafb; transition:0.3s;'>
            <div class='flex-shrink-0 me-3'>
                <img src='/app/public/img/{$d['foto']}' alt='Foto' 
                     class='rounded-circle border' style='width:60px; height:60px; object-fit:cover;'>
            </div>
            <div class='flex-grow-1'>
                <h6 class='mb-0 fw-semibold text-dark'>{$d['nama']}</h6>
                <small class='text-muted'>{$d['unit']}</small>
            </div>
        </div>
        ";
    }
} else {
    echo "<div class='text-center text-muted p-3'>Tidak ada data ditemukan</div>";
}
?>