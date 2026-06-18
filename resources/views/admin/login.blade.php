<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin – BPAD NTT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>(function(){var t=localStorage.getItem('bpad-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})();</script>
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

        :root {
            --bg:       #070c1a;
            --card:     rgba(30,41,59,.55);
            --border:   rgba(255,255,255,.08);
            --text:     #f0f6ff;
            --text-mid: #c7dcf8;
            --text-muted:#8ba7c9;
            --accent:   #5b9cf6;
            --accent-d: #3b7de8;
            --accent-s: #93c5fd;
            --accent-g: rgba(91,156,246,.22);
            --accent-bg:rgba(91,156,246,.10);
            --input-bg: rgba(15,23,42,.7);
            --input-f:  rgba(15,23,42,.95);
            --ph:       #2d4a6a;
            --danger:   #fb7185;
            --danger-bg:rgba(251,113,133,.10);
            --success:  #4ade80;
            --success-bg:rgba(74,222,128,.10);
            --blob1:rgba(59,130,246,.14);
            --blob2:rgba(99,102,241,.10);
            --blob3:rgba(147,197,253,.08);
            --tb-bg:rgba(255,255,255,.07);
            --tb-border:rgba(255,255,255,.12);
        }
        [data-theme="light"] {
            --bg:       #eef4ff;
            --card:     #ffffff;
            --border:   rgba(59,130,246,.14);
            --text:     #0f172a;
            --text-mid: #1e3a5f;
            --text-muted:#4a6fa5;
            --accent:   #2563eb;
            --accent-d: #1d4ed8;
            --accent-s: #3b82f6;
            --accent-g: rgba(37,99,235,.18);
            --accent-bg:rgba(37,99,235,.08);
            --input-bg: #f8faff;
            --input-f:  #ffffff;
            --ph:       #93b4d8;
            --danger:   #dc2626;
            --danger-bg:rgba(220,38,38,.08);
            --success:  #16a34a;
            --success-bg:rgba(22,163,74,.08);
            --blob1:rgba(59,130,246,.08);
            --blob2:rgba(96,165,250,.06);
            --blob3:rgba(147,197,253,.05);
            --tb-bg:rgba(37,99,235,.07);
            --tb-border:rgba(37,99,235,.18);
        }

        html,body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;overflow-x:hidden;transition:background .35s ease,color .35s ease;}

        .blob{position:fixed;border-radius:50%;filter:blur(120px);pointer-events:none;z-index:0;}
        .b1{width:600px;height:600px;background:radial-gradient(circle,var(--blob1) 0%,transparent 70%);top:-150px;right:-100px;animation:bM 18s ease-in-out infinite alternate;}
        .b2{width:500px;height:500px;background:radial-gradient(circle,var(--blob2) 0%,transparent 70%);bottom:-100px;left:-80px;animation:bM 13s ease-in-out infinite alternate-reverse;}
        .b3{width:350px;height:350px;background:radial-gradient(circle,var(--blob3) 0%,transparent 70%);top:50%;left:50%;transform:translate(-50%,-50%);animation:bM 22s ease-in-out infinite alternate;}
        @keyframes bM{from{transform:translate(0,0) scale(1)}to{transform:translate(40px,30px) scale(1.1)}}

        .theme-toggle{position:fixed;top:20px;right:20px;z-index:1000;width:46px;height:46px;background:var(--tb-bg);border:1.5px solid var(--tb-border);border-radius:14px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:20px;transition:all .25s ease;backdrop-filter:blur(12px);}
        .theme-toggle:hover{transform:scale(1.1);background:var(--accent-bg);border-color:var(--accent);}

        .login-wrap{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;position:relative;z-index:10;}

        .login-card{
            width:100%;max-width:440px;
            background:var(--card);
            backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);
            border:1px solid var(--border);
            border-radius:28px;
            padding:44px 40px;
            box-shadow:0 24px 60px rgba(0,0,0,.25);
            position:relative;
            animation:cardIn .5s cubic-bezier(.4,0,.2,1);
            transition:background .35s ease,border-color .35s ease;
        }
        @keyframes cardIn{from{opacity:0;transform:translateY(24px) scale(.97)}to{opacity:1;transform:translateY(0) scale(1)}}
        .login-card::before{content:'';position:absolute;top:0;left:20px;right:20px;height:1px;background:linear-gradient(90deg,transparent,var(--accent-g),transparent);border-radius:100px;}

        .brand-icon{width:72px;height:72px;background:linear-gradient(135deg,var(--accent-d),var(--accent));border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:34px;margin:0 auto 20px;box-shadow:0 10px 28px var(--accent-g);position:relative;}
        .brand-icon::after{content:'';position:absolute;inset:-2px;border-radius:22px;background:linear-gradient(135deg,var(--accent-g),transparent);z-index:-1;filter:blur(8px);}

        .login-title{text-align:center;font-size:24px;font-weight:800;letter-spacing:-0.02em;color:var(--text);}
        .login-sub{text-align:center;font-size:13px;color:var(--text-muted);margin-top:6px;font-weight:500;}

        .alert{padding:13px 18px;border-radius:12px;font-size:13.5px;font-weight:600;margin-top:20px;display:flex;align-items:center;gap:10px;}
        .alert-danger{background:var(--danger-bg);color:var(--danger);border:1px solid rgba(251,113,133,.2);}
        .alert-success{background:var(--success-bg);color:var(--success);border:1px solid rgba(74,222,128,.2);}

        .form-body{margin-top:28px;}
        .field-group{margin-bottom:18px;}
        label{display:block;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--text-muted);margin-bottom:8px;transition:color .3s;}

        .input-wrap{position:relative;}
        .input-icon{position:absolute;left:15px;top:50%;transform:translateY(-50%);color:var(--text-muted);pointer-events:none;display:flex;align-items:center;transition:color .2s;}
        .input-icon svg{width:17px;height:17px;}

        input[type="text"],input[type="password"]{
            width:100%;padding:13px 15px 13px 46px;
            border:1.5px solid var(--border);border-radius:14px;
            font-family:inherit;font-size:14px;color:var(--text);
            background:var(--input-bg);outline:none;
            transition:all .2s cubic-bezier(.4,0,.2,1);
        }
        input[type="text"]:focus,input[type="password"]:focus{border-color:var(--accent);background:var(--input-f);box-shadow:0 0 0 4px var(--accent-g);}
        input::placeholder{color:var(--ph);}
        .input-wrap:focus-within .input-icon{color:var(--accent);}

        .btn-pwd{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;padding:6px;cursor:pointer;color:var(--text-muted);display:flex;align-items:center;border-radius:8px;transition:all .15s;}
        .btn-pwd:hover{color:var(--text);background:var(--accent-bg);}
        .btn-pwd svg{width:18px;height:18px;}

        .remember-row{display:flex;align-items:center;gap:10px;margin:18px 0;}
        .remember-row input[type="checkbox"]{width:17px;height:17px;accent-color:var(--accent);cursor:pointer;}
        .remember-row label{font-size:13.5px;font-weight:600;text-transform:none;letter-spacing:0;color:var(--text-muted);margin-bottom:0;cursor:pointer;}

        .btn-login{
            width:100%;padding:15px;
            background:linear-gradient(135deg,var(--accent-d) 0%,var(--accent) 60%,var(--accent-s) 100%);
            border:none;border-radius:14px;
            font-family:inherit;font-size:15.5px;font-weight:800;color:#fff;
            cursor:pointer;transition:all .25s cubic-bezier(.4,0,.2,1);
            box-shadow:0 8px 24px var(--accent-g);
            position:relative;overflow:hidden;
        }
        .btn-login::after{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(255,255,255,.15),transparent);}
        .btn-login:hover{transform:translateY(-2px);box-shadow:0 14px 32px var(--accent-g);}
        .btn-login:active{transform:translateY(0);}

        .login-footer{text-align:center;margin-top:24px;font-size:13px;color:var(--text-muted);font-weight:500;}
        .login-footer a{color:var(--accent);text-decoration:none;font-weight:700;}
        .login-footer a:hover{color:var(--accent-s);}
    </style>
</head>
<body>
<div class="blob b1"></div>
<div class="blob b2"></div>
<div class="blob b3"></div>

<button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
    <span id="themeIcon">🌙</span>
</button>

<div class="login-wrap">
    <div class="login-card">
        <div class="brand-icon">📚</div>
        <h1 class="login-title">Admin Portal</h1>
        <p class="login-sub">Tindak Lanjut Disiplin ASN</p>
        <p class="login-sub">BPAD Provinsi Nusa Tenggara Timur</p>

        @if ($errors->any())
            <div class="alert alert-danger">⚠ {{ $errors->first() }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="form-body">
            @csrf
            <div class="field-group">
                <label for="username">Username / NIP</label>
                <div class="input-wrap">
                    <span class="input-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Username atau NIP" autocomplete="username">
                </div>
            </div>
            <div class="field-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                    <input type="password" id="password" name="password" placeholder="Kata sandi" autocomplete="current-password" style="padding-right:46px;">
                    <button type="button" class="btn-pwd" onclick="togglePwd()">
                        <svg id="eyeOn" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeOff" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
            </div>
            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn-login">Masuk ke Dashboard</button>
        </form>

        <div class="login-footer">
            <a href="{{ url('/') }}">← Kembali ke Form Publik</a>
        </div>
    </div>
</div>

<script>
    (function(){var t=localStorage.getItem('bpad-theme')||'dark';document.getElementById('themeIcon').textContent=t==='dark'?'☀️':'🌙';})();
    function toggleTheme(){var c=document.documentElement.getAttribute('data-theme'),n=c==='dark'?'light':'dark';document.documentElement.setAttribute('data-theme',n);localStorage.setItem('bpad-theme',n);document.getElementById('themeIcon').textContent=n==='dark'?'☀️':'🌙';}
    function togglePwd(){var p=document.getElementById('password'),on=document.getElementById('eyeOn'),off=document.getElementById('eyeOff');if(p.type==='password'){p.type='text';on.style.display='none';off.style.display='block';}else{p.type='password';on.style.display='block';off.style.display='none';}p.focus();}
</script>
</body>
</html>
