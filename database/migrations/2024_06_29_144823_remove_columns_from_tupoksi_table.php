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
        Schema::table('tupoksi', function (Blueprint $table) {
            $table->dropColumn([
                'nama_tupoksi',
                'nama_tugaspokok',
                'nama_fungsi',
                'nama_visimisi',
                'nama_visi',
                'nama_misi'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tupoksi', function (Blueprint $table) {
            $table->string('nama_tupoksi');
            $table->string('nama_tugaspokok');
            $table->string('nama_fungsi');
            $table->string('nama_visimisi');
            $table->string('nama_visi');
            $table->string('nama_misi');
        });
    }
};
