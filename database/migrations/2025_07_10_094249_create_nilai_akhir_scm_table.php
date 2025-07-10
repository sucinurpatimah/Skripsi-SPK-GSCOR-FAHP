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
        Schema::create('nilai_akhir_scm', function (Blueprint $table) {
            $table->foreignId('indikator_id')->constrained('kpi')->onDelete('cascade');
            $table->float('bobot_prioritas');
            $table->float('snorm');
            $table->float('nilai_akhir');
            $table->text('rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_akhir_scm');
    }
};
