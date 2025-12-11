<style>
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

.modern-tabs .badge {
  font-size: 12px;
  padding: 4px 8px;
  border-radius: 8px;
  vertical-align: middle;
  box-shadow: 0 1px 2px rgba(0,0,0,0.15);
}

/* Wrapper scroll */
.nav-wrapper {
  max-height: 500px;
  overflow-y: auto;
  overflow-x: hidden;
  padding-right: 6px;
}

/* Card-style item */
.custom-card {
  background-color: #fff;
  border: 1px solid #eee;
  border-radius: 10px;
  padding: 10px 14px;
  margin-bottom: 8px;
  box-shadow: 0 1px 2px rgba(0,0,0,0.05);
  transition: all 0.25s ease;
  cursor: pointer;
}

.custom-card:hover {
  background-color: #f8f9fa;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transform: translateY(-2px);
}

/* Ikon folder */
.icon-box {
  width: 40px;
  height: 40px;
  background: rgba(13,110,253,0.1);
  color: #0d6efd;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.25s;
}

.custom-card:hover .icon-box {
  background: rgba(13,110,253,0.2);
}

/* Scroll bar halus */
.nav-wrapper::-webkit-scrollbar {
  width: 6px;
}
.nav-wrapper::-webkit-scrollbar-thumb {
  background: rgba(0,0,0,0.2);
  border-radius: 4px;
}
.nav-wrapper::-webkit-scrollbar-thumb:hover {
  background: rgba(0,0,0,0.35);
}

.custom-card.active {
  background-color: #eaf2ff;
  border-left: 4px solid #7081b9;
}
.hover-effect:hover {
  background-color: #f3f6fb;
  transform: translateY(-2px);
}
.icon-circle {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(13,110,253,0.1);
  color: #0d6efd;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
}

.side-panel {
  background: #ffffff;
  border: 1px solid #e9ecef;
}

.content-panel {
  background: #ffffff;
  border: 1px solid #e9ecef;
  min-height: 70vh;
}

.scroll-container {
  max-height: 55vh;
  overflow-y: auto;
  scrollbar-width: thin;
  scrollbar-color: #cfd4da transparent;
}

.scroll-container::-webkit-scrollbar {
  width: 6px;
}
.scroll-container::-webkit-scrollbar-thumb {
  background-color: #cfd4da;
  border-radius: 4px;
}

/* Item List */
.custom-card {
  background: #fff;
  border: 1px solid #e5e9f2;
  border-radius: 8px;
  padding: 10px 12px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8px;
  transition: 0.25s;
  cursor: pointer;
}
.custom-card:hover {
  background: #f5f8ff;
  transform: translateX(3px);
}
.custom-card.active {
  background: #eaf2ff;
  border-left: 4px solid #0b51b7;
}
.custom-card .icon-box {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(13,110,253,0.1);
  color: #0d6efd;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* === FILE BOX STYLING === */
.file-box-content {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 1.2rem;
    padding: 10px;
}

.file-box {
    position: relative;
    background: #fff;
    border: 1px solid #e3e7ef;
    border-radius: 12px;
    padding: 16px 10px;
    text-align: center;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    cursor: pointer;
}

/* Hover effect modern */
.file-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    border-color: #d0d7ff;
}

/* Ikon download bulat */
/* Ikon file */
.file-box i.lar {
    font-size: 42px;
    margin-bottom: 10px;
    transition: color 0.25s ease;
}

/* Nama dan ukuran file */
.file-box h6 {
    font-size: 14px;
    font-weight: 600;
    color: #2b2f42;
    margin-bottom: 4px;
}
.file-box small {
    color: #6c757d;
    font-size: 12px;
}

/* Efek aktif (misal saat diklik) */
.file-box.active {
    border: 1px solid #4c6ef5;
    background: linear-gradient(180deg, #f6f8ff, #ffffff);
    box-shadow: 0 0 0 3px rgba(76,110,245,0.15);
    animation: glowPulse 2s infinite;
}
@keyframes glowPulse {
    0% { box-shadow: 0 0 0 0 rgba(76,110,245,0.4); }
    70% { box-shadow: 0 0 0 8px rgba(76,110,245,0); }
    100% { box-shadow: 0 0 0 0 rgba(76,110,245,0); }
}

/* === HEADER PEGAWAI === */
.card-body .media {
    display: flex;
    align-items: center;
    gap: 15px;
}
.card-body .media img {
    border-radius: 12px;
    border: 2px solid #e3e7ef;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.media-body h3 {
    font-size: 18px;
    color: #1c2237;
    font-weight: 700;
    margin-bottom: 4px;
}
.media-body p {
    font-size: 13px;
    color: #6c757d;
}

/* === TITLE === */
.card-title {
    font-weight: 700;
    font-size: 16px;
    color: #1c2237;
    border-bottom: 2px solid #e3e7ef;
    padding-bottom: 6px;
}

/* === SMOOTH SCROLL BAR === */
.file-box-content::-webkit-scrollbar {
    width: 8px;
}
.file-box-content::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.15);
    border-radius: 8px;
}
.file-box-content::-webkit-scrollbar-thumb:hover {
    background: rgba(0,0,0,0.25);
}

/* Profil Card */
.profile-card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    background: #fff;
    transition: all 0.3s ease;
}
.profile-card:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

.profile-photo {
    width: 120px;
    aspect-ratio: 1/1;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.pegawai-nama {
    font-weight: 700;
    font-size: 1.25rem;
    color: #222;
    margin-bottom: 0.25rem;
}

.pegawai-unit {
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 0.75rem;
}

.badge-group {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

/* Badge Styling */
.badge-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    border-radius: 999px;
    padding: 6px 12px;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.3px;
    background: var(--bs-light);
    color: var(--bs-dark);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    transition: all 0.25s ease;
    cursor: default;
}

.badge-status i {
    font-size: 1rem;
    opacity: 0.9;
}

/* Warna Status */
.badge-valid {
    background: var(--bs-secondary);
    color: #fff;
}
.badge-valid:hover {
    background: var(--bs-secondary-bg-subtle);
    color: var(--bs-secondary);
}

.badge-warning {
    background: var(--bs-warning);
    color: var(--bs-white);
}
.badge-warning:hover {
    background: var(--bs-warning);
    color: #000;
}

.badge-empty {
    background: var(--bs-warning-bg-subtle);
    color: var(--bs-secondary);
}
.badge-empty:hover {
    background: var(--bs-secondary-bg-subtle);
    color: var(--bs-dark);
}

/* Grup badge */
.badge-group {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.custom-popover {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  color: #333;
  font-size: 0.85rem;
  max-width: 240px;
}
.custom-popover .popover-body {
  padding: 10px 14px;
}
.popover {
  background-color: #f8f9fa !important;
  color: #212529 !important;
  border: 1px solid #dee2e6 !important;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  border-radius: 8px;
}
.popover-header {
  background-color: #e9ecef;
  border-bottom: 1px solid #dee2e6;
  color: #212529;
}
.popover .popover-arrow::before,
.popover .popover-arrow::after {
  border-top-color: #f8f9fa !important;
  border-bottom-color: #f8f9fa !important;
}
</style>