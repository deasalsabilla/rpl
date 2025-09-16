<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('kodeprodi')->unique();
            $table->string('namaprodi');
            $table->string('jenjang',);
            $table->string('status');
            $table->timestamps();
        });

        // Schema::table('pendaftars', function (Blueprint $table) {
        //     $table->dropColumn('prodis_id');

        //     $table->unsignedBigInteger('prodis_id');

        //     $table->foreignId('prodis_id')
        //         ->references('id')->on('prodis')
        //         ->onUpdate('cascade')
        //         ->onDelete('restrict');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
        // Schema::table('pendaftars', function (Blueprint $table) {

        //     // Menghapus foreign key

        //     $table->dropForeign(['prodis_id']);
        // });
    }
};
