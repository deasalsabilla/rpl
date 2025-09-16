<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Schema::table('pendaftars', function (Blueprint $table) {
        //     // Hapus kolom lama jika ada
        //     $table->dropColumn('prodis_id');

        //     // Buat kolom baru dengan foreign key
        //     $table->unsignedBigInteger('prodis_id');

        //     // Tambah foreign key
        //     $table->foreign('prodis_id')
        //         ->references('id')
        //         ->on('prodis')
        //         ->onUpdate('cascade')
        //         ->onDelete('restrict');
        // });
    }

    public function down()
    {
        // Schema::table('pendaftars', function (Blueprint $table) {
        //     // Hapus foreign key
        //     $table->dropForeign(['prodis_id']);

        //     // Kembalikan kolom ke bentuk sebelumnya
        //     $table->string('prodis_id')->change();
        // });
    }
};
