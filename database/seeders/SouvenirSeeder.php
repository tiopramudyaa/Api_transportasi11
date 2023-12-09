<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SouvenirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('souvenir')->insert([
            [
                'id' => 1,
                'nama' => 'mainan kereta',
                'berat' => 1,
                'harga' => 12000,
            ],
            [
                'id' => 2,
                'nama' => 'Kaos KRL',
                'berat' => 1,
                'harga' => 40000,
            ],
            [
                'id' => 3,
                'nama' => 'Tumblr KAI',
                'berat' => 1,
                'harga' => 40000,
            ],
        ]);
    }
}
