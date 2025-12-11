<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

 
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
            document.getElementById('tgl').style.display = 'flex';
        } 
        else if (['foto', 'portofolio'].includes(jenis)) {
            document.getElementById('tgl').style.display = 'none';
            document.getElementById('nosurat').style.display = 'none';
        }
        else {
            document.getElementById('keteranganGroup').style.display = 'none';
             document.getElementById('tgl').style.display = 'flex';
            document.getElementById('nosurat').style.display = 'block';
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
            document.querySelector('.scroll-x').style.display = 'none';
            document.getElementById('searchBar').style.display = 'none';

            document.getElementById('detailContainer').innerHTML = data;

            // init wizard setelah html dimasukkan
            initWizard();

            // datatable
            if ($.fn.DataTable.isDataTable('#datatable_1')) {
                $('#datatable_1').DataTable().destroy();
            }
            $('#datatable_1').DataTable();
        });
}

$('#form_rkk').on('submit', function(e) {
    e.preventDefault(); // STOP submit dulu
    var form = this;    // simpan form

    var table = $('#datatable_1').DataTable();

    // Ambil semua input dari semua halaman
    table.$('input[type=radio]:checked').each(function() {
        var name = $(this).attr('name');
        var value = $(this).val();

        // kalau hidden input belum ada → buat baru
        if ($('#form_rkk input[type=hidden][name="'+name+'"]').length === 0) {
            $('<input>').attr({
                type: 'hidden',
                name: name,
                value: value
            }).appendTo('#form_rkk');
        } else {
            // kalau sudah ada → update
            $('#form_rkk input[type=hidden][name="'+name+'"]').val(value);
        }
    });

    // 🔹 tampilkan SweetAlert2 loading
    Swal.fire({
        title: 'Sedang diproses...',
        html: `
            <div style="padding:10px;">
                <lottie-player 
                    src="public/bg/loading.json" 
                    background="transparent"
                    speed="1"
                    style="width: 220px; height: 220px; margin:auto;"
                    loop autoplay>
                </lottie-player>

                <h4 style="margin-top: 10px; font-weight:600; color:#2b2b2b;">
                    Sedang Diproses...
                </h4>
                <p id="loadingText" style="font-size:14px; color:#555;">
                    Mohon tunggu sebentar
                </p>
            </div>
        `,
        allowOutsideClick: false,
        showConfirmButton: false,
        background: 'rgba(255,255,255,0.9)',
        width: 380,
        didOpen: () => {
            let steps = [
                "Mengecek data file...",
                "Validasi data...",
                "Menyimpan ke database...",
            ];
            let i = 0;
            setInterval(() => {
                document.getElementById('loadingText').innerText = steps[i];
                i = (i + 1) % steps.length;
            }, 1500);

            // ⏳ submit form setelah 1 detik
            setTimeout(() => {
                form.submit(); // SUBMIT manual
            }, 1000);
        }
    });

});


// simpan session yang dinput

$(document).ready(function() {

    // Saat modal detail akan dibuka
    $('#uploadModal').on('show.bs.modal', function () {
        var form = $('#form_rkk');
        var formData = {
            nama: form.find('[name="nama"]').val(),
            nik: form.find('[name="nik"]').val(),
            unit: form.find('[name="unit"]').val(),
            email: form.find('[name="email"]').val(),
            telepon: form.find('[name="telepon"]').val(),
            jenjang_saat_ini: form.find('[name="jenjang_saat_ini"]').val()
        };

        $.ajax({
            url: 'app/controller/keperawatan/req/save_session.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log('✅ Session response:', response);
            },
            error: function(xhr, status, error) {
                console.error('❌ Gagal simpan session:', error);
            }
        });
    });
});

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

$(document).on('click', '.btn-hapus', function (e) {
    e.preventDefault(); // Mencegah link langsung berjalan

    const url = $(this).attr('href'); // ambil URL dari href
    const deskripsi = $(this).data('deskripsi'); // ambil deskripsi dari data atribut

    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus?',
        html: `<strong>${deskripsi}</strong>`,
        imageUrl: 'public/bg/hapus2.webp',
        imageWidth: 210,
        imageHeight: 200,
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger px-4 me-3',
            cancelButton: 'btn btn-secondary px-4'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url; // arahkan ke link jika dikonfirmasi
        }
    });
});

// ---------------------------------------------------------
// WIZARD MOBILE (tetap berfungsi meski dimuat via innerHTML)
// ---------------------------------------------------------

let currentStep = 0;

function initWizard() {
    const wizard = document.querySelector("#wizard");
    if (!wizard) return;

    const steps = wizard.querySelectorAll(".wizard-step");

    steps.forEach((step, i) => {
        step.style.display = (i === 0 ? "block" : "none");
    });

    currentStep = 0;
    updateWizardButtons();

    // FIX: ganti addEventListener → onclick
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    if (nextBtn) {
        nextBtn.onclick = function(e){
            e.preventDefault();
            nextStep();
        };
    }

    if (prevBtn) {
        prevBtn.onclick = function(e){
            e.preventDefault();
            prevStep();
        };
    }
}


function nextStep() {
    const steps = document.querySelectorAll("#wizard .wizard-step");

    if (currentStep < steps.length - 1) {
        currentStep++;
        showWizardStep();
    } else {
        console.log("Sudah di step terakhir (tidak ada submit)");
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        showWizardStep();
    }
}

function showWizardStep() {
    const steps = document.querySelectorAll("#wizard .wizard-step");

    steps.forEach((step, i) => {
        step.style.display = (i === currentStep ? "block" : "none");
    });

    updateWizardButtons();
}

function updateWizardButtons() {
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const steps = document.querySelectorAll("#wizard .wizard-step");

    if (!prevBtn || !nextBtn) return;

    // TOMBOL PREV
    prevBtn.style.display = (currentStep === 0 ? "none" : "inline-block");

    // TOMBOL NEXT – HILANGKAN di step terakhir
    if (currentStep === steps.length - 1) {
        nextBtn.style.display = "none"; // sembunyikan tombol next
    } else {
        nextBtn.style.display = "inline-block";
        nextBtn.innerText = "Lanjut";   // tetap "Lanjut"
    }
}



</script>

