<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perubahan.
     */
    public function up(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            // Ubah kolom role dari enum menjadi string
            $table->string('role', 50)->change();
        });
    }

    /**
     * Kembalikan perubahan.
     */
    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            // Jika ingin rollback, ubah lagi ke enum sesuai definisi lama
            $table->enum('role', ['admin', 'user'])->change();
        });
    }
};
