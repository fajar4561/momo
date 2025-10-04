<style>
    .sliding {
    flex-wrap: nowrap !important;
    /* cegah turun ke bawah */
    overflow-x: auto;
    overflow-y: hidden;
    gap: 15px;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;

    /* sembunyikan scrollbar default */
    -ms-overflow-style: none;
    /* IE & Edge lama */
    scrollbar-width: none;
    /* Firefox */
}

.sliding>[class*="col-"] {
    flex: 0 0 auto;
    min-width: 220px;
    /* lebar minimal setiap card */
}

/* ===== SCROLLBAR WEBKIT (Chrome, Safari, Edge) ===== */

/* default: tidak tampil */
.sliding::-webkit-scrollbar {
    display: none;
}

/* saat hover atau fokus: baru tampil */
.sliding:hover::-webkit-scrollbar,
.sliding:focus::-webkit-scrollbar {
    display: block;
    height: 6px;
    background: #eee;
    /* track */
}

.sliding:hover::-webkit-scrollbar-thumb,
.sliding:focus::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 4px;
}

/* Firefox: saat hover/focus munculkan */
.sliding:hover,
.sliding:focus {
    scrollbar-width: thin;
}

.font-30 {
  font-size: 28px !important;
}
/* Modern Tabs */
.modern-tabs {
  border-bottom: none;
  position: relative;
  display: flex;
  gap: 10px;
}

.modern-tabs .nav-link {
  border: none;
  border-radius: 8px 8px 0 0;
  color: #6c757d;
  font-weight: 500;
  padding: 10px 20px;
  position: relative;
  background: #f8f9fa;
  transition: all 0.3s ease;
}

.modern-tabs .nav-link i {
  font-size: 16px;
  color: #7081b9;
  transition: color 0.3s ease;
}

.modern-tabs .nav-link:hover {
  background: #eef2f7;
  color: #0b51b7;
}

.modern-tabs .nav-link.active {
  background: #ffffff;
  color: #0b51b7;
  font-weight: 600;
  box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
}

.modern-tabs .nav-link.active i {
  color: #0b51b7;
}

/* Animated underline indicator */
.modern-tabs .nav-link::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 20%;
  width: 0;
  height: 3px;
  background: #0b51b7;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.modern-tabs .nav-link.active::after {
  width: 60%;
}

/* Tab content box */
.tab-pane-box {
  background: #ffffff;
  /*border: 1px solid #e6eaf0;
  border-radius: 8px;*/
  padding: 20px;
  /*box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);*/
  animation: fadeIn 0.4s ease;
}

/* Animasi fade in konten */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>