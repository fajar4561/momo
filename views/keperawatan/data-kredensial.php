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
</style>
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
<div class="row p-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                                <td class="text-center"><?=$no++?></td>
                                <td><?=$data['kode_pengajuan']?></td>
                                <td><?=date("d M Y", strtotime($data['tgl_pengajuan']))?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=$data['unit']?></td>
                                <td><?=$data_rkk['nama_rkk']?> <?=$data_rkk['unit_rkk']?></td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm">
                                        Notifications <span class="badge bg-light text-dark">4</span>
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <i class="las la-pen font-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel<?= $data_rkk['id'] ?>">
                                            <a href="#" class="dropdown-item btn-edit">Ubah</a>
                                            <a href="#" class="dropdown-item btn-hapus">Hapus</a>
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
</script>