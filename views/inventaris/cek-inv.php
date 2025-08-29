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
                        <center>
                            <div id="qr-reader" style="width:300px; height:auto;"></div>
                            <div id="qr-result" style="text-align: center; margin-top: 20px;">
                                <h3>Result:</h3>
                                <p id="result-text">No result yet</p>
                            </div>
                        </center>
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
<script src="public/plugins/qr/html5-qrcode.min.js"></script>
<script>
        function onScanSuccess(decodedText, decodedResult) {
            // Menampilkan hasil QR Code
            document.getElementById('result-text').innerText = decodedText;
            console.log(`Code scanned = ${decodedText}`, decodedResult);
        }

        function onScanFailure(error) {
            // Hanya untuk debug, abaikan error kecil
            console.warn(`Code scan error = ${error}`);
        }

        // Memulai scanner setelah halaman selesai dimuat
        window.onload = function () {
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", 
                { fps: 10, qrbox: { width: 250, height: 250 } },
                false
            );
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        };
    </script>