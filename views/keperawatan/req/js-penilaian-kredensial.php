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

$(document).ready(function() {
    // ambil total dari semua data di server (PHP)
    let total = <?=$ambil_ujian->num_rows?>;
        $("#totalCount").text(total);

        function updateProgress() {
        let checked = Object.keys(checkedItems).length;
        let percent = Math.round((checked / total) * 100);

        $("#checkedCount").text(checked);
        let bar = $("#progressBar");
        bar.css("width", percent + "%")
           .attr("aria-valuenow", percent)
           .text(percent + "%");

        bar.removeClass("bg-danger bg-warning bg-success");
        if (percent < 30) bar.addClass("bg-danger");
        else if (percent < 70) bar.addClass("bg-warning");
        else bar.addClass("bg-success");
    }


    // saat klik checkbox langsung update
    $(document).on("change", ".row-check", function() {
        let id = $(this).closest(".row-toggle").data("id"); // kasih data-id di <tr>
        if (this.checked) {
            checkedItems[id] = true;
        } else {
            delete checkedItems[id];
        }
        updateProgress();

        // biar class aktif-row selalu sinkron juga
        let row = $(this).closest(".row-toggle");
        if (this.checked) {
            row.addClass("active-row");
        } else {
            row.removeClass("active-row");
        }
    });

    // waktu pindah halaman di datatable, sinkronkan lagi centang
    $('#datatable_1').on('draw.dt', function() {
        $(".row-check").each(function() {
            let id = $(this).closest(".row-toggle").data("id");
            if (checkedItems[id]) {
                this.checked = true;
                $(this).closest(".row-toggle").addClass("active-row");
            }
        });
        updateProgress();
    });

    // inisialisasi awal
    updateProgress();
});


$("#selectAll").on("click", function() {
    $(".row-check").prop("checked", true).trigger("change");
});
$("#deselectAll").on("click", function() {
    $(".row-check").prop("checked", false).trigger("change");
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

</script>