<?php
require 'public/component/toast.php';
require 'env/tgl_indo.php'; 
require 'req/head-detail-kredensial.php';
require 'req/style-detail-kredensial.php';
?>
<div class="row p-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold pt-0" data-bs-toggle="tab" href="#Project2_Tab" role="tab"><span class="text-primary">#
                                <?=$data_pengajuan['kode_pengajuan']?></span></a>
                    </li>
                </ul>
            </div>
            <div class="card-body pt-0">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active mt-3" id="Project2_Tab" role="tabpanel">
                        <div class="holder">
                            <ul class="steppedprogress pt-1">
                                <!-- selesai -->
                                <!-- <li class="complete continuous"><span>Pengajuan</span></li> -->
                                <!-- gagal -->
                                <!-- <li class="failed"><span>Verifikasi Berkas</span></li> -->
                                <!-- sedang berjalan -->
                                <!-- <li class="in-progress"><span>Penilaian</span></li> -->
                                <!-- belum mulai -->
                                <!-- <li class=""><span>Selesai</span></li> -->
                               <?php 
								$statusMap = [
								    'menunggu'   => [
								        'status1' => 'complete continuous',
								        'status2' => 'in-progress',
								        'status3' => '',
								        'status4' => ''
								    ],
								    'penilaian'  => [
								        'status1' => 'complete continuous',
								        'status2' => 'complete continuous',
								        'status3' => 'in-progress',
								        'status4' => ''
								    ],
								    'selesai'    => [
								        'status1' => 'complete continuous',
								        'status2' => 'complete continuous',
								        'status3' => 'complete continuous',
								        'status4' => 'complete finish'
								    ],
								    'validasi gagal'    => [
								        'status1' => 'complete continuous',
								        'status2' => 'failed',
								        'status3' => '',
								        'status4' => ''
								    ],
								    'mengulang'    => [
								        'status1' => 'complete continuous',
								        'status2' => 'complete continuous',
								        'status3' => 'failed',
								        'status4' => ''
								    ],
								];

								$status_kredensial = strtolower($data_pengajuan['status_pengajuan']);
								$map = isset($statusMap[$status_kredensial]) ? $statusMap[$status_kredensial] : [];
								?>

								<li class="<?php echo isset($map['status1']) ? $map['status1'] : ''; ?>"><span>Pengajuan</span></li>
								<li class="<?php echo isset($map['status2']) ? $map['status2'] : ''; ?>"><span>Verifikasi Berkas</span></li>
								<li class="<?php echo isset($map['status3']) ? $map['status3'] : ''; ?>"><span>Penilaian</span></li>
								<li class="<?php echo isset($map['status4']) ? $map['status4'] : ''; ?>"><span>Selesai</span></li>

                            </ul>
                        </div>
                        <div class="row mt-3 p-3">
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <p class="mb-0 text-muted">Tanggal Pengajuan :
                                        <?= date('d M Y', strtotime($data_pengajuan['tgl_pengajuan'])) ?>
                                    </p>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-primary">
                                                <i class="fas fa-user fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Nama</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_pegawai['nama']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-success">
                                                <i class="fas fa-map-marker-alt fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">No Pegawai</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_pegawai['nopeg']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-warning">
                                                <i class="fas fa-briefcase fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Unit</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_pegawai['unit']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 border rounded bg-light">
                                            <div class="icon me-3 text-danger">
                                                <i class="fas fas fa-user-md fa-lg"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Jenjang Karir</small>
                                                <span class="fw-semibold text-dark">
                                                    <?=$data_rkk['nama_rkk']?>
                                                    <?=$data_rkk['unit_rkk']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row p-3 mt-3">
                                    <form id="kredensial" method="post" action="app/controller/keperawatan/simpan-validasi-berkas.php">
                                    	<div class="row">
                                    		<label for="inputHorizontalSuccess" class="col-sm-2 col-form-label text-end">Tanggal Ujian</label>
                                    		<div class="col-sm-5 mb-2">
                                                <input type="datetime-local" class="form-control form-control-success" id="tanggal" name="tanggal" required>
                                                <input type="hidden" name="kode_pengajuan" value="<?=$kode?>">
                                                <input type="hidden" name="nopeg" value="<?=$nopeg?>">
                                                
                                            </div>
                                            <div class="col-sm-5">
                                            	<input type="text" name="tempat" placeholder="Temapt Dilaksanakannya Ujian" required class="form-control form-control-success">
                                            </div>
                                            <div class="col-sm-2">
                                            	
                                            </div>
                                            <div class="col-sm-10">
                                            	<small class="form-text text-muted"><em class="text-danger">Notes : </em> Silahkan Tentukan tanggal akan dilaksanakannya ujian</small>
                                            </div>
                                    	</div>
                                    	<div class="row">
                                    		<label for="inputHorizontalSuccess" class="col-sm-2 col-form-label text-end">Catatan</label>
                                    		<div class="col-sm-10">
                                                <textarea class="form-control" name="catatan" placeholder="catatan (opsional)"></textarea>
                                            </div>
                                    	</div>
                                    	<div class="row mt-2">
                                    		<div class="col-md-2">
                                    			
                                    		</div>
                                    		<div class="col-md-8">
                                    			<?php if ($cek_validasi > 0) { ?>
                                    				<button class="btn btn-secondary" type="button" onclick='showWarning()'>Simpan</button>
                                    			<?php } else { ?>
                                    				<button class="btn btn-secondary" type="submit" onclick='konfirmasiSubmit()'>Simpan</button>
                                    			<?php } ?>
                                    			<a href="#" class="btn btn-danger" >Tolak Pengajuan</a>
                                    		</div>
                                    	</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle" id="myTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th rowspan="2" style="width: 50px;">No</th>
                                                <th rowspan="2">Materi</th>
                                                <th rowspan="2" class="text-center">Ada</th>
                                                <th rowspan="2" class="text-center">Tidak Ada</th>
                                                <th rowspan="2" class="text-center">Sedang Proses</th>
                                                <th colspan="3" class="text-center">Verifikasi</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Tanggal Dikeluarkan</th>
                                                <th class="text-center">Tanggal Berakhir</th>
                                                <th class="text-center">Nomor Surat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        		$no = 1;
                                        		$no2 = 1; 
                                        		foreach ($files as $field => $label) :
												    $ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$field]' AND nopeg='$nopeg' ");
												    $data_detail = $ambil_detail_file->fetch_assoc();
                                        	?>
                                            <tr data-bs-toggle="modal" data-bs-target="#detailModal<?=$field?>" style="cursor:pointer;">
                                                <td class="text-center position-relative">
                                                    <?=$no++?>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">
                                                    <?=$label?></span>
                                                    <?php if (!empty($data_detail['catatan'])): ?>
                                                    <i class="fas fa-info-circle text-danger ms-1" data-bs-toggle="tooltip" title="<?=$data_detail['catatan']?>"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['validasi']=='ada' ? '<i class="fas fa-check text-success"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['validasi']=='tidak' ? '<i class="fas fa-check text-danger"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['validasi']=='proses' ? '<i class="fas fa-check text-warning"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_keluar'])) 
            										? '' : date("d F Y", strtotime($data_detail['tgl_keluar']))?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($data_detail['tgl_berakhir'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) 
                                                	? '' : date("d F Y", strtotime($data_detail['tgl_berakhir']))?>
                                                </td>
                                                <td class="text-center">
                                                    <?=(in_array($field, ['FOTO','PORTOFOLIO']) ? '~' : $data_detail['no_file'])?>
                                                </td>
                                                <!-- modal data -->
                                                <div class="modal fade" id="detailModal<?=$field?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                                            <!-- Header -->
                                                            <div class="modal-header bg-primary text-white rounded-top-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3 shadow-sm" style="width:45px;height:45px;">
                                                                        <i class="fas fa-id-card fa-lg"></i>
                                                                    </div>
                                                                    <h5 class="modal-title fw-semibold">Detail Kredensial</h5>
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <!-- Preview File -->
                                                            <div class="p-3 text-center border-bottom bg-light">
                                                                <?php
                                                                	if ($data_detail['jenis_file']=='FOTO') {
												                    	$file_path = "public/img/".$data_detail['nama_file'];
                                                                	 }
                                                                	 else {
                                                                	 	$file_path = "public/file/berkas/".$data_detail['nama_file'];
                                                                	 } 
												                    $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
												                    
												                    if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
												                        echo '<img src="'.$file_path.'" class="img-fluid rounded-3 shadow-sm" style="width: 100%; max-width: 250px; height: auto; object-fit: cover;">';
												                    } elseif ($ext === 'pdf') {
												                        echo '<iframe src="'.$file_path.'" class="w-100 rounded-3 shadow-sm" style="height:400px;" frameborder="0"></iframe>';
												                    } else {
												                        echo '<p class="text-muted fst-italic">Preview tidak tersedia</p>';
												                    }
												                ?>
                                                            </div>
                                                            <form method="post" action="app/controller/keperawatan/validasi-berkas.php" class="validasi-form">
                                                                <!-- Body -->
                                                                <div class="modal-body">
                                                                    <div class="row g-4">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Materi</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=$label?></span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Nomor Surat</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=$data_detail['no_file']?></span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Tanggal Dikeluarkan</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=($data_detail['tgl_keluar']=='0000-00-00' || empty($data_detail['tgl_keluar'])) ? '-' : date("d F Y", strtotime($data_detail['tgl_keluar']))?>
                                                                                </span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Tanggal Berakhir</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=($data_detail['tgl_berakhir']=='0000-00-00' || empty($data_detail['tgl_berakhir'])) ? '-' : date("d F Y", strtotime($data_detail['tgl_berakhir']))?>
                                                                                </span>
                                                                            </li>
                                                                            <?php
																			$sisaMasa = '-'; // default

																			if (!empty($data_detail['tgl_berakhir']) && $data_detail['tgl_berakhir'] != '0000-00-00') {
																			    $today = new DateTime(); // tanggal hari ini
																			    $tglBerakhir = new DateTime($data_detail['tgl_berakhir']);

																			    if ($tglBerakhir >= $today) {
																			        $interval = $today->diff($tglBerakhir);
																			        $sisaMasa = $interval->y . " tahun, " . $interval->m . " bulan, " . $interval->d . " hari";
																			    } else {
																			        $sisaMasa = "Sudah Kadaluarsa";
																			    }
																			}
																			?>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Sisa Masa Berlaku</span>
                                                                                <span class="fw-semibold">
                                                                                    <?= $sisaMasa ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <input type="hidden" name="id_berkas" value="<?=$data_detail['id']?>">
                                                                    <input type="hidden" name="kode_pengajuan" value="<?=$kode?>">
                                                                    <input type="hidden" name="nopeg" value="<?=$nopeg?>">
                                                                    <div class="row gy-3">
                                                                        <div class="col-12">
                                                                            <label class="form-label fw-semibold">Validasi <span class="text-danger">*</span></label>
                                                                            <div class="d-flex flex-wrap gap-3">
                                                                                <input type="radio" class="btn-check" name="validasi" id="valid_<?=$field?>_1" value="ada" autocomplete="off" required>
                                                                                <label class="btn btn-outline-success rounded-pill px-3 py-1" for="valid_<?=$field?>_1">
                                                                                    <i class="fas fa-check me-1"></i> Ada
                                                                                </label>
                                                                                <input type="radio" class="btn-check" name="validasi" id="valid_<?=$field?>_2" value="tidak" autocomplete="off">
                                                                                <label class="btn btn-outline-danger rounded-pill px-3 py-1" for="valid_<?=$field?>_2">
                                                                                    <i class="fas fa-times me-1"></i> Tidak Ada
                                                                                </label>
                                                                                <input type="radio" class="btn-check" name="validasi" id="valid_<?=$field?>_3" value="proses" autocomplete="off">
                                                                                <label class="btn btn-outline-warning rounded-pill px-3 py-1" for="valid_<?=$field?>_3">
                                                                                    <i class="fas fa-spinner me-1"></i> Sedang Proses
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label class="form-label fw-semibold">Catatan <small class="text-muted">(opsional)</small></label>
                                                                            <textarea class="form-control rounded-3" name="catatan" rows="2" placeholder="Tambahkan catatan validasi (jika perlu)..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Footer -->
                                                                <div class="modal-footer border-0 bg-white">
                                                                    <a href="<?=$file_path?>" target="_blank" class="btn btn-sm btn-primary">
                                                                        <i class="fas fa-eye me-1"></i> Lihat
                                                                    </a>
                                                                    <button class="btn btn-sm btn-info" download type="sybmit">
                                                                        <i class="fas fa-download me-1"></i> Simpan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <thead class="table-light">
                                            <tr>
                                                <th colspan="8" class="text-center">Sertifikat Pelatihan Yang Dimiliki Selama Bekerja di RS. Permata Medika</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        		$ambil_sertifikat = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$nopeg'");
												while ($data_sertifikat= mysqli_fetch_assoc($ambil_sertifikat)) {
												    $sertifikat_berkas = $data_sertifikat['berkas'];
												    $ambil_sertif = $koneksi->query("SELECT * FROM file_detail WHERE nama_file = '$sertifikat_berkas' ");
												    $pecah_sertifikat = $ambil_sertif->fetch_assoc();
                                        	?>
                                            <tr data-bs-toggle="modal" data-bs-target="#sertifikatModal<?=$data_sertifikat['id']?>" style="cursor:pointer;">
                                                <td class="text-center">
                                                    <?=$no2++?>
                                                </td>
                                                <td>
                                                	<span class="fw-semibold">
                                                    <?=$data_sertifikat['keterangan']?></span>
                                                    <?php if (!empty($pecah_sertifikat['catatan'])): ?>
                                                    <i class="fas fa-info-circle text-danger ms-1" data-bs-toggle="tooltip" title="<?=$pecah_sertifikat['catatan']?>"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($pecah_sertifikat['validasi']=='ada' ? '<i class="fas fa-check text-success"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($pecah_sertifikat['validasi']=='tidak' ? '<i class="fas fa-check text-danger"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=($pecah_sertifikat['validasi']=='proses' ? '<i class="fas fa-check text-warning"></i>' : '-') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?=
                                                		($pecah_sertifikat['tgl_keluar'] == '0000-00-00' || empty($pecah_sertifikat['tgl_keluar'])) ? '' : date("d F Y", strtotime($pecah_sertifikat['tgl_keluar']))
                                                	?>
                                                </td>
                                                <td class="text-center">
                                                    <?=
                                                		($pecah_sertifikat['tgl_berakhir'] == '0000-00-00' || empty($pecah_sertifikat['tgl_berakhir'])) ? '' : date("d F Y", strtotime($pecah_sertifikat['tgl_berakhir']))
                                                	?>
                                                </td>
                                                <td class="text-center">
                                                    <?=$pecah_sertifikat['no_file']?>
                                                </td>
                                                <!-- Modal Validasi Sertifikat -->
                                                <div class="modal fade" id="sertifikatModal<?=$data_sertifikat['id']?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                                            <!-- Header -->
                                                            <div class="modal-header bg-primary text-white rounded-top-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3 shadow-sm" style="width:45px;height:45px;">
                                                                        <i class="fas fa-id-card fa-lg"></i>
                                                                    </div>
                                                                    <h5 class="modal-title fw-semibold">Validasi Sertifikat</h5>
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <!-- End of Header -->
                                                            <!-- Preview File -->
                                                            <div class="p-3 text-center border-bottom bg-light">
                                                                <?php
                                                                	$file_path2 = "public/file/berkas/".$pecah_sertifikat['nama_file'];
												                    $ext2 = strtolower(pathinfo($file_path2, PATHINFO_EXTENSION));
												                    
												                    if (in_array($ext2, ['jpg','jpeg','png','gif','webp'])) {
												                        echo '<img src="'.$file_path2.'" class="img-fluid rounded-3 shadow-sm" style="width: 100%; max-width: 250px; height: auto; object-fit: cover;">';
												                    } elseif ($ext2 === 'pdf') {
												                        echo '<iframe src="'.$file_path2.'" class="w-100 rounded-3 shadow-sm" style="height:400px;" frameborder="0"></iframe>';
												                    } else {
												                        echo '<p class="text-muted fst-italic">Preview tidak tersedia</p>';
												                    }
												                ?>
                                                            </div>
                                                            <form method="post" action="app/controller/keperawatan/validasi-berkas.php" class="validasi-form">
                                                                <!-- body -->
                                                                <div class="modal-body">
                                                                    <div class="row g-4">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Materi</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=$data_sertifikat['keterangan']?></span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Nomor Surat</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=$pecah_sertifikat['no_file']?></span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Tanggal Dikeluarkan</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=($pecah_sertifikat['tgl_keluar']=='0000-00-00' || empty($pecah_sertifikat['tgl_keluar'])) ? '-' : date("d F Y", strtotime($pecah_sertifikat['tgl_keluar']))?>
                                                                                </span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Tanggal Berakhir</span>
                                                                                <span class="fw-semibold">
                                                                                    <?=($pecah_sertifikat['tgl_berakhir']=='0000-00-00' || empty($pecah_sertifikat['tgl_berakhir'])) ? '-' : date("d F Y", strtotime($pecah_sertifikat['tgl_berakhir']))?>
                                                                                </span>
                                                                            </li>
                                                                            <?php
																			$sisaMasa2 = '-'; // default

																			if (!empty($pecah_sertifikat['tgl_berakhir']) && $pecah_sertifikat['tgl_berakhir'] != '0000-00-00') {
																			    $tglBerakhir2 = new DateTime($pecah_sertifikat['tgl_berakhir']);

																			    if ($tglBerakhir2 >= $today) {
																			        $interval2 = $today->diff($tglBerakhir2);
																			        $sisaMasa2 = $interval2->y . " tahun, " . $interval2->m . " bulan, " . $interval2->d . " hari";
																			    } else {
																			        $sisaMasa2 = "Sudah Kadaluarsa";
																			    }
																			}
																			?>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <span class="text-muted">Sisa Masa Berlaku</span>
                                                                                <span class="fw-semibold">
                                                                                    <?= $sisaMasa2 ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <input type="hidden" name="id_berkas" value="<?=$pecah_sertifikat['id']?>">
                                                                    <input type="hidden" name="kode_pengajuan" value="<?=$kode?>">
                                                                    <input type="hidden" name="nopeg" value="<?=$nopeg?>">
                                                                    <div class="row gy-3">
                                                                         <div class="col-12">
																	        <label class="form-label fw-semibold">Validasi <span class="text-danger">*</span></label>
																	        <div class="d-flex flex-wrap gap-3">
																	            <input type="radio" class="btn-check" name="validasi" value="ada" id="valid_<?=$pecah_sertifikat['id']?>_1" autocomplete="off" required>
																	            <label class="btn btn-outline-success rounded-pill px-3 py-1" for="valid_<?=$pecah_sertifikat['id']?>_1">
																	                <i class="fas fa-check me-1"></i> Ada
																	            </label>

																	            <input type="radio" class="btn-check" name="validasi" value="tidak" id="valid_<?=$pecah_sertifikat['id']?>_2" autocomplete="off">
																	            <label class="btn btn-outline-danger rounded-pill px-3 py-1" for="valid_<?=$pecah_sertifikat['id']?>_2">
																	                <i class="fas fa-times me-1"></i> Tidak Ada
																	            </label>

																	            <input type="radio" class="btn-check" name="validasi" value="proses" id="valid_<?=$pecah_sertifikat['id']?>_3" autocomplete="off">
																	            <label class="btn btn-outline-warning rounded-pill px-3 py-1" for="valid_<?=$pecah_sertifikat['id']?>_3">
																	                <i class="fas fa-spinner me-1"></i> Sedang Proses
																	            </label>
																	        </div>
																	    </div>
                                                                        <div class="col-12">
                                                                            <label class="form-label fw-semibold">Catatan <small class="text-muted">(opsional)</small></label>
                                                                            <textarea class="form-control rounded-3" name="catatan" rows="2" placeholder="Tambahkan catatan validasi (jika perlu)..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of body -->
                                                                <!-- Footer -->
                                                                <div class="modal-footer border-0 bg-white">
                                                                    <a href="<?=$file_path2?>" target="_blank" class="btn btn-sm btn-primary">
                                                                        <i class="fas fa-eye me-1"></i> Lihat
                                                                    </a>
                                                                    <button class="btn btn-sm btn-info" download type="sybmit">
                                                                        <i class="fas fa-download me-1"></i> Simpan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Sertifikat -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require 'req/js-detail-kredensial.php';
?>
