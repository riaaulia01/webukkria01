<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();

            $table->string('judul')->default('Selamat Datang di SMK Negeri 1 Cijati');

            $table->text('deskripsi')->nullable();

            $table->string('judul_cta')->default('Tertarik Bergabung dengan Kami?');

            $table->text('deskripsi_cta')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berandas');
    }
};