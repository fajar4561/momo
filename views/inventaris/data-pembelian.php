<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

require 'env/koneksi.php';
require 'env/tgl_indo.php';

if (isset($_SESSION['bulan'])) {
    unset($_SESSION['bulan']);
    unset($_SESSION['tahun']);
}


    unset($_SESSION['nama_inv']);
    unset($_SESSION['kode_inv']);
    unset($_SESSION['merk_inv']);
    unset($_SESSION['tipe_inv']);
    unset($_SESSION['no_seri_inv']);
    unset($_SESSION['harga_inv']);
    unset($_SESSION['jumlah_inv']);
    unset($_SESSION['satuan_inv']);
    unset($_SESSION['garansi_inv']);
    unset($_SESSION['bulan_garansi_inv']);
    unset($_SESSION['foto_inv']);

?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Grafik Pembelian </h4>
                    </div>
                    <!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenu">
                                ----Pilih Opsi Grafik----<i class="las la-angle-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-option="tahunan">Tahunan</a>
                                <a class="dropdown-item" href="#" data-option="bulanan">Bulanan</a>
                                <a class="dropdown-item" href="#" data-option="mingguan">Mingguan</a>
                                <a class="dropdown-item" href="#" data-option="harian">Harian</a>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="chart-demo">
                    <div id="chart" class="apex-charts"></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col align-self-center">
                        <div class="media">
                            <img src="public/resources/assets/images/logos/money-beg.png" alt="" class="align-self-center" height="40">
                            <div class="media-body align-self-center ms-3">
                                <h6 class="m-0 font-24">$1850.00</h6>
                                <p class="text-muted mb-0">Total Pembelian</p>
                            </div>
                            <!--end media body-->
                        </div>
                        <!--end media-->
                    </div>
                    <!--end col-->
                    <div class="col-auto align-self-center">
                        <div class="">
                            <div id="Revenu_Status_bar" class="apex-charts mb-n4"></div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col text-center">
                                <span class="h5">$24,500</span>
                                <h6 class="text-uppercase text-muted mt-2 m-0 font-11">Today's Revenue</h6>
                            </div>
                            <!--end col-->
                        </div> <!-- end row -->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-body-->
            </div>
            <!--end col-->
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col text-center">
                                <span class="h5">520</span>
                                <h6 class="text-uppercase text-muted mt-2 m-0 font-11">Today's New Order</h6>
                            </div>
                            <!--end col-->
                        </div> <!-- end row -->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-body-->
            </div>
            <!--end col-->
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col text-center">
                                <span class="h5">82.8%</span>
                                <h6 class="text-uppercase text-muted mt-2 m-0 font-11">Conversion Rate</h6>
                            </div>
                            <!--end col-->
                        </div> <!-- end row -->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-body-->
            </div>
            <!--end col-->
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col text-center">
                                <span class="h5">$80.5</span>
                                <h6 class="text-uppercase text-muted mt-2 m-0 font-11">Avg. Value</h6>
                            </div>
                            <!--end col-->
                        </div> <!-- end row -->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">lihat laporan</h4>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="las la-file-invoice-dollar font-36 text-muted"></i>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <form method="get" id="laporanForm">
                            <div class="input-group">
                                <select class="form-select" name="tahun">
                                    <?php 
                                        $mulai = date('Y') - 50;
                                        for ($i = $mulai; $i < $mulai + 100; $i++) {
                                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                                            echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>'; 
                                        } 
                                    ?>
                                </select>
                                <input type="hidden" name="jenis" value="1">
                                <button class="btn btn-soft-primary btn-sm" type="submit"><i class="las la-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
</div>
<div class="row" id="laporanRow" style="display: none;">
    <div class="col-lg-12">
        <iframe id="pdfIframe" style="width: 100%; height: 600px;" frameborder="0"></iframe>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Halaman Data Pembelian</h4>
                        <p class="text-muted mb-0">Halaman ini berisikan informasi transkasi pembelian barang inventaris.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <div class="p-2">
                            <div class="button-items">
                                <button type="button" class="btn btn-primary btn-square btn-outline-dashed dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="input-pembelian">Tambah Data</a>
                                    <!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary">Import Data</a> -->
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
                        <div class="table table-responsive">
                            <table class="table table-sm" id="datatable_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode transaksi</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Suplier</th>
                                        <th>No Faktur</th>
                                        <th>Total Pembelian</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ambildata = $koneksi->query("SELECT * FROM pembelian_barang ORDER BY tgl_transaksi DESC");
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($ambildata)) { 
                                        require_once 'env/nama_bulan.php';
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$no++?>
                                        </td>
                                        <td>
                                            <?=$data['kode_transaksi']?>
                                        </td>
                                        <td>
                                            <?=tgl_indo($data['tgl_transaksi'])?>
                                        </td>
                                        <td>
                                            <?=strtoupper($data['suplier'])?>
                                        </td>
                                        <td>
                                            <?=$data['faktur']?>
                                        </td>
                                        <td>Rp.
                                            <?=number_format($data['total_pembelian'])?>
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-pen font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href="detail-transaksi-pembelian/<?=$data['kode_transaksi']?>">Detail Pembelian</a>
                                                    <!--  -->
                                                    <!-- <a class="dropdown-item" href="ubah-transaksi-pembelian/<?=$data['kode_transaksi']?>">Ubah</a>   -->
                                                    <!-- <a class="dropdown-item" href="detail-transaksi-pembelian/<?=$data['kode_transaksi']?>">Hapus</a> -->
                                                    <!--
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalPrimary<?=$data['id']?>">Ubah</a>
                                                    -->
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
<script type="text/javascript">
// Fungsi untuk mengambil data dari PHP
function fetchChartData(option) {
    return fetch(`env/pembelian-inv.php?option=${option}`)
        .then(response => response.json())
        .then(data => {
            const formattedData = formatData(data[option]); // Memformat data sebelum digunakan
            return formattedData;
        })
        .catch(error => console.error('Error fetching chart data:', error));
}

// Fungsi untuk memformat data nominal menjadi format Rupiah (Rp) untuk label data
function formatData(data) {
    // Pastikan series data tetap berupa angka untuk chart
    data.series.forEach(series => {
        series.data = series.data.map(amount => {
            // Pastikan amount adalah angka, jika bukan, ubah menjadi 0
            const num = Number(amount);
            return isNaN(num) ? 0 : num; // Menghindari NaN, ganti dengan 0
        });
    });
    return data;
}

// Fungsi untuk memformat angka menjadi format currency (Rp) hanya untuk label
function formatCurrency(amount) {
    return amount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}

// Data awal untuk chart (dari "this-month")
let currentOption = "bulanan"; // Default opsi adalah bulanan
let chartData = {};
let chartInstance; // Menyimpan referensi ke instance chart

// Mengambil dan merender chart awal
fetchChartData(currentOption).then(data => {
    chartData = data;
    renderChart(chartData); // Render chart dengan data yang diterima
});

// Opsi untuk chart
let options = {
    chart: {
        type: 'area',
        height: 350,
        toolbar: { show: false }
    },
    series: chartData.series,
    xaxis: {
        categories: chartData.labels
    },
    title: {
        text: 'Grafik Pembelian Barang',
        align: 'center'
    },
    stroke: {
        curve: 'smooth'
    },
    colors: ['#008FFB'],
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.3,
            stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: true, // Mengaktifkan label data
        style: {
            colors: ['#FFFFFF'], // Warna teks putih untuk setiap titik
            fontSize: '12px',
            fontWeight: 'bold'
        },
        background: {
            enabled: true, // Aktifkan latar belakang untuk label
            foreColor: '#000000', // Warna latar belakang hitam
            borderRadius: 3
        },
        formatter: function(value) {
            // Format nilai label data ke dalam format Rupiah
            return formatCurrency(value);
        }
    }
};

// Fungsi untuk merender chart
function renderChart(data) {
    const chartOptions = {
        ...options,
        series: data.series,
        xaxis: {
            categories: data.labels
        }
    };

    if (!chartInstance) {
        // Hanya buat chart baru jika belum ada
        chartInstance = new ApexCharts(document.querySelector("#chart"), chartOptions);
        chartInstance.render();
    } else {
        // Jika chart sudah ada, update chart dengan data baru
        chartInstance.updateOptions(chartOptions, true);
    }
}

// Event listener untuk dropdown
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();

        // Ambil opsi yang dipilih
        const option = this.getAttribute('data-option');

        // Update judul dropdown
        document.getElementById('dropdownMenu').innerText = this.innerText;

        // Ambil dan update data chart berdasarkan opsi yang dipilih
        fetchChartData(option).then(data => {
            renderChart(data); // Render chart setelah data diterima
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('#laporanForm').on('submit', function(event) {
        event.preventDefault(); // Mencegah form dari submit biasa

        $.ajax({
            url: 'app/print/inv/laporan-pembelian.php',
            type: 'GET',
            data: $(this).serialize(), // Mengambil data dari form
            xhrFields: {
                responseType: 'blob' // Mengatur tipe respons menjadi blob
            },
            success: function(blob) {
                if (blob.size === 0) {
                    alert('Laporan kosong');
                    $('#laporanRow').hide(); // Sembunyikan row jika laporan kosong
                } else {
                    const url = URL.createObjectURL(blob); // Membuat URL untuk blob
                    $('#pdfIframe').attr('src', url); // Menampilkan PDF di iframe
                    $('#laporanRow').show(); // Tampilkan row jika ada laporan
                }
            },
            error: function() {
                alert('Laporan Masih Kosong.');
                $('#laporanRow').hide(); // Pastikan tetap tersembunyi jika ada error
            }
        });
    });
});
</script>