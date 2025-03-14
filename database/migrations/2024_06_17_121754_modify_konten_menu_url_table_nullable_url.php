<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('konten_menu_url', function (Blueprint $table) {
            $table->string('nama_url')->nullable()->change();
            $table->text('link_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konten_menu_url', function (Blueprint $table) {
            $table->string('nama_url')->nullable(false)->change();
            $table->text('link_url')->nullable(false)->change();
        });
    }
};
