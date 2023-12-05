<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stasiun;
use Illuminate\Http\Request;

class StasiunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //done tapi kode masih 0 semua tapi benar
    {
        try{
            $stat = Stasiun::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $stat
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
