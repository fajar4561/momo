<?php 
require 'env/koneksi.php';
require 'public/component/toast.php';
?>


<style type="text/css">
table tbody tr:hover {
    background-color: #f5f5f5; /* Warna latar saat hover */
    color: #333; /* Warna teks saat hover */
    transition: background-color 0.3s, color 0.3s; /* Animasi transisi */
}
/* Efek hover untuk baris tabel */
table tbody tr.clickable-row:hover {
    background-color: #f8f9fa;
    cursor: pointer;
}

/* Pointer khusus pada tombol dropdown */
table tbody tr .dropdown-toggle {
    cursor: pointer;
}
.context-menu {
    position: absolute;
    display: none;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    z-index: 1000;
}
.context-menu a {
    display: block;
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
}
.context-menu a:hover {
    background: #f0f0f0;
}

</style>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<!-- Gambar Header -->
					<div class="col-md-3 col-sm-4 text-center">
						<img src="public/bg/master-jabatan.webp" style=" width: 100%; max-width: 350px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
					</div>
					<!-- Teks Header -->
					<div class="col-md-9 col-sm-8">
						<h3 class="fw-bold mb-3">Informasi Halaman</h3>
						<ol class="text-muted mb-0 ps-3">
							<li>Halaman ini digunakan untuk menambahkan atau memperbarui data jabatan yang berlaku di lingkungan rumah sakit.</li>
							<li>Jabatan merupakan posisi resmi dalam struktur organisasi rumah sakit, seperti Dokter Umum, Perawat, Kepala Ruangan, Administrasi, dan lainnya.</li>
							<li>Pastikan penamaan jabatan sesuai dengan struktur organisasi resmi rumah sakit.</li>
							<li>Perubahan atau penambahan jabatan yang tidak standar sebaiknya dikonsultasikan terlebih dahulu kepada bagian HRD atau manajemen.</li>
							<li>Jika mengalami kendala saat menginput data, silakan hubungi tim IT untuk bantuan teknis.</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">                      
						<h4 class="card-title">Data Jabatan</h4>                      
					</div><!--end col-->                                        
				</div>  <!--end row-->                                  
			</div><!--end card-header-->
			<div class="card-body">
				<div class="table-responsive shopping-cart">
					<table class="table mb-0" id="datatable_1">
						<thead>
							<tr>
								<th>Jabatan</th>
								<th>Jenis</th>                                                        
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1; 
							$ambil_jabatan = $koneksi->query("SELECT * FROM master_pegawai ORDER BY jabatan ASC");
							while ($data = mysqli_fetch_assoc($ambil_jabatan)) {
								?>
								<tr data-dropdown-id="<?=$data['id']?>">
									<td>
										<p class="d-inline-block align-middle mb-0 product-name"><?=$data['jabatan']?></p> 
									</td>
									<td>
										<?= 
										    $data['jenis_pegawai'] == 'medis' ? 
										        '<a href="#" class="badge bg-primary">Medis</a>' :
										    ($data['jenis_pegawai'] == 'penunjang medis' ? 
										        '<a href="#" class="badge bg-secondary">Penunjang Medis</a>' :
										    ($data['jenis_pegawai'] == 'non medis' ? 
										        '<a href="#" class="badge bg-info">Non Medis</a>' : 
										        ''));
										?>

									</td>
									<td>
										<div class="dropdown d-inline-block">
											<a class="dropdown-toggle arrow-none" id="dLabel<?=$data['id']?>" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
												<i class="las la-pen font-20 text-muted"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel<?=$data['id']?>">
												<a href="#" class="dropdown-item btn-edit" data-id="<?= $data['id'] ?>" data-jabatan="<?= $data['jabatan'] ?>" data-jenis="<?= $data['jenis_pegawai'] ?> " data-hirarki="<?= $data['hirarki'] ?>">Ubah</a>
												<a href="#"  class="dropdown-item btn-hapus" data-id="<?= $data['id'] ?>" data-jabatan="<?= $data['jabatan'] ?>">Hapus</a>
											</div>
										</div>
									</td>                                                        
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div><!--end re-table-->
			</div><!--end card-body-->
		</div><!--end card-->
	</div><!--end col-->

	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">                      
						<h4 class="card-title">Form Jabatan Pegawai</h4>                      
					</div><!--end col-->                                        
				</div>  <!--end row-->                                  
			</div><!--end card-header-->
			<div class="card-body">
				<form class="mb-0"  id="form-jabatan" action="app/controller/pegawai/simpan-master-jabatan.php" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Nama Jabatan <small class="text-danger font-13">*</small></label>
								<input type="text" name="jabatan" class="form-control" id="input-jabatan" required="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Jenis Pegawai <small class="text-danger font-13">*</small></label>
								<select class="form-select" name="jenis" id="input-jenis" onChange="tampil(this.value)">
									<option value="">---Pilih---</option>
									<option value="medis">Medis</option>
									<option value="penunjang medis">Penunjang Medis</option>
									<option value="non medis">Non Medis</option>
								</select>
							</div>
						</div><!--end col-->
						<div id="tampil"></div>                                                
					</div><!--end row-->
					<div class="row">
						<div class="col-md-12">                            
							<div class="form-group">
								<label class="form-label my-2">Hirarki <small class="text-danger font-13">*</small></label>
								<select class="form-select" name="hirarki" id="input-hirarki">
									<option value="">---Pilih---</option>
									<option value="1">Direktur</option>
									<option value="2">Sekertaris</option>
									<option value="3">Kepala bidang / kepala instalasi</option>
									<option value="4">Kepala Ruangan / koordinator</option>
									<option value="5">Pelaksana / staff</option>
								</select>
							</div>
						</div><!--end col-->
					</div><!--end row-->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group mt-3">
								<button class="btn btn-primary" type="submit" id="btn-submit">Simpan</button>
							</div>              
						</div><!--end col-->
					</div><!--end row-->                                            
				</form><!--end form-->
			</div><!--end card-body-->
		</div><!--end card-->
		<div class="row mt-3">
			<div class="col-md-12 col-sm-6 text-center">
				<img src="public/bg/objek3.webp" style="width: 100%; max-width: 450px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
			</div>
			<div class="col-md-12 col-sm-6 text-center">
				<h5 class="text-muted">Manajemen Jabatan Pegawai</h5>
			</div>
		</div><!--end row-->
	</div><!--end col-->
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', () => {
    const table = document.querySelector('table');
    const contextMenu = document.createElement('div');
    contextMenu.className = 'context-menu';
    contextMenu.style.position = 'absolute';
    contextMenu.style.display = 'none';
    contextMenu.style.zIndex = '1000';
    contextMenu.style.backgroundColor = '#fff';
    contextMenu.style.border = '1px solid #ccc';
    contextMenu.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.2)';
    document.body.appendChild(contextMenu);

    table.addEventListener('contextmenu', (event) => {
        event.preventDefault();

        const row = event.target.closest('tr');
        if (row) {
            const kodeTransaksi = row.getAttribute('data-dropdown-id');

            contextMenu.innerHTML = `
                <a href="detail-transaksi-gaji/sdasd" class="dropdown-item">Ubah</a>
                <a href="detail-transaksi-gaji/sdasd" class="dropdown-item">Hapus</a>
            `;

            // Mendapatkan posisi dari elemen <tr> dan mengubahnya menjadi posisi absolut
            const rect = row.getBoundingClientRect();

            // Menentukan posisi menu konteks di bawah klik
            const contextMenuHeight = contextMenu.offsetHeight || 100; // Estimasi tinggi menu konteks
            const menuTop = (rect.top + window.scrollY) + event.offsetY;
            const menuLeft = (rect.left + window.scrollX) + event.offsetX;

            // Menyesuaikan posisi agar menu konteks tidak keluar dari viewport (jika perlu)
            const bottomSpace = window.innerHeight - menuTop;
            if (bottomSpace < contextMenuHeight) {
                contextMenu.style.top = `${menuTop - contextMenuHeight}px`; // Jika kurang ruang di bawah, tampilkan di atas
            } else {
                contextMenu.style.top = `${menuTop}px`; // Jika ada cukup ruang di bawah
            }

            contextMenu.style.left = `${menuLeft}px`;
            contextMenu.style.display = 'block';
        }
    });

    document.addEventListener('click', () => {
        contextMenu.style.display = 'none';
    });
});

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('datatable_1');
    const form = document.getElementById('form-jabatan');
    const btnSubmit = document.getElementById('btn-submit');

    table.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-edit') || e.target.closest('.btn-edit')) {
            e.preventDefault();
            const btn = e.target.closest('.btn-edit');

            const id = btn.getAttribute('data-id');
            const jabatan = btn.getAttribute('data-jabatan');
            const jenis = btn.getAttribute('data-jenis');
            const hirarki = btn.getAttribute('data-hirarki');

            // Isi nilai ke form
            document.getElementById('input-jabatan').value = jabatan;
            document.getElementById('input-jenis').value = jenis.trim().toLowerCase();
            document.getElementById('input-hirarki').value = hirarki;

            // Ganti action form
            form.setAttribute('action', 'app/controller/pegawai/ubah-jabatan.php?id=' + id);

            // Ganti label tombol
            btnSubmit.textContent = 'Ubah';
            btnSubmit.classList.remove('btn-primary');
			btnSubmit.classList.add('btn-secondary');
        }
    });
});

// sweetalert hapus data
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('datatable_1');

    table.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-hapus') || e.target.closest('.btn-hapus')) {
            e.preventDefault();
            const btn = e.target.closest('.btn-hapus');
            const id = btn.getAttribute('data-id');
            const jabatan = btn.getAttribute('data-jabatan');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                html: `<strong>Jabatan:</strong> ${jabatan}`,
                imageUrl: 'public/bg/hapus2.webp', // gambar hapus
                
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                
                customClass: {
                    confirmButton: 'btn btn-danger px-4 me-3',   // jarak antar tombol
       				cancelButton: 'btn btn-secondary px-4'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke proses hapus
                    window.location.href = 'app/controller/pegawai/hapus-master-jabatan.php?id=' + id;
                }
            });
        }
    });
});

// selectbox
function tampil(jenis) {
    var tampil = "";
    var jenisCol = document.querySelector('#input-jenis').closest('.col-md-6');

    switch (jenis) {
        case "medis":
            // Ubah kolom Jenis Pegawai menjadi col-lg-3
            jenisCol.classList.remove('col-md-6');
            jenisCol.classList.add('col-lg-3');

            // Tambahkan select box baru di sampingnya
            tampil = `
                <div class="col-lg-3">
                    <select name="unit" class="form-select" required>
                        <option value="">---Pilih Unit---</option>
                        <option value="dokter">Dokter</option>
                        <option value="perawat">Perawat</option>
                    </select>
                </div>
            `;
            break;

        default:
            // Kembalikan ke ukuran awal
            jenisCol.classList.remove('col-lg-3');
            jenisCol.classList.add('col-md-6');
            tampil = "";
            break;
    }

    document.getElementById('tampil').innerHTML = tampil;
}


</script>


