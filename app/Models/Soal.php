<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'soal',
        'gambar_soal',
        'a',
        'b',
        'c',
        'd',
        'e',
        'kunci'
    ];

    public function kategori_soal()
    {
        return $this->belongsTo(Kategorisoal::class, 'kategori_id', "id");
    }
    
}
