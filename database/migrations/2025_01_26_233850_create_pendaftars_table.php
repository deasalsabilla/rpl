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

        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('nama');
            $table->string('tempatLahir');
            $table->date('tglLahir');
            $table->string('agama')->nullable();
            $table->string('email')->unique();
            $table->string('noHP');
            $table->string('password')->nullable();
            $table->string('sekolahasal')->nullable();
            $table->string('NISN');
            $table->string('nmAyah');
            $table->string('nmIbu');
            $table->string('alamat')->nullable();
            $table->string('RT')->nullable();
            $table->string('RW')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->foreignId('prodis_id')->constrained('prodis')->onUpdate('cascade')->onDelete('restrict');
            $table->string('jenisdaftar')->nullable();
            $table->string('status')->nullable();
            $table->string('foto')->nullable();
            $table->string('role')->default('pendaftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('pendaftars');
    }
};
