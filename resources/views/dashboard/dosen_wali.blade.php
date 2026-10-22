<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102c50">
    <title>Dashboard Dosen Wali | SIAKAD</title>
    <style>
        :root { color-scheme: light; --navy: #102c50; --blue: #356fe0; --ink: #172b45; --muted: #718096; --line: #e5ebf2; --canvas: #f4f7fb; --green: #16805d; --amber: #b66a13; --red: #b84b55; }
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
        .nav-list { display: grid; gap: 5px; }
        .nav-link { display: flex; align-items: center; gap: 12px; min-height: 44px; padding: 0 12px; border-radius: 9px; color: #c2d0e1; font-size: 13px; font-weight: 560; transition: background .15s, color .15s; }
        .nav-link svg { width: 18px; height: 18px; flex: 0 0 auto; opacity: .9; }
        .nav-link:hover { color: white; background: rgba(255,255,255,.08); }
        .nav-link[aria-current="page"] { color: white; background: #234a76; box-shadow: inset 3px 0 #8db8ff; }
        .nav-count { margin-left: auto; padding: 3px 7px; border-radius: 20px; color: #d8e8ff; background: rgba(255,255,255,.12); font-size: 10px; }
        .sidebar-bottom { margin-top: auto; }
        .sidebar-note { margin: 0 5px 15px; padding: 12px; border: 1px solid rgba(255,255,255,.12); border-radius: 10px; color: #bdcde0; background: rgba(255,255,255,.05); font-size: 11px; line-height: 1.55; }
        .sidebar-note strong { display: block; margin-bottom: 3px; color: #fff; font-size: 11px; }
        .sidebar-footer { padding: 14px 9px 0; border-top: 1px solid rgba(255,255,255,.12); color: #8fa5bf; font-size: 10px; }
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
        .content { width: min(100%, 1440px); margin: 0 auto; padding: 27px clamp(22px, 4vw, 52px) 44px; }
        .prototype-banner { display: flex; align-items: flex-start; gap: 11px; margin-bottom: 22px; padding: 12px 15px; border: 1px solid #f2ddb8; border-radius: 10px; color: #805315; background: #fffaf0; font-size: 11px; line-height: 1.55; }
        .prototype-banner svg { width: 17px; height: 17px; flex: 0 0 auto; margin-top: 1px; }
        .prototype-banner strong { color: #70460c; }
        .welcome-row { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 21px; }
        .welcome-row h2 { margin: 0; color: var(--navy); font-size: clamp(23px, 2.5vw, 30px); letter-spacing: -.04em; }
        .welcome-row p { margin: 7px 0 0; color: var(--muted); font-size: 13px; }
        .term-pill { display: inline-flex; align-items: center; gap: 8px; padding: 9px 12px; border: 1px solid var(--line); border-radius: 9px; color: #425a77; background: white; font-size: 11px; font-weight: 650; white-space: nowrap; }
        .term-pill svg { width: 15px; height: 15px; color: var(--blue); }
        .stat-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 15px; margin-bottom: 20px; }
        .stat-card, .panel { border: 1px solid var(--line); border-radius: 13px; background: #fff; box-shadow: 0 3px 12px rgba(20,48,82,.025); }
        .stat-card { min-height: 132px; padding: 17px 18px; }
        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .stat-label { color: var(--muted); font-size: 11px; font-weight: 600; }
        .stat-icon { display: grid; width: 32px; height: 32px; place-items: center; border-radius: 9px; color: #3769b2; background: #edf4ff; }
        .stat-icon.green { color: #167455; background: #e8f7f1; }
        .stat-icon.gold { color: #a66417; background: #fff4e5; }
        .stat-icon.red { color: #a93f4c; background: #fff0f1; }
        .stat-icon svg { width: 17px; height: 17px; }
        .stat-value { margin-top: 13px; color: var(--navy); font-size: 23px; font-weight: 760; letter-spacing: -.04em; }
        .stat-note { margin-top: 3px; color: #8a97a8; font-size: 10px; }
        .content-grid { display: grid; grid-template-columns: minmax(0, 1.5fr) minmax(270px, .85fr); gap: 17px; align-items: start; }
        .column { display: grid; gap: 17px; min-width: 0; }
        .panel { min-width: 0; overflow: hidden; }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 17px 19px; border-bottom: 1px solid #edf1f5; }
        .panel-title { margin: 0; color: var(--navy); font-size: 13px; font-weight: 730; }
        .panel-subtitle { margin: 4px 0 0; color: #8996a6; font-size: 10px; }
        .section-link { color: var(--blue); font-size: 10px; font-weight: 700; white-space: nowrap; }
        .table-scroll { overflow-x: auto; }
        .student-table { width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap; }
        .student-table th { padding: 11px 13px; color: #8794a5; background: #f9fbfd; font-size: 9px; font-weight: 700; }
        .student-table td { padding: 13px; border-top: 1px solid #f0f3f6; color: #53677f; font-size: 10px; }
        .student-table td:nth-child(2) { color: #263b55; font-weight: 700; }
        .student-code { display: block; margin-top: 4px; color: #8a97a8; font-size: 9px; font-weight: 500; }
        .status-pill { display: inline-flex; padding: 5px 8px; border-radius: 20px; color: var(--green); background: #eaf8f1; font-size: 9px; font-weight: 700; }
        .status-pill.attention { color: var(--red); background: #fff0f1; }
        .status-pill.monitor { color: var(--amber); background: #fff4e5; }
        .panel-footnote { margin: 0; padding: 0 17px 15px; color: #8996a6; font-size: 9px; }
        .krs-list { padding: 2px 18px 8px; }
        .krs-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 13px 0; border-bottom: 1px solid #f0f3f6; }
        .krs-row:last-child { border-bottom: 0; }
        .krs-label { color: #51657e; font-size: 10px; }
        .krs-label strong { display: block; margin-bottom: 4px; color: #263b55; font-size: 11px; }
        .krs-count { color: var(--navy); font-size: 14px; font-weight: 750; }
        .krs-progress { padding: 0 18px 17px; }
        .progress-label { display: flex; justify-content: space-between; margin-bottom: 7px; color: #8996a6; font-size: 9px; }
        .progress-track { height: 6px; overflow: hidden; border-radius: 99px; background: #edf1f6; }
        .progress-fill { height: 100%; border-radius: inherit; background: linear-gradient(90deg, #4d80dd, #69a1f2); }
        .attention-list { padding: 1px 18px 8px; }
        .attention-row { display: flex; align-items: flex-start; gap: 10px; padding: 12px 0; border-bottom: 1px solid #f0f3f6; }
        .attention-row:last-child { border-bottom: 0; }
        .attention-dot { width: 8px; height: 8px; flex: 0 0 auto; margin-top: 4px; border-radius: 50%; background: #d68c31; }
        .attention-dot.high { background: #c45159; }
        .attention-copy { color: #8290a1; font-size: 9px; line-height: 1.5; }
        .attention-copy strong { display: block; margin-bottom: 3px; color: #344a64; font-size: 10px; }
        .progress-list { padding: 2px 18px 15px; }
        .progress-item { padding: 12px 0; border-bottom: 1px solid #f0f3f6; }
        .progress-item:last-child { border-bottom: 0; }
        .progress-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; color: #51657e; font-size: 9px; }
        .progress-top strong { color: #344a64; font-size: 10px; }
        .trend { color: var(--green); font-weight: 700; }
        .trend.down { color: var(--red); }
        .notice { display: flex; align-items: flex-start; gap: 10px; padding: 14px 17px; color: #6a7890; font-size: 10px; line-height: 1.6; }
        .notice svg { width: 17px; height: 17px; flex: 0 0 auto; color: #5481c1; }
        .mobile-overlay { display: none; }
        @media (max-width: 1100px) { .stat-grid { grid-template-columns: repeat(2, minmax(0,1fr)); } .content-grid { grid-template-columns: minmax(0, 1.2fr) minmax(250px, .85fr); } }
        @media (max-width: 820px) {
            .sidebar { transform: translateX(-100%); transition: transform .2s ease; box-shadow: 12px 0 30px rgba(10,30,55,.16); }
            .sidebar.is-open { transform: translateX(0); }
            .mobile-overlay.is-open { position: fixed; inset: 0; z-index: 15; display: block; background: rgba(10,25,45,.38); }
            .main { margin-left: 0; }
            .menu-toggle { display: grid; }
            .topbar { height: 68px; padding: 0 20px; }
            .content { padding: 22px 20px 34px; }
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 520px) {
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
            .stat-card { min-height: 119px; padding: 13px; }
            .stat-value { font-size: 21px; }
            .stat-label { font-size: 10px; }
            .panel-header { padding: 15px; }
            .student-table th, .student-table td { padding-right: 10px; padding-left: 10px; }
            .krs-list, .attention-list, .progress-list { padding-right: 15px; padding-left: 15px; }
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
        <p class="nav-caption">Menu Dosen Wali</p>
        <nav class="nav-list">
            <a class="nav-link" href="#beranda" aria-current="page"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3.5 10 8.5-7 8.5 7v9.5a1 1 0 0 1-1 1h-15a1 1 0 0 1-1-1V10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 20.5v-7h6v7" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>Beranda</a>
            <a class="nav-link" href="#mahasiswa"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.7"/><path d="M3.5 19c.5-3.1 2.3-4.7 5.5-4.7 1.7 0 3 .5 4 1.4M16 8.5a2.5 2.5 0 1 1 0 5M15 15c3.2 0 5 1.4 5.5 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Mahasiswa Perwalian<span class="nav-count">24</span></a>
            <a class="nav-link" href="#pemantauan"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 19.5h18M5.5 16V11m4.3 5V5m4.4 11v-3m4.3 3V8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="m5 8 4-4 4 5 6-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>Pemantauan Akademik</a>
            <a class="nav-link" href="#krs"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3.5h8l4 4v13H7a2 2 0 0 1-2-2v-13a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14.5 3.5v5h4.5M9 13h6m-6 3.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>KRS</a>
            <a class="nav-link" href="#profil"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 20c.6-3.5 3.2-5.5 7.5-5.5s6.9 2 7.5 5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Profil</a>
        </nav>
        <div class="sidebar-bottom"><p class="sidebar-note"><strong>Mode prototipe</strong>Informasi mahasiswa pada halaman ini adalah data contoh untuk pratinjau UI.</p><div class="sidebar-footer">© {{ date('Y') }} SIAKAD · Prototipe frontend</div></div>
    </aside>
    <button class="mobile-overlay" id="mobile-overlay" type="button" aria-label="Tutup menu"></button>

    <main class="main" id="beranda">
        <header class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" id="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-controls="sidebar" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></button>
                <div><h1 class="page-heading">Dashboard Dosen Wali</h1><div class="breadcrumb">Beranda <span aria-hidden="true">/</span> Pemantauan perwalian</div></div>
            </div>
            <div class="profile" id="profil"><div class="profile-copy"><div class="profile-name">Dosen Wali Contoh</div><div class="profile-role">Profil contoh · bukan data nyata</div></div><div class="avatar" aria-label="Inisial contoh">DW</div></div>
        </header>

        <div class="content">
            <div class="prototype-banner" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.8 2.9 17a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 3.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg><div><strong>Prototipe frontend — seluruh profil dan data mahasiswa adalah contoh.</strong> Halaman belum terhubung ke autentikasi, backend, atau database. Route prototipe belum dilindungi dan perlu diamankan sebelum penggunaan nyata.</div></div>

            <section class="welcome-row" aria-labelledby="welcome-title"><div><h2 id="welcome-title">Ringkasan perwalian</h2><p>Pantau status akademik mahasiswa perwalian contoh.</p></div><div class="term-pill"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Semester Ganjil 2026/2027 · contoh</div></section>

            <section class="stat-grid" aria-label="Ringkasan perwalian contoh">
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Mahasiswa perwalian</span><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.7"/><path d="M3.5 19c.5-3.1 2.3-4.7 5.5-4.7 3.2 0 5 1.6 5.5 4.7M16 8.5a2.5 2.5 0 1 1 0 5M15 15c3.2 0 5 1.4 5.5 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><div class="stat-value">24</div><div class="stat-note">Contoh · seluruh angkatan</div></article>
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Mahasiswa aktif</span><span class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m5 12 4.2 4.2L19 6.5" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/></svg></span></div><div class="stat-value">21</div><div class="stat-note">Contoh · status aktif</div></article>
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Perlu perhatian</span><span class="stat-icon red"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.8 2.9 17a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 3.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div><div class="stat-value">3</div><div class="stat-note">Contoh · pemantauan akademik</div></article>
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Status KRS</span><span class="stat-icon gold"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3.5h8l4 4v13H7a2 2 0 0 1-2-2v-13a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14.5 3.5v5h4.5M9 13h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><div class="stat-value">18 <small style="font-size:12px;font-weight:600">/ 24</small></div><div class="stat-note">Contoh · sudah disetujui</div></article>
            </section>

            <div class="content-grid">
                <div class="column">
                    <section class="panel" id="mahasiswa" aria-labelledby="students-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="students-title">Mahasiswa perwalian</h2><p class="panel-subtitle">Daftar contoh · semester berjalan</p></div><a class="section-link" href="#mahasiswa">Daftar mahasiswa</a></header>
                        <div class="table-scroll"><table class="student-table"><thead><tr><th>NIM</th><th>NAMA</th><th>PROGRAM STUDI</th><th>SEMESTER</th><th>IPK</th><th>STATUS AKADEMIK</th></tr></thead><tbody>
                            <tr><td>24XXXX01</td><td>Mahasiswa Contoh 01<span class="student-code">Data dummy</span></td><td>Informatika</td><td>4</td><td>3,62</td><td><span class="status-pill">Aktif · contoh</span></td></tr>
                            <tr><td>24XXXX02</td><td>Mahasiswa Contoh 02<span class="student-code">Data dummy</span></td><td>Sistem Informasi</td><td>4</td><td>2,31</td><td><span class="status-pill attention">Perlu perhatian</span></td></tr>
                            <tr><td>23XXXX03</td><td>Mahasiswa Contoh 03<span class="student-code">Data dummy</span></td><td>Informatika</td><td>6</td><td>3,14</td><td><span class="status-pill monitor">Pemantauan</span></td></tr>
                            <tr><td>24XXXX04</td><td>Mahasiswa Contoh 04<span class="student-code">Data dummy</span></td><td>Manajemen</td><td>4</td><td>3,48</td><td><span class="status-pill">Aktif · contoh</span></td></tr>
                        </tbody></table></div>
                        <p class="panel-footnote">Nama, NIM, program studi, semester, IPK, dan status di tabel ini sepenuhnya data contoh.</p>
                    </section>

                    <section class="panel" id="pemantauan" aria-labelledby="progress-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="progress-title">Perkembangan akademik</h2><p class="panel-subtitle">Ringkasan kelompok perwalian · contoh</p></div><a class="section-link" href="#pemantauan">Pemantauan akademik</a></header>
                        <div class="progress-list">
                            <div class="progress-item"><div class="progress-top"><strong>IPK rata-rata kelompok</strong><span>3,24 · contoh</span></div><div class="progress-track" role="progressbar" aria-label="IPK rata-rata kelompok contoh" aria-valuemin="0" aria-valuemax="4" aria-valuenow="3.24" style="margin-top:8px"><div class="progress-fill" style="width:81%"></div></div></div>
                            <div class="progress-item"><div class="progress-top"><strong>Target KRS disetujui</strong><span>18 dari 24 · contoh</span></div><div class="progress-track" role="progressbar" aria-label="Persetujuan KRS contoh" aria-valuemin="0" aria-valuemax="24" aria-valuenow="18" style="margin-top:8px"><div class="progress-fill" style="width:75%"></div></div></div>
                        </div>
                    </section>
                </div>

                <div class="column">
                    <section class="panel" id="krs" aria-labelledby="krs-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="krs-title">Ringkasan KRS</h2><p class="panel-subtitle">Status pengajuan contoh</p></div><a class="section-link" href="#krs">Status KRS</a></header>
                        <div class="krs-list">
                            <div class="krs-row"><div class="krs-label"><strong>Disetujui</strong>Contoh pengajuan KRS</div><span class="krs-count">18</span></div>
                            <div class="krs-row"><div class="krs-label"><strong>Menunggu persetujuan</strong>Contoh masih ditinjau</div><span class="krs-count">4</span></div>
                            <div class="krs-row"><div class="krs-label"><strong>Belum mengajukan</strong>Contoh belum dikirim</div><span class="krs-count">2</span></div>
                        </div>
                        <div class="krs-progress"><div class="progress-label"><span>Persetujuan contoh</span><span>75%</span></div><div class="progress-track" role="progressbar" aria-label="Persetujuan KRS contoh" aria-valuemin="0" aria-valuemax="100" aria-valuenow="75"><div class="progress-fill" style="width:75%"></div></div></div>
                    </section>

                    <section class="panel" aria-labelledby="attention-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="attention-title">Perlu perhatian akademik</h2><p class="panel-subtitle">Daftar tindak lanjut contoh</p></div><a class="section-link" href="#pemantauan">Pemantauan</a></header>
                        <div class="attention-list">
                            <div class="attention-row"><span class="attention-dot high" aria-hidden="true"></span><div class="attention-copy"><strong>Mahasiswa Contoh 02 · 24XXXX02</strong>IPK contoh di bawah 2,50</div></div>
                            <div class="attention-row"><span class="attention-dot" aria-hidden="true"></span><div class="attention-copy"><strong>Mahasiswa Contoh 03 · 23XXXX03</strong>Perlu pemantauan progres studi</div></div>
                            <div class="attention-row"><span class="attention-dot" aria-hidden="true"></span><div class="attention-copy"><strong>Mahasiswa Contoh 05 · 24XXXX05</strong>KRS contoh belum diajukan</div></div>
                        </div>
                    </section>

                    <section class="panel" aria-labelledby="advisor-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="advisor-title">Profil dosen wali contoh</h2><p class="panel-subtitle">Identitas bukan data nyata</p></div><a class="section-link" href="#profil">Profil</a></header>
                        <div class="krs-list" id="profil"><div class="krs-label"><strong>Dosen Wali Contoh</strong>NIDN-000000 · contoh</div><div class="krs-label" style="margin-top:12px">Program Studi Contoh · Fakultas Contoh</div></div>
                    </section>
                    <aside class="panel notice" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 11v5m0-8h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg><div>Data perwalian, status akademik, progres IPK, dan persetujuan KRS perlu dipasok backend berdasarkan kontrak data yang disepakati.</div></aside>
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
