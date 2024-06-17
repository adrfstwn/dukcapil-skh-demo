<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySubmenuTableNullableUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submenu', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['parent_id']);

            // Now drop the column
            $table->dropColumn('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submenu', function (Blueprint $table) {
            // Add the column back
            $table->unsignedBigInteger('parent_id')->nullable();

            // Restore the foreign key constraint
            $table->foreign('parent_id')->references('id')->on('submenu');
        });
    }
}
