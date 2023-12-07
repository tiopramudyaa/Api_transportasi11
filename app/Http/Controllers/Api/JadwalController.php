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

    public function show(String $berangkat, String $tiba, String $tgl)
    {
        try { //masih salah -> logika db nya juga masih salah nanti ku kelarin
            $jadwal = jadwal::join(
                'kereta', 'kereta.kode' , '=', 'jadwal.id_kereta'
            )->where(
                'jadwal.berangkat', '=', $berangkat
            )->where(
                'jadwal.tiba', '=', $tiba
            )->where(
                'jadwal.tanggal', '=', $tgl
            )->where(
                'status', '=', 1
            )->get();
            
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
