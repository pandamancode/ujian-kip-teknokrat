<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujiandetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_telepon',
        'user_id',
        'soal_id',
        'no_soal',
        'jawaban',
        'point',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id', "id");
    }

}
