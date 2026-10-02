<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans_ekstrakurikuler', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('kelas');
            $table->string('nis');
            $table->string('whatsapp');

            $table->foreignId('ekstrakurikuler_id')
                ->constrained('ekstrakurikulers')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans_ekstrakurikuler');
    }
};