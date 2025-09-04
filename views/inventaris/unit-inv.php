  <?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

require 'env/koneksi.php';
require 'env/tgl_indo.php';
 

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Halaman Unit Inventaris</h4>
                        <p class="text-muted mb-0">Halaman ini digunakan untuk menambah ataupun mengubah data unit dan ruangan
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-unit">Tambah Unit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-sm nowrap" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Unit</th>
                                        <th>Lokasi Lantai</th>
                                        <th>Jumlah Ruangan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Tampilkan semua barang saat halaman pertama kali dimuat
                                        $no = 1;
                                        $ambildata = $koneksi->query("SELECT * FROM unit_inv ORDER BY unit ASC");
                                        while ($data = mysqli_fetch_assoc($ambildata)) {
                                            $unit_mas = $data['unit'];
                                            $mabil_kon_ru = $koneksi->query("SELECT * FROM detail_unit WHERE unit='$unit_mas'");
                                            $jumlah_ruangan = $mabil_kon_ru->num_rows;

                                            if ($jumlah_ruangan > 0 ) {
                                                $ruangan = $jumlah_ruangan;
                                            }
                                            else {
                                                $ruangan=1;
                                            }
                                    
                                    ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=strtoupper($data['unit'])?></td>
                                        <td><?=$data['lantai']?></td>
                                        <td><?=$ruangan?></td>
                                        <td><?=$data['keterangan']?></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-pen font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href="ubah-unit?id=<?=$data['id']?>">Ubah</a>
                                                    <a class="dropdown-item" href="app/controller/inventaris/hapus-unit.php?id=<?=$data['id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?????')">Hapus</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalLarge<?=$data['id']?>">Lihat</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<div class="modal fade" id="exampleModalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalPrimary1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title m-0 text-white" id="exampleModalPrimary1">Import Gaji Pegawai</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <form method="post" action="app/controller/gaji/import-gaji.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-grid">
                                <p class="text-muted">Pastikan File yang diupload berformatkan "CSV".</p>
                                <div class="preview-box d-block justify-content-center rounded shadow overflow-hidden bg-light p-1"></div>
                                <input type="file" id="input-file" name="input-file" onchange="handleChange()" hidden />
                                <label class="btn-upload btn btn-primary mt-4" for="input-file">Upload File</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-de-primary btn-sm" id="submit-btn" hidden>Save</button>
                </div>
                <!--end modal-footer-->
            </form>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<script src="env/js/notif.js"></script>
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
// Data dan konfigurasi chart
var options = {
    chart: {
        type: 'pie',
        width: '100%', // Pastikan chart mengikuti lebar container
        height: 'auto'
    },
    series: [44, 55, 13, 43, 22],
    labels: ['Apple', 'Mango', 'Orange', 'Watermelon', 'Pineapple'],
    responsive: [
        {
            breakpoint: 768, // Lebih kecil dari tablet, ubah ukuran
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        },
        {
            breakpoint: 480, // Lebih kecil dari smartphone
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }
    ]
};


// Inisialisasi dan render chart
var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
chart.render();

</script>