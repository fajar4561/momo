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

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const categories = <?= json_encode($tanggal) ?>;  // ex: ["2025-01-01T00:00:00", "2025-02-01T00:00:00", ...]
    const seriesData = <?= json_encode($jumlah) ?>;

    const options = {
        chart: {
            type: 'area',
            height: 380,
            toolbar: {
                show: true,
                tools: {
                    download: true,
                    selection: true,
                    zoom: true,
                    zoomin: true,
                    zoomout: true,
                    pan: true,
                    reset: true,
                },
                autoSelected: 'zoom'
            },
            dropShadow: {
                enabled: true,
                color: '#1976D2',
                top: 6,
                left: 0,
                blur: 8,
                opacity: 0.25
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: { enabled: true, delay: 150 },
                dynamicAnimation: { enabled: true, speed: 350 }
            },
            background: '#fff'
        },
        series: [{
            name: 'Jumlah Pengajuan',
            data: seriesData
        }],
        xaxis: {
            type: 'datetime',
            categories: categories,
            labels: {
                style: {
                    colors: '#5f6368',
                    fontSize: '13px',
                    fontWeight: 500
                },
                formatter: function (val) {
                    const d = new Date(val);
                    return d.toLocaleDateString('id-ID', { month: 'short', year: 'numeric' });
                }
            },
            axisBorder: { show: false },
            axisTicks: { show: false },
            tooltip: { enabled: false }
        },
        yaxis: {
            title: {
                text: 'Jumlah Pengajuan',
                style: { color: '#5f6368', fontSize: '14px', fontWeight: 600 }
            },
            labels: {
                style: { colors: '#5f6368', fontSize: '13px' }
            },
            min: 0,
            forceNiceScale: true
        },
        colors: ['#1E88E5'],
        stroke: {
            curve: 'smooth',
            width: 3.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.4,
                opacityFrom: 0.8,
                opacityTo: 0.1,
                stops: [0, 90, 100]
            }
        },
        markers: {
            size: 5,
            colors: ['#fff'],
            strokeColors: '#1E88E5',
            strokeWidth: 2,
            hover: { size: 7 }
        },
        grid: {
            borderColor: '#e0e0e0',
            strokeDashArray: 3,
            padding: { left: 20, right: 20 }
        },
        tooltip: {
            theme: 'light',
            style: {
                fontSize: '13px',
            },
            x: { format: 'MMM yyyy' },
            y: {
                formatter: (val) => val + " pengajuan"
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            markers: { radius: 12 },
            fontSize: '13px',
            labels: { colors: '#5f6368' }
        }
    };

    const chart = new ApexCharts(document.querySelector("#areaChart"), options);
    chart.render();
});


$(document).ready(function() {
    $('.datatable').each(function() {
        $(this).DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 10,
            order: [],
            language: {
                search: "🔍 Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                zeroRecords: "Tidak ditemukan data yang cocok",
                paginate: {
                    previous: "⬅️",
                    next: "➡️"
                }
            }
        });
    });
});

// untuk tab manajemen berkas
document.addEventListener("DOMContentLoaded", function() {
  const filesTab = document.getElementById('files-tab');
  const filesContent = document.getElementById('files-tabContent');
  const searchInput = document.getElementById("search");

  // Fungsi untuk load daftar pegawai
  function loadPegawai(q = '') {
    fetch('views/keperawatan/req/search_pegawai_perawat.php?q=' + q)
      .then(res => res.text())
      .then(html => {
        filesTab.innerHTML = html;
      }); 
  }

  // Fungsi untuk inisialisasi ulang popover
  function initPopovers() {
    // Bersihkan popover lama (opsional)
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
      if (bootstrap.Popover.getInstance(el)) {
        bootstrap.Popover.getInstance(el).dispose();
      }
    });

    // Inisialisasi ulang popover
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (el) {
      return new bootstrap.Popover(el, {
        trigger: 'hover',
        html: true,
        container: 'body',
        delay: { show: 100, hide: 100 },
        customClass: 'custom-popover'
      });
    });
  }

  // Load awal
  loadPegawai();

  // Event pencarian
  searchInput.addEventListener("keyup", function() {
    const query = this.value.trim();
    loadPegawai(query);
  });

  // Event klik pada pegawai
  filesTab.addEventListener('click', function(e) {
    const card = e.target.closest('.custom-card');
    if (card) {
      const nopeg = card.dataset.nopeg;

      document.querySelectorAll('.custom-card').forEach(el => el.classList.remove('active'));
      card.classList.add('active');

      filesContent.innerHTML = "<div class='text-center text-muted py-5'>Memuat berkas...</div>";

      // Ambil data berkas
      fetch('views/pegawai/req/get_berkas.php?nopeg=' + nopeg)
        .then(res => res.text())
        .then(html => {
          filesContent.innerHTML = html;

          // ⬇️ Tambahkan ini agar popover berfungsi
          initPopovers();
        });
    }
  });
});
</script>