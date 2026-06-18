<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar Admin Baru – BPAD NTT">
    <title>Daftar Admin Baru – BPAD NTT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>(function(){var t=localStorage.getItem('bpad-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})();</script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:#030712;--card:rgba(30,41,59,.45);--border:rgba(255,255,255,.08);
            --text:#f9fafb;--text-mid:#e2eaf8;--text-muted:#9ca3af;
            --accent:#3b82f6;--accent-dark:#1d4ed8;--accent-soft:#93c5fd;
            --accent-glow:rgba(59,130,246,.22);--accent-bg:rgba(59,130,246,.10);
            --input-bg:rgba(15,23,42,.6);--input-f:rgba(15,23,42,.85);--ph:#2d4a6a;
            --danger:#f87171;--danger-bg:rgba(248,113,113,.10);
            --tb-bg:rgba(3,7,18,.75);--radius:24px;--radius-sm:14px;
        }
        [data-theme="light"] {
            --bg:#eef4ff;--card:#ffffff;--border:rgba(59,130,246,.12);
            --text:#0f172a;--text-mid:#1e3a5f;--text-muted:#4a6fa5;
            --accent:#2563eb;--accent-dark:#1d4ed8;--accent-soft:#3b82f6;
            --accent-glow:rgba(37,99,235,.18);--accent-bg:rgba(37,99,235,.08);
            --input-bg:#f8faff;--input-f:#ffffff;--ph:#93b4d8;
            --danger:#dc2626;--danger-bg:rgba(220,38,38,.08);
            --tb-bg:rgba(238,244,255,.85);--radius:24px;--radius-sm:14px;
        }

        :root {
            --bg: #030712;
            --card: rgba(30, 41, 59, 0.45);
            --border: rgba(255, 255, 255, 0.08);
            --text: #f9fafb;
            --text-muted: #9ca3af;
            --accent: #3b82f6;
            --accent-dark: #1d4ed8;
            --accent-glow: rgba(59, 130, 246, 0.25);
            --success: #34d399;
            --danger: #f87171;
            --danger-bg: rgba(248, 113, 113, 0.1);
            --radius: 24px;
            --radius-sm: 14px;
        }

        html, body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(ellipse at top left, #0f172a 0%, #030712 65%);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background .35s ease, color .35s ease;
        }
        [data-theme="light"] html, [data-theme="light"] body { background: var(--bg); }

        /* Background blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(110px);
            pointer-events: none;
            z-index: 0;
        }
        .blob-1 {
            width: 550px; height: 550px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.16) 0%, transparent 70%);
            top: -120px; left: -120px;
            opacity: 0.5;
            animation: floatBlob 14s ease-in-out infinite alternate;
        }
        .blob-2 {
            width: 450px; height: 450px;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.12) 0%, transparent 70%);
            bottom: -80px; right: -80px;
            opacity: 0.4;
            animation: floatBlob 17s ease-in-out infinite alternate-reverse;
        }
        @keyframes floatBlob {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(40px, 30px) scale(1.08); }
        }

        /* ── Topbar ── */
        .topbar {
            display: flex; align-items: center; gap: 16px;
            padding: 20px 32px;
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0;
            background: rgba(3, 7, 18, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 50;
        }
        .btn-back {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 18px; border-radius: var(--radius-sm);
            background: rgba(255, 255, 255, 0.05); border: 1px solid var(--border);
            color: var(--text-muted); font-family: inherit; font-size: 13.5px; font-weight: 600;
            cursor: pointer; text-decoration: none; transition: all .2s;
        }
        .btn-back:hover { background: rgba(255, 255, 255, 0.1); color: var(--text); }
        .topbar h1 { font-size: 18px; font-weight: 800; letter-spacing: -0.01em; }

        /* ── Content ── */
        .content {
            max-width: 600px; margin: 0 auto;
            padding: 48px 24px 80px;
            position: relative; z-index: 1;
        }

        /* ── Page header ── */
        .page-header {
            text-align: center;
            margin-bottom: 36px;
        }
        .page-header-icon {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            font-size: 38px;
            margin: 0 auto 20px;
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.35);
            position: relative;
        }
        .page-header-icon::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.4), rgba(139, 92, 246, 0.4));
            z-index: -1;
            filter: blur(8px);
        }
        .page-header h2 { font-size: 26px; font-weight: 800; letter-spacing: -0.02em; }
        .page-header p  { font-size: 14px; color: var(--text-muted); margin-top: 8px; font-weight: 500; }

        /* ── Alerts ── */
        .alert {
            padding: 14px 18px; border-radius: var(--radius-sm);
            font-size: 14px; font-weight: 600;
            margin-bottom: 24px; display: flex; align-items: flex-start; gap: 10px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .alert-danger { background: var(--danger-bg); color: var(--danger); border: 1px solid rgba(248,113,113,.25); }

        /* ── Info box ── */
        .info-box {
            background: rgba(59, 130, 246, 0.07);
            border: 1px solid rgba(59, 130, 246, 0.18);
            border-radius: var(--radius-sm);
            padding: 16px 20px;
            font-size: 13.5px; color: #93c5fd; line-height: 1.7;
            margin-bottom: 28px;
            font-weight: 500;
        }
        .info-box strong { color: #60a5fa; }

        /* ── Form card ── */
        .form-card {
            background: var(--card);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 36px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        /* ── Fields ── */
        .field-group { margin-bottom: 22px; }

        .field-label {
            display: block; font-size: 11.5px; font-weight: 800;
            color: var(--text-muted); text-transform: uppercase; letter-spacing: .08em;
            margin-bottom: 8px;
        }
        .field-hint { font-size: 12px; color: #4b5563; margin-top: 6px; font-weight: 500; }

        .input-wrap { position: relative; }
        .input-icon {
            position: absolute; left: 16px; top: 50%;
            transform: translateY(-50%); color: #4b5563;
            pointer-events: none; display: flex; align-items: center;
            transition: color 0.2s;
        }
        .input-icon svg { width: 17px; height: 17px; }

        .field-input {
            width: 100%; padding: 13px 16px 13px 48px;
            background: rgba(15, 23, 42, 0.6);
            border: 1.5px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-sm);
            font-family: inherit; font-size: 14px; color: var(--text);
            outline: none; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .field-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px var(--accent-glow);
            background: rgba(15, 23, 42, 0.85);
        }
        .field-input:focus + .input-icon,
        .input-wrap:focus-within .input-icon { color: var(--accent); }
        .field-input::placeholder { color: #374151; }
        .field-input.is-invalid { border-color: var(--danger); }

        /* Password toggle */
        .btn-toggle-pwd {
            position: absolute; right: 12px; top: 50%;
            transform: translateY(-50%); background: none; border: none;
            padding: 6px; cursor: pointer; color: #4b5563;
            display: flex; align-items: center; border-radius: 8px;
            transition: all .15s;
        }
        .btn-toggle-pwd:hover { color: var(--text); background: rgba(255, 255, 255, 0.07); }
        .btn-toggle-pwd svg { width: 18px; height: 18px; display: block; }

        .field-error { font-size: 12px; color: var(--danger); margin-top: 6px; font-weight: 600; }

        /* ── Password strength ── */
        .strength-wrap { margin-top: 10px; }
        .strength-bar {
            height: 5px; border-radius: 100px;
            background: rgba(255, 255, 255, 0.06);
            overflow: hidden;
        }
        .strength-fill {
            height: 100%; width: 0; border-radius: 100px;
            transition: width .35s cubic-bezier(0.4, 0, 0.2, 1), background-color .35s;
        }
        .strength-label { font-size: 11.5px; color: var(--text-muted); margin-top: 6px; font-weight: 600; }

        /* ── Divider ── */
        .divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.06), transparent);
            margin: 28px 0;
        }

        /* ── Submit button ── */
        .btn-submit {
            width: 100%; padding: 15px;
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            border: none; border-radius: var(--radius-sm);
            font-family: inherit; font-size: 15.5px; font-weight: 800; color: #fff;
            cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
            letter-spacing: -0.01em;
        }
        .btn-submit:hover  { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(59, 130, 246, 0.45); }
        .btn-submit:active { transform: translateY(0); }
    </style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>

<div class="topbar" style="display:flex;align-items:center;justify-content:space-between;">
    <div style="display:flex;align-items:center;gap:14px;">
        <a href="{{ route('admin.users') }}" class="btn-back">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali
        </a>
        <h1>Daftar Admin Baru</h1>
    </div>
    <button style="width:42px;height:42px;background:var(--accent-bg);border:1.5px solid rgba(59,130,246,.2);border-radius:12px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:18px;transition:all .25s ease;" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
        <span id="themeIcon">☀️</span>
    </button>
</div>

<div class="content">

    <div class="page-header">
        <div class="page-header-icon">👤</div>
        <h2>Tambah Akun Admin</h2>
        <p>Akun yang dibuat hanya bisa diakses oleh staf yang berwenang.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <span style="font-size:16px;flex-shrink:0;">⚠</span>
            <div>
                <strong>Periksa kembali isian:</strong>
                <ul style="margin-top:6px;padding-left:16px;font-weight:500;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="info-box">
        ℹ️ Admin akan login menggunakan <strong>Username/NIP</strong> dan <strong>Password</strong> yang didaftarkan di sini.
        Pastikan username bersifat unik dan password minimal <strong>8 karakter</strong>.
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.users.store') }}" autocomplete="off">
            @csrf

            <div class="field-group">
                <label class="field-label" for="name">Nama Lengkap</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </span>
                    <input type="text" id="name" name="name"
                        class="field-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') }}"
                        placeholder="Nama lengkap admin"
                        autocomplete="off">
                </div>
                @error('name')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <div class="field-group">
                <label class="field-label" for="username">Username / NIP</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </span>
                    <input type="text" id="username" name="username"
                        class="field-input {{ $errors->has('username') ? 'is-invalid' : '' }}"
                        value="{{ old('username') }}"
                        placeholder="Contoh: admin_uptd atau 198001012006041001"
                        autocomplete="off">
                </div>
                <p class="field-hint">Digunakan untuk login. Hanya huruf, angka, dan underscore.</p>
                @error('username')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <hr class="divider">

            <div class="field-group">
                <label class="field-label" for="reg_password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </span>
                    <input type="password" id="reg_password" name="password"
                        class="field-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Min. 8 karakter"
                        autocomplete="new-password"
                        style="padding-right:48px;"
                        oninput="checkStrength(this.value)">
                    <button type="button" class="btn-toggle-pwd" onclick="togglePwd('reg_password','eye1','eyeoff1')">
                        <svg id="eye1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeoff1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                <div class="strength-wrap">
                    <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                    <p class="strength-label" id="strengthLabel">Minimal 8 karakter</p>
                </div>
                @error('password')<p class="field-error">{{ $message }}</p>@enderror
            </div>

            <div class="field-group" style="margin-bottom:0;">
                <label class="field-label" for="password_confirmation">Konfirmasi Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </span>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="field-input"
                        placeholder="Ulangi password"
                        autocomplete="new-password"
                        style="padding-right:48px;">
                    <button type="button" class="btn-toggle-pwd" onclick="togglePwd('password_confirmation','eye2','eyeoff2')">
                        <svg id="eye2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeoff2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
            </div>

            <hr class="divider">

            <button type="submit" class="btn-submit">✅ Simpan Akun Admin</button>
        </form>
    </div>

</div>

<script>
    function togglePwd(inputId, eyeId, eyeOffId) {
        var inp = document.getElementById(inputId);
        var eye = document.getElementById(eyeId);
        var off = document.getElementById(eyeOffId);
        if (inp.type === 'password') {
            inp.type = 'text';
            eye.style.display = 'none';
            off.style.display = 'block';
        } else {
            inp.type = 'password';
            eye.style.display = 'block';
            off.style.display = 'none';
        }
        inp.focus();
    }

    function checkStrength(val) {
        var fill  = document.getElementById('strengthFill');
        var label = document.getElementById('strengthLabel');
        var score = 0;
        if (val.length >= 8)               score++;
        if (/[A-Z]/.test(val))             score++;
        if (/[0-9]/.test(val))             score++;
        if (/[^A-Za-z0-9]/.test(val))      score++;

        var configs = [
            { w: '0%',   color: 'transparent', text: 'Minimal 8 karakter', labelColor: '#4b5563' },
            { w: '25%',  color: '#f87171',      text: 'Lemah',              labelColor: '#f87171' },
            { w: '50%',  color: '#fbbf24',      text: 'Cukup',             labelColor: '#fbbf24' },
            { w: '75%',  color: '#34d399',      text: 'Kuat',              labelColor: '#34d399' },
            { w: '100%', color: '#818cf8',      text: 'Sangat Kuat ✨',    labelColor: '#818cf8' },
        ];
        var cfg = configs[score];
        fill.style.width           = cfg.w;
        fill.style.backgroundColor = cfg.color;
        label.textContent          = cfg.text;
        label.style.color          = cfg.labelColor;
    }

    // Theme
    (function(){var t=document.documentElement.getAttribute('data-theme');var i=document.getElementById('themeIcon');if(i)i.textContent=t==='dark'?'☀️':'🌙';})();
    function toggleTheme(){var c=document.documentElement.getAttribute('data-theme'),n=c==='dark'?'light':'dark';document.documentElement.setAttribute('data-theme',n);localStorage.setItem('bpad-theme',n);var i=document.getElementById('themeIcon');if(i)i.textContent=n==='dark'?'☀️':'🌙';}
</script>

</body>
</html>
