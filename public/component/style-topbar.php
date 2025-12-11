<style>
  /* ------- PWA Mobile UI Core Styles (mobile-first) ------- */
  :root{
    --bg:#f6f7fb;
    --card:#ffffff;
    --primary:#0d6efd;
    --muted:#6c757d;
    --glass: rgba(255,255,255,0.6);
    --shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    --radius:14px;
  }

  html,body{height:100%;}
  body {
    margin:0;
    font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    background: linear-gradient(180deg,#f3f6ff 0%, #f6f7fb 60%);
    color:#222;
    -webkit-font-smoothing:antialiased;
    -moz-osx-font-smoothing:grayscale;
  }

  /* App shell */
  .pwa-shell {
    display:flex;
    flex-direction:column;
    min-height:100vh;
    max-width:900px;
    margin:0 auto;
    position:relative;
    padding-bottom:78px; /* space for bottom nav */
  }

  /* Top bar */
  .pwa-topbar {
    height:64px;
    display:flex;
    align-items:center;
    gap:12px;
    padding:10px 14px;
    background:transparent;
    position:sticky;
    top:0;
    z-index:40;
    backdrop-filter: blur(6px);
  }
  .btn-hamburger {
    width:44px;height:44px;border-radius:10px;
    display:inline-grid;place-items:center;
    background:var(--card);box-shadow:var(--shadow);
    border:0;cursor:pointer;
  }
  .app-title {
    font-weight:600;font-size:1.05rem;
  }
  .topbar-actions { margin-left:auto; display:flex; gap:8px; align-items:center; }

  .avatar-sm {
    width:40px;height:40px;border-radius:10px;object-fit:cover;border:2px solid #fff;box-shadow:0 6px 16px rgba(0,0,0,0.08);
  }

  /* Drawer (slide menu) */
  .pwa-drawer {
    position:fixed;
    inset:0 auto 0 0; /* left drawer */
    left:-100%;
    top:0;
    bottom:0;
    width:84%;
    max-width:360px;
    background: linear-gradient(180deg, rgba(255,255,255,0.98), var(--card));
    box-shadow: 8px 0 32px rgba(12,20,40,0.12);
    z-index:60;
    padding:20px;
    transition: left .28s cubic-bezier(.2,.9,.2,1);
    display:flex;flex-direction:column;
    gap:12px;
  }
  .pwa-drawer.open { left:0; }

  .drawer-header { display:flex; align-items:center; gap:12px; }
  .drawer-title { font-weight:700; font-size:1.05rem; }
  .drawer-sub { color:var(--muted); font-size:0.85rem; }

  .drawer-list { margin-top:6px; display:flex; flex-direction:column; gap:8px; }
  .drawer-item {
    display:flex; gap:12px; align-items:center; padding:10px; border-radius:12px; text-decoration:none; color:inherit;
    transition:background .18s, transform .12s;
  }
  .drawer-item:hover { background: #f2f6ff; transform: translateX(3px); }
  .drawer-icon { width:44px;height:44px;border-radius:10px; display:grid; place-items:center; background:#eef4ff; font-size:18px; color:var(--primary); }
  .drawer-label { font-weight:600; }
  .drawer-subtext { font-size:0.82rem; color:var(--muted); margin-top:2px; }

  .drawer-footer { margin-top:auto; display:flex; gap:8px; align-items:center; }
  .btn-logout { padding:8px 12px; border-radius:10px; background:#ffefef; color:#b02a37; font-weight:700; border:0; }

  /* Overlay */
  .pwa-overlay { position:fixed; inset:0; background:rgba(2,6,23,0.45); z-index:55; opacity:0; pointer-events:none; transition:opacity .2s; }
  .pwa-overlay.show { opacity:1; pointer-events:auto; }

  /* Main content (grid) */
  .pwa-content { padding:14px; display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
  @media(min-width:700px){ .pwa-content { grid-template-columns:repeat(3,1fr); } }
  .card-app {
    background:var(--card); border-radius:12px; padding:12px; box-shadow:var(--shadow);
    display:flex; gap:10px; align-items:center; text-decoration:none; color:inherit; transition: transform .15s, box-shadow .15s;
  }
  .card-app:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(12,20,40,0.08); }
  .card-app .icon {
    width:56px;height:56px;border-radius:12px; background:#eef5ff; display:grid;place-items:center; font-size:22px; color:var(--primary);
  }
  .card-app .meta { display:flex; flex-direction:column; }
  .card-app .meta .title { font-weight:700; }
  .card-app .meta .desc { font-size:0.85rem; color:var(--muted); margin-top:4px; }

  /* Bottom nav */
  .pwa-bottom {
    position:fixed;
    left:50%; transform:translateX(-50%);
    bottom:12px;
    width:calc(100% - 28px);
    max-width:900px;
    height:70px;
    background:linear-gradient(180deg, rgba(255,255,255,0.95), rgba(255,255,255,0.9));
    border-radius:999px;
    box-shadow: 0 8px 30px rgba(0,16,64,0.08);
    display:flex; align-items:center; justify-content:space-around;
    z-index:70; padding:8px;
  }
  .bottom-item { display:flex; flex-direction:column; align-items:center; justify-content:center; gap:4px; text-decoration:none; color:var(--muted); width:72px; }
  .bottom-item.active { color:var(--primary); }
  .bottom-item .bicon { width:40px;height:40px;border-radius:10px; display:grid;place-items:center; background:#f4f8ff; font-size:18px; color:var(--primary); }
  .bottom-item span { font-size:12px; font-weight:600; }

  /* small tweaks */
  .badge-dot { display:inline-block; min-width:20px; padding:4px 7px; background:#ffecb5; border-radius:999px; font-weight:700; color:#7a5a00; font-size:12px; }
  .search-box { flex:1; margin-left:8px; display:flex; align-items:center; gap:8px; background:#fff; padding:6px 10px; border-radius:12px; box-shadow:0 6px 18px rgba(14,24,34,0.05); }
  .search-box input { border:0; outline:0; font-size:0.95rem; }
</style>