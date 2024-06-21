<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Add the column without NOT NULL constraint
        Schema::table('persyaratan', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->nullable();
        });

        // Ensure there is at least one valid id in kategori_persyaratan table
        // Insert a new record if needed
        $kategoriId = DB::table('kategori_persyaratan')->insertGetId([
            'nama_kategori' => 'Default Category' // Adjust based on your table structure
        ]);

        // Step 2: Update existing rows with a valid kategori_id
        DB::table('persyaratan')->update(['kategori_id' => $kategoriId]);

        // Step 3: Make the column NOT NULL and add the foreign key constraint
        Schema::table('persyaratan', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->nullable(false)->change();
            $table->foreign('kategori_id')->references('id')->on('kategori_persyaratan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persyaratan', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
