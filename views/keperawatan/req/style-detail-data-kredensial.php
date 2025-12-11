<style>
/* ===== GLOBAL ===== */
body {
    background: #f5f7fa;
    font-family: 'Inter', sans-serif;
}

.card {
    border: none;
    border-radius: 14px;
    background: #ffffff;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

/* ===== SIDEBAR ===== */
.nav-pills .nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #5a5f69;
    padding: 12px 18px;
    font-weight: 500;
    border-radius: 10px;
    transition: 0.25s;
    position: relative;
}

.nav-pills .nav-link:hover {
    background: #eef2f6;
}

.nav-pills .nav-link.active {
    background: #e8f0fe;
    color: #0d6efd;
    font-weight: 600;
}

/* Indicator garis di kiri nav active */
.nav-pills .nav-link.active::before {
    content: '';
    width: 4px;
    height: 80%;
    background: #0d6efd;
    position: absolute;
    left: 0;
    top: 10%;
    border-radius: 5px;
}

/* ===== CONTENT AREA ===== */
.profile-section-title {
    font-size: 20px;
    font-weight: 600;
    color: #2c3038;
}

label.form-label {
    font-weight: 500;
    color: #5a5f69;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #dfe3e7;
    padding: 10px 14px;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 2px rgba(13,110,253,0.15);
}

/* ===== CARD SETTINGS ===== */
.settings-card {
    border-radius: 14px !important;
    background: #ffffff;
    border: 1px solid #eef1f4;
    padding: 18px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.04);
    transition: 0.3s ease;
}

.settings-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.07);
}

/* Switch modern */
.form-switch .form-check-input {
    width: 2.8em;
    height: 1.4em;
    border-radius: 20px;
}

/* ===== RECENT ACTIVITY ===== */
.activity-item {
    border-left: 3px solid #dbe0e6;
    padding-left: 18px;
    margin-bottom: 18px;
}

.activity-item::before {
    content: '';
    width: 12px;
    height: 12px;
    background: #0d6efd;
    border-radius: 50%;
    position: absolute;
    left: -7px;
    top: 6px;
}

/* ===== STEPPER (progress bar) ===== */
.steppedprogress li {
    font-weight: 600;
    color: #5a5f69;
}

.steppedprogress .complete span {
    color: #0d6efd !important;
}

.steppedprogress .failed span {
    color: #d9534f !important;
}

</style>