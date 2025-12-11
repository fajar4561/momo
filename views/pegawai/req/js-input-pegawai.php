<script>
(() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
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
                    `,
                    confirmButtonText: '📂 Mengerti',
                    confirmButtonColor: '#3085d6',
                    background: '#fdfdfd',
                    width: 430

                });
            }
            form.classList.add('was-validated');
        }, false);
    });
})();

// preview gambar
function previewImage(event) {
    const output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
}


document.addEventListener("DOMContentLoaded", function() {
    const radios = document.querySelectorAll('input[name="jenis_pegawai"]');
    const subMedis = document.getElementById("subMedis");

    function toggleSubMedis() {
        const selected = document.querySelector('input[name="jenis_pegawai"]:checked').value;
        if (selected === "Medis") {
            subMedis.style.display = "flex";
        } else {
            subMedis.style.display = "none";
        }
    }

    radios.forEach(radio => {
        radio.addEventListener("change", toggleSubMedis);
    });

    // Jalankan saat pertama kali halaman dimuat
    toggleSubMedis();
});

document.querySelector('.scroll-x').addEventListener('wheel', function(e) {
    if (e.deltaY !== 0) {
        e.preventDefault();
        this.scrollLeft += e.deltaY;
    }
});
</script>