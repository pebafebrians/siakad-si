<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102c50">
    <title>Dashboard Mahasiswa | SIAKAD</title>
    <style>
        :root { color-scheme: light; --navy: #102c50; --navy-2: #183e68; --blue: #356fe0; --ink: #172b45; --muted: #718096; --line: #e5ebf2; --canvas: #f4f7fb; --green: #16805d; --amber: #b66a13; }
        * { box-sizing: border-box; }
        body { margin: 0; min-width: 320px; min-height: 100vh; color: var(--ink); background: var(--canvas); font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        a { color: inherit; text-decoration: none; }
        button { font: inherit; }
        .app-shell { min-height: 100vh; }
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
        .stat-icon svg { width: 17px; height: 17px; }
        .stat-value { margin-top: 13px; color: var(--navy); font-size: 23px; font-weight: 760; letter-spacing: -.04em; }
        .stat-note { margin-top: 3px; color: #8a97a8; font-size: 10px; }
        .content-grid { display: grid; grid-template-columns: minmax(0, 1.55fr) minmax(270px, .85fr); gap: 17px; align-items: start; }
        .column { display: grid; gap: 17px; min-width: 0; }
        .panel { min-width: 0; overflow: hidden; }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 17px 19px; border-bottom: 1px solid #edf1f5; }
        .panel-title { margin: 0; color: var(--navy); font-size: 13px; font-weight: 730; }
        .panel-subtitle { margin: 4px 0 0; color: #8996a6; font-size: 10px; }
        .text-link { color: var(--blue); font-size: 10px; font-weight: 700; white-space: nowrap; }
        .schedule-list { padding: 2px 19px 8px; }
        .schedule-item { display: grid; grid-template-columns: 57px 1fr auto; gap: 13px; align-items: center; padding: 14px 0; border-bottom: 1px solid #f0f3f6; }
        .schedule-item:last-child { border-bottom: 0; }
        .time { color: #41658f; font-size: 10px; font-weight: 700; line-height: 1.5; }
        .course-name { color: #263b55; font-size: 11px; font-weight: 700; }
        .course-meta { margin-top: 4px; color: #8a97a8; font-size: 10px; }
        .room { padding: 5px 8px; border-radius: 7px; color: #68798e; background: #f4f7fa; font-size: 9px; white-space: nowrap; }
        .status-row { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 14px 19px; }
        .status-copy { color: #51657e; font-size: 11px; }
        .status-copy strong { display: block; margin-bottom: 4px; color: #263b55; font-size: 11px; }
        .status-badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 9px; border-radius: 20px; color: var(--green); background: #eaf8f1; font-size: 9px; font-weight: 750; white-space: nowrap; }
        .status-badge::before { width: 6px; height: 6px; border-radius: 50%; background: currentColor; content: ""; }
        .progress-wrap { padding: 0 19px 17px; }
        .progress-label { display: flex; justify-content: space-between; margin-bottom: 7px; color: #8996a6; font-size: 9px; }
        .progress-track { height: 6px; overflow: hidden; border-radius: 99px; background: #edf1f6; }
        .progress-fill { width: 100%; height: 100%; border-radius: inherit; background: linear-gradient(90deg, #4d80dd, #69a1f2); }
        .grade-summary { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; padding: 16px 19px 18px; }
        .grade-cell { padding: 12px; border-radius: 9px; background: #f7f9fc; }
        .grade-label { color: #8390a1; font-size: 9px; }
        .grade-value { margin-top: 6px; color: var(--navy); font-size: 19px; font-weight: 750; letter-spacing: -.03em; }
        .grade-foot { margin-top: 3px; color: #96a1af; font-size: 9px; }
        .notice { display: flex; align-items: flex-start; gap: 10px; padding: 14px 17px; color: #6a7890; font-size: 10px; line-height: 1.6; }
        .notice svg { width: 17px; height: 17px; flex: 0 0 auto; color: #5481c1; }
        .mobile-overlay { display: none; }
        @media (max-width: 1100px) { .stat-grid { grid-template-columns: repeat(2, minmax(0,1fr)); } .content-grid { grid-template-columns: minmax(0, 1.25fr) minmax(250px, .85fr); } }
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
            .schedule-list { padding: 0 15px 5px; }
            .schedule-item { grid-template-columns: 48px 1fr; gap: 10px; }
            .room { grid-column: 2; justify-self: start; margin-top: -5px; }
            .status-row { padding: 13px 15px; }
            .progress-wrap { padding: 0 15px 15px; }
            .grade-summary { padding: 14px 15px 15px; }
        }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
            <a class="brand" href="#beranda" aria-label="SIAKAD, Beranda">
                <span class="brand-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M4 19.5V8.7L12 4l8 4.7v10.8M8 19.5v-6h8v6M3 20h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 9h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
                <span class="brand-title">SIAKAD<span class="brand-subtitle">SISTEM INFORMASI AKADEMIK</span></span>
            </a>
            <p class="nav-caption">Menu Mahasiswa</p>
            <nav class="nav-list">
                <a class="nav-link" href="#beranda" aria-current="page"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3.5 10 8.5-7 8.5 7v9.5a1 1 0 0 1-1 1h-15a1 1 0 0 1-1-1V10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 20.5v-7h6v7" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>Beranda</a>
                <a class="nav-link" href="#krs"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3.5h8l4 4v13H7a2 2 0 0 1-2-2v-13a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14.5 3.5v5h4.5M9 13h6M9 16.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Kartu Rencana Studi<span class="nav-count">20</span></a>
                <a class="nav-link" href="#jadwal"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17M8 14h3m3.5 0H16M8 17.5h3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Jadwal Kuliah</a>
                <a class="nav-link" href="#nilai"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19.5h16M6.5 16V10m5 6V5m5 11v-8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="m5.5 7 5-3 5 2 4-3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>Nilai Akademik</a>
                <a class="nav-link" href="#profil"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 20c.6-3.5 3.2-5.5 7.5-5.5s6.9 2 7.5 5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Profil</a>
            </nav>
            <div class="sidebar-bottom">
                <p class="sidebar-note"><strong>Mode prototipe</strong>Informasi pada halaman ini adalah contoh untuk pratinjau UI.</p>
                <div class="sidebar-footer">© {{ date('Y') }} SIAKAD · Prototipe frontend</div>
            </div>
        </aside>
        <button class="mobile-overlay" id="mobile-overlay" type="button" aria-label="Tutup menu"></button>

        <main class="main" id="beranda">
            <header class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-controls="sidebar" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></button>
                    <div><h1 class="page-heading">Dashboard Mahasiswa</h1><div class="breadcrumb">Beranda <span aria-hidden="true">/</span> Ringkasan akademik</div></div>
                </div>
                <div class="profile" id="profil">
                    <div class="profile-copy"><div class="profile-name">Mahasiswa Contoh</div><div class="profile-role">Profil contoh · bukan data nyata</div></div>
                    <div class="avatar" aria-label="Inisial contoh">MC</div>
                </div>
            </header>

            <div class="content">
                <div class="prototype-banner" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.8 2.9 17a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 3.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg><div><strong>Prototipe frontend — data di bawah ini hanya contoh.</strong> Halaman ini belum terhubung ke autentikasi maupun backend, dan route prototipe belum dilindungi. Amankan sebelum dipakai pada aplikasi nyata.</div></div>

                <section class="welcome-row" aria-labelledby="welcome-title">
                    <div><h2 id="welcome-title">Selamat pagi, Mahasiswa Contoh</h2><p>Berikut ringkasan aktivitas akademik contoh Anda.</p></div>
                    <div class="term-pill"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Semester Ganjil 2026/2027 · contoh</div>
                </section>

                <section class="stat-grid" aria-label="Ringkasan akademik contoh">
                    <article class="stat-card"><div class="stat-top"><span class="stat-label">IPK sementara</span><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9L12 3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg></span></div><div class="stat-value">3,78</div><div class="stat-note">Contoh · skala 4,00</div></article>
                    <article class="stat-card"><div class="stat-top"><span class="stat-label">SKS ditempuh</span><span class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5ZM4 17a2.5 2.5 0 0 1 2.5-2.5H20M8 7h8m-8 3.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div><div class="stat-value">86 <small style="font-size:12px;font-weight:600">SKS</small></div><div class="stat-note">Contoh · progres studi</div></article>
                    <article class="stat-card"><div class="stat-top"><span class="stat-label">Mata kuliah aktif</span><span class="stat-icon gold"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5ZM4 17a2.5 2.5 0 0 1 2.5-2.5H20" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></span></div><div class="stat-value">6</div><div class="stat-note">Contoh · semester berjalan</div></article>
                    <article class="stat-card"><div class="stat-top"><span class="stat-label">Jadwal hari ini</span><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.7"/><path d="M12 7v5l3.5 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><div class="stat-value">3</div><div class="stat-note">Contoh · Senin</div></article>
                </section>

                <div class="content-grid">
                    <div class="column">
                        <section class="panel" id="jadwal" aria-labelledby="schedule-title">
                            <header class="panel-header"><div><h2 class="panel-title" id="schedule-title">Jadwal kuliah hari ini</h2><p class="panel-subtitle">Senin · jadwal contoh</p></div><a class="text-link" href="#jadwal">Lihat jadwal</a></header>
                            <div class="schedule-list">
                                <article class="schedule-item"><div class="time">08.00<br>09.40</div><div><div class="course-name">Pemrograman Web</div><div class="course-meta">IF204 · Dosen Contoh</div></div><span class="room">Ruang A-201</span></article>
                                <article class="schedule-item"><div class="time">10.00<br>11.40</div><div><div class="course-name">Basis Data</div><div class="course-meta">IF206 · Dosen Contoh</div></div><span class="room">Lab Komputer 2</span></article>
                                <article class="schedule-item"><div class="time">13.00<br>14.40</div><div><div class="course-name">Interaksi Manusia dan Komputer</div><div class="course-meta">IF210 · Dosen Contoh</div></div><span class="room">Ruang B-103</span></article>
                            </div>
                        </section>
                        <section class="panel" id="krs" aria-labelledby="krs-title">
                            <header class="panel-header"><div><h2 class="panel-title" id="krs-title">Status Kartu Rencana Studi</h2><p class="panel-subtitle">Semester Ganjil 2026/2027 · contoh</p></div><a class="text-link" href="#krs">Detail KRS</a></header>
                            <div class="status-row"><div class="status-copy"><strong>KRS telah disetujui</strong>Contoh status untuk pratinjau antarmuka</div><span class="status-badge">Disetujui · contoh</span></div>
                            <div class="progress-wrap"><div class="progress-label"><span>Kuota contoh</span><span>20 / 24 SKS</span></div><div class="progress-track" role="progressbar" aria-label="Kuota SKS contoh" aria-valuemin="0" aria-valuemax="24" aria-valuenow="20"><div class="progress-fill" style="width:83.33%"></div></div></div>
                        </section>
                    </div>

                    <div class="column">
                        <section class="panel" id="nilai" aria-labelledby="grade-title">
                            <header class="panel-header"><div><h2 class="panel-title" id="grade-title">Ringkasan nilai</h2><p class="panel-subtitle">Rekap akademik contoh</p></div><a class="text-link" href="#nilai">Lihat nilai</a></header>
                            <div class="grade-summary"><div class="grade-cell"><div class="grade-label">IPK kumulatif</div><div class="grade-value">3,78</div><div class="grade-foot">Contoh dari 4,00</div></div><div class="grade-cell"><div class="grade-label">IPS terakhir</div><div class="grade-value">3,82</div><div class="grade-foot">Contoh semester lalu</div></div></div>
                        </section>
                        <section class="panel" aria-labelledby="profile-detail-title">
                            <header class="panel-header"><div><h2 class="panel-title" id="profile-detail-title">Profil akademik contoh</h2><p class="panel-subtitle">Identitas berikut bukan data nyata</p></div><a class="text-link" href="#profil">Profil</a></header>
                            <div class="status-row"><div class="status-copy"><strong>NIM-000000 · contoh</strong>Program Studi Contoh<br>Angkatan 2024 · contoh</div><span class="room">Aktif · contoh</span></div>
                        </section>
                        <aside class="panel notice" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 11v5m0-8h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg><div>Data akademik pada halaman ini statis sebagai contoh desain. Nilai, KRS, jadwal, dan profil perlu disediakan backend setelah kontrak data disepakati.</div></aside>
                    </div>
                </div>
            </div>
        </main>
    </div>
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
