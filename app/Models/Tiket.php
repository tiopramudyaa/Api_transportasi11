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
        "dari",
        "ke",
        "kelas",
        "tanggal_pergi",
        "jumlah"
    ];

    public function User() {
        return $this->belongsTo(User::class, 'id_user');
    }

}
