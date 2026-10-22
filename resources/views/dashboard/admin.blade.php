<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102c50">
    <title>Dashboard Admin | SIAKAD</title>
    <style>
        :root { color-scheme: light; --navy: #102c50; --blue: #356fe0; --ink: #172b45; --muted: #718096; --line: #e5ebf2; --canvas: #f4f7fb; --green: #16805d; --amber: #b66a13; }
        * { box-sizing: border-box; }
        body { margin: 0; min-width: 320px; min-height: 100vh; color: var(--ink); background: var(--canvas); font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        a { color: inherit; text-decoration: none; }
        button { font: inherit; }
        .sidebar { position: fixed; inset: 0 auto 0 0; z-index: 20; display: flex; width: 252px; flex-direction: column; padding: 25px 17px 18px; color: #dce7f5; background: var(--navy); }
        .brand { display: flex; align-items: center; gap: 12px; padding: 0 9px 30px; }
        .brand-icon { display: grid; width: 40px; height: 40px; flex: 0 0 auto; place-items: center; border: 1px solid rgba(255,255,255,.2); border-radius: 12px; background: rgba(255,255,255,.1); }
        .brand-icon svg { width: 22px; height: 22px; }
        .brand-title { color: #fff; font-size: 16px; font-weight: 750; letter-spacing: .03em; }
        .brand-subtitle { display: block; margin-top: 3px; color: #a9bdd5; font-size: 9px; font-weight: 550; letter-spacing: .13em; }
        .nav-caption { padding: 0 11px 11px; color: #89a1bd; font-size: 10px; font-weight: 750; letter-spacing: .13em; text-transform: uppercase; }
        .nav-list { display: grid; gap: 4px; overflow-y: auto; }
        .nav-link { display: flex; align-items: center; gap: 11px; min-height: 41px; padding: 0 11px; border-radius: 9px; color: #c2d0e1; font-size: 12px; font-weight: 560; transition: background .15s, color .15s; }
        .nav-link svg { width: 17px; height: 17px; flex: 0 0 auto; opacity: .9; }
        .nav-link:hover { color: white; background: rgba(255,255,255,.08); }
        .nav-link[aria-current="page"] { color: white; background: #234a76; box-shadow: inset 3px 0 #8db8ff; }
        .sidebar-bottom { margin-top: auto; padding-top: 12px; }
        .sidebar-note { margin: 0 5px 12px; padding: 11px; border: 1px solid rgba(255,255,255,.12); border-radius: 10px; color: #bdcde0; background: rgba(255,255,255,.05); font-size: 10px; line-height: 1.5; }
        .sidebar-note strong { display: block; margin-bottom: 3px; color: #fff; font-size: 10px; }
        .sidebar-footer { padding: 12px 9px 0; border-top: 1px solid rgba(255,255,255,.12); color: #8fa5bf; font-size: 10px; }
        .main { min-height: 100vh; margin-left: 252px; }
        .topbar { position: sticky; top: 0; z-index: 10; display: flex; height: 76px; align-items: center; justify-content: space-between; gap: 20px; padding: 0 clamp(22px, 4vw, 52px); border-bottom: 1px solid var(--line); background: rgba(255,255,255,.94); backdrop-filter: blur(12px); }
        .topbar-left { display: flex; align-items: center; gap: 13px; }
        .page-heading { margin: 0; color: var(--navy); font-size: 18px; font-weight: 720; letter-spacing: -.02em; }
        .breadcrumb { margin-top: 3px; color: var(--muted); font-size: 11px; }
        .profile { display: flex; align-items: center; gap: 11px; }
        .avatar { display: grid; width: 39px; height: 39px; place-items: center; border: 1px solid #d8e5f7; border-radius: 50%; color: #28548a; background: #e8f0fc; font-size: 12px; font-weight: 750; }
        .profile-name { color: var(--ink); font-size: 12px; font-weight: 700; }
        .profile-role { margin-top: 3px; color: var(--muted); font-size: 10px; }
        .menu-toggle { display: none; width: 38px; height: 38px; place-items: center; border: 1px solid var(--line); border-radius: 9px; color: var(--navy); background: white; cursor: pointer; }
        .menu-toggle svg { width: 19px; height: 19px; }
        .content { width: min(100%, 1440px); margin: 0 auto; padding: 25px clamp(22px, 4vw, 52px) 42px; }
        .prototype-banner { display: flex; align-items: flex-start; gap: 11px; margin-bottom: 20px; padding: 12px 15px; border: 1px solid #f2ddb8; border-radius: 10px; color: #805315; background: #fffaf0; font-size: 11px; line-height: 1.55; }
        .prototype-banner svg { width: 17px; height: 17px; flex: 0 0 auto; margin-top: 1px; }
        .prototype-banner strong { color: #70460c; }
        .welcome-row { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 19px; }
        .welcome-row h2 { margin: 0; color: var(--navy); font-size: clamp(23px, 2.5vw, 30px); letter-spacing: -.04em; }
        .welcome-row p { margin: 7px 0 0; color: var(--muted); font-size: 13px; }
        .term-pill { display: inline-flex; align-items: center; gap: 8px; padding: 9px 12px; border: 1px solid var(--line); border-radius: 9px; color: #425a77; background: white; font-size: 11px; font-weight: 650; white-space: nowrap; }
        .term-pill svg { width: 15px; height: 15px; color: var(--blue); }
        .stat-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; margin-bottom: 18px; }
        .stat-card, .panel { border: 1px solid var(--line); border-radius: 13px; background: #fff; box-shadow: 0 3px 12px rgba(20,48,82,.025); }
        .stat-card { min-height: 123px; padding: 15px 17px; }
        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .stat-label { color: var(--muted); font-size: 11px; font-weight: 600; }
        .stat-icon { display: grid; width: 32px; height: 32px; place-items: center; border-radius: 9px; color: #3769b2; background: #edf4ff; }
        .stat-icon.green { color: #167455; background: #e8f7f1; }
        .stat-icon.gold { color: #a66417; background: #fff4e5; }
        .stat-icon svg { width: 17px; height: 17px; }
        .stat-value { margin-top: 10px; color: var(--navy); font-size: 22px; font-weight: 760; letter-spacing: -.04em; }
        .stat-note { margin-top: 3px; color: #8a97a8; font-size: 10px; }
        .content-grid { display: grid; grid-template-columns: minmax(0, 1.42fr) minmax(280px, .88fr); gap: 16px; align-items: start; }
        .column { display: grid; gap: 16px; min-width: 0; }
        .panel { min-width: 0; overflow: hidden; }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 16px 18px; border-bottom: 1px solid #edf1f5; }
        .panel-title { margin: 0; color: var(--navy); font-size: 13px; font-weight: 730; }
        .panel-subtitle { margin: 4px 0 0; color: #8996a6; font-size: 10px; }
        .section-link { color: var(--blue); font-size: 10px; font-weight: 700; white-space: nowrap; }
        .table-scroll { overflow-x: auto; }
        .user-table { width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap; }
        .user-table th { padding: 11px 13px; color: #8794a5; background: #f9fbfd; font-size: 9px; font-weight: 700; }
        .user-table td { padding: 12px 13px; border-top: 1px solid #f0f3f6; color: #53677f; font-size: 10px; }
        .user-table td:first-child { color: #263b55; font-weight: 700; }
        .user-meta { display: block; margin-top: 4px; color: #8a97a8; font-size: 9px; font-weight: 500; }
        .role-pill { display: inline-flex; padding: 5px 8px; border-radius: 20px; color: #3769b2; background: #edf4ff; font-size: 9px; font-weight: 700; }
        .status-pill { display: inline-flex; align-items: center; gap: 5px; padding: 5px 8px; border-radius: 20px; color: var(--green); background: #eaf8f1; font-size: 9px; font-weight: 700; }
        .status-pill::before { width: 5px; height: 5px; border-radius: 50%; background: currentColor; content: ""; }
        .status-pill.pending { color: var(--amber); background: #fff4e5; }
        .panel-footnote { margin: 0; padding: 0 17px 14px; color: #8996a6; font-size: 9px; }
        .period-box { padding: 16px 18px 17px; }
        .period-title { color: #263b55; font-size: 12px; font-weight: 720; }
        .period-date { margin-top: 5px; color: #8290a1; font-size: 10px; }
        .period-status { display: inline-flex; margin-top: 12px; padding: 6px 9px; border-radius: 20px; color: var(--green); background: #eaf8f1; font-size: 9px; font-weight: 700; }
        .data-status { padding: 1px 18px 8px; }
        .data-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 11px 0; border-bottom: 1px solid #f0f3f6; }
        .data-row:last-child { border-bottom: 0; }
        .data-label { color: #53677f; font-size: 10px; }
        .data-number { color: var(--navy); font-size: 11px; font-weight: 750; }
        .activity-list { padding: 3px 18px 9px; }
        .activity-item { display: grid; grid-template-columns: 30px 1fr; gap: 10px; padding: 11px 0; border-bottom: 1px solid #f0f3f6; }
        .activity-item:last-child { border-bottom: 0; }
        .activity-icon { display: grid; width: 29px; height: 29px; place-items: center; border-radius: 8px; color: #3769b2; background: #edf4ff; }
        .activity-icon svg { width: 15px; height: 15px; }
        .activity-copy { color: #8290a1; font-size: 9px; line-height: 1.45; }
        .activity-copy strong { display: block; margin-bottom: 3px; color: #344a64; font-size: 10px; }
        .notice { display: flex; align-items: flex-start; gap: 10px; padding: 13px 16px; color: #6a7890; font-size: 10px; line-height: 1.6; }
        .notice svg { width: 17px; height: 17px; flex: 0 0 auto; color: #5481c1; }
        .mobile-overlay { display: none; }
        @media (max-width: 1120px) { .stat-grid { grid-template-columns: repeat(2, minmax(0,1fr)); } .content-grid { grid-template-columns: minmax(0, 1.15fr) minmax(260px, .85fr); } }
        @media (max-width: 860px) {
            .sidebar { transform: translateX(-100%); transition: transform .2s ease; box-shadow: 12px 0 30px rgba(10,30,55,.16); }
            .sidebar.is-open { transform: translateX(0); }
            .mobile-overlay.is-open { position: fixed; inset: 0; z-index: 15; display: block; background: rgba(10,25,45,.38); }
            .main { margin-left: 0; }
            .menu-toggle { display: grid; }
            .topbar { height: 68px; padding: 0 20px; }
            .content { padding: 22px 20px 34px; }
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 540px) {
            .topbar { gap: 10px; padding: 0 14px; }
            .page-heading { font-size: 15px; }
            .breadcrumb { font-size: 10px; }
            .profile { gap: 8px; }
            .profile-copy { display: none; }
            .avatar { width: 36px; height: 36px; }
            .content { padding: 17px 14px 28px; }
            .welcome-row { align-items: flex-start; flex-direction: column; gap: 12px; }
            .welcome-row h2 { font-size: 24px; }
            .stat-grid { gap: 10px; }
            .stat-card { min-height: 116px; padding: 12px; }
            .stat-value { font-size: 20px; }
            .stat-label { font-size: 10px; }
            .panel-header { padding: 14px; }
            .user-table th, .user-table td { padding-right: 10px; padding-left: 10px; }
            .data-status, .activity-list { padding-right: 14px; padding-left: 14px; }
        }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
        <a class="brand" href="#beranda" aria-label="SIAKAD, Beranda">
            <span class="brand-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M4 19.5V8.7L12 4l8 4.7v10.8M8 19.5v-6h8v6M3 20h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 9h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
            <span class="brand-title">SIAKAD<span class="brand-subtitle">SISTEM INFORMASI AKADEMIK</span></span>
        </a>
        <p class="nav-caption">Menu Administrator</p>
        <nav class="nav-list">
            <a class="nav-link" href="#beranda" aria-current="page"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3.5 10 8.5-7 8.5 7v9.5a1 1 0 0 1-1 1h-15a1 1 0 0 1-1-1V10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 20.5v-7h6v7" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>Beranda</a>
            <a class="nav-link" href="#mahasiswa"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.7"/><path d="M3.5 19c.5-3.1 2.3-4.7 5.5-4.7 3.2 0 5 1.6 5.5 4.7M16 8.5a2.5 2.5 0 1 1 0 5M15 15c3.2 0 5 1.4 5.5 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Data Mahasiswa</a>
            <a class="nav-link" href="#dosen"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 3.5 7.5 12 12l8.5-4.5L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m5 10 7 3.8 7-3.8M5 14l7 3.8 7-3.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>Data Dosen</a>
            <a class="nav-link" href="#program-studi"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3.5 20h17M5 20V8l7-4 7 4v12M9 10h.01M15 10h.01M9 13.5h.01M15 13.5h.01M10 20v-3h4v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>Program Studi</a>
            <a class="nav-link" href="#mata-kuliah"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5ZM4 17a2.5 2.5 0 0 1 2.5-2.5H20" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M8 7h8m-8 3.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Mata Kuliah</a>
            <a class="nav-link" href="#pengguna"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 20c.6-3.5 3.2-5.5 7.5-5.5s6.9 2 7.5 5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Pengguna</a>
            <a class="nav-link" href="#periode"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17M8 14h3m3.5 0H16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Periode Akademik</a>
            <a class="nav-link" href="#profil"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 20c.6-3.5 3.2-5.5 7.5-5.5s6.9 2 7.5 5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Profil</a>
        </nav>
        <div class="sidebar-bottom"><p class="sidebar-note"><strong>Mode prototipe</strong>Ringkasan administrasi pada halaman ini adalah contoh, bukan data sistem.</p><div class="sidebar-footer">© {{ date('Y') }} SIAKAD · Prototipe frontend</div></div>
    </aside>
    <button class="mobile-overlay" id="mobile-overlay" type="button" aria-label="Tutup menu"></button>

    <main class="main" id="beranda">
        <header class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" id="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-controls="sidebar" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></button>
                <div><h1 class="page-heading">Dashboard Admin</h1><div class="breadcrumb">Beranda <span aria-hidden="true">/</span> Ringkasan administrasi</div></div>
            </div>
            <div class="profile" id="profil"><div class="profile-copy"><div class="profile-name">Administrator Contoh</div><div class="profile-role">Profil contoh · bukan data nyata</div></div><div class="avatar" aria-label="Inisial contoh">AC</div></div>
        </header>

        <div class="content">
            <div class="prototype-banner" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.8 2.9 17a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 3.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg><div><strong>Prototipe frontend — semua nama dan angka adalah data contoh.</strong> Halaman ini belum terhubung ke autentikasi, backend, atau database. Route demonstrasi belum memiliki autentikasi/otorisasi dan wajib diamankan sebelum digunakan secara nyata.</div></div>

            <section class="welcome-row" aria-labelledby="welcome-title"><div><h2 id="welcome-title">Ringkasan administrasi</h2><p>Ikhtisar data akademik contoh untuk pratinjau dashboard.</p></div><div class="term-pill"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Semester Ganjil 2026/2027 · contoh</div></section>

            <section class="stat-grid" aria-label="Ringkasan data akademik contoh">
                <article class="stat-card" id="mahasiswa"><div class="stat-top"><span class="stat-label">Jumlah mahasiswa</span><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.7"/><path d="M3.5 19c.5-3.1 2.3-4.7 5.5-4.7 3.2 0 5 1.6 5.5 4.7M16 8.5a2.5 2.5 0 1 1 0 5M15 15c3.2 0 5 1.4 5.5 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><div class="stat-value">1.248</div><div class="stat-note">Dummy · seluruh status</div></article>
                <article class="stat-card" id="dosen"><div class="stat-top"><span class="stat-label">Jumlah dosen</span><span class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 3.5 7.5 12 12l8.5-4.5L12 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m5 10 7 3.8 7-3.8M5 14l7 3.8 7-3.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div><div class="stat-value">86</div><div class="stat-note">Dummy · seluruh status</div></article>
                <article class="stat-card" id="program-studi"><div class="stat-top"><span class="stat-label">Program studi</span><span class="stat-icon gold"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3.5 20h17M5 20V8l7-4 7 4v12M9 10h.01M15 10h.01M9 13.5h.01M15 13.5h.01M10 20v-3h4v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div><div class="stat-value">8</div><div class="stat-note">Dummy · program aktif</div></article>
                <article class="stat-card" id="mata-kuliah"><div class="stat-top"><span class="stat-label">Mata kuliah</span><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5ZM4 17a2.5 2.5 0 0 1 2.5-2.5H20" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M8 7h8m-8 3.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><div class="stat-value">64</div><div class="stat-note">Dummy · katalog contoh</div></article>
            </section>

            <div class="content-grid">
                <div class="column">
                    <section class="panel" id="pengguna" aria-labelledby="users-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="users-title">Pengguna terbaru</h2><p class="panel-subtitle">Baris di bawah ini hanya contoh tampilan</p></div><a class="section-link" href="#pengguna">Daftar pengguna</a></header>
                        <div class="table-scroll"><table class="user-table"><thead><tr><th>NAMA</th><th>USERNAME / IDENTITAS</th><th>ROLE</th><th>STATUS AKUN</th></tr></thead><tbody>
                            <tr><td>Pengguna Contoh 01<span class="user-meta">Data dummy · baru ditambahkan</span></td><td>contoh.admin</td><td><span class="role-pill">Admin · contoh</span></td><td><span class="status-pill">Aktif · contoh</span></td></tr>
                            <tr><td>Pengguna Contoh 02<span class="user-meta">Data dummy · baru ditambahkan</span></td><td>NIM-000001</td><td><span class="role-pill">Mahasiswa · contoh</span></td><td><span class="status-pill">Aktif · contoh</span></td></tr>
                            <tr><td>Pengguna Contoh 03<span class="user-meta">Data dummy · baru ditambahkan</span></td><td>NIDN-000002</td><td><span class="role-pill">Dosen · contoh</span></td><td><span class="status-pill pending">Menunggu aktivasi</span></td></tr>
                            <tr><td>Pengguna Contoh 04<span class="user-meta">Data dummy · baru ditambahkan</span></td><td>contoh.operator</td><td><span class="role-pill">Dosen Wali · contoh</span></td><td><span class="status-pill">Aktif · contoh</span></td></tr>
                        </tbody></table></div>
                        <p class="panel-footnote">Nama, username/identitas, role, status, dan urutan pengguna di atas bukan data sistem sebenarnya.</p>
                    </section>

                    <section class="panel" aria-labelledby="activity-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="activity-title">Aktivitas administrasi</h2><p class="panel-subtitle">Contoh aktivitas terbaru · bukan log sistem</p></div></header>
                        <div class="activity-list">
                            <div class="activity-item"><span class="activity-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 20c.6-3.5 3.2-5.5 7.5-5.5s6.9 2 7.5 5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><div class="activity-copy"><strong>Data pengguna contoh diperbarui</strong>Administrator Contoh · hari ini, 09.20</div></div>
                            <div class="activity-item"><span class="activity-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><div class="activity-copy"><strong>Periode akademik contoh ditetapkan</strong>Administrator Contoh · kemarin, 15.10</div></div>
                            <div class="activity-item"><span class="activity-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M3.5 20h17M5 20V8l7-4 7 4v12M9 10h.01M15 10h.01M9 13.5h.01M15 13.5h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span><div class="activity-copy"><strong>Ringkasan program studi contoh ditinjau</strong>Administrator Contoh · 2 hari lalu</div></div>
                        </div>
                    </section>
                </div>

                <div class="column">
                    <section class="panel" id="periode" aria-labelledby="period-heading">
                        <header class="panel-header"><div><h2 class="panel-title" id="period-heading">Periode akademik aktif</h2><p class="panel-subtitle">Informasi periode contoh</p></div><a class="section-link" href="#periode">Periode</a></header>
                        <div class="period-box"><div class="period-title">Semester Ganjil 2026/2027</div><div class="period-date">1 September 2026 — 31 Januari 2027 · dummy</div><span class="period-status">Aktif · contoh</span></div>
                    </section>
                    <section class="panel" aria-labelledby="data-status-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="data-status-title">Status data akademik</h2><p class="panel-subtitle">Rekap dummy untuk pratinjau</p></div></header>
                        <div class="data-status">
                            <div class="data-row"><span class="data-label">Data mahasiswa</span><span class="data-number">Lengkap · contoh</span></div>
                            <div class="data-row"><span class="data-label">Data dosen</span><span class="data-number">Lengkap · contoh</span></div>
                            <div class="data-row"><span class="data-label">Program studi</span><span class="data-number">8 aktif · contoh</span></div>
                            <div class="data-row"><span class="data-label">Mata kuliah</span><span class="data-number">64 terdaftar · contoh</span></div>
                            <div class="data-row"><span class="data-label">Sinkronisasi terakhir</span><span class="data-number">Tidak tersedia</span></div>
                        </div>
                    </section>
                    <section class="panel" aria-labelledby="admin-profile-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="admin-profile-title">Profil administrator contoh</h2><p class="panel-subtitle">Identitas bukan data nyata</p></div><a class="section-link" href="#profil">Profil</a></header>
                        <div class="period-box" id="profil"><div class="period-title">Administrator Contoh</div><div class="period-date">Username: admin.contoh · role contoh</div><div class="period-date">Unit administrasi contoh</div></div>
                    </section>
                    <aside class="panel notice" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 11v5m0-8h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg><div>Ringkasan, daftar pengguna, aktivitas, dan periode akademik di sini masih statis; belum ada fitur CRUD atau penyimpanan data.</div></aside>
                </div>
            </div>
        </div>
    </main>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');

        function setMenuOpen(isOpen) {
            sidebar.classList.toggle('is-open', isOpen);
            mobileOverlay.classList.toggle('is-open', isOpen);
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        }

        menuToggle.addEventListener('click', () => setMenuOpen(!sidebar.classList.contains('is-open')));
        mobileOverlay.addEventListener('click', () => setMenuOpen(false));
        sidebar.querySelectorAll('.nav-link').forEach((link) => link.addEventListener('click', () => setMenuOpen(false)));
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') setMenuOpen(false);
        });
    </script>
</body>
</html>
