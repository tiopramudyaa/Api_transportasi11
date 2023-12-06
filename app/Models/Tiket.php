<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tickets";
    protected $primaryKey = "id";

    protected $fillable = [
        "id_user",
        "id_jadwal",
        "id_kereta",
        "dari",
        "ke",
        "status",
        "tanggal_pergi",
        "jumlah"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kereta() {
        return $this->belongsTo(kereta::class, 'id_kereta');
    }

    public function jadwal() {
        return $this->belongsTo(jadwal::class, 'id_jadwal');
    }

}
