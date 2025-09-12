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

/* Scroll vertikal: awalnya transparan, muncul saat hover */
.scroll-y {
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: thin;                /* Firefox */
  scrollbar-color: transparent transparent; /* thumb track (Firefox) */
  transition: scrollbar-color 0.3s ease;
}

/* Chrome, Edge, Safari (WebKit) */
.scroll-y::-webkit-scrollbar {
  width: 8px;                           /* lebar scrollbar vertikal */
  background-color: transparent;        /* track awal transparan */
  transition: background-color 0.3s ease;
}
.scroll-y::-webkit-scrollbar-thumb {
  background-color: transparent;        /* thumb awal transparan */
  border-radius: 4px;
}

/* Saat hover pada container, tampilkan scrollbar (track + thumb) */
.scroll-y:hover {
  scrollbar-color: #bbb #eee;           /* Firefox: thumb #bbb, track #eee */
}
.scroll-y:hover::-webkit-scrollbar {
  background-color: #eee;               /* track */
}
.scroll-y:hover::-webkit-scrollbar-thumb {
  background-color: #bbb;               /* thumb */
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
<!-- Layout Awal -->
<div id="mainLayout">
  <div class="row p-3" id="searchRow">
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
              Anda bisa mencari kategori RKK di form pencarian di atas
            </small>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row p-3" id="cardRow">
    <div class="scroll-x">
      <div id="card-container" class="d-flex flex-nowrap">
        <!-- Data card lewat AJAX -->
      </div>
    </div>
  </div>

  <div class="row" id="detailRow">
    <div class="col-md-12" id="detailContainer">
      <!-- konten detail muncul di sini -->
    </div>
  </div>
</div>



<script>
// =====================================
// Fungsi menampilkan layout detail (ubah ke 2 kolom)
// =====================================
function showDetail(content) {
    document.getElementById('mainLayout').innerHTML = `
      <div class="row p-3">
        <!-- Kolom kiri -->
        <div class="col-md-3">
          <form onsubmit="return false;">
            <div class="input-group mb-2">
              <button class="btn btn-secondary" type="button">
                <i class="fas fa-search"></i>
              </button>
              <input type="text" id="search" class="form-control" placeholder="Pencarian......" />
            </div>
            <small class="form-text text-muted">
              Anda bisa mencari kategori RKK di form pencarian di atas
            </small>
            
            <!-- Scroll vertikal -->
            <div class="scroll-y mt-3" style="max-height:75vh; overflow-y:auto;">
              <div id="card-container" class="d-flex flex-column gap-2">
                <!-- Data card lewat AJAX -->
              </div>
            </div>
          </form>
        </div>

        <!-- Kolom kanan -->
        <div class="col-md-9">
          <div id="detailContainer" style="max-height:80vh; overflow-y:auto;">
            ${content}
          </div>
        </div>
      </div>
    `;

    // load ulang data card dalam mode vertikal
    loadData();
}


// =====================================
// Fungsi load data card dari server
// =====================================
function loadData(query = '') {
    fetch('app/controller/keperawatan/search.php?q=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById('card-container');
            if (container) container.innerHTML = data;
        })
        .catch(err => console.error("Gagal load data:", err));
}

// =====================================
// Fungsi load detail
// =====================================
function loadDetail(id) {
    fetch('app/controller/keperawatan/detail.php?id=' + id)
        .then(response => response.text())
        .then(data => {
            showDetail(data); // ubah layout ke 2 kolom + tampilkan detail

            const container = document.getElementById('detailContainer');
            // Fokus + scroll halus ke kolom kanan
              detailContainer.focus();
              detailContainer.scrollIntoView({
                behavior: "smooth",
                block: "start"
              });
            if (container) {
                container.innerHTML = data;

                // Inisialisasi DataTable jika ada
                if ($('#datatable_1').length) {
                    if ($.fn.DataTable.isDataTable('#datatable_1')) {
                        $('#datatable_1').DataTable().destroy();
                    }
                    $('#datatable_1').DataTable();
                }
            }
        })
        .catch(err => console.error("Gagal load detail:", err));
}

// =====================================
// Delegasi event untuk pencarian (realtime)
// =====================================
document.addEventListener('keyup', function (e) {
    if (e.target && e.target.id === 'search') {
        loadData(e.target.value);
    }
});

// =====================================
// Saat pertama kali halaman dibuka
// =====================================
document.addEventListener('DOMContentLoaded', function () {
    loadData(); // load semua data default
});

// =====================================
// jQuery DataTable + Aksi (hapus & edit)
// =====================================
$(document).ready(function () {
    // Init DataTable utama (jika ada)
    if ($('#datatable_1').length) {
        $('#datatable_1').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'app/controller/keperawatan/data.php'
        });
    }

    // Hapus data
    $(document).on('click', '.btn-hapus', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const deskripsi = $(this).data('keterangan');

        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus?',
            html: `<strong>${deskripsi}</strong>`,
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

    // Edit data
    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();

        const id = $(this).data('id');
        const keterangan = $(this).data('keterangan');

        // Isi form
        $('#input-keterangan').val(keterangan);

        // Ubah action form
        $('#form-detail-rkk').attr('action', 'app/controller/keperawatan/simpan-rkk.php?id=' + id);

        // Ubah tombol submit
        $('#btn-submit').text('Ubah')
            .removeClass('btn-primary')
            .addClass('btn-secondary');
    });
});

// =====================================
// Scroll horizontal dengan mousewheel
// =====================================
document.addEventListener('DOMContentLoaded', function () {
    const scrollX = document.querySelector('.scroll-x');
    if (scrollX) {
        scrollX.addEventListener('wheel', function (e) {
            if (e.deltaY !== 0) {
                e.preventDefault();
                this.scrollLeft += e.deltaY;
            }
        });
    }
});



</script>
