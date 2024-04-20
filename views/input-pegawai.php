<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Pegawai</h4>
                <p class="text-muted mb-0">Halaman ini digunakan untuk memasukkan informasi pegawai baru ke dalam sistem. Silakan lengkapi formulir di bawah untuk menambahkan detail pegawai.
                </p>
            </div><!--end card-header-->
            <div class="card-body">  
                <div class="row">
                    <form>
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">NIP</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nopeg" placeholder="Nomor Induk Pegawai" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-sm-2 col-form-label text-end">Nama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Nama Lengkap Pegawai" required>
                                </div>
                            </div> 
                            <div class="mb-3 row">
                                <label for="example-tel-input" class="col-sm-2 col-form-label text-end">NIK</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Nomor Induk Keluarga" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-end">Gender</label>
                                <div class="col-sm-10 p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Laki-laki" checked>
                                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="perempuan">
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Tempat Lahir Pegawai" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Tgl Lahir</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="tgl_lahir" required>
                                </div>
                            </div> 
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label text-end">Jabatan</label>
                                <div class="col-sm-10">
                                    <select id="default">
                                        <option value="value-1">Value 1</option>
                                        <option value="value-2">Value 2</option>
                                        <option value="value-3">Value 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input-lg" class="col-sm-2 col-form-label text-end">Large</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" id="example-text-input-lg">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input-sm" class="col-sm-2 col-form-label text-end">Small</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" id="example-text-input-sm">
                                </div>
                            </div>   
                            <div class="mb-3 mb-lg-0 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label text-end">Search</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                </div>
                            </div>                                 
                        </div>
                    </form>
                </div>                                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->