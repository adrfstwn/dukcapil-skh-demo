<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tupoksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tupoksi');
            $table->string('nama_tugaspokok');
            $table->text('deskripsi_tugaspokok');
            $table->string('nama_fungsi');
            $table->text('deskripsi_fungsi');
            $table->string('nama_visimisi');
            $table->string('nama_visi');
            $table->text('deskripsi_visi');
            $table->string('nama_misi');
            $table->text('deskripsi_misi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tupoksi');
    }
};