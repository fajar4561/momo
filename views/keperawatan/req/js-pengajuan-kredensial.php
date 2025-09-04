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

$('#form_rkk').on('submit', function(e) {
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

    });

    // form akan lanjut submit normal (ke PHP) dengan semua hidden input ikut
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


</script>
<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
