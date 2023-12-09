<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeretaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kereta')->insert([
            [
                'kode' => 'JGS-1',
                'nama' => 'Joglosemarkerto',
                'kapasitas' => 120,
                'rating' => 75,
            ],
            [
                'kode' => 'PRMX-1',
                'nama' => 'Peramex',
                'kapasitas' => 200,
                'rating' => 80,
            ],
            // Anda bisa menambahkan lebih banyak data di sini
        ]);
}
}
