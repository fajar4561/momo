<style>
/* step finish → hijau */
ul.steppedprogress li.complete.finish:before {
    background: #28a745;
    /* hijau */
    color: #ffffff;
    border: 2px solid #ffffff;
    box-shadow: 0px 0px 0px 1.25px #28a745;
    content: "\f12c";
    /* ikon check dari Material Design */
    font: normal normal normal 24px/1 "Material Design Icons";
    font-size: 16px;
    line-height: 20px;
} 

ul.steppedprogress li.complete.finish span {
    color: #28a745;
}

/* step failed → merah silang */
ul.steppedprogress li.failed:before {
    background: #ef4d56;
    color: #fff;
    border: 2px solid #fff;
    box-shadow: 0px 0px 0px 1.25px #ef4d56;
    content: "✖";
    /* unicode silang */
    font-size: 16px;
    line-height: 20px; 
    font-family: "Roboto", sans-serif;
}

ul.steppedprogress li.failed span {
    color: #ef4d56;
}

/* step in-progress → spinner */
ul.steppedprogress li.in-progress:before {
    content: "";
    width: 20px;
    height: 20px;
    border: 2px solid #ccc;
    border-top-color: #0b51b7;
    /* biru */
    border-radius: 50%;
    display: block;
    margin: 0 auto 10px;
    animation: spin 1s linear infinite;
}

/* animasi putar */
@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

@media (max-width: 480px) {
    ul.steppedprogress {
        display: block;
        padding: 0;
        margin: 0;
    }

    ul.steppedprogress li {
        flex: none;
        clear: both;
        text-align: left;
        margin-bottom: 12px;
        position: relative;
        padding-left: 36px;
    }

    ul.steppedprogress li:before {
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        width: 24px;
        height: 24px;
        line-height: 22px;
        text-align: center;
        border-radius: 50%;
    }

    /* hilangkan garis penghubung */
    ul.steppedprogress li:after {
        content: none !important;
    }

    /* override in-progress → jadi angka tanpa animasi */
    ul.steppedprogress li.in-progress:before {
        content: counter(step);
        /* pakai angka */
        counter-increment: step;
        background: #0b51b7;
        color: #ffffff;
        border: 2px solid #ffffff;
        -webkit-box-shadow: 0px 0px 0px 1.25px #0b51b7;
        box-shadow: 0px 0px 0px 1.25px #0b51b7;
        animation: none !important;
        /* matikan animasi */
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        width: 24px;
        height: 24px;
        line-height: 22px;
        /* samakan dengan height */
        text-align: center;
        border-radius: 50%;
        font-size: 12px;
        /* biar muat di lingkaran */

    }
}

.file-box-content {
    display: flex; /* biar berjejer ke samping */
    gap: 15px;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin; 
    scroll-behavior: smooth;
    scrollbar-color: transparent transparent; /* awalnya transparan */
    transition: scrollbar-color 0.3s ease;
}

/* Untuk Chrome, Edge, Safari */
.file-box-content::-webkit-scrollbar {
    height: 8px;
    background-color: transparent; /* awalnya transparan */
    transition: background-color 0.3s ease;
}
.file-box-content::-webkit-scrollbar-thumb { 
    background-color: transparent; /* awalnya transparan */
    border-radius: 4px;
}

/* Saat hover baru muncul scrollbar */
.file-box-content:hover {
    scrollbar-color: #bbb #eee; /* Firefox */
}
.file-box-content:hover::-webkit-scrollbar {
    background-color: #eee; /* track */
}
.file-box-content:hover::-webkit-scrollbar-thumb {
    background-color: #bbb; /* thumb */
}



/* Hijau */
.btn-check:checked + .btn-outline-success {
  background: linear-gradient(135deg, #198754, #157347);
  border-color: #157347;
  color: #fff !important;
  box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.2);
}

/* Merah */
.btn-check:checked + .btn-outline-danger {
  background: linear-gradient(135deg, #dc3545, #bb2d3b);
  border-color: #bb2d3b;
  color: #fff !important;
  box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.2);
}

/* Kuning */
.btn-check:checked + .btn-outline-warning {
  background: linear-gradient(135deg, #ffc107, #e0a800);
  border-color: #e0a800;
  color: #212529 !important;
  box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.25);
}


.swal-premium {
    border-radius: 16px !important;
    padding: 25px 30px !important;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12) !important;
}


.swal2-popup {
    border-radius: 18px !important;
    backdrop-filter: blur(6px) !important;
    box-shadow: 0px 5px 25px rgba(0,0,0,0.2) !important;
}

.swal2-title {
    font-size: 22px !important;
    font-weight: 600 !important;
}
@media (max-width: 576px) {
  .swal2-popup {
    width: 90% !important;
  }
}

</style>