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
        Schema::create('pendaftaran_jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('asal_sekolah');
            $table->string('nisn');
            $table->string('no_whatsapp');
            $table->string('pilihan_jurusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_jurusans');
    }
};