<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102c50">
    <title>Dashboard Bendahara | SIAKAD</title>
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
        .nav-link { display: flex; align-items: center; gap: 12px; min-height: 43px; padding: 0 12px; border-radius: 9px; color: #c2d0e1; font-size: 12px; font-weight: 560; transition: background .15s, color .15s; }
        .nav-link svg { width: 18px; height: 18px; flex: 0 0 auto; opacity: .9; }
        .nav-link:hover { color: white; background: rgba(255,255,255,.08); }
        .nav-link[aria-current="page"] { color: white; background: #234a76; box-shadow: inset 3px 0 #8db8ff; }
        .nav-count { margin-left: auto; padding: 3px 7px; border-radius: 20px; color: #d8e8ff; background: rgba(255,255,255,.12); font-size: 10px; }
        .sidebar-bottom { margin-top: auto; }
        .sidebar-note { margin: 0 5px 14px; padding: 12px; border: 1px solid rgba(255,255,255,.12); border-radius: 10px; color: #bdcde0; background: rgba(255,255,255,.05); font-size: 10px; line-height: 1.55; }
        .sidebar-note strong { display: block; margin-bottom: 3px; color: #fff; font-size: 10px; }
        .sidebar-footer { padding: 13px 9px 0; border-top: 1px solid rgba(255,255,255,.12); color: #8fa5bf; font-size: 10px; }
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
        .stat-card { min-height: 125px; padding: 15px 17px; }
        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .stat-label { color: var(--muted); font-size: 11px; font-weight: 600; }
        .stat-icon { display: grid; width: 32px; height: 32px; place-items: center; border-radius: 9px; color: #3769b2; background: #edf4ff; }
        .stat-icon.green { color: #167455; background: #e8f7f1; }
        .stat-icon.gold { color: #a66417; background: #fff4e5; }
        .stat-icon.red { color: #a93f4c; background: #fff0f1; }
        .stat-icon svg { width: 17px; height: 17px; }
        .stat-value { margin-top: 10px; color: var(--navy); font-size: 21px; font-weight: 760; letter-spacing: -.04em; }
        .stat-note { margin-top: 3px; color: #8a97a8; font-size: 10px; }
        .content-grid { display: grid; grid-template-columns: minmax(0, 1.45fr) minmax(280px, .9fr); gap: 16px; align-items: start; }
        .column { display: grid; gap: 16px; min-width: 0; }
        .panel { min-width: 0; overflow: hidden; }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 16px 18px; border-bottom: 1px solid #edf1f5; }
        .panel-title { margin: 0; color: var(--navy); font-size: 13px; font-weight: 730; }
        .panel-subtitle { margin: 4px 0 0; color: #8996a6; font-size: 10px; }
        .section-link { color: var(--blue); font-size: 10px; font-weight: 700; white-space: nowrap; }
        .table-scroll { overflow-x: auto; }
        .data-table { width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap; }
        .data-table th { padding: 11px 12px; color: #8794a5; background: #f9fbfd; font-size: 9px; font-weight: 700; }
        .data-table td { padding: 12px; border-top: 1px solid #f0f3f6; color: #53677f; font-size: 10px; }
        .data-table td:first-child { color: #263b55; font-weight: 700; }
        .row-meta { display: block; margin-top: 4px; color: #8a97a8; font-size: 9px; font-weight: 500; }
        .status-pill { display: inline-flex; align-items: center; gap: 5px; padding: 5px 8px; border-radius: 20px; color: var(--green); background: #eaf8f1; font-size: 9px; font-weight: 700; }
        .status-pill::before { width: 5px; height: 5px; border-radius: 50%; background: currentColor; content: ""; }
        .status-pill.pending { color: var(--amber); background: #fff4e5; }
        .status-pill.overdue { color: var(--red); background: #fff0f1; }
        .panel-footnote { margin: 0; padding: 0 16px 14px; color: #8996a6; font-size: 9px; }
        .payment-summary { padding: 4px 18px 15px; }
        .payment-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 11px 0; border-bottom: 1px solid #f0f3f6; }
        .payment-row:last-child { border-bottom: 0; }
        .payment-label { color: #53677f; font-size: 10px; }
        .payment-label strong { display: block; margin-bottom: 3px; color: #344a64; font-size: 10px; }
        .payment-value { color: var(--navy); font-size: 12px; font-weight: 750; white-space: nowrap; }
        .progress-label { display: flex; justify-content: space-between; margin: 0 0 7px; color: #8996a6; font-size: 9px; }
        .progress-track { height: 6px; overflow: hidden; border-radius: 99px; background: #edf1f6; }
        .progress-fill { height: 100%; border-radius: inherit; background: linear-gradient(90deg, #4d80dd, #69a1f2); }
        .recent-list { padding: 2px 17px 8px; }
        .recent-item { display: grid; grid-template-columns: 30px minmax(0, 1fr) auto; gap: 9px; align-items: center; padding: 11px 0; border-bottom: 1px solid #f0f3f6; }
        .recent-item:last-child { border-bottom: 0; }
        .recent-icon { display: grid; width: 29px; height: 29px; place-items: center; border-radius: 8px; color: #167455; background: #e8f7f1; }
        .recent-icon svg { width: 15px; height: 15px; }
        .recent-copy { min-width: 0; color: #8290a1; font-size: 9px; line-height: 1.4; }
        .recent-copy strong { display: block; overflow: hidden; margin-bottom: 3px; color: #344a64; font-size: 10px; text-overflow: ellipsis; }
        .recent-amount { color: var(--navy); font-size: 9px; font-weight: 700; white-space: nowrap; }
        .report-box { padding: 15px 17px 16px; color: #6c7d92; font-size: 10px; line-height: 1.55; }
        .report-box strong { display: block; margin-bottom: 4px; color: #344a64; font-size: 11px; }
        .mobile-overlay { display: none; }
        @media (max-width: 1120px) { .stat-grid { grid-template-columns: repeat(2, minmax(0,1fr)); } .content-grid { grid-template-columns: minmax(0, 1.2fr) minmax(260px, .85fr); } }
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
            .stat-value { font-size: 19px; }
            .stat-label { font-size: 10px; }
            .panel-header { padding: 14px; }
            .data-table th, .data-table td { padding-right: 10px; padding-left: 10px; }
            .recent-list, .payment-summary { padding-right: 14px; padding-left: 14px; }
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
        <p class="nav-caption">Menu Bendahara</p>
        <nav class="nav-list">
            <a class="nav-link" href="#beranda" aria-current="page"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3.5 10 8.5-7 8.5 7v9.5a1 1 0 0 1-1 1h-15a1 1 0 0 1-1-1V10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 20.5v-7h6v7" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>Beranda</a>
            <a class="nav-link" href="#tagihan"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3.5h8l4 4v13H7a2 2 0 0 1-2-2v-13a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14.5 3.5v5h4.5M9 13h6m-6 3.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Tagihan<span class="nav-count">42</span></a>
            <a class="nav-link" href="#pembayaran"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M3 10h18M7 15h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Pembayaran</a>
            <a class="nav-link" href="#transaksi"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 6h14M5 12h14M5 18h14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="3" cy="6" r=".7" fill="currentColor"/><circle cx="3" cy="12" r=".7" fill="currentColor"/><circle cx="3" cy="18" r=".7" fill="currentColor"/></svg>Riwayat Transaksi</a>
            <a class="nav-link" href="#laporan"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19.5h16M6.5 16V10m5 6V5m5 11v-8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="m5.5 7 5-3 5 2 4-3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>Laporan</a>
            <a class="nav-link" href="#profil"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 20c.6-3.5 3.2-5.5 7.5-5.5s6.9 2 7.5 5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Profil</a>
        </nav>
        <div class="sidebar-bottom"><p class="sidebar-note"><strong>Mode prototipe</strong>Semua nominal dan transaksi di halaman ini hanya contoh UI.</p><div class="sidebar-footer">© {{ date('Y') }} SIAKAD · Prototipe frontend</div></div>
    </aside>
    <button class="mobile-overlay" id="mobile-overlay" type="button" aria-label="Tutup menu"></button>

    <main class="main" id="beranda">
        <header class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" id="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-controls="sidebar" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></button>
                <div><h1 class="page-heading">Dashboard Bendahara</h1><div class="breadcrumb">Beranda <span aria-hidden="true">/</span> Ringkasan keuangan</div></div>
            </div>
            <div class="profile" id="profil"><div class="profile-copy"><div class="profile-name">Bendahara Contoh</div><div class="profile-role">Profil contoh · bukan data nyata</div></div><div class="avatar" aria-label="Inisial contoh">BC</div></div>
        </header>

        <div class="content">
            <div class="prototype-banner" role="note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.8 2.9 17a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 3.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg><div><strong>Prototipe frontend — seluruh nominal, mahasiswa, dan transaksi adalah data dummy.</strong> Halaman ini tidak memproses pembayaran atau menyimpan transaksi. Route demonstrasi belum memiliki autentikasi/otorisasi dan wajib diamankan sebelum penggunaan nyata.</div></div>

            <section class="welcome-row" aria-labelledby="welcome-title"><div><h2 id="welcome-title">Ringkasan keuangan</h2><p>Ikhtisar tagihan dan pembayaran contoh untuk periode akademik aktif.</p></div><div class="term-pill"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M7.5 3v4M16.5 3v4M3.5 10h17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Semester Ganjil 2026/2027 · contoh</div></section>

            <section class="stat-grid" aria-label="Ringkasan pembayaran contoh">
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Total tagihan</span><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3.5h8l4 4v13H7a2 2 0 0 1-2-2v-13a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14.5 3.5v5h4.5M9 13h6m-6 3.5h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><div class="stat-value">Rp 28,75 jt</div><div class="stat-note">Contoh · periode aktif</div></article>
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Pembayaran diterima</span><span class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m5 12 4.2 4.2L19 6.5" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/></svg></span></div><div class="stat-value">Rp 21,40 jt</div><div class="stat-note">Contoh · status tercatat</div></article>
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Tunggakan</span><span class="stat-icon red"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.8 2.9 17a2 2 0 0 0 1.7 3h14.8a2 2 0 0 0 1.7-3L13.7 3.8a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div><div class="stat-value">Rp 7,35 jt</div><div class="stat-note">Contoh · belum lunas</div></article>
                <article class="stat-card"><div class="stat-top"><span class="stat-label">Jumlah transaksi</span><span class="stat-icon gold"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 6h14M5 12h14M5 18h14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="3" cy="6" r=".7" fill="currentColor"/><circle cx="3" cy="12" r=".7" fill="currentColor"/><circle cx="3" cy="18" r=".7" fill="currentColor"/></svg></span></div><div class="stat-value">142</div><div class="stat-note">Contoh · seluruh status</div></article>
            </section>

            <div class="content-grid">
                <div class="column">
                    <section class="panel" id="transaksi" aria-labelledby="transactions-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="transactions-title">Riwayat transaksi</h2><p class="panel-subtitle">Daftar transaksi contoh · bukan bukti pembayaran</p></div><a class="section-link" href="#transaksi">Riwayat transaksi</a></header>
                        <div class="table-scroll"><table class="data-table"><thead><tr><th>NOMOR TRANSAKSI</th><th>TANGGAL</th><th>IDENTITAS MAHASISWA</th><th>JENIS PEMBAYARAN</th><th>JUMLAH</th><th>STATUS</th></tr></thead><tbody>
                            <tr><td>TRX-CONTOH-001<span class="row-meta">Dummy</span></td><td>23 Okt 2026</td><td>NIM-000001<span class="row-meta">Mahasiswa Contoh 01</span></td><td>UKT</td><td>Rp 3.500.000</td><td><span class="status-pill">Tercatat · contoh</span></td></tr>
                            <tr><td>TRX-CONTOH-002<span class="row-meta">Dummy</span></td><td>22 Okt 2026</td><td>NIM-000002<span class="row-meta">Mahasiswa Contoh 02</span></td><td>Biaya Laboratorium</td><td>Rp 450.000</td><td><span class="status-pill pending">Menunggu · contoh</span></td></tr>
                            <tr><td>TRX-CONTOH-003<span class="row-meta">Dummy</span></td><td>21 Okt 2026</td><td>NIM-000003<span class="row-meta">Mahasiswa Contoh 03</span></td><td>UKT</td><td>Rp 3.500.000</td><td><span class="status-pill">Tercatat · contoh</span></td></tr>
                            <tr><td>TRX-CONTOH-004<span class="row-meta">Dummy</span></td><td>20 Okt 2026</td><td>NIM-000004<span class="row-meta">Mahasiswa Contoh 04</span></td><td>Biaya Praktikum</td><td>Rp 275.000</td><td><span class="status-pill overdue">Perlu tinjauan · contoh</span></td></tr>
                        </tbody></table></div>
                        <p class="panel-footnote">Semua nomor, tanggal, identitas, jenis, nominal, dan status transaksi hanya contoh UI.</p>
                    </section>

                    <section class="panel" id="tagihan" aria-labelledby="invoices-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="invoices-title">Tagihan mahasiswa</h2><p class="panel-subtitle">Contoh tagihan periode berjalan</p></div><a class="section-link" href="#tagihan">Daftar tagihan</a></header>
                        <div class="table-scroll"><table class="data-table"><thead><tr><th>NIM</th><th>NAMA</th><th>JENIS TAGIHAN</th><th>JATUH TEMPO</th><th>JUMLAH TAGIHAN</th><th>STATUS</th></tr></thead><tbody>
                            <tr><td>NIM-000005</td><td>Mahasiswa Contoh 05</td><td>UKT</td><td>30 Okt 2026</td><td>Rp 3.500.000</td><td><span class="status-pill pending">Belum dibayar · contoh</span></td></tr>
                            <tr><td>NIM-000006</td><td>Mahasiswa Contoh 06</td><td>Biaya Laboratorium</td><td>25 Okt 2026</td><td>Rp 450.000</td><td><span class="status-pill overdue">Terlambat · contoh</span></td></tr>
                            <tr><td>NIM-000007</td><td>Mahasiswa Contoh 07</td><td>UKT</td><td>5 Nov 2026</td><td>Rp 3.500.000</td><td><span class="status-pill">Lunas · contoh</span></td></tr>
                        </tbody></table></div>
                        <p class="panel-footnote">Identitas, nominal, jatuh tempo, dan status tagihan adalah data dummy, bukan tagihan nyata.</p>
                    </section>
                </div>

                <div class="column">
                    <section class="panel" id="pembayaran" aria-labelledby="payment-status-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="payment-status-title">Status pembayaran mahasiswa</h2><p class="panel-subtitle">Distribusi contoh pada periode ini</p></div></header>
                        <div class="payment-summary">
                            <div class="payment-row"><div class="payment-label"><strong>Lunas</strong>Contoh tercatat</div><span class="payment-value">104</span></div>
                            <div class="payment-row"><div class="payment-label"><strong>Belum lunas</strong>Contoh ada sisa tagihan</div><span class="payment-value">23</span></div>
                            <div class="payment-row"><div class="payment-label"><strong>Menunggu verifikasi</strong>Contoh belum ditinjau</div><span class="payment-value">15</span></div>
                            <div style="padding-top:12px"><div class="progress-label"><span>Rasio pelunasan contoh</span><span>73%</span></div><div class="progress-track" role="progressbar" aria-label="Rasio pelunasan contoh" aria-valuemin="0" aria-valuemax="100" aria-valuenow="73"><div class="progress-fill" style="width:73%"></div></div></div>
                        </div>
                    </section>
                    <section class="panel" aria-labelledby="recent-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="recent-title">Pembayaran terbaru</h2><p class="panel-subtitle">Ringkasan contoh · tidak ada pemrosesan</p></div><a class="section-link" href="#transaksi">Lihat transaksi</a></header>
                        <div class="recent-list">
                            <div class="recent-item"><span class="recent-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 4.2 4.2L19 6.5" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span><div class="recent-copy"><strong>Mahasiswa Contoh 01</strong>UKT · hari ini, 09.20</div><span class="recent-amount">Rp 3,5 jt</span></div>
                            <div class="recent-item"><span class="recent-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 4.2 4.2L19 6.5" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span><div class="recent-copy"><strong>Mahasiswa Contoh 03</strong>UKT · kemarin, 14.05</div><span class="recent-amount">Rp 3,5 jt</span></div>
                            <div class="recent-item"><span class="recent-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 4.2 4.2L19 6.5" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span><div class="recent-copy"><strong>Mahasiswa Contoh 08</strong>Biaya praktikum · kemarin</div><span class="recent-amount">Rp 275 rb</span></div>
                        </div>
                    </section>
                    <section class="panel" id="laporan" aria-labelledby="report-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="report-title">Ringkasan laporan</h2><p class="panel-subtitle">Ikhtisar dummy periode akademik</p></div></header>
                        <div class="report-box"><strong>Rekap periode · contoh</strong>Total tagihan contoh Rp 28,75 juta; pembayaran diterima contoh Rp 21,40 juta; sisa tagihan contoh Rp 7,35 juta. Angka ini hanya untuk demonstrasi visual.</div>
                    </section>
                    <section class="panel" aria-labelledby="treasurer-profile-title">
                        <header class="panel-header"><div><h2 class="panel-title" id="treasurer-profile-title">Profil bendahara contoh</h2><p class="panel-subtitle">Identitas bukan data nyata</p></div><a class="section-link" href="#profil">Profil</a></header>
                        <div class="report-box" id="profil"><strong>Bendahara Contoh</strong>Username: bendahara.contoh · Unit keuangan contoh</div>
                    </section>
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
