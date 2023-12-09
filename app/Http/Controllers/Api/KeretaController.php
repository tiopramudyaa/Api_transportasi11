<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kereta;
use Illuminate\Http\Request;

class KeretaController extends Controller //done kode masih 0 tapi tersimpan dengan baik (cuma tampilan)
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $kereta = Kereta::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $kereta
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try{
            $kereta = Kereta::create($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $kereta
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $kereta = kereta::find($id);

            if(!$kereta) throw new \Exception("Kereta tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $kereta
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $kereta = kereta::find($id);

            if(!$kereta) throw new \Exception("Kereta tidak ditemukan");

            $kereta->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil update data',
                "data" => $kereta
            ], 200);
            
        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $kereta = Kereta::find($id);

            if(!$kereta) throw new \Exception("Kereta tidak ditemukan");

            $kereta->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil hapus data',
                "data" => $kereta
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
