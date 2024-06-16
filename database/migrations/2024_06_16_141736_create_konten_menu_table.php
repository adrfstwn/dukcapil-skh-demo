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
        Schema::create('konten_menu', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('deskripsi_konten');
            $table->date('tanggal');
            $table->string('gambar')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->default('PUBLISH');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
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
