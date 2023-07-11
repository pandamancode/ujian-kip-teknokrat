<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan',
        'pengumuman1',
        'pengumuman2',
        'pengumuman3',
        'pengumuman4',
    ];
}
