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
        Schema::create('konten_menu_url', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konten_menu_id')->constrained('konten_menu')->onDelete('cascade');
            $table->string('nama_url');
            $table->text('link_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_menu_url');
    }
};
