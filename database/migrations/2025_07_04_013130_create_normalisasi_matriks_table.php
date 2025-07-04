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
        Schema::create('normalisasi_matriks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indikator1_id');
            $table->unsignedBigInteger('indikator2_id');
            $table->double('nilai')->nullable();
            $table->double('bobot_prioritas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normalisasi_matriks');
    }
};
