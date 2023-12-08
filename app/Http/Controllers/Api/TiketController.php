<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\jadwal;
use App\Models\Tiket;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class TiketController extends Controller //done
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $tiket = Tiket::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $tiket
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $jadwal  = jadwal::find($request["id_jadwal"]);
            
            if($jadwal->kursi - $request["jumlah"] < 0) {
                return response()->json([
                    "status" => false,
                    "message" => "Kursi Tidak ada!",
                    "data" => []
                ], 400);
            }
            $tiket = Tiket::create($request->all());
            $jadwal->kursi=$jadwal->kursi - $request["jumlah"];
            if($jadwal->kursi == 0) {
                $jadwal->status = 0;
            }
            $jadwal->save();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $tiket
            ], 200);
        }catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $tiket = Tiket::find($id);

            if(!$tiket) throw new \Exception("Tiket tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $tiket
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function showByUser($id)
    {
        try {
            $tiket = Tiket::where('id_user','=',$id)->get();

            if(!$tiket) throw new \Exception("Tiket tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $tiket
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $tiket = Tiket::find($id);

            if(!$tiket) throw new \Exception("Tiket tidak ditemukan");

            $tiket->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil update data',
                "data" => $tiket
            ], 200);
            
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $tiket = Tiket::find($id);
            $jadwal = jadwal::find($tiket->id_jadwal);
            if($tiket->status == "Belum Dibayar") {
                $jadwal->kursi = $jadwal->kursi + $tiket->jumlah;    
            }
            if(!$tiket) throw new \Exception("Tiket tidak ditemukan");

            $tiket->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil hapus data',
                "data" => $tiket
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
