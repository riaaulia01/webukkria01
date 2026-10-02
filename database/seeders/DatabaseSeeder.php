<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProfilSekolahSeeder::class,
            GuruSeeder::class,
            JurusanSeeder::class,
            EkstrakurikulerSeeder::class,
            BeritaSeeder::class,
        ]);
    }
}