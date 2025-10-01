<script>
$('#datatable_2').DataTable();
const sliding = document.querySelector('.sliding');
let isDown = false;
let startX;
let scrollLeft;

// drag to scroll
sliding.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - sliding.offsetLeft;
    scrollLeft = sliding.scrollLeft;
});
sliding.addEventListener('mouseleave', () => isDown = false);
sliding.addEventListener('mouseup', () => isDown = false);
sliding.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - sliding.offsetLeft;
    const walk = (x - startX) * 1.5;
    sliding.scrollLeft = scrollLeft - walk;
});

// wheel horizontal
sliding.addEventListener('wheel', (e) => {
    if (e.deltaY !== 0) {
        e.preventDefault();
        sliding.scrollLeft += e.deltaY;
    }
});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".btn-show-detail").forEach(function(btn) {
        btn.addEventListener("click", function() {
            // ambil data dari atribut
            document.getElementById("detail-kode").textContent = this.dataset.kode;
            document.getElementById("detail-nama").textContent = this.dataset.nama;
            document.getElementById("detail-unit").textContent = this.dataset.unit;
            document.getElementById("detail-jenjang").textContent = this.dataset.jenjang;

            // tampilkan card
            document.getElementById("detail-container").style.display = "block";
        });
    });

    // tombol tutup
    document.getElementById("btn-close-detail").addEventListener("click", function() {
        document.getElementById("detail-container").style.display = "none";
    });
});
</script>