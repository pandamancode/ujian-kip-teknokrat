<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programstudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_program_studi',
        'nama_program_studi',
        'nama_english_program_studi',
        'singkatan_program_studi',
        'keterangan_program_studi',
        'status_program_studi',
        'status_program_studi_karyawan',
        'fakultas_id',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'prodi_id', 'id');
    }

}
