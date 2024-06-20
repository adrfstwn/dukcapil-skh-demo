<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('persyaratan', function (Blueprint $table) {
            $table->text('deskripsi_persyaratan')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('persyaratan', function (Blueprint $table) {
            $table->text('deskripsi_persyaratan')->nullable(false)->change();
        });
    }
};
