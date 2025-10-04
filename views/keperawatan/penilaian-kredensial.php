<?php 
require 'req/head-penilaian-kredensial.php';
require 'req/style-detail-kredensial.php';
require 'req/style-penilaian-kredensial.php';
?>

<form>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-12">
                    <div class="card  rounded-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center p-2">
                                <!-- Foto Profil -->
                                <img src="public/img/<?=$data_pegawai['foto']?>" alt="Foto" class="rounded-circle shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                                <!-- Info Pegawai -->
                                <div class="ms-3 flex-grow-1">
                                    <h4 class="fw-bold mb-1">
                                        <?=$data_pegawai['nama']?>
                                    </h4>
                                    <p class="text-muted small mb-3">
                                        <?=$data_pegawai['unit']?>
                                    </p>
                                    <!-- Info List -->
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span><i class="la la-check-circle text-primary me-2"></i> Kode Pengajuan</span>
                                            <span class="badge bg-light text-dark">
                                                <?=$kode?></span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span><i class="far fa-address-book text-warning me-2"></i> Jenjang</span>
                                            <span class="badge bg-warning text-dark">
                                                <?=$data_rkk['nama_rkk'].' '.$data_rkk['unit_rkk']?></span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center py-2">
                                            <span><i class="la la-money text-success me-2"></i> Pembayaran</span>
                                            <span class="badge bg-success">Sukses</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card rounded-3">
                        <div class="card-body">
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
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="file-box-content mt-2">
                        <?php
                    		$colors = ['text-primary', 'text-success', 'text-danger', 'text-warning', 'text-info', 'text-secondary'];

                    		foreach ($files as $field => $label): 
                    		if (!empty($berkas[$field])):
                    		// pilih warna random
                    		$randColor = $colors[array_rand($colors)];
                    	?>
                        <div class="file-box">
                            <div class="dropdown dropend">
                                <a href="#" data-bs-toggle="dropdown" class="download-icon-link" download>
                                    <div class="text-center">
                                        <i class="lar la-file-alt <?= $randColor ?>"></i>
                                        <h6 class="text-truncate">
                                            <?= htmlspecialchars($berkas[$field]) ?>
                                        </h6>
                                        <small class="text-muted">
                                            <?= $label ?></small>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Download</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        	endif;
                        	endforeach;
                        	if ($sertifikat >= 1) {
                        		while ($data_sertifikat= mysqli_fetch_assoc($ambil_berkas_sertif)) {
                        			$randColor2 = $colors[array_rand($colors)];

                        ?>
                        <div class="file-box">
                            <a href="public/file/berkas/<?= htmlspecialchars($data_sertifikat['berkas']) ?>" class="download-icon-link" download>
                            </a>
                            <div class="text-center">
                                <i class="lar la-file-alt <?= $randColor2 ?>"></i>
                                <h6 class="text-truncate">
                                    <?= htmlspecialchars($data_sertifikat['berkas']) ?>
                                </h6>
                                <small class="text-muted">Sertifikat</small>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="mb-3">
                        <label class="fw-bold">Progress Validasi:</label>
                        <div class="progress" style="height: 25px;">
                            <div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                0%
                            </div>
                        </div>
                        <small><span id="checkedCount">0</span> dari <span id="totalCount">0</span> item dicentang</small>
                    </div>
                </div>
                <div class="col-12">
                	
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle shadow-sm" id="datatable_1">
                                	<caption>
                                		<button id="selectAll" type="button" class="btn btn-sm btn-primary">Pilih Semua</button>
									<button id="deselectAll" type="button" class="btn btn-sm btn-secondary">Hapus Semua</button>
                                	</caption>
                                    <thead class=" text-center align-middle">
                                        <tr>
                                            <th rowspan="3" class="bg-gradient" style="vertical-align: middle; text-align: center;">NO</th>
                                            <th rowspan="3" class="bg-gradient" style="vertical-align: middle; text-align: center;">DAFTAR KEWENANGAN KLINIS DIMINTA</th>
                                            <th colspan="4" class="bg-gradient" style="vertical-align: middle; text-align: center;">JENIS KEWENANGAN</th>
                                            <th rowspan="3" class="bg-gradient" style="vertical-align: middle; text-align: center;">Validasi</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center">MANDIRI</th>
                                            <th rowspan="2" style="vertical-align: middle; text-align: center;">MANDAT</th>
                                            <th rowspan="2" style="vertical-align: middle; text-align: center;">DELEGASI</th>
                                        </tr>
                                        <tr>
                                            <th>SUPERVISI</th>
                                            <th>PENUH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									        $no = 1;
									        $no2 = 1; 
									        $ambil_ujian = $koneksi->query("SELECT * FROM pengajuan_kredensial_detail INNER JOIN detail_master_rkk ON pengajuan_kredensial_detail.id_jenis_kewenangan=detail_master_rkk.id WHERE kode_pengajuan='$kode'");
									        while ($data=mysqli_fetch_assoc($ambil_ujian)) {
									       ?>
                                        <tr class="row-toggle" data-id="<?=$no++?>">
                                            <td class="text-center fw-bold">
                                                <?=$no2++?>
                                            </td>
                                            <td>
                                                <?=$data['kompetensi_rkk']?>
                                            </td>
                                            <td class="text-center">
                                                <?=($data['jenis_kewenangan']=='supervisi' ? '<i class="fas fa-check-circle text-success"></i>' : '-') ?>
                                            </td>
                                            <td class="text-center">
                                                <?=($data['jenis_kewenangan']=='mandiri' ? '<i class="fas fa-check-circle text-success"></i>' : '-') ?>
                                            </td>
                                            <td class="text-center">
                                                <?=($data['jenis_kewenangan']=='mandat' ? '<i class="fas fa-check-circle text-success"></i>' : '-') ?>
                                            </td>
                                            <td class="text-center">
                                                <?=($data['jenis_kewenangan']=='kolaborasi' ? '<i class="fas fa-check-circle text-success"></i>' : '-') ?>
                                            </td>
                                            <td class="text-center">
                                                <label class="switch">
                                                    <input type="checkbox" class="row-check">
                                                    <span class="slider"></span>
                                                </label>
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
        </div>
    </div>
</form>
<?php 
require 'req/js-penilaian-kredensial.php';

?>