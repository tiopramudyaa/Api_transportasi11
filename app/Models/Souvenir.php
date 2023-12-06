<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class souvenir extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "souvenir";
    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "nama",
        "berat",
        "harga",
    ];
}