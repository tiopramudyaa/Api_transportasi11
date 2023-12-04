<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "review";
    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "id_kereta",
        "id_user",
        "content"
    ];
}