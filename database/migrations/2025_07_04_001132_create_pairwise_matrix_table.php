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
        Schema::create('pairwise_matrix', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indikator1_id');
            $table->unsignedBigInteger('indikator2_id');
            $table->double('nilai')->nullable();
            $table->timestamps();

            //Relasi dgn tabel kpi
            $table->foreign('indikator1_id')->references('id')->on('kpi')->onDelete('cascade');
            $table->foreign('indikator2_id')->references('id')->on('kpi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairwise_matrix');
    }
};
