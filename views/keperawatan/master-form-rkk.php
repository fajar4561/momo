<?php 
require 'env/koneksi.php';
require 'public/component/toast.php';
?>
<style>
.scroll-x {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: transparent transparent; /* awalnya transparan */
    transition: scrollbar-color 0.3s ease;
}

/* Untuk Chrome, Edge, Safari */
.scroll-x::-webkit-scrollbar {
    height: 8px;
    background-color: transparent; /* awalnya transparan */
    transition: background-color 0.3s ease;
}
.scroll-x::-webkit-scrollbar-thumb {
    background-color: transparent; /* awalnya transparan */
    border-radius: 4px;
}

/* Saat hover baru muncul scrollbar */
.scroll-x:hover {
    scrollbar-color: #bbb #eee; /* Firefox */
}
.scroll-x:hover::-webkit-scrollbar {
    background-color: #eee; /* track */
}
.scroll-x:hover::-webkit-scrollbar-thumb {
    background-color: #bbb; /* thumb */
}

</style>
<div class="row p-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<!-- Gambar Header -->
					<div class="col-md-3 col-sm-4 text-center">
						<img src="public/bg/rkk.webp" style="width: 100%; max-width: 400px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
					</div>
					<!-- Teks Header -->
					<div class="col-md-9 col-sm-8">
						<h3 class="fw-bold mb-3">Informasi Halaman</h3>
						<ol class="text-muted mb-0 ps-3">
							<li>Halaman ini digunakan untuk mengelola <strong>Master Form Rincian Kewenangan Klinis (RKK)</strong> sebagai bagian dari proses kredensial tenaga medis dan tenaga kesehatan di rumah sakit.</li>
							<li>RKK berisi daftar kewenangan klinis yang diajukan atau dimiliki oleh tenaga kesehatan sesuai dengan kompetensi, pendidikan, dan pengalaman kerja.</li>
							<li>Pastikan setiap kewenangan yang dimasukkan sesuai dengan peraturan rumah sakit dan ketentuan dari komite kredensial.</li>
							<li>Perubahan atau penambahan kewenangan harus melalui proses verifikasi dan persetujuan oleh Sub Komite Kredensial.</li>
							<li>Jika terdapat kendala teknis atau pertanyaan terkait pengisian form, silakan hubungi tim IT atau bagian kredensial rumah sakit.</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row p-3">
  <div class="col-md-12">
    <form onsubmit="return false;">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <div class="input-group mb-1">
            <button class="btn btn-secondary" type="button">
              <i class="fas fa-search"></i>
            </button>
            <input
              type="text"
              id="search"
              class="form-control"
              placeholder="Pencarian......"
            />
          </div>
          <small class="form-text text-muted text-center">
            Anda bisa mencari katagori RKK di form pencarian diatas
          </small>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="row p-3">
  <div class="scroll-x">
    <div id="card-container" class="d-flex flex-nowrap">
      <!-- Data card akan dimuat di sini lewat AJAX -->
    </div>
  </div>
</div>

<div class="row">
	<div class="col-md-12" id="detailContainer">
		<!-- konten di sini -->
	</div>
</div>


<script>
	document.querySelector('.scroll-x').addEventListener('wheel', function(e) {
    if (e.deltaY !== 0) {
        e.preventDefault();
        this.scrollLeft += e.deltaY;
    }
});

</script>
<script>
function loadData(query = '') {
    fetch('app/controller/keperawatan/search.php?q=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(data => {
            document.getElementById('card-container').innerHTML = data;
        });
}

document.addEventListener('DOMContentLoaded', function() {
    // Load semua data saat halaman pertama kali dibuka
    loadData();

    // Pencarian realtime
    document.getElementById('search').addEventListener('keyup', function(){
        loadData(this.value);
    });
});

// konten isi
function loadDetail(id) {
    fetch('app/controller/keperawatan/detail.php?id=' + id)
        .then(response => response.text())
        .then(data => {
            document.getElementById('detailContainer').innerHTML = data;
            if ($.fn.DataTable.isDataTable('#datatable_1')) {
                $('#datatable_1').DataTable().destroy();
            }
            $('#datatable_1').DataTable();
        });
}

$(document).ready(function () {
    var table = $('#datatable_1').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'app/controller/keperawatan/data.php'
    });

    // Hapus
$(document).on('click', '.btn-hapus', function (e) {
    e.preventDefault();

    var id = $(this).data('id');
    var deskripsi = $(this).data('keterangan'); // pastikan atributnya data-keterangan

    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus ',
        html: `<strong>${deskripsi}</strong> `,
        imageUrl: 'public/bg/hapus2.webp',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger px-4 me-3',
            cancelButton: 'btn btn-secondary px-4'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'app/controller/keperawatan/hapus-master-rkk.php?id=' + id;
        }
    });
});


    // Edit
    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault(); // cegah halaman loncat

        const id = $(this).data('id');
        const keterangan = $(this).data('keterangan');

        // Isi nilai ke form
        $('#input-keterangan').val(keterangan);

        // Ubah action form
        $('#form-detail-rkk').attr('action', 'app/controller/keperawatan/simpan-rkk.php?id=' + id);

        // Ubah tampilan tombol
        $('#btn-submit').text('Ubah')
            .removeClass('btn-primary')
            .addClass('btn-secondary');
    });
});





</script>
