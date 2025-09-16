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
</style>