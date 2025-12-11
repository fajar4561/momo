<style>
/* Sembunyikan radio input */
.radio-card input[type="radio"],
.radio-card-wrapper input[type="radio"] {
  display: none;
}

/* Wrapper utama (mendukung scroll di layar kecil) */
.radio-card-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: flex-start;
  padding-bottom: 0.5rem;
}

/* Desain umum kartu */
.radio-card label,
.radio-card-wrapper label {
  display: flex;
  align-items: center;
  gap: 1rem;
  cursor: pointer;
  border: 1.5px solid #dee2e6;
  border-radius: 12px;
  padding: 1rem;
  background-color: #fff;
  transition: all 0.25s ease;
  flex: 1 1 calc(33.333% - 1rem); /* default 3 kolom */
  box-sizing: border-box;
  min-width: 240px;
}

/* Gambar di dalam kartu */
.radio-card label img,
.radio-card-wrapper label img {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 10px;
}

/* Teks */
.radio-card label strong,
.radio-card-wrapper label strong {
  color: #212529;
  font-weight: 600;
  font-size: 0.95rem;
}

.radio-card label small,
.radio-card-wrapper label small {
  color: #6c757d;
  font-size: 0.8rem;
}

/* Efek saat dipilih */
.radio-card input[type="radio"]:checked + label,
.radio-card-wrapper input[type="radio"]:checked + label {
  border-color: #0d6efd;
  background-color: #f0f6ff;
}

/* Hover efek */
.radio-card label:hover,
.radio-card-wrapper label:hover {
  border-color: #0d6efd;
  background-color: #f8faff;
}

/* ✅ Responsif */
@media (max-width: 1200px) {
  .radio-card label,
  .radio-card-wrapper label {
    flex: 1 1 calc(50% - 1rem); /* 2 kolom */
  }
}
 
@media (max-width: 768px) {
  .radio-card label,
  .radio-card-wrapper label {
    flex: 1 1 100%; /* 1 kolom penuh */
  }
}
/* Wrapper fleksibel untuk badge */
.badge-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem; /* jarak antar badge */
  justify-content: flex-start;
}

/* Badge adaptif */
.badge-item {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.75rem 1rem;
  border-radius: 8px;
  font-size: 0.85rem;
  text-align: center;
  flex: 1 1 calc(25% - 0.5rem); /* default 4 kolom */
  min-width: 120px;
  box-sizing: border-box;
}

/* Responsif */
@media (max-width: 1200px) {
  .badge-item {
    flex: 1 1 calc(33.333% - 0.5rem); /* 3 kolom */
  }
}
@media (max-width: 768px) {
  .badge-item {
    flex: 1 1 calc(50% - 0.5rem); /* 2 kolom */
  }
}
@media (max-width: 576px) {
  .badge-item {
    flex: 1 1 100%; /* 1 kolom penuh */
  }
}
.badge-item {
  transition: all 0.25s ease;
}
.badge-item:hover {
  transform: translateY(-3px);
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

</style>