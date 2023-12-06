<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class TransaksiController extends Controller //done
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $transaksi = Transaksi::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $transaksi
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
            $transaksi = Transaksi::create($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $transaksi
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
            $transaksi = Transaksi::find($id);

            if(!$transaksi) throw new \Exception("Tiket tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $transaksi
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
            $transaksi = Transaksi::where('id_user','=',$id)->get();

            if(!$transaksi) throw new \Exception("Tiket tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $transaksi
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
            $transaksi = Transaksi::find($id);

            if(!$transaksi) throw new \Exception("Tiket tidak ditemukan");

            $transaksi->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil update data',
                "data" => $transaksi
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
            $transaksi = Transaksi::find($id);

            if(!$transaksi) throw new \Exception("Tiket tidak ditemukan");

            $transaksi->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil hapus data',
                "data" => $transaksi
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
