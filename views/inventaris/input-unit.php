<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="app/controller/inventaris/simpan-unit.php">
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <!-- Form -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-6 mb-2 mb-lg-0">
                                        <label for="projectName" class="form-label">
                                            Nama Unit: <code class="highlighter-rouge">*</code>
                                        </label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="unit" 
                                               aria-describedby="unit" 
                                               placeholder="Contoh ARIMBI, DWI KUNTHI, IT, HRD dll" 
                                               required>
                                    </div>
                                    <div class="col-lg-6 col-6 mb-2 mb-lg-0">
                                        <label class="form-label" for="pro-start-date">
                                            Lantai Bangunan <code class="highlighter-rouge">*</code>
                                        </label>
                                        <input type="number" 
                                               class="form-control" 
                                               name="lantai" 
                                               placeholder="Lokasi Gedung Unit, Misalnya 1 / 2 / 3 dst">
                                    </div>
                                </div>
                            </div>
                            <!-- End form-group -->

                            <div class="form-group mb-3">
                                <label class="form-label mt-2" for="pro-message">Keterangan</label>
                                <textarea class="form-control" 
                                          rows="5" 
                                          name="keterangan" 
                                          placeholder="Opsional"></textarea>
                            </div>
                            <!-- End form-group -->

                            <button type="submit" class="btn btn-primary btn-square btn-outline-dashed btn-sm"><i class="mdi mdi-arrow-down"></i> Simpan</button>
                            <button type="button" id="tambahRuanganBtn" class="btn btn-secondary btn-square btn-outline-dashed btn-sm"><i class="mdi mdi-plus"></i> Tambah Ruangan</button>
                        </div>
                        <!-- End col -->

                        <div class="col-lg-5 ms-auto align-self-center mt-2">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <span>
                                        <code>Notes : </code>
                                        <small class="form-text text-muted"> 
                                            Kosongkan <code><em>(Tidak perlu diisi)</em></code>  form dibawah ini apabila didalam unit tersbut hanya ada 1 ruangan. Misalnya,
                                            Unit IT hanya memiliki ruangan IT saja.
                                        </small>
                                    </span>
                                </div>
                            </div>
                            <table class="table table-sm" id="ruanganTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="nama_ruangan[]" 
                                                   placeholder="Nama Ruangan">
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Tambahkan baris baru
    document.getElementById('tambahRuanganBtn').addEventListener('click', function () {
        const table = document.getElementById('ruanganTable').querySelector('tbody');
        const rowCount = table.rows.length + 1; // Hitung jumlah baris untuk menentukan nomor
        const newRow = `
            <tr>
                <td>${rowCount}</td>
                <td>
                    <input type="text" 
                           class="form-control" 
                           name="nama_ruangan[]" 
                           placeholder="Nama Ruangan">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-square btn-outline-dashed btn-sm hapusRow"><i class="mdi mdi-close"></i> Hapus</button>
                </td>
            </tr>
        `;
        table.insertAdjacentHTML('beforeend', newRow);
    });

    // Hapus baris
    document.getElementById('ruanganTable').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('hapusRow')) {
            const row = e.target.closest('tr'); // Ambil elemen <tr> terdekat
            row.remove(); // Hapus baris
            updateRowNumbers(); // Perbarui nomor urut
        }
    });

    // Perbarui nomor urut setelah penghapusan
    function updateRowNumbers() {
        const rows = document.getElementById('ruanganTable').querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            row.querySelector('td:first-child').textContent = index + 1;
        });
    }
</script>