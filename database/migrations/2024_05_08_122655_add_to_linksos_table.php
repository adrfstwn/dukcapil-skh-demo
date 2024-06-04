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
        Schema::table('linksos', function (Blueprint $table) {
            $table->string('nama_instagram');
            $table->string('nama_facebook');
            $table->string('nama_x');
            $table->string('nama_yt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('linksos', function (Blueprint $table) {
            //
        });
    }
};
