<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal')->insert([
            [
                'id_kereta' => 'JGS-1',
                'tanggal' => '2023-12-09 00:00:00',
                'harga' => 12000,
                'berangkat' => 'GMR',
                'tiba' => 'LPY',
                'status' => 1,
                'kursi' => 118,
                'jam_berangkat' => '12:20:00',
                'jam_tiba' => '13:20:00',
            ],
            [
                'id_kereta' => 'JGS-1',
                'tanggal' => '2023-12-08 00:00:00',
                'harga' => 12000,
                'berangkat' => 'LPY',
                'tiba' => 'YK',
                'status' => 1,
                'kursi' => 120,
                'jam_berangkat' => '14:00:00',
                'jam_tiba' => '14:20:00',
            ],
            [
                'id_kereta' => 'PRMX-1',
                'tanggal' => '2023-12-09 00:00:00',
                'harga' => 12000,
                'berangkat' => 'LPY',
                'tiba' => 'YK',
                'status' => 1,
                'kursi' => 120,
                'jam_berangkat' => '14:10:00',
                'jam_tiba' => '14:30:00',
            ],
        ]);
    }
}
