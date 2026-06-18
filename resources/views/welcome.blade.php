<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Form Pelaporan Tindak Lanjut Disiplin ASN - Badan Pendapatan dan Aset Daerah Provinsi NTT">
    <title>Form Tindak Lanjut Disiplin ASN – BPAD NTT</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📋</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        // Apply saved theme BEFORE render to avoid flash
        (function() {
            var t = localStorage.getItem('bpad-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ═══════════════════════════════════════════
           DARK MODE (default)
        ═══════════════════════════════════════════ */
        :root {
            --bg:           #070c1a;
            --card:         rgba(255,255,255,.04);
            --card-hover:   rgba(255,255,255,.07);
            --border:       rgba(255,255,255,.08);
            --border-hover: rgba(147,197,253,.28);

            --text:         #f0f6ff;
            --text-mid:     #c7dcf8;
            --text-muted:   #8ba7c9;

            --accent:       #5b9cf6;
            --accent-dark:  #3b7de8;
            --accent-soft:  #93c5fd;
            --accent-glow:  rgba(91,156,246,.22);
            --accent-bg:    rgba(91,156,246,.10);

            --input-bg:     rgba(15,23,42,.6);
            --input-bg-f:   rgba(15,23,42,.9);
            --ph-color:     #2d4a6a;

            --success:      #4ade80;
            --success-bg:   rgba(74,222,128,.10);
            --danger:       #fb7185;
            --danger-bg:    rgba(251,113,133,.10);

            --hero-from:    #020814;
            --hero-mid:     #071530;
            --hero-to:      #1a4494;
            --hero-wave:    #070c1a;

            --blob1: rgba(59,130,246,.12);
            --blob2: rgba(99,102,241,.10);
            --blob3: rgba(147,197,253,.07);

            --toggle-bg:    rgba(255,255,255,.08);
            --toggle-border:rgba(255,255,255,.12);

            --radius:    22px;
            --radius-sm: 14px;

            --note-bg: rgba(91, 156, 246, 0.08);
            --note-border: rgba(91, 156, 246, 0.28);
            --note-text: var(--text-mid);
        }

        /* ═══════════════════════════════════════════
           LIGHT MODE – Soft Blue (Nova style)
        ═══════════════════════════════════════════ */
        [data-theme="light"] {
            --bg:           #eef4ff;
            --card:         #ffffff;
            --card-hover:   #f5f9ff;
            --border:       rgba(59,130,246,.12);
            --border-hover: rgba(37,99,235,.3);

            --text:         #0f172a;
            --text-mid:     #1e3a5f;
            --text-muted:   #4a6fa5;

            --accent:       #2563eb;
            --accent-dark:  #1d4ed8;
            --accent-soft:  #3b82f6;
            --accent-glow:  rgba(37,99,235,.18);
            --accent-bg:    rgba(37,99,235,.07);

            --input-bg:     #f8faff;
            --input-bg-f:   #ffffff;
            --ph-color:     #93b4d8;

            --success:      #16a34a;
            --success-bg:   rgba(22,163,74,.08);
            --danger:       #dc2626;
            --danger-bg:    rgba(220,38,38,.08);

            --hero-from:    #1e40af;
            --hero-mid:     #2563eb;
            --hero-to:      #60a5fa;
            --hero-wave:    #eef4ff;

            --blob1: rgba(59,130,246,.08);
            --blob2: rgba(96,165,250,.06);
            --blob3: rgba(147,197,253,.05);

            --toggle-bg:    rgba(37,99,235,.08);
            --toggle-border:rgba(37,99,235,.18);

            --note-bg: #f8fbff;
            --note-border: rgba(37, 99, 235, 0.22);
            --note-text: #1e3a5f;
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background .35s ease, color .35s ease;
        }

        /* ── Blobs ── */
        .bg-blob { position: fixed; border-radius: 50%; filter: blur(120px); pointer-events: none; z-index: 0; }
        .bb-1 { width:700px;height:700px; background:radial-gradient(circle,var(--blob1) 0%,transparent 70%); top:-200px;right:-100px; animation:blobM 20s ease-in-out infinite alternate; }
        .bb-2 { width:500px;height:500px; background:radial-gradient(circle,var(--blob2) 0%,transparent 70%); bottom:-100px;left:-80px; animation:blobM 15s ease-in-out infinite alternate-reverse; }
        .bb-3 { width:400px;height:400px; background:radial-gradient(circle,var(--blob3) 0%,transparent 70%); top:50%;left:50%; transform:translate(-50%,-50%); animation:blobM 25s ease-in-out infinite alternate; }
        @keyframes blobM { from{transform:translate(0,0) scale(1)} to{transform:translate(40px,30px) scale(1.1)} }

        /* ── Theme toggle button ── */
        .theme-toggle {
            position: fixed; top: 20px; right: 20px; z-index: 1000;
            width: 46px; height: 46px;
            background: var(--toggle-bg);
            border: 1.5px solid var(--toggle-border);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 20px;
            transition: all .25s ease;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .theme-toggle:hover { transform: scale(1.1); background: var(--accent-bg); border-color: var(--accent); }

        /* ── Hero ── */
        .hero {
            width: 100%; min-height: 300px;
            position: relative;
            background: linear-gradient(150deg, var(--hero-from) 0%, var(--hero-mid) 40%, var(--hero-to) 100%);
            display: flex; align-items: flex-end; overflow: hidden;
            transition: background .35s ease;
        }
        .hero::before {
            content:''; position:absolute; width:700px;height:700px;
            background:radial-gradient(circle,rgba(147,197,253,.18) 0%,transparent 65%);
            top:-200px;right:-100px; border-radius:50%;
            animation:heroG 14s ease-in-out infinite alternate;
        }
        .hero::after {
            content:''; position:absolute; width:400px;height:400px;
            background:radial-gradient(circle,rgba(219,234,254,.12) 0%,transparent 65%);
            bottom:0;left:-60px; border-radius:50%;
            animation:heroG 10s ease-in-out infinite alternate-reverse;
        }
        @keyframes heroG { from{transform:translate(0,0) scale(1)} to{transform:translate(40px,20px) scale(1.08)} }

        .hero-dots {
            position:absolute;inset:0;opacity:.07;
            background-image:radial-gradient(circle,rgba(255,255,255,.7) 1px,transparent 1px);
            background-size:32px 32px;
        }
        .hero-ring { position:absolute;border:1px solid rgba(255,255,255,.12);border-radius:50%;pointer-events:none; }
        .hr-1{width:280px;height:280px;top:-60px;right:10%;animation:spinR 40s linear infinite;}
        .hr-2{width:150px;height:150px;top:40px;left:8%;animation:spinR 28s linear infinite reverse;}
        .hr-3{width:70px;height:70px;bottom:40px;right:20%;border-radius:18px;animation:spinR 20s linear infinite;}
        @keyframes spinR{to{transform:rotate(360deg)}}

        .hero-content { position:relative;z-index:5;width:100%;max-width:820px;margin:0 auto;padding:52px 24px 96px; }
        .hero-badge {
            display:inline-flex;align-items:center;gap:8px;
            background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.22);
            backdrop-filter:blur(10px);border-radius:100px;
            padding:6px 18px;font-size:11.5px;font-weight:700;
            color:rgba(255,255,255,.92);letter-spacing:.06em;text-transform:uppercase;margin-bottom:20px;
        }
        .hero-title { font-size:clamp(28px,5vw,42px);font-weight:800;color:#fff;line-height:1.15;letter-spacing:-0.025em;text-shadow:0 4px 30px rgba(0,0,0,.3);max-width:540px; }
        .hero-title span { background:linear-gradient(135deg,#bfdbfe,#dbeafe);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }
        .hero-subtitle { font-size:15px;color:rgba(255,255,255,.75);margin-top:14px;font-weight:500;max-width:440px;line-height:1.65; }

        .hero-wave { position:absolute;bottom:-2px;left:0;width:100%;z-index:6;line-height:0; }
        .hero-wave svg { display:block;width:100%;height:64px; }

        /* ── Page wrap ── */
        .page-wrap { max-width:800px;margin:0 auto;padding:0 20px 100px;position:relative;z-index:10; }

        /* ── Brand card ── */
        .brand-card { display:flex;align-items:center;gap:20px;margin-top:-56px;position:relative;z-index:20; }
        .brand-logo {
            width:104px;height:104px;
            background:var(--card);
            border:1.5px solid var(--border);
            border-radius:26px;
            box-shadow:0 20px 50px rgba(0,0,0,.2);
            display:flex;align-items:center;justify-content:center;
            font-size:46px;flex-shrink:0;
            transition:transform .3s ease, box-shadow .3s ease;
            backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
        }
        .brand-logo:hover { transform:scale(1.05) rotate(3deg); }
        .brand-info { padding-top:54px; }
        .brand-info h1 { font-size:22px;font-weight:800;color:var(--text);letter-spacing:-0.02em;line-height:1.25;transition:color .3s; }
        .brand-info p  { font-size:13px;color:var(--text-muted);margin-top:4px;font-weight:500; }

        /* ── Alerts ── */
        .alert { padding:16px 20px;border-radius:14px;font-size:14px;font-weight:600;margin-top:24px;display:flex;align-items:flex-start;gap:12px;animation:aIn .3s ease; }
        @keyframes aIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
        .alert-success { background:var(--success-bg);color:var(--success);border:1px solid rgba(74,222,128,.2); }
        .alert-danger  { background:var(--danger-bg);color:var(--danger);border:1px solid rgba(251,113,133,.2); }

        /* ── Form cards ── */
        .form-card {
            background:var(--card);
            backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
            border:1px solid var(--border);
            border-radius:var(--radius);
            padding:40px;margin-top:24px;position:relative;
            transition:all .25s ease;
            box-shadow:0 8px 32px rgba(0,0,0,.1);
        }
        .form-card:hover { border-color:var(--border-hover);box-shadow:0 16px 48px rgba(0,0,0,.12); }
        .form-card::before {
            content:'';position:absolute;top:0;left:20px;right:20px;height:1px;
            background:linear-gradient(90deg,transparent,var(--accent-glow),transparent);
        }

        .section-title { font-size:11px;font-weight:800;letter-spacing:.10em;text-transform:uppercase;color:var(--accent-soft);margin-bottom:28px;padding-bottom:16px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:8px;transition:color .3s; }

        /* ── Fields ── */
        .field-group { margin-bottom:24px; }
        .field-row { display:grid;grid-template-columns:1fr 1fr;gap:20px; }
        @media(max-width:560px){.field-row{grid-template-columns:1fr}}

        label { display:block;font-size:11.5px;font-weight:800;color:var(--text-muted);letter-spacing:.06em;text-transform:uppercase;margin-bottom:8px;transition:color .3s; }
        label .req  { color:var(--danger);margin-left:2px; }
        label .hint { font-weight:500;color:var(--text-muted);font-size:10.5px;margin-left:6px;text-transform:none;letter-spacing:0;opacity:.7; }

        input[type="text"],input[type="date"],select,textarea {
            width:100%;padding:13px 16px;
            border:1.5px solid var(--border);
            border-radius:var(--radius-sm);
            font-family:inherit;font-size:14px;color:var(--text);
            background:var(--input-bg);
            transition:all .2s cubic-bezier(.4,0,.2,1);
            outline:none;appearance:none;
        }
        input[type="text"]:focus,input[type="date"]:focus,select:focus,textarea:focus {
            border-color:var(--accent);background:var(--input-bg-f);box-shadow:0 0 0 4px var(--accent-glow);
        }
        input::placeholder,textarea::placeholder { color:var(--ph-color); }
        select {
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='%234a6fa5' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat:no-repeat;background-position:right 14px center;padding-right:42px;cursor:pointer;
        }
        textarea { resize:vertical;min-height:110px; }
        .field-error { font-size:12px;color:var(--danger);margin-top:6px;display:flex;align-items:center;gap:5px;font-weight:600; }
        input.is-invalid,select.is-invalid,textarea.is-invalid { border-color:var(--danger); }

        /* ── Radio chips ── */
        .radio-group { display:flex;flex-wrap:wrap;gap:10px;margin-top:6px; }
        .radio-chip input { display:none; }
        .radio-chip label {
            display:inline-flex;align-items:center;padding:10px 22px;
            border:1.5px solid var(--border);border-radius:var(--radius-sm);
            font-size:13.5px;font-weight:700;cursor:pointer;
            transition:all .2s cubic-bezier(.4,0,.2,1);
            margin:0;color:var(--text-muted);background:var(--input-bg);
            letter-spacing:0;text-transform:none;
        }
        .radio-chip input:checked + label { border-color:var(--accent);background:var(--accent-bg);color:var(--accent);box-shadow:0 4px 16px var(--accent-glow);transform:translateY(-1px); }
        .radio-chip label:hover { border-color:var(--accent);color:var(--text);transform:translateY(-1px); }

        /* ── File zone ── */
        .file-zone { border:1.5px dashed var(--border);border-radius:var(--radius-sm);padding:36px 20px;text-align:center;cursor:pointer;transition:all .25s cubic-bezier(.4,0,.2,1);position:relative;background:var(--input-bg); }
        .file-zone:hover,.file-zone.drag-over { border-color:var(--accent);background:var(--accent-bg);box-shadow:0 0 0 4px var(--accent-glow); }
        .file-zone input[type="file"] { position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%; }
        .file-zone-icon { font-size:36px;margin-bottom:12px;display:block;transition:transform .25s ease; }
        .file-zone:hover .file-zone-icon { transform:translateY(-5px) scale(1.1); }
        .file-zone-label { font-size:14px;font-weight:700;color:var(--text-mid); }
        .file-zone-hint  { font-size:12px;color:var(--text-muted);margin-top:6px; }
        .file-name-display { margin-top:12px;font-size:13px;color:var(--accent);font-weight:700;display:none;padding:8px 16px;background:var(--accent-bg);border-radius:10px;border:1px solid var(--border-hover);animation:fadeIn .2s ease; }
        .file-zone.has-file {
            border: 2px solid var(--success);
            background: var(--success-bg);
        }

        .file-zone.has-file .file-zone-icon {
            transform: scale(1.15);
        }

        .file-name-display {
            margin-top: 14px;
            padding: 12px 14px;
            border-radius: 12px;
            background: var(--accent-bg);
            border: 1px solid var(--border-hover);
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
            display: none;
            word-break: break-word;
            transition: all .25s ease;
        }
        @keyframes fadeIn{from{opacity:0}to{opacity:1}}

        /* ── Submit ── */
        .submit-wrap { margin-top:24px;background:var(--card);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border:1px solid var(--border);border-radius:var(--radius);padding:32px 40px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;position:relative;box-shadow:0 8px 32px rgba(0,0,0,.1);transition:all .25s ease; }
        .submit-wrap::before { content:'';position:absolute;top:0;left:20px;right:20px;height:1px;background:linear-gradient(90deg,transparent,var(--accent-glow),transparent); }
        .submit-privacy { font-size:13.5px;color:var(--text-muted);max-width:400px;font-weight:500;line-height:1.6; }
        .btn-submit {
            display:inline-flex;align-items:center;gap:10px;
            background:linear-gradient(135deg,var(--accent-dark) 0%,var(--accent) 60%,var(--accent-soft) 100%);
            color:#fff;font-family:inherit;font-size:15.5px;font-weight:800;
            padding:16px 44px;border:none;border-radius:100px;cursor:pointer;
            transition:all .25s cubic-bezier(.4,0,.2,1);
            box-shadow:0 8px 24px var(--accent-glow);
            letter-spacing:-0.01em;position:relative;overflow:hidden;
        }
        .btn-submit::after { content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(255,255,255,.15),transparent);border-radius:100px; }
        .btn-submit:hover { transform:translateY(-2px);box-shadow:0 14px 36px var(--accent-glow); }
        .btn-submit:active { transform:translateY(0); }
        .btn-submit svg { width:18px;height:18px; }

        /* ── Footer ── */
        .form-footer { text-align:center;font-size:13px;color:var(--text-muted);margin-top:36px;font-weight:500; }
        .form-footer a { color:var(--accent);text-decoration:none;font-weight:700; }
        .form-footer a:hover { color:var(--accent-soft); }

        /* ── Loading ── */
        .loading-overlay { display:none;position:fixed;inset:0;background:rgba(7,12,26,.85);backdrop-filter:blur(12px);z-index:999;align-items:center;justify-content:center;flex-direction:column;gap:16px; }
        [data-theme="light"] .loading-overlay { background:rgba(238,244,255,.85); }
        .loading-overlay.active { display:flex; }
        .spinner { width:50px;height:50px;border:3px solid var(--border);border-top-color:var(--accent);border-radius:50%;animation:spin .7s linear infinite; }
        @keyframes spin{to{transform:rotate(360deg)}}

        /* ── Upload Note ── */
        .upload-note {
            background: var(--note-bg);
            border: 1px solid var(--note-border);
            border-left: 4px solid var(--accent);
            padding: 16px 18px;
            border-radius: var(--radius-sm);
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.75;
            color: var(--note-text);
            transition: all .3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .upload-note:hover {
            border-color: var(--accent);
            box-shadow: 0 6px 20px var(--accent-glow);
        }

        .upload-note p {
            margin-bottom: 10px;
        }

        .upload-note p:last-child {
            margin-bottom: 0;
        }

        .upload-note strong {
            color: var(--text);
        }

        .upload-note a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 6px 0 10px;
            padding: 8px 14px;
            background: var(--accent-bg);
            border: 1px solid var(--border-hover);
            border-radius: 10px;
            color: var(--accent);
            font-weight: 700;
            text-decoration: none;
            transition: all .25s ease;
        }

        .upload-note a:hover {
            background: var(--accent);
            color: #ffffff;
            transform: translateY(-1px);
            text-decoration: none;
        }

        .upload-note span {
            color: var(--text-muted) !important;
        }
    </style>
</head>
<body>

<div class="bg-blob bb-1"></div>
<div class="bg-blob bb-2"></div>
<div class="bg-blob bb-3"></div>

<!-- Theme toggle -->
<button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
    <span id="themeIcon">🌙</span>
</button>

<!-- Loading overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
    <p style="font-size:15px;font-weight:700;color:var(--text-mid);">Mengirim data, mohon tunggu…</p>
</div>

<!-- ── HERO ── -->
<div class="hero">
    <div class="hero-dots"></div>
    <div class="hero-ring hr-1"></div>
    <div class="hero-ring hr-2"></div>
    <div class="hero-ring hr-3"></div>
    <div class="hero-content">
        <div class="hero-badge">🗂️ &nbsp; Sistem Pelaporan Digital</div>
        <h1 class="hero-title">Form Tindak Lanjut<br><span>Disiplin ASN</span></h1>
        <p class="hero-subtitle">Badan Pendapatan dan Aset Daerah<br>Provinsi Nusa Tenggara Timur</p>
    </div>
    <div class="hero-wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none">
            <path id="wavePath" fill="#070c1a" d="M0,32 C240,64 480,0 720,32 C960,64 1200,10 1440,32 L1440,64 L0,64 Z"/>
        </svg>
    </div>
</div>

<div class="page-wrap">

    <div class="brand-card">
        <div class="brand-logo">📚</div>
        <div class="brand-info">
            <h1>Form Tindak Lanjut Disiplin ASN</h1>
            <p>Badan Pendapatan dan Aset Daerah Provinsi Nusa Tenggara Timur</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="margin-top:24px;">
            <span>✅</span><div>{{ session('success') }}</div>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-top:24px;">
            <span style="font-size:16px;flex-shrink:0;">⚠️</span>
            <div><strong>Mohon periksa kembali:</strong>
                <ul style="margin-top:6px;padding-left:18px;font-weight:500;">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        </div>
    @endif

    <form id="submissionForm" action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf

        <!-- DATA PRIBADI -->
        <div class="form-card">
            <p class="section-title">📋 &nbsp; Data Pribadi ASN</p>
            <div class="field-group field-row">
                <div>
                    <label for="nama">Nama Lengkap <span class="req">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Pegawai" class="{{ $errors->has('nama') ? 'is-invalid' : '' }}">
                    @error('nama')<p class="field-error">⚠ {{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="nip">NIP / NI PPPK <span class="req">*</span></label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip') }}" placeholder="NIP / NI PPPK Pegawai" maxlength="18" minlength="18" inputmode="numeric" pattern="[0-9]{18}" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="{{ $errors->has('nip') ? 'is-invalid' : '' }}">
                    @error('nip')<p class="field-error">⚠ {{ $message }}</p>@enderror
                </div>
            </div>
            <div class="field-group">
                <label>Status ASN <span class="req">*</span></label>
                <div class="radio-group">
                    @foreach(['PNS', 'PPPK'] as $status)
                        <div class="radio-chip">
                            <input type="radio" id="status_{{ $loop->index }}" name="status_asn" value="{{ $status }}" {{ old('status_asn') === $status ? 'checked' : '' }}>
                            <label for="status_{{ $loop->index }}">{{ $status }}</label>
                        </div>
                    @endforeach
                </div>
                @error('status_asn')<p class="field-error" style="margin-top:8px;">⚠ {{ $message }}</p>@enderror
            </div>
            <div class="field-group field-row">
                <div>
                    <label for="jabatan">Jabatan <span class="req">*</span></label>
                    <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" placeholder="Jabatan saat ini" class="{{ $errors->has('jabatan') ? 'is-invalid' : '' }}">
                    @error('jabatan')<p class="field-error">⚠ {{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="uptd">Unit / UPTD <span class="req">*</span></label>
                    <select id="uptd" name="uptd" class="{{ $errors->has('uptd') ? 'is-invalid' : '' }}">
                        <option value="" disabled {{ old('uptd') ? '' : 'selected' }}>-- Pilih UPTD --</option>
                        @foreach($uptdList as $uptd)
                            <option value="{{ $uptd }}" {{ old('uptd') === $uptd ? 'selected' : '' }}>{{ $uptd }}</option>
                        @endforeach
                    </select>
                    @error('uptd')<p class="field-error">⚠ {{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- PELANGGARAN & TL -->
        <div class="form-card">
            <p class="section-title">⚖️ &nbsp; Pelanggaran & Tindak Lanjut</p>
            <div class="field-group">
                <label for="pelanggaran">Jenis Pelanggaran <span class="req">*</span></label>
                <textarea
                    id="pelanggaran"
                    name="pelanggaran"
                    placeholder="Tuliskan Pelanggaran ASN"
                    class="{{ $errors->has('pelanggaran') ? 'is-invalid' : '' }}"
                    style="min-height:120px;">{{ old('pelanggaran') }}</textarea>
                @error('pelanggaran')<p class="field-error">⚠ {{ $message }}</p>@enderror
            </div>
            <div class="field-group">
                <label for="jenis_tl">Jenis Tindak Lanjut <span class="req">*</span></label>
                <select id="jenis_tl" name="jenis_tl" class="{{ $errors->has('jenis_tl') ? 'is-invalid' : '' }}">
                    <option value="" disabled {{ old('jenis_tl') ? '' : 'selected' }}>Berikan bukti dukung sesuai dengan tindak lanjut yang dipilih</option>
                    @foreach($jenisTlList as $jt)
                        <option value="{{ $jt }}" {{ old('jenis_tl') === $jt ? 'selected' : '' }}>{{ $jt }}</option>
                    @endforeach
                </select>
                @error('jenis_tl')<p class="field-error">⚠ {{ $message }}</p>@enderror
            </div>
        </div>

        <!-- DOKUMEN -->
        <div class="form-card">
            <p class="section-title">📎 &nbsp; Dokumen Pendukung</p>
            <div class="field-group" style="margin-bottom:0;">
                <label>Bukti Pendukung Lainnya <span class="req">*</span></label>
                 <!-- CATATAN -->
                <div class="upload-note">
                    <p>
                        Mohon sertakan bukti dukung sesuai dengan jenis tindak lanjut disiplin ASN.
                        Format/template dokumen tindak lanjut disiplin ASN dapat dilihat melalui link berikut:
                    </p>

                    <a href="https://drive.google.com/drive/folders/1Wkf1aFt18x7xXrlm-7biM0jkMIq5Jdy7?usp=drive_link"
                    target="_blank">
                        📂 Lihat Template Dokumen
                    </a>

                    <p>
                        <strong>Format Penulisan Nama File:</strong><br>
                        Nama ASN_UPTD_NIP_Jenis TL
                        <br>
                        <span style="color:var(--text-muted);">
                            Contoh:
                            Bambang_UPTD Wilayah Kab.Kupang_199010102022031001_Pembinaan Langsung
                        </span>
                    </p>
                </div>
                <div class="file-zone" id="buktiZone">
                    <input type="file" name="bukti" id="bukti" accept=".pdf,image/jpg,image/jpeg,image/png">
                    <span class="file-zone-icon">📎</span>
                    <p class="file-zone-label">Klik atau seret file ke sini</p>
                    <p class="file-zone-hint">Format: PDF, JPG, PNG · Maks 10 MB</p>
                    <p class="file-name-display" id="buktiName"></p>
                </div>
                @error('bukti')<p class="field-error" style="margin-top:6px;">⚠ {{ $message }}</p>@enderror
            </div>
        </div>
        

        <!-- SUBMIT -->
        <div class="submit-wrap">
            <p class="submit-privacy">🔒 Data yang Anda kirimkan bersifat <strong style="color:var(--text-mid);">rahasia</strong> dan hanya dapat diakses oleh pejabat yang berwenang di BPAD NTT.</p>
            <button type="submit" class="btn-submit" id="submitBtn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                Kirim Laporan
            </button>
        </div>
    </form>

    <div class="form-footer">
        <p>© {{ date('Y') }} BPAD Provinsi NTT &nbsp;·&nbsp; <a href="/admin/login">Portal Admin</a></p>
    </div>
</div>

<script>
    // ── Theme system ──
    var waveFill = { dark: '#070c1a', light: '#eef4ff' };

    function applyTheme(t) {
        document.documentElement.setAttribute('data-theme', t);
        document.getElementById('themeIcon').textContent = t === 'dark' ? '☀️' : '🌙';
        var wp = document.getElementById('wavePath');
        if (wp) wp.setAttribute('fill', waveFill[t]);
    }

    function toggleTheme() {
        var cur  = document.documentElement.getAttribute('data-theme');
        var next = cur === 'dark' ? 'light' : 'dark';
        localStorage.setItem('bpad-theme', next);
        applyTheme(next);
    }

    // Init icon on load
    applyTheme(document.documentElement.getAttribute('data-theme'));

    // ── File zones ──
    function setupFileZone(inputId, displayId, zoneId) {
    const input = document.getElementById(inputId);
    const display = document.getElementById(displayId);
    const zone = document.getElementById(zoneId);

    if (!input || !display || !zone) return;

    input.addEventListener('change', function () {
    if (input.files && input.files.length > 0) {
        const file = input.files[0];

        // Mengubah tampilan area upload
        zone.querySelector('.file-zone-icon').textContent = '✅';
        zone.querySelector('.file-zone-label').textContent = 'File berhasil dipilih';
        zone.querySelector('.file-zone-hint').textContent = 'Anda dapat memilih file lain jika diperlukan';

        // Menampilkan nama file
        display.textContent = file.name;
        display.style.display = 'block';

        // Mengubah warna border/background
        zone.classList.add('has-file');
    }
});

    zone.addEventListener('dragover', function (e) {
        e.preventDefault();
        zone.classList.add('drag-over');
    });

    zone.addEventListener('dragleave', function () {
        zone.classList.remove('drag-over');
    });

    zone.addEventListener('drop', function (e) {
        e.preventDefault();
        zone.classList.remove('drag-over');

        if (e.dataTransfer.files.length > 0) {
            input.files = e.dataTransfer.files;
            input.dispatchEvent(new Event('change'));
        }
    });
}
</script>
</body>
</html>
