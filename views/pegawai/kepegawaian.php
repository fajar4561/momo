<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
	echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
require 'env/koneksi.php';
require 'env/tgl_indo.php';

?>

<?php if (isMobileDevice()) { ?>
	<style>
		.leftbar-tab-menu {
			display: none; /* Menyembunyikan menu saat halaman dimuat */
		}
	</style>
<?php } ?>
<div class="row p-3">
	<div class="col-lg-3">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">                      
						<div class="card-header">
							<ul class="list-unstyled topbar-nav mb-0">
								<li class="hide-phone app-search">
									<form role="search" action="#" method="post">
										<input type="search" name="cari" class="form-control top-search mb-0" placeholder="Cari Berdasarkan Nama atau Unit Kerja...">
										<button type="submit"><i class="ti ti-search"></i></button>
									</form>
								</li>
							</ul>
							       
						</div>                      
					</div><!--end col-->
				</div>  <!--end row-->                                  
			</div><!--end card-header-->
			<div class="card-body">
				<div class="files-nav">                                     
					<div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
						<?php
							$batas = 10;
							$page = isset($_GET['page'])?(int)$_GET['page'] : 1;
							$halaman_awal = ($page>1) ? ($page * $batas) - $batas : 0;
							$previous = $page - 1;
							$next = $page + 1;
							$dat = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nopeg !=123 ORDER BY nama ASC");
							$jumlah_data = mysqli_num_rows($dat);
							$total_halaman = ceil($jumlah_data / $batas);
							if(isset($_POST['cari'])){
								$cari = $_POST['cari'];
								$data = $koneksi-> query("SELECT * FROM pegawai WHERE nopeg !=123 AND (nama LIKE '%" . $cari . "%' OR unit LIKE '%" . $cari . "%')");       
							}else{
								$data = $koneksi->query("SELECT * FROM pegawai WHERE nopeg !=123 ORDER BY nama ASC LIMIT $halaman_awal, $batas");   
							}
							while($d = mysqli_fetch_assoc($data)){

                            $aktive = isset($_GET['nopeg']) && $_GET['nopeg'] == $d['nopeg'] ? 'active' : '';
                        ?>
						 <a class="nav-link <?= $aktive ?>" id="files-projects-tab<?= $d['nopeg'] ?>" data-bs-toggle="pill" href="#files-projects<?= $d['nopeg'] ?>" aria-selected="<?= $aktive == 'active' ? 'true' : 'false' ?>">

							<i data-feather="folder" class="align-self-center icon-dual-file icon-sm me-2"></i>
							<div class="d-inline-block align-self-center">
								<h5 class="m-0"><?=$d['nama']?></h5>
								<small><?=$d['unit']?></small>                                                    
							</div>
						</a>
						<?php } ?>
					</div>
				</div>
			</div><!--end card-body-->
			<?php if (!isset($_POST['cari'])) { ?>
			<div class="card-body">
				<div class="row justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" <?php if($page > 1) { if (isset($_GET['page'])) { echo "href='$previous'"; } else {echo "href='kepegawaian/$previous'";}  }?> aria-label="Previous">
									<span aria-hidden="true">«</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<?php
							$max_halaman = 8;
							if ($total_halaman > $max_halaman) {
								$mulai = max(1, $page - floor($max_halaman / 2));
								$akhir = min($mulai + $max_halaman - 1, $total_halaman);
							} else {
								$mulai = 1;
								$akhir = $total_halaman;
							} 
							for ($x = $mulai; $x <= $akhir; $x++) {
								$aktive = ($x == $page) ? 'active' : '';
								?>
								<li class="page-item <?=$aktive?> "><a class="page-link" <?php if (isset($_GET['page'])) { echo "href='$x'"; } else {echo "href='kepegawaian/$x'";} ?>><?php echo $x; ?></a></li>
								<?php } ?>
							<li class="page-item">
								<a class="page-link" <?php if($page < $total_halaman) { if (isset($_GET['page'])) { echo "href='$next'"; } else {echo "href='kepegawaian/$next'";}  } ?>aria-label="Next">
									<span aria-hidden="true">»</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul><!--end pagination-->
					</nav>
				</div>
			</div>
			<?php } ?>
		</div><!--end card-->
	</div>
	<div class="col-lg-9">
		<div class="">                                    
			<div class="tab-content" id="files-tabContent">
				<div class="float-end">
					                                    
				</div>
				<?php
                $data->data_seek(0); // Reset kursor data
                while ($d = mysqli_fetch_assoc($data)) { 
                    $aktive = isset($_GET['nopeg']) && $_GET['nopeg'] == $d['nopeg'] ? 'active show' : '';

                    // ambil data berkas
                    $koneksi_berkas = $koneksi->query("SELECT * FROM file WHERE nopeg='" . $d['nopeg'] . "'");
					$berkas = $koneksi_berkas->fetch_assoc();
					
					// ktp
					$ktp = $berkas['KTP'];
					$file_extension = pathinfo($ktp, PATHINFO_EXTENSION);
					$file_path = 'public/file/berkas/'.$ktp;
					$file_size = filesize($file_path) / 1024;
					
					if ($file_extension=='pdf') {
						$format ='la-file-code text-danger';
					}
					else if ($file_extension=='zip') {
						$format ='la-file-archive text-warning';
					}
					else {
						$format ='la-file text-secondary';
					}

					// file kk
					$kk = $berkas['KK'];
					$file_kk = pathinfo($kk, PATHINFO_EXTENSION);
					$file_path_kk = 'public/file/berkas/'.$kk;
					$file_size_kk = filesize($file_path_kk) / 1024;
					
					if ($file_kk=='pdf') {
						$format_kk ='la-file-code text-danger';
					}
					else if ($file_kk=='zip') {
						$format_kk ='la-file-archive text-warning';
					}
					else {
						$format_kk ='la-file text-secondary';
					}
					
					// ijazah
					$ijazah = $berkas['IJAZAH'];
					$file_ijazah = pathinfo($ijazah, PATHINFO_EXTENSION);
					$file_path_ijazah = 'public/file/berkas/'.$ijazah;
					$file_size_ijazah = filesize($file_path_ijazah) / 1024;
					
					if ($file_ijazah=='pdf') {
						$format_ijazah ='la-file-code text-danger';
					}
					else if ($file_ijazah=='zip') {
						$format_ijazah ='la-file-archive text-warning';
					}
					else {
						$format_ijazah ='la-file text-secondary';
					}

					// ppni
					$ppni = $berkas['PPNI'];
					$file_ppni = pathinfo($ppni, PATHINFO_EXTENSION);
					$file_path_ppni = 'public/file/berkas/'.$ppni;
					$file_size_ppni = filesize($file_path_ppni) / 1024;
					
					if ($file_ppni=='pdf') {
						$format_ppni ='la-file-code text-danger';
					}
					else if ($file_ppni=='zip') {
						$format_ppni ='la-file-archive text-warning';
					}
					else {
						$format_ppni ='la-file text-secondary';
					}

					// sip
					$sip = $berkas['SIP'];
					$file_sip = pathinfo($sip, PATHINFO_EXTENSION);
					$file_path_sip = 'public/file/berkas/'.$sip;
					$file_size_sip = filesize($file_path_sip) / 1024;
					
					if ($file_sip=='pdf') {
						$format_sip ='la-file-code text-danger';
					}
					else if ($file_sip=='zip') {
						$format_sip ='la-file-archive text-warning';
					}
					else {
						$format_sip ='la-file text-secondary';
					}

					// str
					$str = $berkas['STR'];
					$file_str = pathinfo($str, PATHINFO_EXTENSION);
					$file_path_str = 'public/file/berkas/'.$str;
					$file_size_str = filesize($file_path_str) / 1024;
					
					if ($file_str=='pdf') {
						$format_str ='la-file-code text-danger';
					}
					else if ($file_str=='zip') {
						$format_str ='la-file-archive text-warning';
					}
					else {
						$format_str ='la-file text-secondary';
					}

					$npwp = $berkas['NPWP'];
					$file_npwp = pathinfo($npwp, PATHINFO_EXTENSION);
					$file_path_npwp = 'public/file/berkas/'.$npwp;
					$file_size_npwp = filesize($file_path_npwp) / 1024;
					
					if ($file_npwp=='pdf') {
						$format_npwp ='la-file-code text-danger';
					}
					else if ($file_npwp=='zip') {
						$format_npwp ='la-file-archive text-warning';
					}
					else {
						$format_npwp ='la-file text-secondary';
					}

                ?>
				<div class="tab-pane fade <?= $aktive ?>" id="files-projects<?= $d['nopeg'] ?>">
					
					<h4 class="card-title mt-0 mb-3">Berkas-berkas <span class="badge rounded-pill badge-outline-primary"><?=$d['nama']?></span></h4>                                         
					<div class="file-box-content">
					<?php if (!empty($ktp) || !empty($kk) || !empty($ijazah) || !empty($ppni) || !empty($sip) || !empty($str) || !empty($npwp)) { ?>
						<?php if (!empty($ktp)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format?>"></i>
								<h6 class="text-truncate"><?=$ktp?></h6>
								<small class="text-muted"><?=round($file_size)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>

						<?php if (!empty($kk)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path_kk?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format_kk?>"></i>
								<h6 class="text-truncate"><?=$kk?></h6>
								<small class="text-muted"><?=round($file_size_kk)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>

						<?php if (!empty($ijazah)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path_ijazah?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format_ijazah?>"></i>
								<h6 class="text-truncate"><?=$ijazah?></h6>
								<small class="text-muted"><?=round($file_size_ijazah)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>

						<?php if (!empty($ppni)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path_ppni?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format_ppni?>"></i>
								<h6 class="text-truncate"><?=$ppni?></h6>
								<small class="text-muted"><?=round($file_size_ppni)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>

						<?php if (!empty($sip)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path_sip?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format_sip?>"></i>
								<h6 class="text-truncate"><?=$sip?></h6>
								<small class="text-muted"><?=round($file_size_sip)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>

						<?php if (!empty($str)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path_str?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format_str?>"></i>
								<h6 class="text-truncate"><?=$str?></h6>
								<small class="text-muted"><?=round($file_size_str)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>

						<?php if (!empty($npwp)) { ?>
						<div class="file-box">
							<a href="<?=$link.$file_path_npwp?>" class="download-icon-link" target='_blank'>
								<i class="las la-download file-download-icon"></i>
							<div class="text-center">
								<i class="lar <?=$format_npwp?>"></i>
								<h6 class="text-truncate"><?=$npwp?></h6>
								<small class="text-muted"><?=round($file_size_npwp)?> Kb</small>
							</div>                                                        
							</a>
						</div>
						<?php } ?>
					<?php } else { ?> 
						<center><h5>Berkas Masih Kosong</h5></center>
					<?php } ?>                                 
					</div> 
				</div><!--end tab-pane-->
				<?php } ?>
			</div>  <!--end tab-content-->                                                                              
		</div><!--end card-body-->
	</div>
</div>
