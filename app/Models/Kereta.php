<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kereta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "kereta";
    protected $primaryKey = "kode";

    protected $keyType = 'string';

    protected $fillable = [
        "kode",
        "nama",
        "kapasitas",
        "rating",
    ];

}