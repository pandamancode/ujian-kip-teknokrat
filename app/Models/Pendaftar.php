<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pendaftar',
        'upload_foto',
        'no_ktp',
        'no_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat_pendaftar',
        'email',
        'no_telepon',
		'link_instagram',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_telepon_orang_tua',
        'alamat_orang_tua',
        
        'prodi_id',
        'waktu_kuliah',
        'jalur_id',

        'no_nisn',
        'nama_sekolah',
        'jurusan_sekolah',
        'nilai_rata_rata_sekolah',
        'tahun_lulus_sekolah',
        'alamat_sekolah',

        'upload_ijazah',
        'upload_skhu',
        'upload_ket_sehat',
        'upload_buta_warna',
        'upload_ktp',
        'upload_kk',
        'upload_foto_full_body',
        'upload_data_mahasiswa',
        'upload_surat_pernyataan',

    	'size_almamater',    
    
        'no_va_pmb',
        'no_va_daftar_ulang',
        
        'tanggal_pembayaran_pmb',
        'tanggal_daftar',
        'tanggal_pembayaran_pmb',
        'status_pembayaran_pmb',
        'tanggal_pembayaran_daftar_ulang',
        'status_pembayaran_daftar_ulang',
        
        'status_jalur_raport',
        'nilai_raport',
        'upload_raport',

        'tahun_daftar',
        'gelombang_id',
        'user_id',
    	'validasi_pembayaran_daftar_pmb',
    ];

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class, 'gelombang_id', "id");
    }  
    
    public function program_studi()
    {
        return $this->belongsTo(Programstudi::class, 'prodi_id', "id");
    }    

    public function jalur()
    {
        return $this->belongsTo(Jalur::class, 'jalur_id', "id");
    }   

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }    

}
