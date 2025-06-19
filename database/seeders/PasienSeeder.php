<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'nama_pasien' => 'arul',
            'email_pasien' => 'arul123@gmail.com',
            'tanggal' => '2025-06-19',
            'jam' => '07:30 - 19:00',
        ]);

        Pasien::factory()->count(30)->create([
            'tanggal' => '2025-06-19',
            'jam' => '07:30 - 19:00',
        ]);

    }
}
