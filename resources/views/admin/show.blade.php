<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detail Laporan ASN – BPAD NTT">
    <title>Detail Laporan – {{ $submission->nama }}</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📋</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>(function(){var t=localStorage.getItem('bpad-theme')||'dark';document.documentElement.setAttribute('data-theme',t);})();</script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:#030712;--card:rgba(30,41,59,.4);--card-highlight:rgba(30,41,59,.55);
            --border:rgba(255,255,255,.08);--text:#f9fafb;--text-mid:#e2eaf8;--text-muted:#9ca3af;
            --accent:#3b82f6;--accent-glow:rgba(59,130,246,.22);--accent-bg:rgba(59,130,246,.10);
            --success:#34d399;--success-bg:rgba(52,211,153,.12);
            --danger:#f87171;--tb-bg:rgba(3,7,18,.75);--radius:20px;--radius-sm:12px;
        }
        [data-theme="light"] {
            --bg:#eef4ff;--card:#ffffff;--card-highlight:#f5f9ff;
            --border:rgba(59,130,246,.12);--text:#0f172a;--text-mid:#1e3a5f;--text-muted:#4a6fa5;
            --accent:#2563eb;--accent-glow:rgba(37,99,235,.18);--accent-bg:rgba(37,99,235,.08);
            --success:#16a34a;--success-bg:rgba(22,163,74,.10);
            --danger:#dc2626;--tb-bg:rgba(238,244,255,.85);--radius:20px;--radius-sm:12px;
        }

        :root {
            --bg: #030712;
            --card: rgba(30, 41, 59, 0.4);
            --card-highlight: rgba(30, 41, 59, 0.55);
            --border: rgba(255, 255, 255, 0.08);
            --text: #f9fafb;
            --text-muted: #9ca3af;
            --accent: #3b82f6;
            --accent-glow: rgba(59, 130, 246, 0.22);
            --success: #34d399;
            --success-bg: rgba(52, 211, 153, 0.12);
            --danger: #f87171;
            --radius: 20px;
            --radius-sm: 12px;
        }

        html, body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(ellipse at top right, #0f172a 0%, #030712 60%);
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
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.12) 0%, transparent 70%);
            top: -100px; right: -80px;
            opacity: 0.5;
        }
        .blob-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.10) 0%, transparent 70%);
            bottom: 100px; left: -60px;
            opacity: 0.45;
        }

        /* ── Topbar ── */
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px;
            padding: 20px 32px;
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0;
            background: rgba(3, 7, 18, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 50;
        }
        .topbar-left { display: flex; align-items: center; gap: 16px; }
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
            max-width: 860px; margin: 0 auto;
            padding: 40px 24px 80px;
            position: relative; z-index: 1;
        }

        /* ── Hero banner ── */
        .hero-banner {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(139, 92, 246, 0.1) 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: var(--radius);
            padding: 28px 32px;
            margin-bottom: 28px;
            display: flex; align-items: center; gap: 20px;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.08);
        }
        .hero-avatar {
            width: 64px; height: 64px; border-radius: 16px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; font-weight: 800; color: #fff;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }
        .hero-info { flex: 1; min-width: 0; }
        .hero-name { font-size: 22px; font-weight: 800; letter-spacing: -0.02em; }
        .hero-sub  { font-size: 13.5px; color: #93c5fd; margin-top: 4px; font-weight: 500; }
        .hero-badges { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }

        /* ── Section cards ── */
        .section-card {
            background: var(--card);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px;
            margin-bottom: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transition: border-color 0.2s;
        }
        .section-card:hover { border-color: rgba(59, 130, 246, 0.2); }

        .section-title {
            font-size: 11.5px; font-weight: 800; letter-spacing: .09em;
            text-transform: uppercase; color: var(--text-muted);
            margin-bottom: 22px; padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 8px;
        }

        /* ── Detail grid ── */
        .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; }
        @media (max-width: 560px) { .detail-grid { grid-template-columns: 1fr; } }

        .detail-item.full { grid-column: 1 / -1; }

        .detail-item label {
            font-size: 11px; color: var(--text-muted); font-weight: 800;
            text-transform: uppercase; letter-spacing: .07em; display: block; margin-bottom: 6px;
        }
        .detail-item .detail-value {
            font-size: 14.5px; color: var(--text); font-weight: 600; line-height: 1.5;
        }
        .detail-item .detail-empty { font-size: 14px; color: #4b5563; font-weight: 500; }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center;
            padding: 5px 14px; border-radius: 100px;
            font-size: 12px; font-weight: 700;
        }
        .badge-blue   { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
        .badge-green  { background: rgba(52, 211, 153, 0.12); color: #34d399; border: 1px solid rgba(52, 211, 153, 0.2); }
        .badge-yellow { background: rgba(251, 191, 36, 0.12); color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.2); }
        .badge-purple { background: rgba(167, 139, 250, 0.12); color: #c084fc; border: 1px solid rgba(167, 139, 250, 0.2); }

        /* ── File links ── */
        .file-links { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 4px; }
        .file-link {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 18px; border-radius: var(--radius-sm);
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #60a5fa; font-size: 13.5px; font-weight: 700;
            text-decoration: none; transition: all .2s;
        }
        .file-link:hover { background: rgba(59, 130, 246, 0.2); transform: translateY(-1px); box-shadow: 0 6px 14px rgba(59, 130, 246, 0.15); }
        .no-file { font-size: 13.5px; color: #4b5563; font-weight: 500; }

        /* ── Folder path ── */
        .folder-path {
            font-size: 12px; color: #4b5563;
            font-family: 'Courier New', monospace; font-weight: 600;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 8px; padding: 8px 14px;
            margin-top: 6px; display: inline-block;
        }

        /* ── Meta card ── */
        .meta-card {
            border-color: rgba(167, 139, 250, 0.15);
            background: rgba(167, 139, 250, 0.04);
        }
        .meta-card .section-title { color: #c084fc; }

        .meta-timestamp {
            font-size: 14px; font-weight: 700; color: var(--text);
        }
        .meta-relative {
            font-size: 12px; color: var(--text-muted); margin-top: 4px; font-weight: 500;
        }
    </style>
</head>
<body>

<div class="blob blob-1"></div>
<div class="blob blob-2"></div>

<div class="topbar">
    <div class="topbar-left">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali
        </a>
        <h1>Detail Laporan ASN</h1>
    </div>
    <button style="width:42px;height:42px;background:var(--accent-bg,rgba(59,130,246,.1));border:1.5px solid rgba(59,130,246,.2);border-radius:12px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:18px;transition:all .25s ease;" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
        <span id="themeIcon">☀️</span>
    </button>
</div>

<div class="content">

    {{-- ── Hero banner ── --}}
    <div class="hero-banner">
        <div class="hero-avatar">{{ strtoupper(substr($submission->nama, 0, 1)) }}</div>
        <div class="hero-info">
            <div class="hero-name">{{ $submission->nama }}</div>
            <div class="hero-sub">{{ $submission->uptd }}</div>
            <div class="hero-badges">
                @php
                    $statusColor = match($submission->status_asn) {
                        'PNS'     => 'badge-blue',
                        'PPPK'    => 'badge-green',
                        'Honorer' => 'badge-yellow',
                        default   => 'badge-purple',
                    };
                @endphp
                <span class="badge {{ $statusColor }}">{{ $submission->status_asn }}</span>
                @if($submission->jabatan)
                    <span class="badge badge-blue" style="background:rgba(6,182,212,0.12);color:#22d3ee;border-color:rgba(6,182,212,0.2);">{{ $submission->jabatan }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- ── Data Pribadi ── --}}
    <div class="section-card">
        <p class="section-title">📋 Data Pribadi</p>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Nama Lengkap</label>
                <div class="detail-value">{{ $submission->nama }}</div>
            </div>
            <div class="detail-item">
                <label>NIP</label>
                @if($submission->nip)
                    <div class="detail-value" style="font-family:'Courier New',monospace;">{{ $submission->nip }}</div>
                @else
                    <div class="detail-empty">Tidak diisi</div>
                @endif
            </div>
            <div class="detail-item">
                <label>Status ASN</label>
                <div class="detail-value"><span class="badge {{ $statusColor }}">{{ $submission->status_asn }}</span></div>
            </div>
            <div class="detail-item">
                <label>Jabatan</label>
                @if($submission->jabatan)
                    <div class="detail-value">{{ $submission->jabatan }}</div>
                @else
                    <div class="detail-empty">Tidak diisi</div>
                @endif
            </div>
            <div class="detail-item full">
                <label>UPTD / Unit Kerja</label>
                <div class="detail-value">{{ $submission->uptd }}</div>
            </div>
        </div>
    </div>

    {{-- ── Pelanggaran & TL ── --}}
    <div class="section-card">
        <p class="section-title">⚖️ Pelanggaran & Tindak Lanjut</p>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Jenis Pelanggaran</label>
                <div class="detail-value">{{ $submission->pelanggaran }}</div>
            </div>
            <div class="detail-item">
                <label>Jenis Tindak Lanjut</label>
                <div class="detail-value">{{ $submission->jenis_tl }}</div>
            </div>
            <div class="detail-item">
                <label>Nomor SK</label>
                @if($submission->nomor_sk)
                    <div class="detail-value" style="font-family:'Courier New',monospace;font-size:13.5px;">{{ $submission->nomor_sk }}</div>
                @else
                    <div class="detail-empty">Tidak diisi</div>
                @endif
            </div>
            <div class="detail-item">
                <label>Tanggal SK</label>
                @if($submission->tanggal_sk)
                    <div class="detail-value">{{ $submission->tanggal_sk->format('d F Y') }}</div>
                @else
                    <div class="detail-empty">Tidak diisi</div>
                @endif
            </div>
            @if($submission->keterangan)
            <div class="detail-item full">
                <label>Keterangan Tambahan</label>
                <div class="detail-value" style="white-space:pre-line;line-height:1.7;color:#cbd5e1;">{{ $submission->keterangan }}</div>
            </div>
            @endif
        </div>
    </div>

    {{-- ── Dokumen Pendukung ── --}}
    <div class="section-card">
        <p class="section-title">📎 Dokumen Pendukung</p>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Foto ASN</label>
                <div class="file-links">
                    @if($submission->foto_path)
                        <a href="{{ route('admin.submissions.download', [$submission->id, 'foto']) }}" class="file-link" target="_blank">
                            🖼 Unduh Foto
                        </a>
                    @else
                        <span class="no-file">Tidak ada</span>
                    @endif
                </div>
            </div>
            <div class="detail-item">
                <label>Surat Keputusan (SK)</label>
                <div class="file-links">
                    @if($submission->sk_path)
                        <a href="{{ route('admin.submissions.download', [$submission->id, 'sk']) }}" class="file-link" target="_blank">
                            📄 Unduh SK
                        </a>
                    @else
                        <span class="no-file">Tidak ada</span>
                    @endif
                </div>
            </div>
            <div class="detail-item">
                <label>Bukti Pendukung</label>
                <div class="file-links">
                    @if($submission->bukti_path)
                        <a href="{{ route('admin.submissions.download', [$submission->id, 'bukti']) }}" class="file-link" target="_blank">
                            📎 Unduh Bukti
                        </a>
                    @else
                        <span class="no-file">Tidak ada</span>
                    @endif
                </div>
            </div>
            <div class="detail-item">
                <label>Folder Penyimpanan</label>
                @if($submission->foto_path)
                    @php $parts = explode('/', $submission->foto_path); @endphp
                    <div class="folder-path">
                        uploads/{{ $parts[1] ?? '' }}/{{ $parts[2] ?? '' }}/{{ $parts[3] ?? '' }}/
                    </div>
                @else
                    <span class="no-file">–</span>
                @endif
            </div>
        </div>
    </div>

    {{-- ── Metadata ── --}}
    <div class="section-card meta-card">
        <p class="section-title">🗓 Metadata</p>
        <div class="detail-grid">
            <div class="detail-item">
                <label>Tanggal Input</label>
                <div class="meta-timestamp">{{ $submission->created_at->format('d F Y') }}</div>
                <div class="meta-relative">{{ $submission->created_at->format('H:i') }} WIB</div>
            </div>
            <div class="detail-item">
                <label>Terakhir Diperbarui</label>
                <div class="meta-timestamp">{{ $submission->updated_at->format('d F Y') }}</div>
                <div class="meta-relative">{{ $submission->updated_at->format('H:i') }} WIB</div>
            </div>
        </div>
    </div>

</div>

<script>
    (function(){var t=document.documentElement.getAttribute('data-theme');var i=document.getElementById('themeIcon');if(i)i.textContent=t==='dark'?'☀️':'🌙';})();
    function toggleTheme(){var c=document.documentElement.getAttribute('data-theme'),n=c==='dark'?'light':'dark';document.documentElement.setAttribute('data-theme',n);localStorage.setItem('bpad-theme',n);var i=document.getElementById('themeIcon');if(i)i.textContent=n==='dark'?'☀️':'🌙';}
</script>
</body>
</html>
