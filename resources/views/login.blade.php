<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102c50">
    <title>Masuk | SIAKAD</title>
    <style>
        :root { color-scheme: light; --navy: #102c50; --navy-deep: #0b203b; --blue: #2563eb; --ink: #172b45; --muted: #64748b; --line: #d9e2ec; }
        * { box-sizing: border-box; }
        body { margin: 0; min-width: 320px; min-height: 100vh; font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color: var(--ink); background: #f3f6fa; }
        .page { min-height: 100vh; display: grid; grid-template-columns: minmax(300px, 0.92fr) minmax(440px, 1.08fr); }
        .welcome-panel { position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; padding: 44px clamp(32px, 6vw, 88px); color: white; background: radial-gradient(ellipse at 8% 78%, rgba(37,99,235,.35), transparent 42%), linear-gradient(145deg, var(--navy), var(--navy-deep)); }
        .welcome-panel::before, .welcome-panel::after { position: absolute; content: ""; border: 1px solid rgba(255,255,255,.09); border-radius: 50%; pointer-events: none; }
        .welcome-panel::before { width: 520px; height: 520px; right: -260px; top: 10%; }
        .welcome-panel::after { width: 390px; height: 390px; right: -196px; top: 18%; }
        .brand, .welcome-copy, .panel-footer { position: relative; z-index: 1; }
        .brand { display: inline-flex; gap: 13px; align-items: center; font-weight: 750; letter-spacing: .02em; }
        .brand-mark { width: 42px; height: 42px; display: grid; place-items: center; border-radius: 12px; background: rgba(255,255,255,.13); border: 1px solid rgba(255,255,255,.22); }
        .brand-mark svg { width: 24px; height: 24px; }
        .brand-name { font-size: 17px; }
        .brand-subtitle { display: block; margin-top: 2px; color: #b8c8dd; font-size: 11px; font-weight: 500; letter-spacing: .13em; }
        .welcome-copy { max-width: 490px; margin: 64px 0; }
        .eyebrow { margin: 0 0 18px; color: #a9c8ff; font-size: 12px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .welcome-copy h1 { margin: 0; font-size: clamp(34px, 4vw, 54px); line-height: 1.12; letter-spacing: -.04em; }
        .welcome-copy p { max-width: 410px; margin: 22px 0 0; color: #c2d0e1; font-size: 16px; line-height: 1.75; }
        .panel-footer { color: #aebed1; font-size: 12px; }
        .login-panel { display: grid; place-items: center; padding: 48px 28px; }
        .login-card { width: min(100%, 440px); padding: 44px 42px; border: 1px solid #e5ebf2; border-radius: 20px; background: white; box-shadow: 0 20px 60px rgba(16,44,80,.08); }
        .mobile-brand { display: none; }
        .login-card h2 { margin: 0; color: var(--navy); font-size: 28px; letter-spacing: -.03em; }
        .intro { margin: 9px 0 30px; color: var(--muted); font-size: 14px; line-height: 1.6; }
        .field { margin-bottom: 20px; }
        .field-label { display: flex; justify-content: space-between; gap: 12px; margin-bottom: 8px; color: #263b55; font-size: 13px; font-weight: 650; }
        .field-hint { color: #8795a7; font-size: 11px; font-weight: 500; }
        .input-wrap { position: relative; }
        .input-wrap input { width: 100%; height: 50px; padding: 0 15px; border: 1px solid var(--line); border-radius: 9px; outline: none; background: #fff; color: var(--ink); font: inherit; font-size: 14px; transition: border-color .15s, box-shadow .15s; }
        .input-wrap input::placeholder { color: #a1adba; }
        .input-wrap input:focus { border-color: #5b8def; box-shadow: 0 0 0 3px rgba(37,99,235,.12); }
        .password-input { padding-right: 74px !important; }
        .toggle-password { position: absolute; top: 50%; right: 12px; transform: translateY(-50%); border: 0; padding: 5px; color: #53677f; background: transparent; font: inherit; font-size: 12px; font-weight: 650; cursor: pointer; }
        .form-options { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin: 2px 0 25px; font-size: 12px; }
        .remember { display: inline-flex; align-items: center; gap: 8px; color: #53677f; cursor: pointer; }
        .remember input { width: 15px; height: 15px; margin: 0; accent-color: var(--blue); }
        .forgot { color: var(--blue); font-weight: 650; text-decoration: none; }
        .forgot:hover { text-decoration: underline; }
        .submit-button { width: 100%; height: 50px; display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 0; border-radius: 9px; color: #fff; background: var(--navy); font: inherit; font-size: 14px; font-weight: 700; cursor: pointer; transition: background .15s, transform .15s; }
        .submit-button:hover { background: #183d69; }
        .submit-button:active { transform: translateY(1px); }
        .submit-button svg { width: 17px; height: 17px; }
        .security-note { display: flex; justify-content: center; align-items: center; gap: 7px; margin: 22px 0 0; color: #8996a6; font-size: 11px; }
        .security-note svg { width: 14px; height: 14px; color: #5276a5; }
        @media (max-width: 800px) {
            .page { grid-template-columns: 1fr; }
            .welcome-panel { display: none; }
            .login-panel { min-height: 100vh; align-items: start; padding: 36px 20px; background: radial-gradient(ellipse at 50% 0, #dfeaff, transparent 55%), #f3f6fa; }
            .login-card { margin: auto 0; padding: 34px 28px; }
            .mobile-brand { display: flex; align-items: center; gap: 11px; margin-bottom: 35px; color: var(--navy); }
            .mobile-brand .brand-mark { color: white; background: var(--navy); }
        }
        @media (max-width: 420px) {
            .login-panel { padding: 20px 14px; }
            .login-card { padding: 28px 21px; border-radius: 16px; }
            .mobile-brand { margin-bottom: 28px; }
            .login-card h2 { font-size: 25px; }
            .form-options { font-size: 11px; }
        }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <main class="page">
        <section class="welcome-panel" aria-label="Informasi SIAKAD">
            <div class="brand">
                <span class="brand-mark" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M4 19.5V8.7L12 4l8 4.7v10.8M8 19.5v-6h8v6M3 20h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 9h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
                <span class="brand-name">SIAKAD<span class="brand-subtitle">SISTEM INFORMASI AKADEMIK</span></span>
            </div>
            <div class="welcome-copy">
                <p class="eyebrow">Portal Akademik</p>
                <h1>Awali langkah akademik Anda.</h1>
                <p>Masuk ke portal akademik untuk mengakses informasi dan layanan perkuliahan Anda.</p>
            </div>
            <footer class="panel-footer">© {{ date('Y') }} Sistem Informasi Akademik</footer>
        </section>

        <section class="login-panel" aria-labelledby="login-title">
            <div class="login-card">
                <div class="mobile-brand" aria-hidden="true">
                    <span class="brand-mark"><svg viewBox="0 0 24 24" fill="none"><path d="M4 19.5V8.7L12 4l8 4.7v10.8M8 19.5v-6h8v6M3 20h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 9h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span>
                    <span class="brand-name">SIAKAD<span class="brand-subtitle">SISTEM INFORMASI AKADEMIK</span></span>
                </div>
                <h2 id="login-title">Selamat datang</h2>
                <p class="intro">Masukkan identitas akun Anda untuk melanjutkan.</p>
                <form>
                    <div class="field">
                        <label class="field-label" for="identity">Username</label>
                        <div class="input-wrap"><input id="identity" name="identity" type="text" placeholder="Masukkan Username" autocomplete="username"></div>
                    </div>
                    <div class="field">
                        <label class="field-label" for="password">Kata sandi</label>
                        <div class="input-wrap"><input class="password-input" id="password" name="password" type="password" placeholder="Masukkan kata sandi" autocomplete="current-password"><button class="toggle-password" type="button" aria-controls="password" aria-pressed="false">Tampilkan</button></div>
                    </div>
                    <div class="form-options">
                        <label class="remember"><input type="checkbox" name="remember"><span>Ingat saya</span></label>
                        <a class="forgot" href="#">Lupa kata sandi?</a>
                    </div>
                    <button class="submit-button" type="button">Masuk <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                </form>
                <p class="security-note"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 19 6v5c0 4.7-3 8-7 10-4-2-7-5.3-7-10V6l7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>UNIVERSITAS SISTEM INFORMASI</p>
            </div>
        </section>
    </main>
    <script>
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const password = document.getElementById(this.getAttribute('aria-controls'));
            const visible = password.type === 'password';
            password.type = visible ? 'text' : 'password';
            this.textContent = visible ? 'Sembunyikan' : 'Tampilkan';
            this.setAttribute('aria-pressed', String(visible));
        });
    </script>
</body>
</html>
