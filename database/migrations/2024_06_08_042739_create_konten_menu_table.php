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
        Schema::create('konten_submenu', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('deskripsi_konten');
            $table->date('tanggal');
            $table->string('gambar')->nullable();
            $table->string('file')->nullable();
            $table->unsignedBigInteger('submenu_id');
            $table->foreign('submenu_id')->references('id')->on('submenu')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_menu');
    }
};
