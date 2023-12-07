<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "transaksi";
    protected $primaryKey = "id";

    protected $fillable = [
        "id_user",
        "id_souvenir",
        "jumlah",
        "status",
    ];

    public function User() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Souvenir() {
        return $this->belongsTo(souvenir::class, 'id_souvenir');
    }


    
}