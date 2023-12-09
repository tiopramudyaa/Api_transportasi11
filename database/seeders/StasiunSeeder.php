<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StasiunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stasiun')->insert([
            [
                'nama' => 'Gambir',
                'kota' => 'Jakarta',
                'kode' => 'GMR',
            ],
            [
                'nama' => 'Lempuyangan',
                'kota' => 'Yogyakarta',
                'kode' => 'LPY',
            ],
            [
                'nama' => 'Purwosari',
                'kota' => 'Solo',
                'kode' => 'PWS',
            ],
            [
                'nama' => 'Solo Balapan',
                'kota' => 'Solo',
                'kode' => 'SLO',
            ],
            [
                'nama' => 'Tugu',
                'kota' => 'Yogyakarta',
                'kode' => 'YK',
            ],
        ]);
    }
}
