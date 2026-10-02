<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan_jurusans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('jurusan_id')
                ->constrained('jurusans')
                ->cascadeOnDelete();

            $table->string('judul');

            $table->text('deskripsi')->nullable();

            $table->string('gambar')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan_jurusans');
    }
};