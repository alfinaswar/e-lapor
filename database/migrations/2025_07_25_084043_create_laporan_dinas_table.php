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
            $table->string('UserId')->nullable();
            $table->string('NomorSurat', 255)->nullable();
            $table->string('Provinsi', 255);
            $table->string('Kota', 255);
            $table->string('Kecamatan', 255);
            $table->string('Kelurahan', 255);
            $table->string('Tujuan', 255);
            $table->string('Alamat', 255);
            $table->date('TanggalBerangkat');
            $table->date('TangalPulang');
            $table->text('Uraian')->nullable();
            $table->string('DesetujuiOleh')->nullable();
            $table->timestamp('DisetujuiPada')->nullable();
            $table->text('catatan')->nullable();
            $table->string('FileSurat', 255)->nullable();
            $table->decimal('Latitude', 8, 2)->nullable();
            $table->decimal('Longitude', 8, 2)->nullable();
            $table->text('TagLokasi')->nullable();
            $table->softDeletes();
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
