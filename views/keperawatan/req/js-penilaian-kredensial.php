<script>
// simpan status centang global
let checkedItems = {};

$(document).on("click", "#datatable_1 .row-toggle", function(e) {
    let checkbox = $(this).find(".row-check")[0];

    if (!$(e.target).closest("input").length) {
        checkbox.checked = !checkbox.checked;
        $(checkbox).trigger("change"); // ini akan otomatis update progress
    }

    if (checkbox.checked) {
        $(this).addClass("active-row");
    } else {
        $(this).removeClass("active-row");
    }

});


 
$(document).ready(function () {
    let table = $('#datatable_2').DataTable({
        language: {
            "decimal":        "",
            "emptyTable":     "Tidak ada data yang tersedia",
            "info":           "Menampilkan _START_ sampai _END_ dari total _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered":   "(disaring dari total _MAX_ data)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Tampilkan _MENU_ data per halaman",
            "loadingRecords": "Memuat...",
            "processing":     "Sedang diproses...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ditemukan data yang sesuai",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       ">",
                "previous":   "<"
            },
            "aria": {
                "sortAscending":  ": aktifkan untuk mengurutkan kolom menaik",
                "sortDescending": ": aktifkan untuk mengurutkan kolom menurun"
            }
        }
    });
    let checkedItems = {};
    let total = table.rows().count();

    // Tambahkan tombol dan filter di kiri search bar
    $('#datatable_2_filter').parent().addClass('d-flex justify-content-between align-items-center');
    $('#datatable_2_filter').before(`
        <div id="tableTools" class="d-flex gap-2 align-items-center">
            <button id="selectAll" type="button" class="btn btn-sm btn-primary">Pilih Semua</button>
            <button id="deselectAll" type="button" class="btn btn-sm btn-secondary">Hapus Semua</button>
            <select id="filterTable" class="form-select form-select-sm w-auto">
                <option value="all">Tampilkan Semua</option>
                <option value="checked">Sudah Dicentang</option>
                <option value="unchecked">Belum Dicentang</option>
            </select>
        </div>
    `);


    // === Update Progress ===
    function updateProgress() {
        let checked = Object.keys(checkedItems).length;
        let percent = Math.round((checked / total) * 100);
        let bar = $("#progressBar");

        bar.css("width", percent + "%")
           .attr("aria-valuenow", percent)
           .text(percent + "%")
           .removeClass("bg-danger bg-warning bg-success");

        if (percent < 30) bar.addClass("bg-danger");
        else if (percent < 70) bar.addClass("bg-warning");
        else bar.addClass("bg-success");

        $("#checkedCount").text(checked);
        $("#total").text(total);
    }

    // === Klik pada baris ===
    $(document).on("click", ".row-toggle", function (e) {
        // Abaikan jika klik langsung pada checkbox agar tidak double trigger
        if ($(e.target).is(".row-check")) return;

        let checkbox = $(this).find(".row-check")[0];
        checkbox.checked = !checkbox.checked;
        $(checkbox).trigger("change");
    });

    // === Event Checkbox ===
    $(document).on("change", ".row-check", function() {
        let id = $(this).closest(".row-toggle").data("id");
        if (this.checked) checkedItems[id] = true;
        else delete checkedItems[id];
        $(this).closest(".row-toggle").toggleClass("active-row", this.checked);
        updateProgress();
    });

    // === Saat pindah halaman (pagination) ===
    table.on('draw', function() {
        $(".row-check").each(function() {
            let id = $(this).closest(".row-toggle").data("id");
            this.checked = !!checkedItems[id];
            $(this).closest(".row-toggle").toggleClass("active-row", this.checked);
        });
        updateProgress();
    });

    // === Filter checked / unchecked ===
    $(document).on("change", "#filterTable", function() {
        let filter = $(this).val();
        table.rows().every(function() {
            let row = $(this.node());
            let checked = row.find(".row-check")[0].checked;
            if (filter === "checked" && !checked) row.hide();
            else if (filter === "unchecked" && checked) row.hide();
            else row.show();
        });
    });

    // === Pilih semua ===
    $(document).on("click", "#selectAll", function() {
        table.rows({ search: 'applied' }).nodes().to$().find(".row-check").each(function() {
            this.checked = true;
            let id = $(this).closest(".row-toggle").data("id");
            checkedItems[id] = true;
            $(this).closest(".row-toggle").addClass("active-row");
        });
        updateProgress();
    });

    // === Hapus semua ===
    $(document).on("click", "#deselectAll", function() {
        table.rows({ search: 'applied' }).nodes().to$().find(".row-check").each(function() {
            this.checked = false;
            let id = $(this).closest(".row-toggle").data("id");
            delete checkedItems[id];
            $(this).closest(".row-toggle").removeClass("active-row");
        });
        updateProgress();
    });

    // === Saat form disubmit ===
    $('form').on('submit', function (e) {
        let form = $(this);

        // Hapus input hidden lama biar tidak dobel
        // form.find('input[name^="validasi["]').remove();

        // Tambahkan semua item yang diceklis ke form
        Object.keys(checkedItems).forEach(id => {
            form.append(`<input type="hidden" name="validasi[${id}]" value="1">`);
        });
    });

    updateProgress();
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

// sweetalert ketika di submit

$('#myForm').on('submit', function(e) {
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


</script>