<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function show($tgl, $berangkat, $tiba, $stasiun)
    {
        try { //masih salah -> logika db nya juga masih salah nanti ku kelarin
            $jadwal = jadwal::join(
                'kereta', 'kereta.kode' , '=', 'jadwal.id_kereta'
            )->join(
                'stasiun', 'stasiun.kode' , '=', 'jadwal.id_stasiun_tiba'
            )->where(
                'jadwal.berangkat', '>=', $berangkat
            )->where(
                'jadwal.tiba', '>=', $tiba
            )->where(
                'jadwal.tgl', '>', $tgl
            )->where(
                'jadwal.id_stasiun_berangkat','=', $stasiun
            );

            if(!$jadwal) throw new \Exception("Jadwal tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $jadwal->get()
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function index()
    {
        try {
            $jadwal = jadwal::all();

            if(!$jadwal) throw new \Exception("Jadwal tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $jadwal
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function showById($id)
    {
        try {
            $jadwal = jadwal::find($id);

            if(!$jadwal) throw new \Exception("Jadwal tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $jadwal
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

}
