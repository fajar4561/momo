<?php 
if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="row mb-3"><div class="p-2"><div id="pesan" class="alert alert-'.$_SESSION['warna'].' alert-dismissible fade show border-0 b-round" role="alert"><strong>'.$_SESSION['info'].'</strong> '.$_SESSION['pesan'].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';
}
$_SESSION['pesan'] = '';
?>
<?php
require 'env/koneksi.php';
require 'env/tgl_indo.php';
$n = $pecahuser['nopeg'];
// Dekripsi data

$ambil = $koneksi->query("SELECT * FROM pegawai WHERE nopeg='$n'");
$pecah = $ambil->fetch_assoc();

$tgl_lahir = $pecah['tgl_lahir'];
// Buat objek DateTime dari tanggal lahir
$tanggal_lahir = new DateTime($tgl_lahir);

    // Buat objek DateTime dari tanggal hari ini
$today = new DateTime();

    // Hitung selisih antara tanggal lahir dan tanggal hari ini
$diff = $tanggal_lahir->diff($today);

    // Formatkan hasil usia
$usia = $diff->y . ' tahun ' . $diff->m . ' bulan';

$telepon = $pecah['telpon'];

// Menghapus karakter selain angka (jika ada)
$telepon = preg_replace('/\D/', '', $telepon);

// Mengganti awalan '08' dengan '628'
if (substr($telepon, 0, 2) === '08') {
    $telepon = '628' . substr($telepon, 2);
}




?>

<?php if (isMobileDevice()) { ?>
    <style>
        .leftbar-tab-menu {
            display: none; /* Menyembunyikan menu saat halaman dimuat */
        }
    </style>
<?php } ?>

<div class="row">
    <div class="col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title">Personal Information</h4>                      
                    </div><!--end col-->                                                       
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <tr>
                                <th>NIP</th>
                                <th>:</th>
                                <td><?=$pecah['nopeg']?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <td><?=$pecah['nama']?></td>
                            </tr>
                            <tr>
                                <th>NO KTP</th>
                                <th>:</th>
                                <td><?=$pecah['nik']?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <th>:</th>
                                <td><?=$pecah['gender']?></td>
                            </tr>
                            <tr>
                                <th>TTL</th>
                                <th>:</th>
                                <td><?=ucwords($pecah['tmpt_lahir'])?>, <?=tgl_indo($pecah['tgl_lahir'])?></td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <th>:</th>
                                <td><?=$usia?></td>
                            </tr>
                            <tr>
                                <th>Alamat KTP</th>
                                <th>:</th>
                                <td><?=$pecah['alamat']?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <td><?=$pecah['alamat2']?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <th>:</th>
                                <td><?=$pecah['ijazah']?></td>
                            </tr>
                            <tr>
                                <th>Status Kawin</th>
                                <th>:</th>
                                <td><?=$pecah['status_kawin']?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td><?=$pecah['email']?></td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <th>:</th>
                                <td><?=$telepon?></td>
                            </tr>
                            <tr>
                                <th>Unit Kerja</th>
                                <th>:</th>
                                <td><?=$pecah['unit']?></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <th>:</th>
                                <td><?=$pecah['jabatan']?></td>
                            </tr>
                            <tr>
                                <th>Masa Kerja</th>
                                <th>:</th>
                                <td><?=$pecah['masa']?></td>
                            </tr>
                        </table>
                    </div>
                </div>                                                 
            </div>                                            
        </div>
    </div> <!--end col--> 
    <div class="col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ubah profil</h4>
                    </div><!--end card-header-->
                    <form action="<?=$link?>app/controller/pengguna/ubah-password.php" method="post" enctype="multipart/form-data">
                        <div class="card-body"> 
                             <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Ijazah</label>
                                <div class="col-lg-9 col-xl-8">
                                     <select class="form-select form-control" name="ijazah">
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
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NO KTP</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" name="noktp" placeholder="Nomor KTP">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat</label>
                                <div class="col-lg-9 col-xl-8">
                                   <textarea class="form-control" name="alamat" placeholder="Alamat Sesuai KTP"></textarea>
                                </div>
                            </div>
                             <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat Saat ini</label>
                                <div class="col-lg-9 col-xl-8">
                                    <textarea class="form-control" name="alamat2" placeholder="Alamat Tempat Tinggal Saat ini (Kosongkan Apabila sama dengan alamat KTP)" rows="3"></textarea>
                                </div>
                            </div>
                             <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Status Perkawinan</label>
                                <div class="col-lg-9 col-xl-8">
                                     <select class="form-select" name="kawin">
                                        <option value="">--- Pilih Status Perkawinan ---</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Tanggal Lahir</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="date" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="email" name="email" placeholder="Alamat Email">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NO Telephone</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" name="telepon" placeholder="Nomor Telephone / Whtasapp">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="hidden" name="id" value="<?=$pecah['id']?>">
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Kata Sandi Baru">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Ulangi Password</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="password" id="konfirmasiPassword" placeholder="Ulangi Password" onkeyup="confirmPassword()">
                                    <div class="invalid-feedback">
                                      * Password tidak sama!<br>
                                      * Pastikan password sama !<br>
                                      * Pastikan Jumlah password 6 karakter
                                  </div>
                              </div>
                          </div>
                          <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"> </label>
                            <div class="col-lg-9 col-xl-8">
                                <div class="form-check form-check-inline switch">
                                    <input type="checkbox" class="form-check-input" id="lihatPassword" onclick="showHide()">
                                    <label class="form-label" for="lihatPassword">Lihat Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control" type="file" name="foto">
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                <button type="submit" class="btn btn-de-primary" name="btn_simpan" >Ubah</button>
                            </div>
                        </div>   
                    </div><!--end card-body-->
                </form>
            </div><!--end card-->
        </div>
        <div class="col-lg-12">

        </div>
    </div>
</div> <!-- end col -->                                                                              
</div><!--end row-->