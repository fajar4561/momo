<script>
document.addEventListener("DOMContentLoaded", function() {
  const filesTab = document.getElementById('files-tab');
  const filesContent = document.getElementById('files-tabContent');
  const searchInput = document.getElementById("search");

  // Fungsi untuk load daftar pegawai
  function loadPegawai(q = '') {
    fetch('views/pegawai/req/search_pegawai.php?q=' + q)
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