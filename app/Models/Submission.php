<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'status_asn',
        'jabatan',
        'uptd',
        'pelanggaran',
        'jenis_tl',
        'nomor_sk',
        'tanggal_sk',
        'keterangan',
        'foto_path',
        'sk_path',
        'bukti_path',
    ];

    protected $casts = [
        'tanggal_sk' => 'date',
    ];

    /**
     * Get list of all UPTD options.
     */
    public static function uptdList(): array
    {
        return [
            'Kantor Badan',
            'UPTD Pendapatan Daerah Wilayah Kota Kupang',
            'UPTD Pendapatan Daerah Wilayah Kab. Kupang',
            'UPTD Pendapatan Daerah Wilayah Kab. Timor Tengah Selatan',
            'UPTD Pendapatan Daerah Wilayah Kab. Timor Tengah Utara',
            'UPTD Pendapatan Daerah Wilayah Kab. Belu',
            'UPTD Pendapatan Daerah Wilayah Kab. Malaka',
            'UPTD Pendapatan Daerah Wilayah Kab. Alor',
            'UPTD Pendapatan Daerah Wilayah Kab. Lembata',
            'UPTD Pendapatan Daerah Wilayah Kab. Flores Timur',
            'UPTD Pendapatan Daerah Wilayah Kab. Sikka',
            'UPTD Pendapatan Daerah Wilayah Kab. Ende',
            'UPTD Pendapatan Daerah Wilayah Kab. Nagekeo',
            'UPTD Pendapatan Daerah Wilayah Kab. Ngada',
            'UPTD Pendapatan Daerah Wilayah Kab. Manggarai',
            'UPTD Pendapatan Daerah Wilayah Kab. Manggarai Barat',
            'UPTD Pendapatan Daerah Wilayah Kab. Manggarai Timur',
            'UPTD Pendapatan Daerah Wilayah Kab. Sumba Timur',
            'UPTD Pendapatan Daerah Wilayah Kab. Sumba Barat',
            'UPTD Pendapatan Daerah Wilayah Kab. Sumba Barat Daya',
            'UPTD Pendapatan Daerah Wilayah Kab. Sumba Tengah',
            'UPTD Pendapatan Daerah Wilayah Kab. Sabu Raijua',
            'UPTD Pendapatan Daerah Wilayah Kab. Rote Ndao',
        ];
    }

    /**
     * Get list of pelanggaran types.
     */
    public static function pelanggaranList(): array
    {
        return [
            'Pelanggaran Disiplin Ringan',
            'Pelanggaran Disiplin Sedang',
            'Pelanggaran Disiplin Berat',
            'Pelanggaran Kode Etik',
            'Pelanggaran Integritas',
            'Pelanggaran Kinerja',
        ];
    }

    /**
     * Get list of jenis tindak lanjut.
     */
    public static function jenisTlList(): array
    {
        return [
            'Pembinaan Langsung (Bukti Dukung Berupa Foto)',
            'Pernyataan Tidak Puas',
            'Teguran Tertulis',
            'Teguran Lisan',
        ];
    }
}
