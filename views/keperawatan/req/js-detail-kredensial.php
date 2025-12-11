<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
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

// sweet alert validasi berkas
document.querySelectorAll('.validasi-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // cegah submit langsung

        Swal.fire({
            title: '<span style="font-size:16px;font-weight:600;color:#333;">Mohon tunggu...</span>',
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


        // setelah beberapa saat submit formnya
        setTimeout(() => {
            form.submit();
        }, 1200); // 1.2 detik delay biar kelihatan smooth
    });
});

function showWarning() {
    Swal.fire({
        imageUrl: 'public/bg/alert.webp',
        imageWidth: 330,
        imageHeight: 230,
        imageAlt: 'Custom Icon',
        title: 'Coba Periksa Lagi!',
        html: `
            <p style="margin-bottom:10px;font-size:15px;color:#444;font-weight:500">
                Ada berkas yang <span style="color:#e74c3c;font-weight:600">belum divalidasi</span>.
            </p>
        `,
        background: '#fefefe url(public/bg/pattern.png) repeat', // kasih pattern halus
        backdrop: `
            rgba(0,0,0,0.4)
            left top
            no-repeat
        `,
        confirmButtonText: '<i class="fas fa-check-circle"></i> Mengerti',
        confirmButtonColor: '#3085d6',
    });
}

$('#form_rkk').on('submit', function(e) {

   // 🔹 tampilkan SweetAlert2 loading
        Swal.fire({
        title: 'Sedang diproses...',
        html: `
            <p style="font-size:14px; color:#444; font-family:Segoe UI, sans-serif;">
                Mohon tunggu sebentar, sistem sedang memproses pengajuan Anda...
            </p>
        `,
        imageUrl: 'public/bg/loading3.gif', // ganti dengan GIF kamu
        imageWidth: 200,
        imageHeight: 200,
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        background: '#ffffff',
    });

    // form akan lanjut submit normal (ke PHP) dengan semua hidden input ikut
});

function konfirmasiSubmit() {
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
            // submit setelah swal muncul
            document.getElementById("kredensial").submit();
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
}

const inputTanggal = document.getElementById("tanggal");

    // saat input diklik, langsung tampilkan picker
    inputTanggal.addEventListener("focus", function() {
        this.showPicker(); // khusus browser yang support (Chrome, Edge, dll.)
    });

    // alternatif: kalau mau langsung muncul juga ketika user klik
    inputTanggal.addEventListener("click", function() {
        this.showPicker();
    });
</script>
