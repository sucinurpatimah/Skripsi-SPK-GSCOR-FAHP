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
        Schema::create('kinerja_indikator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kpi_id')->constrained('kpi');
            $table->decimal('nilai_kinerja', 10, 4);
            $table->decimal('snorm_de_boer', 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerja_indikator');
    }
};
