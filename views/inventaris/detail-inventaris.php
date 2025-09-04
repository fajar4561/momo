<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
require 'env/koneksi.php';
$kode = $_GET['kode'];
// Dekripsi data

$ambil = $koneksi->query("SELECT * FROM penyerahan WHERE kode_penyerahan='$kode'");
$pecah = $ambil->fetch_assoc();
require 'env/nama_bulan.php';
require 'env/tgl_indo2.php';





?>

<style>
    /* Gaya untuk margin di tengah */
    .centered {
        margin: 0 auto;
        display: block;
        text-align: center; /* Untuk mengatur posisi konten ke tengah */
    }

    /* Gaya untuk membuat gambar responsif */
    .img-responsive {
        max-width: 100%;
        height: auto;
    }

    /* Media query untuk layar yang lebih kecil */
    @media (max-width: 768px) {
        .img-responsive {
            max-width: 90%; /* Misalnya, ukuran gambar maksimum 80% dari lebar layar saat layar diresize */
        }
    }

    @media print {
        @page {
            size: A5; /* Atur ukuran kertas menjadi A5 saat mencetak */
        }
    }
</style>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-md-between">
                    <div class="col-md-5">
                        <table class="table table-sm table-borderless">
                            <tr style="line-height: 1;">
                                <th>Kode Penyerahan</th>
                                <td>:</td>
                                <td><?=$pecah['kode_penyerahan']?></td>
                            </tr>
                            <tr style="line-height: 1;">
                                <th>Tanggal Penyerahan</th>
                                <td>:</td>
                                <td class="text-uppercase"><?=tgl_ind($pecah['tgl_penyerahan'])?></td>
                            </tr>
                            <tr style="line-height: 1;">
                                <th>Unit</th>
                                <td>:</td>
                                <td class="text-uppercase"><?=strtoupper($pecah['unit'])?></td>
                            </tr>
                        </table>
                    </div>                       
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <!-- <center class="mb-3"><h4>List Pembelian Barang</h4></center> -->
                        <div class="table-responsive">
                            <table class="table table-sm nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Merk</th>
                                        <th>Tipe</th>
                                        <th>No Inv</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ambildata = $koneksi->query("SELECT * FROM detail_penyerahan WHERE kode_penyerahan='$kode'");
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($ambildata)) { 
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=ucwords($data['ruangan'])?></td>
                                            <td><?=ucwords($data['nama_barang'])?></td>
                                            <td><?=$data['kode_barang']?></td>
                                            <td><?=$data['merk']?></td>
                                            <td><?=$data['tipe']?></td>
                                            <td><?=$data['kode_inv']?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 mx-auto">
    <iframe id="pdfIframe" style="width: 100%; height: 600px;" frameborder="0" style="display: none;"></iframe>
</div>

<script src="env/js/notif.js"></script>
<script>
    $(document).ready(function() {
        // Ambil parameter dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const data = Object.fromEntries(urlParams.entries()); // Ubah menjadi objek untuk dikirim melalui AJAX

        // Fungsi AJAX dijalankan saat halaman selesai dimuat
        $.ajax({
            url: 'app/print/inv/detail-penyerahan.php',
            type: 'GET',
            data: data, // Mengambil data dari URL
            xhrFields: {
                responseType: 'blob' // Mengatur tipe respons menjadi blob
            },
            success: function(blob) {
                if (blob.size === 0) {
                    alert('Laporan kosong');
                    $('#pdfIframe').hide(); // Sembunyikan iframe jika tidak ada laporan
                } else {
                    const url = URL.createObjectURL(blob); // Membuat URL untuk blob
                    $('#pdfIframe').attr('src', url); // Menampilkan PDF di iframe
                    $('#pdfIframe').show(); // Pastikan iframe ditampilkan jika ada laporan
                }
            },
            error: function() {
                alert('Laporan Masih Kosong.');
            }
        });
    });
</script>



