<style>
    .sliding {
    flex-wrap: nowrap !important;
    /* cegah turun ke bawah */
    overflow-x: auto;
    overflow-y: hidden;
    gap: 15px;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;

    /* sembunyikan scrollbar default */
    -ms-overflow-style: none;
    /* IE & Edge lama */
    scrollbar-width: none;
    /* Firefox */
}

.sliding>[class*="col-"] {
    flex: 0 0 auto;
    min-width: 220px;
    /* lebar minimal setiap card */
}

/* ===== SCROLLBAR WEBKIT (Chrome, Safari, Edge) ===== */

/* default: tidak tampil */
.sliding::-webkit-scrollbar {
    display: none;
}

/* saat hover atau fokus: baru tampil */
.sliding:hover::-webkit-scrollbar,
.sliding:focus::-webkit-scrollbar {
    display: block;
    height: 6px;
    background: #eee;
    /* track */
}

.sliding:hover::-webkit-scrollbar-thumb,
.sliding:focus::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 4px;
}

/* Firefox: saat hover/focus munculkan */
.sliding:hover,
.sliding:focus {
    scrollbar-width: thin;
}

.font-30 {
  font-size: 28px !important;
}
/* Modern Tabs */
.modern-tabs {
  border-bottom: none;
  position: relative;
  display: flex;
  gap: 10px;
}

.modern-tabs .nav-link {
  border: none;
  border-radius: 8px 8px 0 0;
  color: #6c757d;
  font-weight: 500;
  padding: 10px 20px;
  position: relative;
  background: #f8f9fa;
  transition: all 0.3s ease;
}

.modern-tabs .nav-link i {
  font-size: 16px;
  color: #7081b9;
  transition: color 0.3s ease;
}

.modern-tabs .nav-link:hover {
  background: #eef2f7;
  color: #0b51b7;
}

.modern-tabs .nav-link.active {
  background: #ffffff;
  color: #0b51b7;
  font-weight: 600;
  box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
}

.modern-tabs .nav-link.active i {
  color: #0b51b7;
}

/* Animated underline indicator */
.modern-tabs .nav-link::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 20%;
  width: 0;
  height: 3px;
  background: #0b51b7;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.modern-tabs .nav-link.active::after {
  width: 60%;
}

/* Tab content box */
.tab-pane-box {
  background: #ffffff;
  border: 1px solid #e6eaf0;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  animation: fadeIn 0.4s ease;
}

/* Animasi fade in konten */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
<div class="row p-3">
    <div class="col-md-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white border-0 pb-2">
                <h4 class="card-title mb-1 fw-bold">Navigation Tabs</h4>
                <p class="text-muted small mb-0">
                    Tab modern dengan efek animasi & desain lebih profesional.
                </p>
            </div>
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs modern-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <i class="fas fa-user me-2"></i> Validasi Berkas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <i class="fas fa-cog me-2"></i> Penilaian
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="tab-pane-box">
                            <h5 class="fw-semibold text-primary mb-2">Welcome Home</h5>
                            <p class="mb-0 text-muted">
                                Food truck fixie locavore, accusamus mcsweeney's single-origin coffee squid.
                            </p>
                            <div class="row justify-content-center p-3">
                                <div class="col-12">
                                    <div class="card overflow-hidden">
                                        <div class="row g-0 sliding">
                                            <div class="col-md-6 col-lg-3 border-b border-e border-bo">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="tag" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">New Tickets</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">155</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <div class="col-md-6 col-lg-3 border-b border-e border-bo">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="tag" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">New Tickets</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">155</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <div class="col-md-6 col-lg-3 border-b border-e border-bo">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="tag" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">New Tickets</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">155</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <div class="col-md-6 col-lg-3 border-b border-e border-bo">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="tag" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">New Tickets</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">155</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6 col-lg-3 border-b border-e border-bo">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="package" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">Open Tickets</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">102</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6 col-lg-3 border-b border-e">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="zap" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">On Hold</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">14</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6 col-lg-3 ps-lg-0">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div class="media">
                                                                <div class="bg-light-alt d-flex justify-content-center align-items-center thumb-md  rounded-circle">
                                                                    <i data-feather="lock" class="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                                <div class="media-body align-self-center ms-2">
                                                                    <p class="text-dark mb-1 fw-semibold">Unassigned</p>
                                                                    <p class="mb-0 text-truncate text-muted">From Average Yesterday</p>
                                                                </div>
                                                                <!--end media body-->
                                                            </div>
                                                            <!--end media-->
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            <h4 class="my-1">75</h4>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table" id="datatable_1">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Kode Pengajuan.</th>
                                                    <th>Tgl Pengajuan</th>
                                                    <th>Nama</th>
                                                    <th>Unit</th>
                                                    <th>Jenjang</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no =1 ; 
                                                $ambil_data = $koneksi->query("SELECT * FROM pengajuan_kredensial ORDER BY tgl_pengajuan DESC");
                                                while ($data = mysqli_fetch_assoc($ambil_data)) {
                                                    $nopeg = $data['nopeg'];
                                                    $ambil_perawat = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nopeg'");
                                                    $row = $ambil_perawat->fetch_assoc();

                                                    $id_jenjang = $data['jenjang_diajukan'];
                                                    $ambil_rkk = $koneksi->query("SELECT * FROM master_rkk WHERE id='$id_jenjang'");
                                                    $data_rkk = $ambil_rkk->fetch_assoc();
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?=$no++?>
                                                    </td>
                                                    <td>
                                                        <?=$data['kode_pengajuan']?>
                                                    </td>
                                                    <td>
                                                        <?=date("d M Y", strtotime($data['tgl_pengajuan']))?>
                                                    </td>
                                                    <td>
                                                        <?=$row['nama']?>
                                                    </td>
                                                    <td>
                                                        <?=$data['unit']?>
                                                    </td>
                                                    <td>
                                                        <?=$data_rkk['nama_rkk']?>
                                                        <?=$data_rkk['unit_rkk']?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm">
                                                            Notifications <span class="badge bg-light text-dark">4</span>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <a href="detail-kredensial?k=<?=$data['kode_pengajuan']?>&nopeg=<?=$data['nopeg']?>" class="btn btn-secondary btn-sm">Validasi Berkas</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="dropdown d-inline-block">
                                                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                                        <i class="las la-edit font-30 text-muted"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel<?= $data_rkk['id'] ?>">
                                                                        <a href="#" class="dropdown-item btn-show-detail" data-kode="<?=$data['kode_pengajuan']?>" data-nama="<?=$row['nama']?>" data-unit="<?=$data['unit']?>" data-jenjang="<?=$data_rkk['nama_rkk'].' '.$data_rkk['unit_rkk']?>">lihat</a>
                                                                        <a href="#" class="dropdown-item btn-hapus">Hapus</a>
                                                                    </div>
                                                                </div>
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
                            <div class="row mt-3" id="detail-container" style="display:none;">
                                <div class="col-12">
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Detail Pengajuan</h5>
                                            <p><b>Kode:</b> <span id="detail-kode"></span></p>
                                            <p><b>Nama:</b> <span id="detail-nama"></span></p>
                                            <p><b>Unit:</b> <span id="detail-unit"></span></p>
                                            <p><b>Jenjang:</b> <span id="detail-jenjang"></span></p>
                                            <button class="btn btn-sm btn-danger" id="btn-close-detail">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="tab-pane-box">
                            <h5 class="fw-semibold text-primary mb-2">User Profile</h5>
                            <p class="mb-0 text-muted">
                                Food truck fixie locavore, accusamus mcsweeney's single-origin coffee squid.
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <div class="tab-pane-box">
                            <h5 class="fw-semibold text-primary mb-2">App Settings</h5>
                            <p class="mb-0 text-muted">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
<script>
const sliding = document.querySelector('.sliding');
let isDown = false;
let startX;
let scrollLeft;

// drag to scroll
sliding.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - sliding.offsetLeft;
    scrollLeft = sliding.scrollLeft;
});
sliding.addEventListener('mouseleave', () => isDown = false);
sliding.addEventListener('mouseup', () => isDown = false);
sliding.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - sliding.offsetLeft;
    const walk = (x - startX) * 1.5;
    sliding.scrollLeft = scrollLeft - walk;
});

// wheel horizontal
sliding.addEventListener('wheel', (e) => {
    if (e.deltaY !== 0) {
        e.preventDefault();
        sliding.scrollLeft += e.deltaY;
    }
});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".btn-show-detail").forEach(function(btn) {
        btn.addEventListener("click", function() {
            // ambil data dari atribut
            document.getElementById("detail-kode").textContent = this.dataset.kode;
            document.getElementById("detail-nama").textContent = this.dataset.nama;
            document.getElementById("detail-unit").textContent = this.dataset.unit;
            document.getElementById("detail-jenjang").textContent = this.dataset.jenjang;

            // tampilkan card
            document.getElementById("detail-container").style.display = "block";
        });
    });

    // tombol tutup
    document.getElementById("btn-close-detail").addEventListener("click", function() {
        document.getElementById("detail-container").style.display = "none";
    });
});
</script>