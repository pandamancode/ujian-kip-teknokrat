<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_telepon',
        'user_id',
        'nilai',
        'status_ujian', 
        'durasi',
        'waktu_mulai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }

}
