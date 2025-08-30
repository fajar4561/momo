<?php 
require 'public/component/toast.php';
require 'req/style-pengajuan-kredensial.php';
?>



<?php 
// ambil dari variabel session yang aktive
$sesi_pegawai = $_SESSION['username'];

$ambil_data_diri = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi_pegawai'");
$data_diri = $ambil_data_diri->fetch_assoc();

function getFileFormat($file) {
    // Menentukan path file dan ekstensi file
    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_path = 'public/file/berkas/' . $file;
    $file_size = file_exists($file_path) ? filesize($file_path) / 1024 : 0; // Cek apakah file ada

    // Pemendekan nama file jika terlalu panjang
    $maxLength = 10;
    if (strlen($file) > $maxLength) {
        $shortName = substr($file, -$maxLength); // Ambil bagian akhir dari nama file
        $displayName = '...' . $shortName; // Format nama file pendek
    } else {
        $displayName = $file;
    }

    // Menentukan format berdasarkan ekstensi file
    if ($file_extension == 'pdf') {
        $format = 'la-file-pdf text-danger';
    } elseif ($file_extension == 'png') {
        $format = 'la-file-image text-warning';
    } elseif ($file_extension == 'jpg') {
        $format = 'la-file-image text-info';
    } elseif ($file_extension == 'jpeg') {
        $format = 'la-file-image text-success';
    } else {
        $format = 'la-file text-secondary';
    }

    return [
        'format' => $format,
        'file_size' => $file_size,
        'file_path' => $file_path,
        'display_name' => $displayName, // Nama file pendek
    ];
}

// ambil data berkas 
$n = $data_diri['nopeg'];
$ambil_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='$n'");
$ambil_berkas_sertif = $koneksi->query("SELECT * FROM sertifikat WHERE nopeg='$n'");
$sertifikat = $ambil_berkas_sertif->num_rows;

$berkas = mysqli_fetch_assoc($ambil_berkas);

// Memanggil fungsi untuk setiap berkas
$ktpData = getFileFormat($berkas['KTP']);
$kkData = getFileFormat($berkas['KK']);
$ijazahData = getFileFormat($berkas['IJAZAH']);
$ppniData = getFileFormat($berkas['PPNI']);
$sipData = getFileFormat($berkas['SIP']);
$strData = getFileFormat($berkas['STR']);
$npwpData = getFileFormat($berkas['NPWP']);

// Anda dapat mengakses hasilnya seperti ini
$ktp = $ktpData['format'];
$file_path_ktp = $ktpData['file_path'];
$file_size_ktp = $ktpData['file_size'];
$display_name_ktp = $ktpData['display_name']; // Nama file pendek

$kk = $kkData['format'];
$file_path_kk = $kkData['file_path'];
$file_size_kk = $kkData['file_size'];
$display_name_kk = $kkData['display_name']; // Nama file pendek

$ijazah = $ijazahData['format'];
$file_path_ijazah = $ijazahData['file_path'];
$file_size_ijazah = $ijazahData['file_size'];
$display_name_ijazah = $ijazahData['display_name']; // Nama file pendek

$ppni = $ppniData['format'];
$file_path_ppni = $ppniData['file_path'];
$file_size_ppni = $ppniData['file_size'];
$display_name_ppni = $ppniData['display_name']; // Nama file pendek

$sip = $sipData['format'];
$file_path_sip = $sipData['file_path'];
$file_size_sip = $sipData['file_size'];
$display_name_sip = $sipData['display_name'];

$str = $strData['format'];
$file_path_str = $strData['file_path'];
$file_size_str = $strData['file_size'];
$display_name_str = $strData['display_name'];

$npwp = $npwpData['format'];
$file_path_npwp = $npwpData['file_path'];
$file_size_npwp = $npwpData['file_size'];
$display_name_npwp = $npwpData['display_name'];


$files = [
    "KTP"    => "KTP",
    "KK"     => "Kartu Keluarga",
    "IJAZAH" => "Ijazah",
    "PPNI"   => "PPNI",
    "SIP"    => "SIP",
    "STR"    => "STR",
    "NPWP"   => "NPWP"
];


?>
<!-- akhir scroll file box -->
<form method="post" action="app/controller/keperawatan/simpan-pengajuan.php">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img src="public/bg/kre.png" style="width: 100%; max-width: 450px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                            </div>
                            <!--end form-group-->
                            <ol class="text-muted mb-2 my-3">
                                <li>Form di bawah ini digunakan untuk mengajukan dan memperbarui data kredensial perawat.</li>
                                <li>Pastikan Anda mengisi seluruh data dengan benar sebelum menekan tombol <strong>Simpan</strong> atau <strong>Ubah</strong>.</li>
                                <li>Jika mengalami kendala teknis atau memiliki pertanyaan terkait pengisian form, silakan hubungi tim IT atau bagian kredensial rumah sakit.</li>
                            </ol>
                            <!--end form-group-->
                            <div class="row">
                            	<div class="col-sm-8 justify-content-center align-self-center text-center">
                            		<!-- Thumbnail -->
									<img src="public/bg/alur.png" 
									     style="width: 100%; max-width: 300px; height: auto; object-fit: cover; cursor:pointer;" 
									     class="img-fluid rounded" 
									     alt="Header Image"
									     data-bs-toggle="modal" 
									     data-bs-target="#imageModal">

									<!-- Modal -->
									<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered modal-lg">
									    <div class="modal-content bg-transparent border-0">
									      <button type="button" class="btn-close ms-auto me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
									      <img src="public/bg/alur.png" class="img-fluid rounded" alt="Header Image Besar">
									    </div>
									  </div>
									</div>
                            	</div>
                            </div>
                            <div class="row mt-2">
                            	<div class="col-sm-12">
                            		<div class="form-group">
		                                <label class="form-label" for="team-leader">Project team members</label>
		                                <ul class="list-inline">
		                                    <li class="list-inline-item">
		                                        <img src="public/resources/assets/images/users/user-10.jpg" alt="user" class="rounded-circle thumb-xs">
		                                    </li>
		                                    <li class="list-inline-item">
		                                        <img src="public/resources/assets/images/users/user-9.jpg" alt="user" class="rounded-circle thumb-xs">
		                                    </li>
		                                    <li class="list-inline-item">
		                                        <img src="public/resources/assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-xs">
		                                    </li>
		                                    <li class="list-inline-item">
		                                        <img src="public/resources/assets/images/users/user-5.jpg" alt="user" class="rounded-circle thumb-xs">
		                                    </li>
		                                    <li class="list-inline-item">
		                                        <img src="public/resources/assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-xs">
		                                    </li>
		                                    <li class="list-inline-item">
		                                        <a href="" class="user-avatar">
		                                            <span class="thumb-xs justify-content-center d-flex align-items-center bg-soft-info rounded-circle fw-semibold">+6</span>
		                                        </a>
		                                    </li>
		                                </ul>
		                                <!-- <input id="add-member" type="file" name="files[]" multiple style='display: none;'> -->
		                            </div>
                            	</div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-6 mb-lg-0">
                                        <label for="projectName" class="form-label">Nama Lengkap : <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai" required value="<?=$data_diri['nama']?>">
                                    </div>
                                    <div class="col-lg-4 col-6 mb-lg-0">
                                        <label for="projectName" class="form-label">NIK : <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="nik" placeholder="Nomor induk Karyawan" required value="<?=$data_diri['nopeg']?>">
                                    </div>
                                    <div class="col-lg-4 col-12 mb-lg-0">
                                        <label for="projectName" class="form-label">Unit : <code class="highlighter-rouge">*</code></label>
                                        <select class="form-select" name="unit" required>
                                            <option value="<?=$data_diri['unit']?>"><?=$data_diri['unit']?></option>
	                                        <option>---Pilih Unit Kerja---</option>
	                                        <?php 
	                                        $sql=$koneksi->query("SELECT * FROM master_unit ORDER BY unit_kerja ASC");
	                                        while ($data=mysqli_fetch_assoc($sql)) 
	                                        {
	                                            ?>
	                                            <option value="<?=$data['unit_kerja']?>"><?=$data['unit_kerja']?></option>
	                                        <?php } ?>
	                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                                        <label class="form-label mt-2">Alamat Email <code class="highlighter-rouge">*</code></label>
                                        <input type="email" class="form-control" name="email" placeholder="Alamat Email Aktif" required value="<?=$data_diri['email']?>">
                                        <small class="form-text text-muted">Pastikan alamat email terisi dengan benar karena hasil pengajuan akan dikirimkan melalui alamat email.</small>
                                    </div>
                                    <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                                        <label class="form-label mt-2">Nomor Telepon <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="telepon" placeholder="Nomor Telepon / Whatsapp" required value="<?=$data_diri['telpon']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-12 col-12 mb-lg-0">
                                    <h4 class="mt-0 card-title mb-2">
                                    	Dokumen
                                    	<button type="button" class="btn btn-icon-circle btn-icon-circle-sm custom-tooltip text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Pastikan Anda Mengupload semua berkas yang diperlukan sesuai dengan sistem">
		                                    <i class="mdi mdi-alert-circle"></i>
		                                </button> 
                                    </h4>
                                    
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="dropdown">
                                              <a href="#" class="btn btn-de-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                Upload Berkas
                                              </a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="ktp">Upload KTP</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="kk">Upload KK</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="ijazah">Upload Ijazah</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="ppni">Upload PPNI</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="sip">Upload SIP</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="str">Upload STR</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="npwp">Upload NPWP</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal" data-jenis="sertifikat">Upload Sertifikat</a>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-de-primary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#modaldetail"> Lihat Detail</a>
                                        </div>
                                    </div>
                                    

                                    <p class="text-muted"><small>Kelengkapan Dokumen :</small></p>
                                    <?php foreach ($files as $kolom => $judul ) : ?>
                                    	<span class="badge bg-soft-dark px-3 py-2 fw-semibold mb-2">
                                    		<?=$judul?>
                                    		<?php if (!empty($berkas[$kolom])): // hanya tampil kalau ada file ?>
                                    			<strong>✔</strong>
                                    		<?php endif; ?>
                                    	</span>
                                    <?php endforeach; ?>
                                        <span class="badge bg-soft-dark px-3 py-2 fw-semibold mb-2">
                                            Sertifikat
                                            <?php if ($sertifikat >= 1): // hanya tampil kalau ada file ?>
                                                <strong>✔</strong>
                                            <?php endif; ?>
                                        </span>

                                    <div class="file-box-content mt-2">
                                        <?php
										$colors = ['text-primary', 'text-success', 'text-danger', 'text-warning', 'text-info', 'text-secondary'];

										foreach ($files as $field => $label): 
										    if (!empty($berkas[$field])):
										        // pilih warna random
										        $randColor = $colors[array_rand($colors)];
										?>
										    <div class="file-box">
										        <a href="public/file/berkas/<?= htmlspecialchars($berkas[$field]) ?>" class="download-icon-link" download>
										            <i class="las la-download file-download-icon"></i>
										        </a>
										        <div class="text-center">
										            <i class="lar la-file-alt <?= $randColor ?>"></i>
										            <h6 class="text-truncate"><?= htmlspecialchars($berkas[$field]) ?></h6>
										            <small class="text-muted"><?= $label ?></small>
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
                                                    <i class="las la-download file-download-icon"></i>
                                                </a>
                                                <div class="text-center">
                                                    <i class="lar la-file-alt <?= $randColor2 ?>"></i>
                                                    <h6 class="text-truncate"><?= htmlspecialchars($data_sertifikat['berkas']) ?></h6>
                                                    <small class="text-muted">Sertifikat</small>
                                                </div>
                                            </div>
                                        <?php } } ?>

                                    </div>
                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-lg-12 col-12 mb-2 mb-lg-0">
                                        <label class="form-label mt-2">Jenjang Saat ini <code class="highlighter-rouge">*</code></label>
                                        <input type="text" class="form-control" name="jenjang_saat_ini" placeholder="Jenjang Karir Saat ini" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-12 col-12 mb-lg-0">
                                    <h4 class="mt-0 card-title mb-3">Jenjang Yang Diajukan</h4>
                                    <div class="row" id="searchBar">
                                    	<div class="col-sm-6 col-12">
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
                                                <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
                                                    <i class="fas fa-filter"></i>
                                                </button>
                                    		</div>
                                    		<small class="form-text text-muted text-center">
                                    			Anda bisa mencari katagori RKK di form pencarian diatas
                                    		</small>
                                    	</div>
                                    </div>
                                    <div class="row">
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
                                </div>
                            </div>
                            <!--end form-group-->
                            <?php 
                            $isComplete = true;
                            $missingFiles = []; // simpan berkas yang belum ada

                            // cek file utama
                            foreach ($files as $field2 => $label2) { 
                                if (empty($berkas[$field2])) {
                                    $isComplete = false;
                                    $missingFiles[] = $label2; 
                                }
                            }

                            // cek sertifikat
                            if ($sertifikat == 0) {
                                $isComplete = false;
                                $missingFiles[] = "Sertifikat";
                            }
                            ?>

                            <?php if ($isComplete): ?>
                                <!-- Kalau sudah lengkap -->
                                <button type="submit" class="btn btn-de-primary btn-sm">Simpan Pengajuan</button>
                                <button type="button" class="btn btn-de-danger btn-sm">Cancel</button>
                            <?php else: ?>
                                <!-- Kalau belum lengkap -->
                                <button type="button" class="btn btn-de-primary btn-sm" 
                                    onclick='showWarning(<?= json_encode($missingFiles) ?>)'>
                                    Simpan Pengajuan
                                </button>
                                <button type="button" class="btn btn-de-danger btn-sm">Cancel</button>
                            <?php endif; ?>


                            <!--end form-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
</form>

<!-- modal upload berkas -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white" id="modalTitle">Upload Berkas</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="app/controller/keperawatan/upload-berkas.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row justify-content-center align-self-center align-items-center text-center">
                        <div class="col-md-12">
                            <img src="public/bg/upload.webp" style="width: 100%; max-width: 300px; height: auto; object-fit: cover;" class="img-fluid rounded" alt="Header Image">
                        </div>    
                    </div>
                    <p class="text-muted">Pastikan file berformat "pdf / jpeg / jpg / png".</p>
                    <input type="hidden" name="jenis" id="jenisInput">
                    <div class="input-group mb-3">
                        <input type="file" 
                           class="form-control" 
                           id="fileInput" 
                           name="berkas" 
                           accept=".pdf,.jpeg,.jpg,.png" 
                           required>
                        <label class="input-group-text" for="fileInput">Upload</label>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 mb-lg-0">
                            <label class="form-label">Tgl Dibuat :</label>
                            <input type="date" class="form-control" name="tgl_dibuat">
                        </div>
                        <div class="col-lg-6 mb-lg-0">
                            <label class="form-label">Tgl Berakhir :</label>
                            <input type="date" class="form-control" name="tgl_berakhir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label">No surat :</label>
                            <input type="text" name="nomor" class="form-control" placeholder="Nomor dari Surat/Sertifikat/Kartu">
                        </div>
                    </div>
                    <div class="row" id="keteranganGroup" style="display: none;">
                        <div class="col-lg-12">
                            <label class="form-label">Keterangan :</label>
                            <textarea name="keterangan" class="form-control" placeholder="Tuliskan keterangan sertifikat... misalnya nama pelatihan, seminar dll"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal filter -->

<div class="modal fade" id="exampleModalDefault" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Filter</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <form>
                <div class="modal-body">
                    <div class="row p-3">
                        <div class="col-lg-12">
                            <h5>Crypto Market Services</h5>
                            <span class="badge bg-soft-secondary">Disable Services</span>
                            <small class="text-muted ml-2">07 Oct 2020</small>
                                <div class="row mb-3 mt-3">
                                    <label class="col-md-3 control-label">Jenis</label>
                                    <div class="col-md-9">
                                        <!-- Jenis -->
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenis" id="jenisPerawat" value="perawat">
                                          <label class="form-check-label" for="jenisPerawat">Perawat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenis" id="jenisBidan" value="bidan">
                                          <label class="form-check-label" for="jenisBidan">Bidan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label class="col-md-3 control-label">Jenjang</label>
                                    <div class="col-md-9">
                                        <!-- Jenjang -->
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenjang" id="jenjang1" value="PK-1">
                                          <label class="form-check-label" for="jenjang1">PK-I</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenjang" id="jenjang2" value="PK-2">
                                          <label class="form-check-label" for="jenjang2">PK-II</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="jenjang" id="jenjang3" value="PK-3">
                                          <label class="form-check-label" for="jenjang3">PK-III</label>
                                        </div>
                                    </div>
                                </div>
                        </div><!--end col-->
                    </div><!--end row-->                                                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-de-primary btn-sm" id="applyFilter">Save changes</button>
                </div>
            </form>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>

<!-- modal detail -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0">Detail Berkas Yang Diupload</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-3">
                    <div class="col-lg-12">
                        <div class="table-responsive-sm">
                            <table class="table table-sm nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Tgl Pembuatan</th>
                                        <th>Tgl Berakhir</th>
                                        <th>No Surat</th>
                                    </tr>
                                </thead>
                                <?php
                                    $no = 1; 
                                    foreach ($files as $jenis_file => $data_jenis_file) : 
                                    $ambil_detail_file = $koneksi->query("SELECT * FROM file_detail WHERE nama_file ='$berkas[$jenis_file]'");
                                    $data_detail = $ambil_detail_file->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><a href="public/file/berkas/<?= htmlspecialchars($berkas[$field]) ?>"><?=$data_jenis_file?></a></td>
                                        <td><?php
                                                if ($data_detail['tgl_keluar'] == '0000-00-00' || empty($data_detail['tgl_keluar'])) {
                                                    echo '';
                                                } else {
                                                    echo date("d/m/Y", strtotime($data_detail['tgl_keluar']));
                                                }
                                            ?>
                                            
                                        </td>
                                        <td><?php
                                                if ($data_detail['tgl_berakhir'] == '0000-00-00' || empty($data_detail['tgl_berakhir'])) {
                                                    echo '';
                                                } else {
                                                    echo date("d/m/Y", strtotime($data_detail['tgl_berakhir']));
                                                }
                                            ?>
                                        </td>
                                        <td><?=$data_detail['no_file']?></td>
                                        <!-- <td></td> -->

                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// script upload berkas
document.querySelectorAll('.dropdown-item').forEach(item => {
      item.addEventListener('click', function() {
        let jenis = this.getAttribute('data-jenis');
        let title = this.textContent;
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('jenisInput').value = jenis;
        // cek jika jenis sertifikat, tampilkan input keterangan
        if (jenis === 'sertifikat') {
            document.getElementById('keteranganGroup').style.display = 'block';
        } else {
            document.getElementById('keteranganGroup').style.display = 'none';
        }
    });
  });

document.querySelector('.scroll-x').addEventListener('wheel', function(e) {
    if (e.deltaY !== 0) {
        e.preventDefault();
        this.scrollLeft += e.deltaY;
    }
});

const fileBoxContent = document.querySelector('.file-box-content');

// === DRAG TO SCROLL ===
let isDown = false;
let startX;
let scrollLeft;

fileBoxContent.addEventListener('mousedown', (e) => {
    isDown = true;
    fileBoxContent.classList.add('active');
    startX = e.pageX - fileBoxContent.offsetLeft;
    scrollLeft = fileBoxContent.scrollLeft;
});

fileBoxContent.addEventListener('mouseleave', () => {
    isDown = false;
    fileBoxContent.classList.remove('active');
});

fileBoxContent.addEventListener('mouseup', () => {
    isDown = false;
    fileBoxContent.classList.remove('active');
});

fileBoxContent.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - fileBoxContent.offsetLeft;
    const walk = (x - startX) * 1.5; // kecepatan geser (1.5 bisa disesuaikan)
    fileBoxContent.scrollLeft = scrollLeft - walk;
});

// === MOUSE WHEEL KE SAMPING ===
fileBoxContent.addEventListener('wheel', (e) => {
    if (e.deltaY !== 0) {
        e.preventDefault();
        fileBoxContent.scrollLeft += e.deltaY; // geser horizontal dengan scroll wheel
    }
});

// pencarian rkk
// fungsi load data dengan query + filter
function loadData(query = '', jenis = '', jenjang = '') {
    const params = new URLSearchParams();
    if (query) params.append('q', query);
    if (jenis) params.append('jenis', jenis);
    if (jenjang) params.append('jenjang', jenjang);

    fetch('app/controller/keperawatan/search.php?' + params.toString())
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
        const jenis = document.querySelector('input[name="jenis"]:checked')?.value || '';
        const jenjang = document.querySelector('input[name="jenjang"]:checked')?.value || '';
        loadData(this.value, jenis, jenjang);
    });

    // Apply filter dari modal
    document.getElementById('applyFilter').addEventListener('click', function() {
        const query = document.getElementById('search').value;
        const jenis = document.querySelector('input[name="jenis"]:checked')?.value || '';
        const jenjang = document.querySelector('input[name="jenjang"]:checked')?.value || '';
        loadData(query, jenis, jenjang);

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('exampleModalDefault'));
        modal.hide();
    });
});


// menampilkan konten ketika di load
function loadDetail(id) {
    fetch('views/keperawatan/req/detail.php?id=' + id)
        .then(response => response.text())
        .then(data => {
            // sembunyikan daftar card & search bar
            document.querySelector('.scroll-x').style.display = 'none';
            document.getElementById('searchBar').style.display = 'none';

            // isi detail + tombol kembali
            document.getElementById('detailContainer').innerHTML = data;

            // datatable
            if ($.fn.DataTable.isDataTable('#datatable_1')) {
                $('#datatable_1').DataTable().destroy();
            }
            $('#datatable_1').DataTable();
        });
}

// tombol menampilkan isi detelah di hide
function showCards() {
    // tampilkan lagi daftar card & search bar
    document.querySelector('.scroll-x').style.display = 'block';
    document.getElementById('searchBar').style.display = 'block';

    // kosongkan detail
    document.getElementById('detailContainer').innerHTML = '';
}


// alert kalau berkas belum lengkap upload berkas 

function showWarning(missing) {
    let list = "<div style='text-align:left;font-size:15px;line-height:1.6'>";
    missing.forEach(file => {
        list += `
            <div style="display:flex;align-items:center;margin-bottom:5px;">
                <span style="color:#e74c3c;font-size:18px;margin-right:8px;">❌</span>
                <span>${file}</span>
            </div>
        `;
    });
    list += "</div>";

        Swal.fire({
        imageUrl: 'public/bg/alert.webp',
        imageWidth: 330,
        imageHeight: 230,
        imageAlt: 'Custom Icon',
        title: 'Lengkapi Berkas!',
        html: `
            <p style="margin-bottom:10px;font-size:14px;color:#555">
                Anda harus mengunggah semua berkas berikut sebelum menyimpan pengajuan:
            </p>
            ${list}
        `,
        confirmButtonText: '📂 Mengerti',
        confirmButtonColor: '#3085d6',
        background: '#fdfdfd',
        width: 430
    });

}


</script>
