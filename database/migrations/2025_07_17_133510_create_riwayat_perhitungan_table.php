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
        Schema::create('riwayat_perhitungan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->json('hasil_per_indikator'); // Variabel, Atribut, Indikator, Bobot, Snorm, Nilai Akhir
            $table->float('total_nilai_akhir');  // Total akhir SCM
            $table->text('rekomendasi')->nullable(); // Rekomendasi perbaikan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_perhitungan');
    }
};
