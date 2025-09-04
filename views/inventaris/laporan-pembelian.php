<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

require 'env/koneksi.php';
require 'env/tgl_indo.php';
require('public/plugins/fpdf/fpdf.php');

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title">Laporan Pembelian Inventaris</h4>
                        <p class="text-muted mb-0">Halaman ini digunakan untuk mencetak laporan hasil transkasi pembelian barang inventaris.
                        </p>
                    </div>
                </div>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-3">
                            <div class="general-label">
                                <form id="laporanForm" class="row row-cols-lg-auto align-items-center" method="get">
                                    <div class="col-12 mb-2">
                                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-text">Jenis Laporan</div>
                                            <select class="form-select" id="inlineFormSelectPref" name="jenis" required onChange="tampil(this.value)">
                                                <option selected="">--- Pilih Jenis ---</option>
                                                <option value="1">Tahunan</option>
                                                <option value="2">Bulanan</option>
                                                <option value="3">Rentang Tanggal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="tampil"></div>
                                    <div id="tampil2"></div>
                                    <div id="tampil3"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-lg-12">
    <iframe id="pdfIframe" style="width: 100%; height: 600px;" frameborder="0" style="display: none;"></iframe>
</div>

</div>
<script src="env/js/notif.js"></script>
<script type="text/javascript">
function tampil(jenis) {
    var tampil = "";
    var tampil2 = "";

    switch (jenis) {
        case "1":
            tampil = `
                <div class="col-12 mb-2">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" name="tahun">
                        <?php 
                        $mulai = date('Y') - 50;
                        for ($i = $mulai; $i < $mulai + 100; $i++) {
                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                            echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>'; 
                        } 
                        ?>
                    </select>
                </div>
            `;
            tampil2 = `
                <div class="col-12 mb-2">
                    <button type="submit" class="btn btn-de-primary">Submit</button>
                </div>
            `;
            tampil3 = '';
            break;
        case "2":
            tampil = `
                <div class="col-12 mb-2">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" name="bulan">
                        <option>Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
            `;
            tampil2 = `
                <div class="col-12 mb-2">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" name="tahun">
                        <?php 
                        $mulai = date('Y') - 50;
                        for ($i = $mulai; $i < $mulai + 100; $i++) {
                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                            echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>'; 
                        } 
                        ?>
                    </select>
                </div>
            `;
            tampil3 = `
                 <div class="col-12 mb-2">
                    <button type="submit" class="btn btn-de-primary">Submit</button>
                </div>
            `;
            break;
        case "3":
            tampil = `
                <div class="col-12 mb-2">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <input type="date" name="tgl1" class="form-control">
                </div>
            `;
            tampil2 = `
                <div class="col-12 mb-2">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <input type="date" name="tgl2" class="form-control">
                </div>
            `;
            tampil3 = `
                 <div class="col-12 mb-2">
                    <button type="submit" class="btn btn-de-primary">Submit</button>
                </div>
            `;
            break;
        default:
            tampil = "";
            tampil2 = "";
            tampil3 = "";
    }

    document.getElementById('tampil').innerHTML = tampil;
    document.getElementById('tampil2').innerHTML = tampil2;
    document.getElementById('tampil3').innerHTML = tampil3;
}
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
    });
</script>

