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
        Schema::create('uji_konsistensi', function (Blueprint $table) {
            $table->id();
            $table->decimal('lambda_max', 10, 4);
            $table->decimal('ci', 10, 4);
            $table->decimal('ri', 10, 4);
            $table->decimal('cr', 10, 4);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uji_konsistensi');
    }
};
