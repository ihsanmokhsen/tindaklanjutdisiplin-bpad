<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manajemen Admin – BPAD NTT">
    <title>Manajemen Admin – BPAD NTT</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📋</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>(function(){var t=localStorage.getItem('bpad-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})();</script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:#030712;--card:rgba(30,41,59,.4);--border:rgba(255,255,255,.08);
            --text:#f9fafb;--text-mid:#e2eaf8;--text-muted:#9ca3af;
            --accent:#3b82f6;--accent-dark:#1d4ed8;--accent-soft:#93c5fd;
            --accent-glow:rgba(59,130,246,.25);--accent-bg:rgba(59,130,246,.1);
            --success:#34d399;--success-bg:rgba(52,211,153,.12);
            --danger:#f87171;--danger-bg:rgba(248,113,113,.12);
            --tb-bg:rgba(9,13,22,.75);--tb-border:rgba(255,255,255,.12);
            --radius:20px;--radius-sm:12px;
            --bg: #030712;
            --card: rgba(30, 41, 59, 0.4);
            --border: rgba(255, 255, 255, 0.08);
            --text: #f9fafb;
            --text-muted: #9ca3af;
            --accent: #3b82f6;
            --accent-dark: #1d4ed8;
            --accent-glow: rgba(59, 130, 246, 0.25);
            --success: #34d399;
            --success-bg: rgba(52, 211, 153, 0.12);
            --danger: #f87171;
            --danger-bg: rgba(248, 113, 113, 0.12);
            --radius: 20px;
            --radius-sm: 12px;
            --thead-bg: rgba(15, 23, 42, 0.8);
            --row-hover: rgba(255,255,255,.03);
            --btn-secondary: rgba(255,255,255,.05);
        }
        [data-theme="light"] {
            --bg:#eef4ff;--card:#ffffff;--border:rgba(59,130,246,.12);
            --text:#0f172a;--text-mid:#1e3a5f;--text-muted:#4a6fa5;
            --accent:#2563eb;--accent-dark:#1d4ed8;--accent-soft:#3b82f6;
            --accent-glow:rgba(37,99,235,.18);--accent-bg:rgba(37,99,235,.08);
            --success:#16a34a;--success-bg:rgba(22,163,74,.10);
            --danger:#dc2626;--danger-bg:rgba(220,38,38,.10);
            --tb-bg:rgba(238,244,255,.85);--tb-border:rgba(59,130,246,.18);
            --radius:20px;--radius-sm:12px;
            --thead-bg: rgba(37,99,235,.06);
            --row-hover: rgba(37,99,235,.04);
            --btn-secondary: rgba(37,99,235,.05);
        }

        [data-theme="light"] .modal-overlay {
            background: rgba(15, 23, 42, 0.15);
        }

        html, body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background .35s ease, color .35s ease;
        }

        [data-theme="dark"] body,
        [data-theme="dark"] html {
            background: radial-gradient(
                ellipse at top,
                #0f172a 0%,
                #030712 60%
            );
        }

        /* Background blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
            z-index: 0;
            opacity: 0.3;
        }
        .blob-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(59,130,246,.15) 0%, transparent 70%);
            top: -100px; right: -50px;
        }
        .blob-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(99,102,241,.12) 0%, transparent 70%);
            bottom: -80px; left: -60px;
        }
        [data-theme="light"] .blob-1 { background: radial-gradient(circle, rgba(59,130,246,.07) 0%, transparent 70%); }
        [data-theme="light"] .blob-2 { background: radial-gradient(circle, rgba(96,165,250,.06) 0%, transparent 70%); }

        .theme-toggle {
            width: 42px; height: 42px;
            background: var(--accent-bg); border: 1.5px solid var(--tb-border);
            border-radius: 12px; display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 18px; transition: all .25s ease; flex-shrink:0;
        }
        .theme-toggle:hover { transform: scale(1.1); border-color: var(--accent); }

        [data-theme="light"] .username-tag {
            background: rgba(37,99,235,.08);
            color: #1d4ed8;
            border-color: rgba(37,99,235,.12);
        }

        [data-theme="light"] .badge-you {
            background: rgba(37,99,235,.08);
            color: #2563eb;
        }

        [data-theme="light"] .badge-admin {
            background: rgba(22,163,74,.08);
            color: #16a34a;
        }

        /* ── Topbar ── */
        .topbar {
            display: flex; align-items: center; justify-content: space-between; gap: 16px;
            padding: 20px 32px;
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0;
            background: var(--tb-bg);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            z-index: 50; transition: background .35s ease;
        }
        .topbar-left { display: flex; align-items: center; gap: 16px; }

        .btn-back {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 18px; border-radius: var(--radius-sm);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            color: var(--text-muted); font-family: inherit; font-size: 13.5px; font-weight: 600;
            cursor: pointer; text-decoration: none; transition: all .2s;
        }
        .btn-back:hover { background: rgba(255, 255, 255, 0.1); color: var(--text); }

        .topbar h1 { font-size: 18px; font-weight: 800; letter-spacing: -0.01em; }

        .btn-add {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 22px;
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            border: none;
            border-radius: var(--radius-sm); color: #fff; font-family: inherit;
            font-size: 14px; font-weight: 700; cursor: pointer; text-decoration: none;
            transition: all .2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 6px 18px rgba(59, 130, 246, 0.3);
        }
        .btn-add:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4); }
        .btn-add svg { width: 16px; height: 16px; }

        /* ── Content ── */
        .content {
            max-width: 920px; margin: 0 auto;
            padding: 40px 24px 80px;
            position: relative; z-index: 1;
        }

        /* ── Alerts ── */
        .alert {
            padding: 14px 18px; border-radius: var(--radius-sm);
            font-size: 14px; font-weight: 600;
            margin-bottom: 24px; display: flex; align-items: center; gap: 10px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:translateY(0); } }
        .alert-success { background: var(--success-bg); color: var(--success); border: 1px solid rgba(52,211,153,.25); }
        .alert-danger   { background: var(--danger-bg);  color: var(--danger);  border: 1px solid rgba(248,113,113,.25); }

        /* ── Table card ── */
        .table-card {
            background: var(--card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }
        .table-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 22px 28px;
            border-bottom: 1px solid var(--border);
        }
        .table-header h3 { font-size: 15px; font-weight: 800; }
        .record-count {
            font-size: 12px; color: var(--accent); font-weight: 700;
            background: rgba(59, 130, 246, 0.12);
            padding: 5px 14px; border-radius: 100px;
            border: 1px solid rgba(59, 130, 246, 0.15);
        }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; }
        thead th {
            padding: 14px 24px;
            text-align: left;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .09em;
            color: var(--text-muted);
            background: var(--thead-bg);
            border-bottom: 1px solid var(--border);
        }
        tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--row-hover); }
        tbody td { padding: 18px 24px; font-size: 14px; vertical-align: middle; }

        /* ── User cell ── */
        .user-cell { display: flex; align-items: center; gap: 14px; }
        .user-avatar {
            width: 40px; height: 40px; border-radius: 12px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 15px; font-weight: 800; color: #fff; flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .user-name  { font-weight: 700; font-size: 14px; color: var(--text); }
        .user-email { font-size: 12px; color: var(--text-muted); margin-top: 2px; font-weight: 500; }

        .username-tag {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            color: #93c5fd;
            background: rgba(59, 130, 246, 0.08);
            padding: 4px 12px;
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.12);
            font-weight: 600;
        }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center;
            padding: 5px 14px; border-radius: 100px;
            font-size: 12px; font-weight: 700;
        }
        .badge-you   { background: rgba(59, 130, 246, 0.15); color: #93c5fd; border: 1px solid rgba(59, 130, 246, 0.2); }
        .badge-admin { background: rgba(52, 211, 153, 0.12); color: var(--success); border: 1px solid rgba(52, 211, 153, 0.2); }

        /* ── Date cell ── */
        .date-cell { font-size: 13px; color: var(--text-muted); font-weight: 500; }

        /* ── Action btn ── */
        .btn-del {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 16px; border-radius: 10px;
            background: var(--danger-bg); border: 1px solid rgba(248,113,113,.2);
            color: var(--danger); font-family: inherit; font-size: 13px; font-weight: 700;
            cursor: pointer; transition: all .2s;
        }
        .btn-del:hover { background: rgba(248,113,113,.22); transform: translateY(-1px); }
        .btn-del svg { width: 14px; height: 14px; }
        .btn-del:disabled { opacity: .3; cursor: not-allowed; transform: none; }

        /* ── Modal ── */
        .modal-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(3, 7, 18, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 200;
            align-items: center; justify-content: center; padding: 16px;
        }
        .modal-overlay.active { display: flex; }
        .modal {
            background: var(--card);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            max-width: 460px;
            width: 100%;
            padding: 36px;
            box-shadow: 0 30px 60px rgba(0,0,0,.25);
        }
        @keyframes fadeIn { from { opacity:0; transform:scale(.95); } to { opacity:1; transform:scale(1); } }
        .modal h3 { font-size: 19px; font-weight: 800; margin-bottom: 12px; letter-spacing: -0.01em; }
        .modal p  { font-size: 14px; color: var(--text-muted); line-height: 1.7; font-weight: 500; }
        .modal-btns { display: flex; gap: 12px; margin-top: 30px; justify-content: flex-end; }
        .btn-cancel {
            padding: 11px 24px;
            background: background: var(--btn-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm); color: var(--text-muted);
            font-family: inherit; font-size: 14px; font-weight: 600;
            cursor: pointer; transition: all .18s;
        }
        .btn-cancel:hover { background: var(--accent-bg); color: var(--text); }
        .btn-confirm-del {
            padding: 11px 24px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            border-radius: var(--radius-sm); color: #fff;
            font-family: inherit; font-size: 14px; font-weight: 700;
            cursor: pointer; transition: all .18s;
            box-shadow: 0 4px 14px rgba(239, 68, 68, 0.3);
        }
        .btn-confirm-del:hover { transform: translateY(-1px); box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4); }
    </style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>

<div class="topbar">
    <div class="topbar-left">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
            Dashboard
        </a>
        <h1>👥 Manajemen Admin</h1>
    </div>
    <div style="display:flex;align-items:center;gap:12px;">
        <a href="{{ route('admin.users.create') }}" class="btn-add">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Admin
        </a>
        <button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
            <span id="themeIcon">☀️</span>
        </button>
    </div>
</div>

<div class="content">

    @if (session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">⚠ {{ session('error') }}</div>
    @endif

    <div class="table-card">
        <div class="table-header">
            <h3>Daftar Akun Admin</h3>
            <span class="record-count">{{ $users->total() }} akun</span>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Admin</th>
                    <th>Username / NIP</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $i => $u)
                @php
                    $avatarColors = [
                        'linear-gradient(135deg, #3b82f6, #6366f1)',
                        'linear-gradient(135deg, #8b5cf6, #ec4899)',
                        'linear-gradient(135deg, #10b981, #06b6d4)',
                        'linear-gradient(135deg, #f59e0b, #ef4444)',
                        'linear-gradient(135deg, #6366f1, #8b5cf6)',
                    ];
                    $avatarGrad = $avatarColors[$u->id % count($avatarColors)];
                @endphp
                <tr>
                    <td style="color:var(--text-muted);font-size:13px;font-weight:600;">{{ $users->firstItem() + $i }}</td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar" style="background: {{ $avatarGrad }};">
                                {{ strtoupper(substr($u->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="user-name">{{ $u->name }}</div>
                                <div class="user-email">{{ $u->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="username-tag">{{ $u->username ?? '–' }}</span>
                    </td>
                    <td>
                        @if($u->id === Auth::id())
                            <span class="badge badge-you">Anda</span>
                        @else
                            <span class="badge badge-admin">Admin</span>
                        @endif
                    </td>
                    <td class="date-cell">{{ $u->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if($u->id !== Auth::id())
                            <button
                                class="btn-del"
                                onclick="confirmDel({{ $u->id }}, '{{ addslashes($u->name) }}')"
                            >
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                                Hapus
                            </button>
                        @else
                            <button class="btn-del" disabled title="Tidak bisa hapus akun sendiri">Hapus</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Delete modal -->
<div class="modal-overlay" id="delModal">
    <div class="modal">
        <h3>🗑 Hapus Akun Admin?</h3>
        <p>Anda akan menghapus akun <strong id="delName" style="color:var(--text);"></strong>. Admin ini <strong style="color:#f87171;">tidak akan bisa login</strong> lagi ke sistem.</p>
        <div class="modal-btns">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <form id="delForm" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn-confirm-del">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    (function(){var t=document.documentElement.getAttribute('data-theme');var i=document.getElementById('themeIcon');if(i)i.textContent=t==='dark'?'☀️':'🌙';})();
    function toggleTheme(){var c=document.documentElement.getAttribute('data-theme'),n=c==='dark'?'light':'dark';document.documentElement.setAttribute('data-theme',n);localStorage.setItem('bpad-theme',n);document.getElementById('themeIcon').textContent=n==='dark'?'☀️':'🌙';}
    function confirmDel(id, name) {
        document.getElementById('delName').textContent = name;
        document.getElementById('delForm').action = '/admin/users/' + id;
        document.getElementById('delModal').classList.add('active');
    }
    function closeModal() { document.getElementById('delModal').classList.remove('active'); }
    document.getElementById('delModal').addEventListener('click', function(e) { if (e.target === this) closeModal(); });
</script>

</body>
</html>
