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
        Schema::table('penggunas', function (Blueprint $table) {
            // ubah kolom role menjadi integer, nullable supaya fleksibel
            $table->unsignedBigInteger('role')->change();

            // kalau mau relasi ke tabel roles
            $table->foreign('role')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            // rollback ke string lagi
            $table->string('role')->change();

            $table->dropForeign(['role']);
        });
    }
};
