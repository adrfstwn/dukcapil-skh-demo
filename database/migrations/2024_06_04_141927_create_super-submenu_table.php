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
        Schema::create('super-submenu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_super-submenu');
            $table->unsignedBigInteger('submenu_id');
            $table->foreign('submenu_id')->references('id')->on('submenu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
