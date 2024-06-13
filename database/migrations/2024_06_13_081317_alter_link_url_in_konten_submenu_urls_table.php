<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLinkUrlInKontenSubmenuUrlsTable extends Migration
{
    public function up()
    {
        Schema::table('konten_submenu_url', function (Blueprint $table) {
            // Change the link_url column to text type to support longer URLs
            $table->text('link_url')->change();
        });
    }

    public function down()
    {
        Schema::table('konten_submenu_url', function (Blueprint $table) {
            // Revert the link_url column back to string type
            $table->string('link_url', 255)->change();
        });
    }
}
