<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // ─────────────────────────────────────────────────────────────────────────
    // AUTH
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Tampilkan halaman login.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Proses login dengan Username/NIP dan Password.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username/NIP wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'username' => 'Username/NIP atau password tidak cocok.',
            ])->onlyInput('username');
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // REGISTER ADMIN (hanya bisa diakses setelah login)
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Tampilkan form pendaftaran admin baru.
     */
    public function showRegister()
    {
        return view('admin.register');
    }

    /**
     * Proses pendaftaran admin baru.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'username'              => 'required|string|max:100|unique:users,username',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ], [
            'name.required'                  => 'Nama lengkap wajib diisi.',
            'username.required'              => 'Username/NIP wajib diisi.',
            'username.unique'                => 'Username/NIP sudah digunakan.',
            'password.required'              => 'Password wajib diisi.',
            'password.min'                   => 'Password minimal 8 karakter.',
            'password.confirmed'             => 'Konfirmasi password tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
        ]);

        User::create([
            'name'     => $validated['name'],
            'username' => $validated['username'],
            'email'    => $validated['username'] . '@bpad.ntt.go.id', // dummy email agar unique constraint terpenuhi
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users')->with('success', 'Admin baru berhasil didaftarkan!');
    }

    /**
     * Daftar semua user/admin.
     */
    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    /**
     * Hapus user/admin.
     */
    public function destroyUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Admin berhasil dihapus.');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // DASHBOARD & SUBMISSIONS
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Dashboard admin dengan filter, pencarian, dan statistik.
     */
    public function dashboard(Request $request)
    {
        $query = Submission::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('uptd', 'like', "%{$search}%");
            });
        }

        if ($uptd = $request->input('uptd')) {
            $query->where('uptd', $uptd);
        }

        if ($jenisTl = $request->input('jenis_tl')) {
            $query->where('jenis_tl', $jenisTl);
        }

        if ($year = $request->input('year')) {
            $query->whereYear('created_at', $year);
        }

        if ($month = $request->input('month')) {
            $query->whereMonth('created_at', $month);
        }

        $submissions = $query->latest()->paginate(15)->withQueryString();

        $totalSubmissions = Submission::count();
        $thisMonthCount   = Submission::whereMonth('created_at', now()->month)
                                      ->whereYear('created_at', now()->year)
                                      ->count();
        $uptdCount        = Submission::distinct('uptd')->count('uptd');
        $recentCount      = Submission::where('created_at', '>=', now()->subDays(7))->count();

        $uptdList    = Submission::uptdList();
        $jenisTlList = Submission::jenisTlList();
        $years       = Submission::selectRaw('YEAR(created_at) as year')
                                 ->groupBy('year')
                                 ->orderByDesc('year')
                                 ->pluck('year')
                                 ->filter()
                                 ->toArray();

        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April',   '05' => 'Mei',       '06' => 'Juni',
            '07' => 'Juli',    '08' => 'Agustus',   '09' => 'September',
            '10' => 'Oktober', '11' => 'November',  '12' => 'Desember',
        ];

        return view('admin.dashboard', compact(
            'submissions', 'totalSubmissions', 'thisMonthCount',
            'uptdCount', 'recentCount', 'uptdList', 'jenisTlList',
            'years', 'months'
        ));
    }

    /**
     * Detail satu submission.
     */
    public function show(Submission $submission)
    {
        return view('admin.show', compact('submission'));
    }

    /**
     * Download file dari submission.
     */
    public function download(Submission $submission, string $type)
    {
        $pathMap = [
            'foto'  => $submission->foto_path,
            'sk'    => $submission->sk_path,
            'bukti' => $submission->bukti_path,
        ];

        $path = $pathMap[$type] ?? null;

        if (!$path || !Storage::disk('public')->exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($path);
    }

    /**
     * Hapus submission beserta file-nya.
     */
    public function destroy(Submission $submission)
    {
        foreach (['foto_path', 'sk_path', 'bukti_path'] as $field) {
            if ($submission->$field && Storage::disk('public')->exists($submission->$field)) {
                Storage::disk('public')->delete($submission->$field);
            }
        }

        $submission->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil dihapus.');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // REKAP BERKAS
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Browser folder rekap bukti data dukung.
     * Struktur: uploads/{uptd_slug}/{tahun}/{bulan}/{jenis_tl_slug}/
     * Selalu menampilkan 4 folder jenis TL yang fixed.
     */
    public function rekapBerkas(Request $request)
    {
        $disk       = Storage::disk('public');
        $baseDir    = 'uploads';
        $tree       = [];
        $totalFiles = 0;

        // 4 folder jenis TL yang selalu ditampilkan
        $fixedTlList = Submission::jenisTlList(); // 4 items
        $tlMap = [];
        foreach ($fixedTlList as $tl) {
            $slug         = Str::slug($tl, '_');
            $tlMap[$slug] = $tl;
        }

        if ($disk->exists($baseDir)) {
            foreach ($disk->directories($baseDir) as $uptdDir) {
                $uptdName      = basename($uptdDir);
                $uptdFileCount = 0;
                $years         = [];

                foreach ($disk->directories($uptdDir) as $yearDir) {
                    $year          = basename($yearDir);
                    $yearFileCount = 0;
                    $months        = [];

                    foreach ($disk->directories($yearDir) as $monthDir) {
                        $month          = basename($monthDir);
                        $monthFileCount = 0;
                        $jenisTls       = [];

                        // Selalu tampilkan 4 folder jenis TL (meskipun kosong)
                        foreach ($tlMap as $tlSlug => $tlLabel) {
                            $tlDir    = "{$monthDir}/{$tlSlug}";
                            $fileList = [];

                            if ($disk->exists($tlDir)) {
                                foreach ($disk->files($tlDir) as $file) {
                                    $fileList[] = [
                                        'name' => basename($file),
                                        'path' => $file,
                                        'size' => $disk->size($file),
                                        'url'  => Storage::url($file),
                                        'ext'  => strtolower(pathinfo($file, PATHINFO_EXTENSION)),
                                    ];
                                }
                            }

                            $count = count($fileList);
                            $jenisTls[$tlSlug] = [
                                'label' => $tlLabel,
                                'files' => $fileList,
                                'count' => $count,
                            ];
                            $monthFileCount += $count;
                            $totalFiles     += $count;
                        }

                        $months[$month] = [
                            'jenis_tls' => $jenisTls,
                            'count'     => $monthFileCount,
                        ];
                        $yearFileCount += $monthFileCount;
                    }

                    ksort($months);
                    $years[$year] = [
                        'months' => $months,
                        'count'  => $yearFileCount,
                    ];
                    $uptdFileCount += $yearFileCount;
                }

                krsort($years);

                $realName = Submission::where('uptd', 'like',
                    '%' . str_replace('_', '%', $uptdName) . '%')->value('uptd') ?? $uptdName;

                $tree[$uptdName] = [
                    'real_name' => $realName,
                    'slug'      => $uptdName,
                    'years'     => $years,
                    'count'     => $uptdFileCount,
                ];
            }
        }

        ksort($tree);

        $openUptd  = $request->get('uptd');
        $openYear  = $request->get('year');
        $openMonth = $request->get('month');

        return view('admin.rekap', compact('tree', 'totalFiles', 'openUptd', 'openYear', 'openMonth'));
    }

    /**
     * Download single berkas from storage.
     */
    public function downloadBerkas(Request $request)
    {
        $path = $request->get('path');

        if (!$path || !Storage::disk('public')->exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($path, basename($path));
    }
}
