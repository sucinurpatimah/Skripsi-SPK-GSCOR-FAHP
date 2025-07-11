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
        Schema::create('bobot_prioritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indikator_id')->index();
            $table->decimal('bobot_prioritas', 10, 8);
            $table->timestamps();

            $table->foreign('indikator_id')->references('id')->on('kpi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_prioritas');
    }
};
