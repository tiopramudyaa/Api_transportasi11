<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "jadwal";
    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "tanggal",
        "harga",
        "berangkat",
        "tiba",
        "status",
        "kursi",
        "jam_berangkat",
        "jam_tiba",
        "id_kereta",
    ];
}