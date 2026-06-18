<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormController extends Controller
{
    /**
     * Show the public form.
     */
    public function index()
    {
        return view('welcome', [
            'uptdList'    => Submission::uptdList(),
            'jenisTlList' => Submission::jenisTlList(),
        ]);
    }

    /**
     * Process form submission.
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'nip'         => 'required|digits:18',
            'status_asn'  => 'required|in:PNS,PPPK',
            'jabatan'     => 'required|string|max:255',
            'uptd'        => 'required|string|max:255',
            'pelanggaran' => 'required|string|max:1000',
            'jenis_tl'    => 'required|string|max:255',
            'foto'        => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'sk'          => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'bukti'       => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ], [
            'nip.required' => 'NIP / NI PPPK wajib diisi.',
            'nip.digits'   => 'NIP / NI PPPK harus tepat 18 digit angka.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'status_asn.in'    => 'Status ASN harus PNS atau PPPK.',
        ]);

        $year  = now()->format('Y');
        $month = now()->format('m');

        // Sanitize UPTD & jenis TL for use in filesystem path
        $uptdFolder  = Str::slug($validated['uptd'], '_');
        $jenisTlFolder = Str::slug($validated['jenis_tl'], '_');
        $basePath    = "uploads/{$uptdFolder}/{$year}/{$month}/{$jenisTlFolder}";

        // Helper: sanitize file name in standard format
        $makeFileName = function (string $suffix, string $ext) use ($validated): string {
            $name = Str::slug($validated['nama'], '_');
            $uptd = Str::slug($validated['uptd'], '_');
            $nip  = $validated['nip'] ? Str::slug($validated['nip'], '_') : 'nonip';
            $tl   = Str::slug($validated['jenis_tl'], '_');
            return "{$name}_{$uptd}_{$nip}_{$tl}_{$suffix}.{$ext}";
        };

        $fotoPaths = null;
        $skPath    = null;
        $buktiPath = null;

        // Store photo
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $ext      = $request->file('foto')->extension();
            $fileName = $makeFileName('foto', $ext);
            $request->file('foto')->storeAs($basePath, $fileName, 'public');
            $fotoPaths = "{$basePath}/{$fileName}";
        }

        // Store SK document
        if ($request->hasFile('sk') && $request->file('sk')->isValid()) {
            $ext      = $request->file('sk')->extension();
            $fileName = $makeFileName('sk', $ext);
            $request->file('sk')->storeAs($basePath, $fileName, 'public');
            $skPath = "{$basePath}/{$fileName}";
        }

        // Store bukti pendukung
        if ($request->hasFile('bukti') && $request->file('bukti')->isValid()) {
            $ext      = $request->file('bukti')->extension();
            $fileName = $makeFileName('bukti', $ext);
            $request->file('bukti')->storeAs($basePath, $fileName, 'public');
            $buktiPath = "{$basePath}/{$fileName}";
        }

        Submission::create([
            'nama'        => $validated['nama'],
            'nip'         => $validated['nip'],
            'status_asn'  => $validated['status_asn'],
            'jabatan'     => $validated['jabatan'],
            'uptd'        => $validated['uptd'],
            'pelanggaran' => $validated['pelanggaran'],
            'jenis_tl'    => $validated['jenis_tl'],
            'foto_path'   => $fotoPaths,
            'sk_path'     => $skPath,
            'bukti_path'  => $buktiPath,
        ]);

        return redirect('/')->with('success', 'Data berhasil dikirim! Terima kasih atas laporan Anda.');
    }
}
