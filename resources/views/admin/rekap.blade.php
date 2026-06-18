<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Berkas – BPAD NTT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>(function(){var t=localStorage.getItem('bpad-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})();</script>
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

        :root {
            --bg:#030712;--sidebar:rgba(15,23,42,.6);--card:rgba(30,41,59,.4);
            --border:rgba(255,255,255,.08);--text:#f9fafb;--text-mid:#e2eaf8;--text-muted:#9ca3af;
            --accent:#3b82f6;--accent-d:#1d4ed8;--accent-s:#93c5fd;
            --accent-g:rgba(59,130,246,.25);--accent-bg:rgba(59,130,246,.10);
            --success:#34d399;--success-bg:rgba(52,211,153,.12);
            --warning:#fbbf24;--warning-bg:rgba(251,191,36,.12);
            --danger:#f87171;--danger-bg:rgba(248,113,113,.12);
            --purple:#a78bfa;--purple-bg:rgba(167,139,250,.12);
            --nav-text:#94a3b8;--nav-hover:rgba(59,130,246,.15);
            --topbar-bg:rgba(9,13,22,.75);
            --radius:20px;--radius-sm:12px;
        }
        [data-theme="light"] {
            --bg:#eef4ff;--sidebar:rgba(255,255,255,.9);--card:#ffffff;
            --border:rgba(59,130,246,.12);--text:#0f172a;--text-mid:#1e3a5f;--text-muted:#4a6fa5;
            --accent:#2563eb;--accent-d:#1d4ed8;--accent-s:#3b82f6;
            --accent-g:rgba(37,99,235,.18);--accent-bg:rgba(37,99,235,.08);
            --success:#16a34a;--success-bg:rgba(22,163,74,.10);
            --warning:#d97706;--warning-bg:rgba(217,119,6,.10);
            --danger:#dc2626;--danger-bg:rgba(220,38,38,.10);
            --purple:#7c3aed;--purple-bg:rgba(124,58,237,.10);
            --nav-text:#4a6fa5;--nav-hover:rgba(37,99,235,.08);
            --topbar-bg:rgba(238,244,255,.85);
            --radius:20px;--radius-sm:12px;
        }

        html,body{height:100%;font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text);transition:background .35s ease,color .35s ease;}

        .blob{position:fixed;border-radius:50%;filter:blur(120px);pointer-events:none;z-index:0;opacity:.35;}
        .blob-1{width:500px;height:500px;background:radial-gradient(circle,rgba(59,130,246,.15) 0%,transparent 70%);top:-100px;right:20%;}
        .blob-2{width:400px;height:400px;background:radial-gradient(circle,rgba(99,102,241,.12) 0%,transparent 70%);bottom:-100px;left:10%;}
        [data-theme="light"] .blob-1{background:radial-gradient(circle,rgba(59,130,246,.07) 0%,transparent 70%);}
        [data-theme="light"] .blob-2{background:radial-gradient(circle,rgba(96,165,250,.06) 0%,transparent 70%);}

        .layout{display:flex;min-height:100vh;position:relative;z-index:1;}

        /* ── Sidebar ── */
        .sidebar{width:270px;background:var(--sidebar);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-right:1px solid var(--border);display:flex;flex-direction:column;padding:28px 0;flex-shrink:0;position:sticky;top:0;height:100vh;z-index:100;transition:background .35s;}
        .sidebar-brand{display:flex;align-items:center;gap:14px;padding:0 24px 28px;border-bottom:1px solid var(--border);}
        .sidebar-brand-icon{width:44px;height:44px;background:linear-gradient(135deg,var(--accent),var(--accent-s));border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;box-shadow:0 4px 15px var(--accent-g);}
        .sidebar-brand-text h2{font-size:15px;font-weight:800;letter-spacing:-0.01em;color:var(--text);}
        .sidebar-brand-text p{font-size:11px;color:var(--text-muted);margin-top:3px;font-weight:500;}

        .sidebar-nav{padding:20px 14px;flex:1;}
        .nav-label{font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:.12em;color:var(--text-muted);padding:0 10px;margin-bottom:10px;margin-top:20px;}
        .nav-item{display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:var(--radius-sm);font-size:14px;font-weight:600;color:var(--nav-text);text-decoration:none;transition:all .2s cubic-bezier(.4,0,.2,1);margin-bottom:4px;border-left:3px solid transparent;}
        .nav-item:hover,.nav-item.active{background:var(--nav-hover);color:var(--accent);border-left-color:var(--accent);}
        [data-theme="dark"] .nav-item:hover,[data-theme="dark"] .nav-item.active{color:#fff;}
        .nav-item svg{width:18px;height:18px;flex-shrink:0;}

        .sidebar-footer{padding:20px 24px;border-top:1px solid var(--border);}
        .user-row{display:flex;align-items:center;gap:12px;margin-bottom:16px;}
        .user-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent-s));display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:800;color:#fff;flex-shrink:0;}
        .user-info p{font-size:13.5px;font-weight:700;color:var(--text);}
        .user-info span{font-size:11px;color:var(--text-muted);font-weight:500;}
        .btn-logout{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:10px;background:var(--danger-bg);border:1px solid rgba(248,113,113,.2);border-radius:var(--radius-sm);color:var(--danger);font-family:inherit;font-size:13px;font-weight:600;cursor:pointer;transition:all .2s;text-decoration:none;}
        .btn-logout:hover{background:rgba(248,113,113,.2);}
        .btn-logout svg{width:16px !important;height:16px !important;flex-shrink:0;}

        /* ── Main ── */
        .main{flex:1;overflow-y:auto;position:relative;z-index:10;}

        .topbar{display:flex;align-items:center;justify-content:space-between;padding:24px 32px;border-bottom:1px solid var(--border);position:sticky;top:0;background:var(--topbar-bg);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);z-index:50;transition:background .35s ease;}
        .topbar h1{font-size:20px;font-weight:800;letter-spacing:-0.01em;color:var(--text);}
        .topbar p{font-size:13.5px;color:var(--text-muted);margin-top:3px;font-weight:500;}
        .topbar-right{display:flex;align-items:center;gap:10px;}

        .theme-toggle{width:42px;height:42px;background:var(--accent-bg);border:1.5px solid rgba(59,130,246,.2);border-radius:12px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:18px;transition:all .25s ease;flex-shrink:0;}
        .theme-toggle:hover{transform:scale(1.1);border-color:var(--accent);}

        .content{padding:32px;}

        /* ── Stats ── */
        .stat-row{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:28px;}
        .stat-card{background:var(--card);backdrop-filter:blur(16px);border:1px solid var(--border);border-radius:var(--radius);padding:20px 24px;display:flex;align-items:center;gap:16px;transition:all .2s ease;box-shadow:0 4px 16px rgba(0,0,0,.08);}
        .stat-card:hover{border-color:var(--accent-s);box-shadow:0 8px 24px rgba(0,0,0,.12);}
        .stat-icon{width:48px;height:48px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;}
        .si-blue{background:var(--accent-bg);color:var(--accent);}
        .si-green{background:var(--success-bg);color:var(--success);}
        .si-purple{background:var(--purple-bg);color:var(--purple);}
        .stat-number{font-size:26px;font-weight:800;letter-spacing:-0.02em;color:var(--text);}
        .stat-label{font-size:12px;font-weight:600;color:var(--text-muted);margin-top:2px;text-transform:uppercase;letter-spacing:.04em;}

        /* ── UPTD Tree ── */
        .tree-section{display:flex;flex-direction:column;gap:12px;}

        .uptd-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;transition:all .2s ease;box-shadow:0 4px 16px rgba(0,0,0,.08);}
        .uptd-card:hover{border-color:var(--accent-s);}

        .uptd-header{display:flex;align-items:center;gap:16px;padding:18px 24px;cursor:pointer;transition:background .15s ease;user-select:none;}
        .uptd-header:hover{background:rgba(255,255,255,.03);}
        [data-theme="light"] .uptd-header:hover{background:rgba(37,99,235,.04);}

        .uptd-icon{font-size:24px;flex-shrink:0;}
        .uptd-info{flex:1;}
        .uptd-name{font-size:15px;font-weight:700;color:var(--text);line-height:1.3;}
        .uptd-slug{font-size:11px;color:var(--text-muted);font-family:'Courier New',monospace;margin-top:2px;}
        .uptd-badge{display:inline-flex;align-items:center;padding:4px 12px;border-radius:100px;font-size:12px;font-weight:700;background:var(--accent-bg);color:var(--accent);border:1px solid rgba(59,130,246,.2);flex-shrink:0;}
        .uptd-chevron{width:20px;height:20px;color:var(--text-muted);transition:transform .25s ease;flex-shrink:0;}
        .uptd-card.open .uptd-chevron{transform:rotate(90deg);}
        .uptd-card.open .uptd-header{background:var(--accent-bg);}

        .uptd-body{display:none;padding:0 24px 20px;}
        .uptd-card.open .uptd-body{display:block;}

        /* ── Year tabs ── */
        .year-tabs{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:16px;border-top:1px solid var(--border);padding-top:20px;}
        .year-tab{padding:7px 18px;border-radius:100px;font-size:13px;font-weight:700;cursor:pointer;border:1.5px solid var(--border);color:var(--text-muted);transition:all .2s;background:transparent;}
        .year-tab:hover,.year-tab.active{border-color:var(--accent);background:var(--accent-bg);color:var(--accent);}

        /* ── Month grid ── */
        .month-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:12px;}
        .month-card{background:rgba(255,255,255,.03);border:1px solid var(--border);border-radius:var(--radius-sm);overflow:hidden;transition:all .2s;}
        [data-theme="light"] .month-card{background:#f8faff;}
        .month-card:hover{border-color:var(--accent-s);}
        .month-header{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;cursor:pointer;transition:background .15s;}
        .month-header:hover{background:rgba(59,130,246,.06);}
        .month-name{font-size:13.5px;font-weight:700;color:var(--text);}
        .month-count{font-size:12px;font-weight:700;color:var(--text-muted);background:var(--accent-bg);padding:2px 10px;border-radius:100px;}
        .month-chevron{width:16px;height:16px;color:var(--text-muted);transition:transform .2s;}
        .month-card.open .month-chevron{transform:rotate(90deg);}
        .month-body{display:none;padding:0 14px 14px;}
        .month-card.open .month-body{display:block;}

        /* ── Jenis TL folder ── */
        .tl-folder{margin-top:10px;border:1px solid var(--border);border-radius:10px;overflow:hidden;}
        .tl-folder-header{display:flex;align-items:center;gap:10px;padding:10px 14px;cursor:pointer;background:rgba(59,130,246,.06);transition:background .15s;}
        .tl-folder-header:hover{background:rgba(59,130,246,.12);}
        [data-theme="light"] .tl-folder-header{background:rgba(37,99,235,.05);}
        .tl-folder-icon{font-size:16px;flex-shrink:0;}
        .tl-folder-name{font-size:12.5px;font-weight:700;color:var(--accent);flex:1;}
        .tl-folder-count{font-size:11px;font-weight:700;background:var(--accent-bg);color:var(--accent);padding:2px 9px;border-radius:100px;}
        .tl-folder-chev{width:14px;height:14px;color:var(--text-muted);transition:transform .2s;flex-shrink:0;}
        .tl-folder.open .tl-folder-chev{transform:rotate(90deg);}
        .tl-folder-body{display:none;padding:8px 12px 12px;}
        .tl-folder.open .tl-folder-body{display:block;}

        /* ── File list ── */
        .file-list{display:flex;flex-direction:column;gap:6px;margin-top:10px;}
        .file-item{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:10px;background:rgba(255,255,255,.03);border:1px solid var(--border);transition:all .15s;}
        [data-theme="light"] .file-item{background:#fff;}
        .file-item:hover{border-color:var(--accent);background:var(--accent-bg);}
        .file-ext-badge{width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800;text-transform:uppercase;flex-shrink:0;}
        .ext-img{background:rgba(52,211,153,.12);color:#34d399;}
        .ext-pdf{background:rgba(248,113,113,.12);color:#f87171;}
        .ext-other{background:var(--accent-bg);color:var(--accent);}
        .file-info{flex:1;min-width:0;}
        .file-name{font-size:12px;font-weight:600;color:var(--text);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .file-size{font-size:11px;color:var(--text-muted);margin-top:2px;}
        .file-actions{display:flex;gap:6px;flex-shrink:0;}
        .btn-view,.btn-dl{display:inline-flex;align-items:center;gap:5px;padding:5px 11px;border-radius:8px;font-size:11.5px;font-weight:700;text-decoration:none;transition:all .15s;border:1.5px solid;white-space:nowrap;}
        .btn-view{color:var(--accent);border-color:rgba(59,130,246,.25);background:var(--accent-bg);}
        .btn-view:hover{background:var(--accent);color:#fff;}
        .btn-dl{color:var(--success);border-color:rgba(52,211,153,.25);background:var(--success-bg);}
        .btn-dl:hover{background:var(--success);color:#fff;}
        .btn-dl svg,.btn-view svg{width:13px;height:13px;}

        /* ── Empty ── */
        .empty-state{text-align:center;padding:60px 20px;}
        .empty-icon{font-size:56px;margin-bottom:16px;display:block;}
        .empty-title{font-size:18px;font-weight:700;color:var(--text);margin-bottom:8px;}
        .empty-sub{font-size:14px;color:var(--text-muted);}

        /* Month name map */
        .year-panel{display:none;}
        .year-panel.active{display:block;}

        @media(max-width:768px){.stat-row{grid-template-columns:1fr 1fr;}.month-grid{grid-template-columns:1fr;}}
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
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
            <a href="{{ route('form.index') }}" target="_blank" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Form Publik
            </a>
            <a href="{{ route('admin.rekap') }}" class="nav-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                Rekap Berkas
            </a>

            <p class="nav-label">Pengaturan</p>
            <a href="{{ route('admin.users') }}" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Manajemen Admin
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-row">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? auth()->user()->username, 0, 1)) }}</div>
                <div class="user-info">
                    <p>{{ auth()->user()->name ?? auth()->user()->username }}</p>
                    <span>{{ auth()->user()->email ?? 'Admin' }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- ── Main ── -->
    <div class="main">
        <div class="topbar">
            <div>
                <h1>🗂️ Rekap Bukti Data Dukung</h1>
                <p>Browser folder berkas per UPTD / Tahun / Bulan</p>
            </div>
            <div class="topbar-right">
                <button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
                    <span id="themeIcon">☀️</span>
                </button>
            </div>
        </div>

        <div class="content">

            <!-- Stats -->
            <div class="stat-row">
                <div class="stat-card">
                    <div class="stat-icon si-blue">📁</div>
                    <div>
                        <div class="stat-number">{{ count($tree) }}</div>
                        <div class="stat-label">Folder UPTD</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-green">📄</div>
                    <div>
                        <div class="stat-number">{{ $totalFiles }}</div>
                        <div class="stat-label">Total Berkas</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-purple">🗓️</div>
                    <div>
                        <div class="stat-number">{{ now()->format('Y') }}</div>
                        <div class="stat-label">Tahun Aktif</div>
                    </div>
                </div>
            </div>

            @if(empty($tree))
                <div class="empty-state">
                    <span class="empty-icon">📭</span>
                    <p class="empty-title">Belum Ada Berkas</p>
                    <p class="empty-sub">Berkas akan muncul di sini setelah user mengirimkan laporan dengan dokumen pendukung.</p>
                </div>
            @else
                <div class="tree-section">
                    @foreach($tree as $slug => $uptd)
                        @php
                            $isOpen = ($openUptd === $slug);
                            $cardId = 'uptd-' . $loop->index;
                        @endphp
                        <div class="uptd-card {{ $isOpen ? 'open' : '' }}" id="{{ $cardId }}">
                            <div class="uptd-header" onclick="toggleUptd('{{ $cardId }}')">
                                <span class="uptd-icon">🏢</span>
                                <div class="uptd-info">
                                    <div class="uptd-name">{{ $uptd['real_name'] }}</div>
                                    <div class="uptd-slug">{{ $slug }}</div>
                                </div>
                                <span class="uptd-badge">{{ $uptd['count'] }} berkas</span>
                                <svg class="uptd-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                            </div>

                            <div class="uptd-body">
                                @if(empty($uptd['years']))
                                    <p style="font-size:13px;color:var(--text-muted);padding:12px 0;">Belum ada berkas di folder ini.</p>
                                @else
                                    <!-- Year tabs -->
                                    <div class="year-tabs" id="tabs-{{ $cardId }}">
                                        @foreach($uptd['years'] as $year => $yearData)
                                            <button class="year-tab {{ ($loop->first || ($isOpen && $openYear === (string)$year)) ? 'active' : '' }}"
                                                onclick="switchYear('{{ $cardId }}', '{{ $year }}', this)">
                                                📅 {{ $year }}
                                                <span style="font-size:11px;opacity:.7;margin-left:6px;">({{ $yearData['count'] }})</span>
                                            </button>
                                        @endforeach
                                    </div>

                                    <!-- Year panels -->
                                    @foreach($uptd['years'] as $year => $yearData)
                                        <div class="year-panel {{ $loop->first ? 'active' : '' }}"
                                             id="year-{{ $cardId }}-{{ $year }}">
                                            <div class="month-grid">
                                                @foreach($yearData['months'] as $month => $monthData)
                                                    @php
                                                        $monthName = \Carbon\Carbon::createFromDate($year, (int)$month, 1)->translatedFormat('F Y');
                                                        $mId = "m-{$cardId}-{$year}-{$month}";
                                                        $isMonthOpen = ($isOpen && $openYear === (string)$year && $openMonth === (string)$month);
                                                    @endphp
                                                    <div class="month-card {{ $isMonthOpen ? 'open' : '' }}" id="{{ $mId }}">
                                                        <div class="month-header" onclick="toggleMonth('{{ $mId }}')">
                                                            <span class="month-name">📅 {{ $monthName }}</span>
                                                            <div style="display:flex;align-items:center;gap:8px;">
                                                                <span class="month-count">{{ $monthData['count'] }} berkas</span>
                                                                <svg class="month-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                                                            </div>
                                                        </div>
                                                        <div class="month-body">
                                                            @forelse($monthData['jenis_tls'] as $tlSlug => $tlData)
                                                                @php $tlId = "tl-{$mId}-{$tlSlug}"; @endphp
                                                                <div class="tl-folder" id="{{ $tlId }}">
                                                                    <div class="tl-folder-header" onclick="toggleTl('{{ $tlId }}')">
                                                                        <span class="tl-folder-icon">📂</span>
                                                                        <span class="tl-folder-name">{{ $tlData['label'] }}</span>
                                                                        <span class="tl-folder-count">{{ $tlData['count'] }} berkas</span>
                                                                        <svg class="tl-folder-chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                                                                    </div>
                                                                    <div class="tl-folder-body">
                                                                        <div class="file-list">
                                                                            @foreach($tlData['files'] as $file)
                                                                                @php
                                                                                    $extClass = in_array($file['ext'], ['jpg','jpeg','png','gif','webp']) ? 'ext-img'
                                                                                              : ($file['ext'] === 'pdf' ? 'ext-pdf' : 'ext-other');
                                                                                    $sizeLabel = $file['size'] > 1048576
                                                                                        ? round($file['size']/1048576,1).' MB'
                                                                                        : round($file['size']/1024,0).' KB';
                                                                                @endphp
                                                                                <div class="file-item">
                                                                                    <div class="file-ext-badge {{ $extClass }}">{{ $file['ext'] }}</div>
                                                                                    <div class="file-info">
                                                                                        <div class="file-name" title="{{ $file['name'] }}">{{ $file['name'] }}</div>
                                                                                        <div class="file-size">{{ $sizeLabel }}</div>
                                                                                    </div>
                                                                                    <div class="file-actions">
                                                                                        @if(in_array($file['ext'],['jpg','jpeg','png','gif','pdf']))
                                                                                            <a href="{{ $file['url'] }}" target="_blank" class="btn-view">
                                                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                                                                                Lihat
                                                                                            </a>
                                                                                        @endif
                                                                                        <a href="{{ route('admin.rekap.download', ['path' => $file['path']]) }}" class="btn-dl">
                                                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                                                                            Unduh
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <p style="font-size:13px;color:var(--text-muted);padding:10px 0;">Belum ada berkas.</p>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    // Theme
    (function(){var t=document.documentElement.getAttribute('data-theme');var i=document.getElementById('themeIcon');if(i)i.textContent=t==='dark'?'☀️':'🌙';})();
    function toggleTheme(){var c=document.documentElement.getAttribute('data-theme'),n=c==='dark'?'light':'dark';document.documentElement.setAttribute('data-theme',n);localStorage.setItem('bpad-theme',n);document.getElementById('themeIcon').textContent=n==='dark'?'☀️':'🌙';}

    function toggleUptd(id){document.getElementById(id).classList.toggle('open');}
    function toggleMonth(id){document.getElementById(id).classList.toggle('open');}
    function toggleTl(id){document.getElementById(id).classList.toggle('open');}

    function switchYear(cardId, year, btn) {
        document.querySelectorAll('#tabs-'+cardId+' .year-tab').forEach(function(t){t.classList.remove('active');});
        btn.classList.add('active');
        document.querySelectorAll('[id^="year-'+cardId+'-"]').forEach(function(p){p.classList.remove('active');});
        var panel=document.getElementById('year-'+cardId+'-'+year);
        if(panel)panel.classList.add('active');
    }
</script>
</body>
</html>
