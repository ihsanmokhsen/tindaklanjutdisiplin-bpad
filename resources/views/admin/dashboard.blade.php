<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Admin – Rekap Tindak Lanjut Disiplin ASN BPAD NTT">
    <title>Dashboard Admin – BPAD NTT</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📋</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>(function(){var t=localStorage.getItem('bpad-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})();</script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ── DARK MODE (default) ── */
        :root {
            --bg:       #030712;
            --sidebar:  rgba(15,23,42,.6);
            --card:     rgba(30,41,59,.4);
            --card-hover:rgba(30,41,59,.55);
            --border:   rgba(255,255,255,.08);
            --text:     #f9fafb;
            --text-mid: #e2eaf8;
            --text-muted:#9ca3af;
            --accent:   #3b82f6;
            --accent-dark:#1d4ed8;
            --accent-soft:#93c5fd;
            --accent-glow:rgba(59,130,246,.25);
            --accent-bg:rgba(59,130,246,.10);
            --input-bg: rgba(15,23,42,.6);
            --input-f:  rgba(15,23,42,.9);
            --topbar-bg:rgba(9,13,22,.7);
            --success:  #34d399;
            --success-bg:rgba(52,211,153,.12);
            --warning:  #fbbf24;
            --warning-bg:rgba(251,191,36,.12);
            --danger:   #f87171;
            --danger-bg:rgba(248,113,113,.12);
            --purple:   #a78bfa;
            --purple-bg:rgba(167,139,250,.12);
            --nav-text: #94a3b8;
            --nav-hover-bg:rgba(59,130,246,.15);
            --radius:   20px;
            --radius-sm:12px;

            /* Table Theme */
            --table-bg: rgba(30, 41, 59, 0.35);
            --table-header-bg: rgba(15, 23, 42, 0.85);
            --table-row-hover: rgba(255,255,255,.03);
            --table-border: rgba(255,255,255,.05);
            --table-uptd: #e2e8f0;

            --dropdown-bg: #0f172a;
            --dropdown-text: #f8fafc;
        }
        /* ── LIGHT MODE – Soft Blue ── */
        [data-theme="light"] {
            --bg:       #eef4ff;
            --sidebar:  rgba(255,255,255,.85);
            --card:     #ffffff;
            --card-hover:#f5f9ff;
            --border:   rgba(59,130,246,.12);
            --text:     #0f172a;
            --text-mid: #1e3a5f;
            --text-muted:#4a6fa5;
            --accent:   #2563eb;
            --accent-dark:#1d4ed8;
            --accent-soft:#3b82f6;
            --accent-glow:rgba(37,99,235,.20);
            --accent-bg:rgba(37,99,235,.08);
            --input-bg: #f8faff;
            --input-f:  #ffffff;
            --topbar-bg:rgba(238,244,255,.85);
            --success:  #16a34a;
            --success-bg:rgba(22,163,74,.10);
            --warning:  #d97706;
            --warning-bg:rgba(217,119,6,.10);
            --danger:   #dc2626;
            --danger-bg:rgba(220,38,38,.10);
            --purple:   #7c3aed;
            --purple-bg:rgba(124,58,237,.10);
            --nav-text: #4a6fa5;
            --nav-hover-bg:rgba(37,99,235,.08);
            --radius:   20px;
            --radius-sm:12px;

            /* Table Theme */
            --table-bg: #ffffff;
            --table-header-bg: #f1f5f9;
            --table-row-hover: #f8fbff;
            --table-border: rgba(59,130,246,.08);
            --table-uptd: #334155;

            --dropdown-bg: #ffffff;
            --dropdown-text: #0f172a;
        }

        html, body { height: 100%; font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); transition: background .35s ease, color .35s ease; }

        /* Animated background blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
            opacity: 0.35;
        }
        .blob-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(59,130,246,.12) 0%, transparent 70%);
            top: -100px; right: 20%;
        }
        .blob-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(99,102,241,.10) 0%, transparent 70%);
            bottom: -100px; left: 10%;
        }
        [data-theme="light"] .blob-1 { background: radial-gradient(circle, rgba(59,130,246,.07) 0%, transparent 70%); }
        [data-theme="light"] .blob-2 { background: radial-gradient(circle, rgba(96,165,250,.06) 0%, transparent 70%); }

        /* ── Layout ── */
        .layout { display: flex; min-height: 100vh; position: relative; z-index: 1; }

        /* ── Sidebar ── */
        .sidebar {
            width: 270px;
            background: var(--sidebar);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            padding: 28px 0;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 100;
        }
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 24px 28px;
            border-bottom: 1px solid var(--border);
        }
        .sidebar-brand-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, #3b82f6, #7c3aed);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.35);
        }
        .sidebar-brand-text h2 { font-size: 15px; font-weight: 800; letter-spacing: -0.01em; }
        .sidebar-brand-text p  { font-size: 11px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

        .sidebar-nav { padding: 20px 14px; flex: 1; }
        .nav-label {
            font-size: 10px; font-weight: 800;
            text-transform: uppercase; letter-spacing: .12em;
            color: var(--text-muted);
            padding: 0 10px;
            margin-bottom: 10px; margin-top: 20px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 16px; border-radius: var(--radius-sm);
            font-size: 14px; font-weight: 600;
            color: var(--nav-text); text-decoration: none;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 4px;
            border-left: 3px solid transparent;
        }
        .nav-item:hover, .nav-item.active {
            background: var(--nav-hover-bg);
            color: var(--accent);
            border-left-color: var(--accent);
            padding-left: 13px;
        }
        [data-theme="dark"] .nav-item:hover,
        [data-theme="dark"] .nav-item.active { color: #fff; }
        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }

        .sidebar-footer {
            padding: 20px 24px;
            border-top: 1px solid var(--border);
        }
        .user-row { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
        .user-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; font-weight: 800; color: #fff;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.25);
        }
        .user-info p   { font-size: 13.5px; font-weight: 700; }
        .user-info span { font-size: 11px; color: var(--text-muted); font-weight: 500; }
        .btn-logout {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            width: 100%; padding: 10px;
            background: rgba(248,113,113,.1);
            border: 1px solid rgba(248,113,113,.2);
            border-radius: var(--radius-sm);
            color: var(--danger); font-family: inherit; font-size: 13px; font-weight: 600;
            cursor: pointer; transition: all .2s; text-decoration: none;
        }
        .btn-logout:hover { background: rgba(248,113,113,.2); }
        .btn-logout svg { width: 16px !important; height: 16px !important; flex-shrink: 0; }

        /* ── Main content ── */
        .main { flex: 1; overflow-y: auto; position: relative; z-index: 10; }

        /* ── Top bar ── */
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 24px 32px;
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0;
            background: var(--topbar-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 50;
            transition: background .35s ease;
        }
        /* ── Theme toggle btn ── */
        .theme-toggle {
            width: 42px; height: 42px;
            background: var(--accent-bg);
            border: 1.5px solid rgba(59,130,246,.2);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 18px;
            transition: all .25s ease;
            flex-shrink: 0;
        }
        .theme-toggle:hover { transform: scale(1.1); background: var(--accent-bg); border-color: var(--accent); }
        .topbar h1 { font-size: 20px; font-weight: 800; letter-spacing: -0.01em; }
        .topbar p  { font-size: 13.5px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }
        .topbar-right { display: flex; align-items: center; gap: 10px; }
        .btn-export {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 18px;
            background: var(--success-bg);
            border: 1px solid rgba(52,211,153,.2);
            border-radius: var(--radius-sm);
            color: var(--success); font-family: inherit; font-size: 13px; font-weight: 600;
            cursor: pointer; text-decoration: none;
            transition: all .2s;
        }
        .btn-export:hover { background: rgba(52,211,153,.2); transform: translateY(-1px); }
        .btn-export svg { width: 16px; height: 16px; }

        /* ── Content area ── */
        .content { padding: 32px; }

        /* ── Alert ── */
        .alert {
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            font-size: 14px; font-weight: 600;
            margin-bottom: 26px;
            display: flex; align-items: center; gap: 10px;
        }
        .alert-success { background: var(--success-bg); color: var(--success); border: 1px solid rgba(52,211,153,.25); }

        /* ── Stats grid ── */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 32px; }
        @media (max-width: 900px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }

        .stat-card {
            background: var(--card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            display: flex; align-items: flex-start; gap: 16px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .stat-card:hover {
            border-color: rgba(59, 130, 246, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.1);
            background: var(--card-hover);
        }
        .stat-icon {
            width: 52px; height: 52px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .stat-icon.blue   { background: linear-gradient(135deg, rgba(59,130,246,0.2), rgba(59,130,246,0.05)); border: 1px solid rgba(59,130,246,0.2); color: #60a5fa; }
        .stat-icon.green  { background: linear-gradient(135deg, rgba(52,211,153,0.2), rgba(52,211,153,0.05)); border: 1px solid rgba(52,211,153,0.2); color: #34d399; }
        .stat-icon.yellow { background: linear-gradient(135deg, rgba(251,191,36,0.2), rgba(251,191,36,0.05)); border: 1px solid rgba(251,191,36,0.2); color: #fbbf24; }
        .stat-icon.purple { background: linear-gradient(135deg, rgba(167,139,250,0.2), rgba(167,139,250,0.05)); border: 1px solid rgba(167,139,250,0.2); color: #c084fc; }
        .stat-number { font-size: 32px; font-weight: 800; line-height: 1; letter-spacing: -0.02em; }
        .stat-label  { font-size: 12.5px; color: var(--text-muted); margin-top: 6px; font-weight: 500; }
        .stat-badge  { font-size: 11px; color: var(--success); background: var(--success-bg); padding: 3px 10px; border-radius: 100px; margin-top: 8px; display: inline-block; font-weight: 600; }

        /* ── Filter bar ── */
        .filter-bar {
            background: var(--card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            margin-bottom: 28px;
        }
        .filter-title { font-size: 12px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 16px; }
        .filter-row { display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end; }
        .filter-group { display: flex; flex-direction: column; gap: 6px; min-width: 140px; }
        .filter-group label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .06em; }

        .filter-group input,
        .filter-group select {
            background: var(--input-bg);
            color: var(--text);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            font-family: inherit;
            font-size: 13.5px;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: all .25s ease;
        }
        .filter-group input::placeholder { color: #4b5563; }
        .filter-group input:focus,
        .filter-group select:focus {
            border-color: var(--accent);
            background: var(--input-f);
            box-shadow: 0 0 0 4px var(--accent-glow);
        }
        .filter-group select { padding-right: 32px; cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%239ca3af' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 12px center;
        }

        .filter-search { flex: 1; min-width: 200px; }

        .btn-filter, .btn-reset {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 11px 20px; border-radius: var(--radius-sm);
            font-family: inherit; font-size: 13.5px; font-weight: 700;
            cursor: pointer; border: none; transition: all .2s;
        }
        .btn-filter { background: var(--accent); color: #fff; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2); }
        .btn-filter:hover { background: var(--accent-dark); transform: translateY(-1px); }
        .btn-reset  { background: rgba(255, 255, 255, 0.06); color: var(--text-muted); border: 1px solid rgba(255, 255, 255, 0.05); }
        .btn-reset:hover  { background: rgba(255, 255, 255, 0.1); color: var(--text); }
        .btn-filter svg, .btn-reset svg { width: 15px; height: 15px; }

        /* ── Table ── */
        .table-card {
            background: var(--table-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.10);
            transition: background .35s ease, border-color .35s ease;
        }
        .table-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
        }
        .table-header h3 { font-size: 15px; font-weight: 700; }
        .record-count { font-size: 12px; color: #3b82f6; font-weight: 600; background: rgba(59, 130, 246, 0.12); padding: 4px 12px; border-radius: 100px; }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        thead th {
            padding: 14px 18px;
            text-align: left;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--text-muted);
            background: var(--table-header-bg);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            transition: background .35s ease;
        }
        tbody tr { border-bottom: 1px solid var(--table-border);transition: all .2s ease }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--table-row-hover); }
        tbody td { padding: 16px 18px; font-size: 14px; vertical-align: middle; }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center;
            padding: 4px 12px; border-radius: 100px; font-size: 11.5px; font-weight: 700;
            white-space: nowrap;
        }
        .badge-blue   { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
        .badge-red    { background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.2); }
        .badge-green  { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.2); }
        .badge-yellow { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.2); }
        .badge-purple { background: rgba(139, 92, 246, 0.15); color: #c084fc; border: 1px solid rgba(139, 92, 246, 0.2); }

        /* ── Action buttons ── */
        .action-btns { display: flex; gap: 8px; flex-wrap: nowrap; }
        .btn-action {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 14px; border-radius: 8px; font-family: inherit;
            font-size: 12.5px; font-weight: 600; cursor: pointer;
            text-decoration: none; border: none; transition: all 0.2s;
            white-space: nowrap;
        }
        .btn-view { background: rgba(59,130,246,.12); color: #60a5fa; border: 1px solid rgba(59,130,246,.2); }
        .btn-view:hover { background: rgba(59,130,246,.22); transform: translateY(-1px); }
        .btn-del  { background: rgba(248,113,113,.1); color: #f87171; border: 1px solid rgba(248,113,113,.18); }
        .btn-del:hover { background: rgba(248,113,113,.2); transform: translateY(-1px); }
        .btn-action svg { width: 14px; height: 14px; }

        /* ── Empty state ── */
        .empty-state {
            text-align: center; padding: 60px 20px;
            color: var(--text-muted);
        }
        .empty-state-icon { font-size: 52px; margin-bottom: 16px; }
        .empty-state h3 { font-size: 16px; font-weight: 700; color: var(--text); }
        .empty-state p  { font-size: 13.5px; margin-top: 6px; }

        /* ── Pagination ── */
        .pagination-wrap { padding: 20px 24px; border-top: 1px solid var(--border); }
        .pagination { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }
        .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px; border-radius: var(--radius-sm);
            background: rgba(255,255,255,.04); border: 1px solid var(--border);
            color: var(--text-muted); font-size: 13.5px; font-weight: 600;
            text-decoration: none; transition: all .2s;
        }
        .page-link:hover  { background: rgba(59,130,246,.15); color: #60a5fa; border-color: rgba(59,130,246,.3); }
        .page-link.active { background: var(--accent); color: #fff; border-color: var(--accent); box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25); }
        .page-link.disabled { opacity: .3; pointer-events: none; }

        /* ── Modal ── */
        .modal-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(3, 7, 18, 0.7); z-index: 200;
            backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
            align-items: center; justify-content: center;
            padding: 16px;
        }
        .modal-overlay.active { display: flex; }
        .modal {
            background: rgba(30, 41, 59, 0.75);
            backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            max-width: 460px; width: 100%;
            padding: 32px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
            animation: fadeIn .25s ease-out;
        }
        @keyframes fadeIn { from { opacity:0; transform:scale(.95); } to { opacity:1; transform:scale(1); } }
        .modal h3 { font-size: 18px; font-weight: 800; margin-bottom: 12px; letter-spacing: -0.01em; }
        .modal p  { font-size: 14px; color: var(--text-muted); line-height: 1.6; font-weight: 500; }
        .modal-btns { display: flex; gap: 12px; margin-top: 28px; justify-content: flex-end; }
        .btn-cancel {
            padding: 10px 22px; background: rgba(255, 255, 255, 0.05); border: 1px solid var(--border);
            border-radius: var(--radius-sm); color: var(--text-muted); font-family: inherit; font-size: 13.5px;
            cursor: pointer; transition: all .15s; font-weight: 600;
        }
        .btn-cancel:hover { background: rgba(255, 255, 255, 0.1); color: var(--text); }
        .btn-confirm-del {
            padding: 10px 22px; background: var(--danger); border: none;
            border-radius: var(--radius-sm); color: #fff; font-family: inherit; font-size: 13.5px; font-weight: 700;
            cursor: pointer; transition: all .15s; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
        }
        .btn-confirm-del:hover { background: #ef4444; }

        [data-theme="light"] .btn-view {
            background: rgba(37,99,235,.08);
            color: #2563eb;
            border-color: rgba(37,99,235,.15);
        }

        [data-theme="light"] .btn-del {
            background: rgba(220,38,38,.08);
            color: #dc2626;
            border-color: rgba(220,38,38,.15);
        }

        /* Dropdown option */
        .filter-group select option {
            background: var(--card);
            color: var(--text);
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 480px) { .stats-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>

<div class="layout">

    <!-- ── Sidebar ── -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">📚</div>
            <div class="sidebar-brand-text">
                <h2>BPAD NTT</h2>
                <p>Admin Portal</p>
            </div>
        </div>

        <nav class="sidebar-nav">
            <p class="nav-label">Menu</p>
            <a href="{{ route('admin.dashboard') }}" class="nav-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
            <a href="{{ route('form.index') }}" target="_blank" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                Form Publik
            </a>
            <a href="{{ route('admin.rekap') }}" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                Rekap Berkas
            </a>

            <p class="nav-label" style="margin-top:20px;">Pengaturan</p>
            <a href="{{ route('admin.users') }}" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Manajemen Admin
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-row">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="user-info">
                    <p>{{ Auth::user()->name }}</p>
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- ── Main ── -->
    <div class="main">

        <div class="topbar">
            <div>
                <h1>📊 Rekap Tindak Lanjut</h1>
                <p>{{ now()->translatedFormat('l, d F Y') }} · Total {{ $totalSubmissions }} laporan</p>
            </div>
            <div class="topbar-right">
                <a href="{{ route('form.index') }}" target="_blank" class="btn-export">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    Form Publik
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

            <!-- Stats grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">📋</div>
                    <div>
                        <div class="stat-number">{{ $totalSubmissions }}</div>
                        <div class="stat-label">Total Laporan</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">📅</div>
                    <div>
                        <div class="stat-number">{{ $thisMonthCount }}</div>
                        <div class="stat-label">Bulan Ini</div>
                        <span class="stat-badge">{{ now()->format('M Y') }}</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon yellow">🏢</div>
                    <div>
                        <div class="stat-number">{{ $uptdCount }}</div>
                        <div class="stat-label">UPTD Aktif</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon purple">🕐</div>
                    <div>
                        <div class="stat-number">{{ $recentCount }}</div>
                        <div class="stat-label">7 Hari Terakhir</div>
                    </div>
                </div>
            </div>

            <!-- Filter bar -->
            <div class="filter-bar">
                <p class="filter-title">🔍 Filter & Pencarian</p>
                <form method="GET" action="{{ route('admin.dashboard') }}" id="filterForm">
                    <div class="filter-row">
                        <div class="filter-group filter-search">
                            <label>Cari nama / NIP / UPTD</label>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik untuk mencari…">
                        </div>
                        <div class="filter-group">
                            <label>UPTD</label>
                            <select name="uptd" style="min-width:180px;">
                                <option value="">Semua UPTD</option>
                                @foreach($uptdList as $u)
                                    <option value="{{ $u }}" {{ request('uptd') === $u ? 'selected' : '' }}>{{ $u }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Jenis TL</label>
                            <select name="jenis_tl">
                                <option value="">Semua</option>
                                @foreach($jenisTlList as $jt)
                                    <option value="{{ $jt }}" {{ request('jenis_tl') === $jt ? 'selected' : '' }}>{{ $jt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Tahun</label>
                            <select name="year">
                                <option value="">Semua</option>
                                @foreach($years as $y)
                                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Bulan</label>
                            <select name="month">
                                <option value="">Semua</option>
                                @foreach($months as $num => $name)
                                    <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn-filter">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            Cari
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn-reset">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.61"/></svg>
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Submissions table -->
            <div class="table-card">
                <div class="table-header">
                    <h3>Daftar Laporan</h3>
                    <span class="record-count">{{ $submissions->total() }} data ditemukan</span>
                </div>

                @if($submissions->count() > 0)
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama ASN</th>
                                <th>NIP</th>
                                <th>Status</th>
                                <th>UPTD</th>
                                <th>Pelanggaran</th>
                                <th>Jenis TL</th>
                                <th>Dokumen</th>
                                <th>Tgl Input</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $i => $sub)
                            <tr>
                                <td style="color:var(--text-muted);font-size:12px;font-weight:600;">{{ $submissions->firstItem() + $i }}</td>
                                <td>
                                    <div style="font-weight:700;color:var(--text);">{{ $sub->nama }}</div>
                                    @if($sub->jabatan)<div style="font-size:12px;color:var(--text-muted);margin-top:2px;">{{ $sub->jabatan }}</div>@endif
                                </td>
                                <td style="font-size:13px;color:var(--text-muted);font-weight:500;">{{ $sub->nip ?? '–' }}</td>
                                <td>
                                    @php
                                        $statusColor = match($sub->status_asn) {
                                            'PNS'   => 'badge-blue',
                                            'PPPK'  => 'badge-green',
                                            'Honorer' => 'badge-yellow',
                                            default => 'badge-purple',
                                        };
                                    @endphp
                                    <span class="badge {{ $statusColor }}">{{ $sub->status_asn }}</span>
                                </td>
                                <td style="font-size:13px;max-width:160px;font-weight:500;color:var(--table-uptd);">{{ $sub->uptd }}</td>
                                <td style="font-size:13px;max-width:140px;color:var(--text-muted);">{{ $sub->pelanggaran }}</td>
                                <td style="font-size:13px;max-width:150px;color:var(--text-muted);">{{ $sub->jenis_tl }}</td>
                                <td>
                                    <div style="display:flex;gap:4px;flex-wrap:wrap;">
                                        @if($sub->foto_path)
                                            <a href="{{ route('admin.submissions.download', [$sub->id, 'foto']) }}" class="btn-action btn-view" title="Unduh Foto" target="_blank">
                                                🖼
                                            </a>
                                        @endif
                                        @if($sub->sk_path)
                                            <a href="{{ route('admin.submissions.download', [$sub->id, 'sk']) }}" class="btn-action btn-view" title="Unduh SK" target="_blank">
                                                📄
                                            </a>
                                        @endif
                                        @if($sub->bukti_path)
                                            <a href="{{ route('admin.submissions.download', [$sub->id, 'bukti']) }}" class="btn-action btn-view" title="Unduh Bukti" target="_blank">
                                                📎
                                            </a>
                                        @endif
                                        @if(!$sub->foto_path && !$sub->sk_path && !$sub->bukti_path)
                                            <span style="color:var(--text-muted);font-size:12px;">–</span>
                                        @endif
                                    </div>
                                </td>
                                <td style="font-size:13px;color:var(--text-muted);white-space:nowrap;">{{ $sub->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.submissions.show', $sub->id) }}" class="btn-action btn-view">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                            Detail
                                        </a>
                                        <button
                                            type="button" class="btn-action btn-del"
                                            onclick="confirmDelete({{ $sub->id }}, '{{ addslashes($sub->nama) }}')"
                                        >
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($submissions->hasPages())
                <div class="pagination-wrap">
                    <div class="pagination">
                        @if($submissions->onFirstPage())
                            <span class="page-link disabled">‹</span>
                        @else
                            <a href="{{ $submissions->previousPageUrl() }}" class="page-link">‹</a>
                        @endif

                        @foreach($submissions->getUrlRange(1, $submissions->lastPage()) as $page => $url)
                            @if($page == $submissions->currentPage())
                                <span class="page-link active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($submissions->hasMorePages())
                            <a href="{{ $submissions->nextPageUrl() }}" class="page-link">›</a>
                        @else
                            <span class="page-link disabled">›</span>
                        @endif
                    </div>
                </div>
                @endif

                @else
                <div class="empty-state">
                    <div class="empty-state-icon">📭</div>
                    <h3>Belum ada data</h3>
                    <p>Tidak ditemukan laporan yang sesuai dengan filter yang dipilih.</p>
                </div>
                @endif
            </div>

        </div><!-- end .content -->
    </div><!-- end .main -->
</div><!-- end .layout -->

<!-- Delete confirmation modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal">
        <h3>🗑 Hapus Laporan?</h3>
        <p style="margin-top:8px;">Anda akan menghapus data laporan <strong id="deleteName" style="color:var(--text);"></strong>. Tindakan ini <strong style="color:#f87171;">tidak dapat dibatalkan</strong> dan akan menghapus semua file terkait.</p>
        <div class="modal-btns">
            <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm-del">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Init icon
    (function(){
        var t = document.documentElement.getAttribute('data-theme');
        var icon = document.getElementById('themeIcon');
        document.documentElement.style.colorScheme = t;
        document.body.style.colorScheme = t;
        if (icon) icon.textContent = t === 'dark' ? '☀️' : '🌙';
    })();

    function toggleTheme() {
        var c = document.documentElement.getAttribute('data-theme');
        var n = c === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', n);
        document.body.style.colorScheme = n;
        document.documentElement.style.colorScheme = n;
        localStorage.setItem('bpad-theme', n);
        document.getElementById('themeIcon').textContent = n === 'dark' ? '☀️' : '🌙';
    }

    function confirmDelete(id, name) {
        document.getElementById('deleteName').textContent = name;
        document.getElementById('deleteForm').action = '/admin/submissions/' + id;
        document.getElementById('deleteModal').classList.add('active');
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('active');
    }
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
</script>

</body>
</html>
