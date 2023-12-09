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
        "id_kereta",
        "id_user",
        "rekomendasi",
        "content"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Kereta() {
        return $this->belongsTo(kereta::class, 'id_kereta');
    }
}