<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('npsn')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('alamat');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('kepala_sekolah')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->integer('jumlah_siswa')->default(0);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('profil_sekolahs');
    }
};