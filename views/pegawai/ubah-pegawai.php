<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';

$nip = $_GET['n'];

$ambil = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$nip'");
$data = $ambil->fetch_assoc();


?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Pegawai</h4>
                <p class="text-muted mb-0">Halaman ini digunakan untuk memasukkan informasi pegawai baru ke dalam sistem. Silakan lengkapi formulir di bawah untuk menambahkan detail pegawai.
                </p>
            </div><!--end card-header-->
            <div class="card-body">  
                <form method="post" action="<?=$link?>app/controller/pegawai/ubah-pegawai.php" enctype="multipart/form-data">
                   <div class="row">
                            <div class="col-lg-12">
                                <h5>Form Ubah Data</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-end">NIP <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" value="<?=$data['nopeg']?>" type="text" name="nopeg" placeholder="Nomor Induk Pegawai" readonly>
                                                <input type="hidden" name="id" value="<?=$data['id']?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label text-end">Nama <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="<?=$data['nama']?>" name="nama" placeholder="Nama Lengkap Pegawai" required>
                                            </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-end">NIK <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="<?=$data['nik']?>" name="nik" placeholder="Nomor Induk Keluarga">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-end">Agama<code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="agama">
                                                    <option value="<?=$data['agama']?>"><?=$data['agama']?></option>
                                                    <option value="">---Pilih Agama---</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-end">Gender <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10 p-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-laki" <?php if ($data["gender"]=="Laki-laki") {echo "checked"; } ?>>
                                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Perempuan" <?php if ($data["gender"]=="Perempuan") {echo "checked"; } ?>>
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-2 col-form-label text-end">Tmpt Lahir <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="<?=$data['tmpt_lahir']?>" name="tmpt_lahir" placeholder="Tempat Lahir Pegawai" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Tgl Lahir <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" name="tgl_lahir" value="<?=$data['tgl_lahir']?>">
                                            </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-end">Jabatan<code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jabatan" required>
                                                    <option value="<?=$data['jabatan']?>"><?=$data['jabatan']?></option>
                                                    <option value="">---Pilih Jabatan---</option>
                                                    <?php 
                                                    $sql=$koneksi->query("SELECT * FROM master_pegawai ORDER BY jabatan ASC");
                                                    while ($dat=mysqli_fetch_assoc($sql)) 
                                                    {
                                                        ?>
                                                        <option value="<?=$dat['jabatan']?>"><?=$dat['jabatan']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-end">Unit<code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="unit" required>
                                                    <option value="<?=$data['unit']?>"><?=$data['unit']?></option>
                                                    <option value="">---Pilih Unit---</option>
                                                    <?php 
                                                    $sql=$koneksi->query("SELECT * FROM master_unit ORDER BY unit_kerja ASC");
                                                    while ($dat=mysqli_fetch_assoc($sql)) 
                                                    {
                                                        ?>
                                                        <option value="<?=$dat['unit_kerja']?>"><?=$dat['unit_kerja']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">TMT <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" name="tmt" value="<?=$data['tmt']?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">SKPT <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="date" name="skpt" value="<?=$data['skpt']?>" required>
                                            </div>
                                        </div>                                 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-end">Ijazah <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="ijazah">
                                                    <option value="<?=$data['ijazah']?>"><?=$data['ijazah']?></option>
                                                    <option value="">---Pilih Ijazah---</option>
                                                    <option value="SMA">SMA/SMK</option>
                                                    <option value="DI">DI</option>
                                                    <option value="DII">DII</option>
                                                    <option value="DIII">DIII</option>
                                                    <option value="DIV">DIV</option>
                                                    <option value="SI">SI</option>
                                                    <option value="SII">SII</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Alamat <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Tempat Tinggal Karyawan"><?=$data['alamat']?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Email <code class="highlighter-rouge">*</code></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="<?=$data['email']?>" name="email" placeholder="Alamat Email">
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-sm-2 col-form-label text-end">Status Kawinan</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="kawin">
                                                    <option value="<?=$data['status_kawin']?>"><?=$data['status_kawin']?></option>
                                                    <option value="">--- Pilih Status Perkawinan ---</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                                    <option value="Cerai Mati">Cerai Mati</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-end">Status Pegawai</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="status_pegawai" required>
                                                    <option value="<?=$data['status_pegawai']?>"><?=$data['status_pegawai']?></option>
                                                    <option value="">--- Pilih Status Pegawai ---</option>
                                                    <option value="KONTRAK">KONTRAK</option>
                                                    <option value="TETAP">TETAP</option>
                                                    <option value="RESIGN">RESIGN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Telepon</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="<?=$data['telpon']?>" name="telpon" placeholder="Nomor Telepon / WA Pegawai" >
                                            </div>
                                        </div>
                                        <?php if ($session_akses==1) { ?>
                                            <input class="form-control" type="hidden" value="<?=$data['username']?>" name="username" placeholder="Username Pegawai" >
                                            <div class="mb-3 row">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Pswd</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="password" placeholder="Kata Sandi Pegawai">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Foto</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" name="foto" >
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <input class="form-control" type="hidden" name="password" placeholder="Kata Sandi Pegawai">
                                            <input class="form-control" type="hidden" name="foto" >
                                        <?php } ?>
                                        <div class="mb-3 row">
                                 <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end"> </label>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a class="btn btn-danger" href="../data-pegawai">Kembali</a>
                                    
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    
                </form>                                                                     
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<script src="env/js/notif.js"></script>
