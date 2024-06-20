<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('download', function (Blueprint $table) {
            $table->text('deskripsi_download')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('download', function (Blueprint $table) {
            $table->text('deskripsi_download')->nullable(false)->change();
        });
    }
};
