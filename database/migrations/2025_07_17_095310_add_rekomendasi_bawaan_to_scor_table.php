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
        Schema::table('scor', function (Blueprint $table) {
            $table->text('rekomendasi_bawaan')->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scor', function (Blueprint $table) {
            $table->dropColumn('rekomendasi_bawaan');
        });
    }
};
