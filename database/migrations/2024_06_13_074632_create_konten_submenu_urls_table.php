<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontenSubmenuUrlsTable extends Migration
{
    public function up()
    {
        Schema::create('konten_submenu_url', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konten_submenu_id')->constrained('konten_submenu')->onDelete('cascade');
            $table->string('nama_url');
            $table->string('link_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konten_submenu_url');
    }
}

