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
 

$tanggal_hari_ini = new DateTime();
$tanggal_masuk = new DateTime($pecah['tmt']);
$selisih = $tanggal_masuk->diff($tanggal_hari_ini);
$sk_tahun = $selisih->y;
$sk_bulan = $selisih->m;
$sk_bulan += $sk_tahun * 12;
$sk_tahun = floor($sk_bulan / 12);
$sk_bulan = $sk_bulan % 12;

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
                                <td><?=$pecah['jabatan']?> <a href="#" class="btn btn-primary btn-sm btn-square btn-outline-dashed" id="btnTambah" name="btn_tmbh"><i class="fas fa-plus"></i></a></td>
                            </tr>
                            <tr>
                            <?php 
                                // chek apakah ada jabatan lainnya
                                $ambil_jab = $koneksi->query("SELECT * FROM pegawai_jabatan WHERE nopeg='$n'");
                                $ada_jabatan = $ambil_jab->num_rows;

                                if ($ada_jabatan >= 0) {
                            ?>
                            
                                <th></th>
                                <th></th>
                                <td>
                                    <?php 
                                        // Array warna
                                        $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-secondary'];

                                        // Inisialisasi index warna
                                        $colorIndex = 0;

                                        while ($fetch_jabatan = mysqli_fetch_assoc($ambil_jab)) {
                                            // Ambil warna berdasarkan index
                                            $badgeColor = $colors[$colorIndex];

                                            // Tingkatkan index, reset jika sudah mencapai akhir array
                                            $colorIndex = ($colorIndex + 1) % count($colors);
                                    ?>
                                        <span class="badge <?=$badgeColor?>"><?=$fetch_jabatan['jabatan']?> <a href="app/controller/pegawai/hapus-jabatan.php?id=<?=$fetch_jabatan['id']?>"> &nbsp;<i class="fas fa-times"></i></a></span>
                                    <?php 
                                        }
                                    ?>
                                </td>

                            

                            <?php } ?>
                            </tr>
                            <tr id="formRow" style="display: none;">
                                <td colspan="3">
                                    <form method="post" action="app/controller/pegawai/simpan-jabatan.php" id="mainForm">
                                        <div id="formContainer">
                                            <div class="form-group mt-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="jabatan[]" placeholder="Masukkan Jabatan" style="width: 200px;">
                                                    <input type="hidden" name="nopeg" value="<?=$pecah['nopeg']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Div untuk menampilkan hasil autocomplete -->
                                        <div id="autocompleteResults" class="autocomplete-results"></div>

                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-success btn-sm btn-square btn-outline-dashed">Simpan</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-square btn-outline-dashed" id="btnBatal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Masa Kerja</th>
                                <th>:</th>
                                <td><?=$sk_tahun?> Tahun <?=$sk_bulan?> Bulan</td>
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
<script> 
    const jabatanInput = document.querySelector("#formContainer");  // Seleksi container form untuk delegasi
    const autocompleteResults = document.getElementById("autocompleteResults");
    const btnBatal = document.getElementById("btnBatal");
    const formRow = document.getElementById("formRow");

    // Daftar jabatan (dapat diambil dari database atau array PHP yang sudah diproses)
    const jabatanList = [
        <?php 
            $sql = $koneksi->query("SELECT DISTINCT jabatan FROM master_pegawai ORDER BY jabatan ASC");
            while ($dat = mysqli_fetch_assoc($sql)) { 
                echo '"'.ucwords($dat['jabatan']).'",';
            }
        ?>
    ];

    // Fungsi untuk memfilter dan menampilkan hasil autocomplete
    function setupAutocomplete(inputElement) {
        inputElement.addEventListener("input", function() {
            const query = inputElement.value.toLowerCase();
            if (query) {
                const filteredResults = jabatanList.filter(item => item.toLowerCase().includes(query));

                // Menampilkan hasil autocomplete
                autocompleteResults.innerHTML = filteredResults.map(item => `
                    <div class="result-item">${item}</div>
                `).join("");

                // Menambahkan event listener untuk memilih hasil dari autocomplete
                const resultItems = autocompleteResults.querySelectorAll(".result-item");
                resultItems.forEach(item => {
                    item.addEventListener("click", function() {
                        inputElement.value = item.textContent; // Set input value ke yang dipilih
                        autocompleteResults.innerHTML = ""; // Menghapus hasil setelah dipilih
                    });
                });
            } else {
                autocompleteResults.innerHTML = ""; // Jika tidak ada input, sembunyikan hasil
            }
        });

        // Menambahkan event focus untuk menampilkan hasil autocomplete otomatis
        inputElement.addEventListener("focus", function() {
            const query = inputElement.value.toLowerCase(); // Ambil nilai dari input
            if (query) {
                const filteredResults = jabatanList.filter(item => item.toLowerCase().includes(query));
                autocompleteResults.innerHTML = filteredResults.map(item => `
                    <div class="result-item">${item}</div>
                `).join(""); // Tampilkan hasil
            } else {
                autocompleteResults.innerHTML = jabatanList.map(item => `
                    <div class="result-item">${item}</div>
                `).join(""); // Tampilkan semua jika input kosong
            }

            // Menambahkan event listener setelah hasil autocomplete ditampilkan
            const resultItems = autocompleteResults.querySelectorAll(".result-item");
            resultItems.forEach(item => {
                item.addEventListener("click", function() {
                    inputElement.value = item.textContent; // Set input value ke yang dipilih
                    autocompleteResults.innerHTML = ""; // Menghapus hasil setelah dipilih
                });
            });
        });
    }

    // Menambahkan autocomplete untuk input yang pertama kali ada
    setupAutocomplete(jabatanInput.querySelector("input"));

    // Fungsi untuk menambah input baru
    const btnTambah = document.getElementById("btnTambah");

    btnTambah.addEventListener("click", function(event) {
        event.preventDefault();

        // Tampilkan form jika belum tampil
        if (formRow.style.display === "none") {
            formRow.style.display = ""; // Tampilkan form
        } else {
            // Tambahkan input baru dengan tombol hapus
            const newInputGroup = document.createElement("div");
            newInputGroup.classList.add("form-group", "mt-2");
            newInputGroup.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" name="jabatan[]" placeholder="Masukkan Jabatan" style="width: 200px;">
                    <button type="button" class="btn btn-danger btn-sm btn-remove" style="margin-left: 5px;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            formContainer.appendChild(newInputGroup);

            // Menambahkan event listener untuk autocomplete pada input baru
            setupAutocomplete(newInputGroup.querySelector("input"));

            // Tambahkan event listener untuk tombol hapus
            const btnRemove = newInputGroup.querySelector(".btn-remove");
            btnRemove.addEventListener("click", function() {
                newInputGroup.remove(); // Hapus input group
            });
        }
    });

    // Fungsi untuk menyembunyikan form ketika tombol Batal ditekan
    btnBatal.addEventListener("click", function() {
        formRow.style.display = "none"; // Sembunyikan form
        autocompleteResults.innerHTML = ""; // Bersihkan hasil autocomplete
    });
</script>

<!-- CSS untuk styling autocomplete -->
<style>
    /* Gaya untuk menampilkan hasil autocomplete */
.autocomplete-results {
    border: none; /* Menghapus border yang mengganggu */
    max-height: 200px;
    overflow-y: auto;
    position: absolute;
    z-index: 1000;
    width: 270px;
    background-color: #fff;
    
    border-radius: 5px; /* Memberikan sudut membulat pada kotak */
    padding: 5px 0; /* Padding untuk jarak hasil */
    transition: all 0.3s ease-in-out; /* Animasi transisi */
}

/* Gaya untuk item hasil pencarian */
.result-item {
    padding: 12px 15px;
    cursor: pointer;
    font-size: 14px;
    color: #333;
    transition: background-color 0.3s ease, color 0.3s ease; /* Transisi perubahan warna */
}

/* Efek hover pada item */
.result-item:hover {
    background-color: #007bff; /* Background biru saat hover */
    color: white; /* Warna teks putih saat hover */
}

/* Gaya untuk input dengan border yang lebih bersih */
input[type="text"] {
    border-radius: 5px; /* Memberikan sudut membulat pada input */
    padding: 10px 15px;
    border: 1px solid #ddd;
    font-size: 14px;
    width: 100%; /* Menyesuaikan lebar input */
    box-sizing: border-box;
    transition: border 0.3s ease; /* Transisi border saat focus */
}

/* Efek saat input fokus */
input[type="text"]:focus {
    border-color: #007bff; /* Ganti border menjadi biru */
    outline: none; /* Menghilangkan outline default */
}

/* Styling untuk tombol hapus */
.btn-remove {
    background-color: #ff4e4e;
    border: none;
    color: white;
    font-size: 16px;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Efek hover pada tombol hapus */
.btn-remove:hover {
    background-color: #ff3333;
}

</style>