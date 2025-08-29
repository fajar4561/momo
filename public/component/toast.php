<?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != ''): ?>
    <div class="position-fixed top-0 end-0 mt-5 me-3" style="z-index: 1080;">
        <div id="toastPesan" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="public/resources/assets/images/logo-sm.png" alt="" height="20" class="me-1">
                <h5 class="me-auto my-0">RSPM</h5>
                <small class="text-muted">Baru saja</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong><?= $_SESSION['info']; ?></strong> <?= $_SESSION['pesan']; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toastEl = document.getElementById('toastPesan');
            const toast = new bootstrap.Toast(toastEl, {
                delay: 5000, // 5 detik
                autohide: true
            });
            toast.show();
        });
    </script>
<?php endif; ?>
<?php $_SESSION['pesan'] = ''; ?>