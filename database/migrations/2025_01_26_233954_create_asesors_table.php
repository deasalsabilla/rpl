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
        Schema::create('asesors', function (Blueprint $table) {
            $table->id();
            $table->string('kode_asesor');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('password');
            $table->foreignId('prodis_id')->constrained('prodis')->onUpdate('cascade')->onDelete('restrict');
            $table->string('role')->default('asesor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesors');
    }
};
