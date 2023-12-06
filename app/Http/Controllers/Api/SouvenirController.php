<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Souvenir;
use Illuminate\Http\Request;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //done tapi kode masih 0 semua tapi benar
    {
        try{
            $souv = Souvenir::all();
            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $souv
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
