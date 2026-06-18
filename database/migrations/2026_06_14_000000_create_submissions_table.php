<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('status_asn'); // PNS, PPPK, dll
            $table->string('jabatan')->nullable();
            $table->string('uptd');
            $table->text('pelanggaran'); // jenis pelanggaran
            $table->string('jenis_tl'); // jenis tindak lanjut
            $table->string('nomor_sk')->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('foto_path')->nullable(); // path to foto ASN
            $table->string('sk_path')->nullable();  // path to SK/surat
            $table->string('bukti_path')->nullable(); // other bukti pendukung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
