<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_fakultas',
        'nama_fakultas',
        'nama_english_fakultas',
        'singkatan_fakultas',
        'keterangan_fakultas',
        'status_fakultas',
    ];

     public function program_studi()
    {
        return $this->hasMany(Programstudi::class, 'fakultas_id', 'id');
    }
    
}
