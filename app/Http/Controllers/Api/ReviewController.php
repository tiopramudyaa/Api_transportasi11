<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kereta;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller //done
{
    /**
     * Display a listing of the resource.
     */
    public function index($kode)
    {
        try{
            $review = Review::join(
                'users', 'review.id_user',"=","users.id"
            )->join(
                'kereta', 'review.id_kereta',"=","kereta.kode"
            )->where(
                'review.id_kereta', '=', $kode
            );

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $review->get()
            ], 200);

        } catch(\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    public function FindByKeretaUser($kode,$id)
    {
        try{
            $review = Review::where('id_kereta','=',$kode)->where('id_user','=',$id)->first();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $review,
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
            $review = review::create($request->all());
            $reviewsForKereta = Review::where('id_kereta', $request->id_kereta)->get();
            $totalRating = $reviewsForKereta->sum('rekomendasi');
            $totalReviews = $reviewsForKereta->count();
            $averageRating = $totalRating / $totalReviews;

            $kereta = Kereta::find($request->id_kereta);
            $kereta->rating = $averageRating;
            $kereta->save();
            
            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $review
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
            $review = review::find($id);

            if(!$review) throw new \Exception("Review tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'Berhasil ambil data',
                "data" => $review
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
            $review = review::find($id);

            if(!$review) throw new \Exception("Review tidak ditemukan");

            $review->update($request->all());

            return response()->json([
                "status" => true,
                "message" => 'Berhasil update data',
                "data" => $review
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
            $review = review::find($id);

            if(!$review) throw new \Exception("Review tidak ditemukan");

            $review->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil hapus data',
                "data" => $review
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
