<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_dinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserId')->nullable()->comment('ID user yang membuat laporan');
            $table->string('SuratTujuan', 255)->nullable()->comment('Nomor atau referensi surat tugas');
            $table->string('LokasiTujuan', 255)->comment('Lokasi tujuan dinas');
            $table->string('InstansiTujuan', 255)->comment('Instansi atau lembaga tujuan dinas');
            $table->string('AlamatInstansi', 255)->comment('Instansi atau lembaga tujuan dinas');
            $table->date('TanggalBerangkat')->comment('Tanggal berangkat dinas');
            $table->date('TangalPulang')->comment('Tanggal pulang dinas');
            $table->text('Uraian')->nullable()->comment('Uraian tugas selama dinas');
            $table->unsignedBigInteger('approved_by')->nullable()->comment('ID user yang menyetujui laporan');
            $table->timestamp('approved_at')->nullable()->comment('Waktu persetujuan laporan');
            $table->text('catatan')->nullable()->comment('Catatan tambahan dari atasan atau admin');
            $table->softDeletes()->comment('Soft delete untuk laporan dinas');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_dinas');
    }
};
