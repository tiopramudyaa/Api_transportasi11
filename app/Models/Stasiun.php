<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "stasiun";
    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "nama",
        "kota",
    ];

}
