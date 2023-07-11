<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

use App\Models\Pendaftar;
use App\Models\Jalur;
use App\Models\Ujian;
use Auth;

class Helper {

    public function checkBuatAkun($id) {

        $pendaftar = Pendaftar::where('user_id', $id) ->first();
                
        return $pendaftar;
    }

    public function infoLoginUser() {

        $pendaftar = 
            Pendaftar::where('no_telepon', Auth::guard('web')->user()->no_telepon)
                ->where('user_id', Auth::guard('web')->user()->id)
                ->first();
                
        return $pendaftar;
    }

    public function infoDataPendaftar() {
        $pendaftarData = 
            Pendaftar::where('no_telepon', Auth::guard('web')->user()->no_telepon)
                ->where('user_id', Auth::guard('web')->user()->id)
                ->whereNotNull('upload_foto')
                ->whereNotNull('no_ktp')
                ->whereNotNull('no_kk')
                ->whereNotNull('tempat_lahir')
                ->whereNotNull('tanggal_lahir')
                ->whereNotNull('jenis_kelamin')
                ->whereNotNull('agama')
                ->whereNotNull('alamat_pendaftar')
                ->whereNotNull('email')
                ->whereNotNull('no_telepon')
                ->whereNotNull('nama_ayah')
                ->whereNotNull('nama_ibu')
                ->whereNotNull('pekerjaan_ayah')
                ->whereNotNull('pekerjaan_ibu')
                ->whereNotNull('no_telepon_orang_tua')
                ->whereNotNull('alamat_orang_tua')
                ->whereNotNull('no_nisn')
                ->whereNotNull('nama_sekolah')
                ->whereNotNull('jurusan_sekolah')
                ->whereNotNull('nilai_rata_rata_sekolah')
                ->whereNotNull('tahun_lulus_sekolah')
                ->whereNotNull('alamat_sekolah')
                ->first();
                
        return $pendaftarData;
    }

    public function infoDataPeryaratan() {
        $pendaftarData = 
            Pendaftar::where('no_telepon', Auth::guard('web')->user()->no_telepon)
                ->where('user_id', Auth::guard('web')->user()->id)
                ->whereNotNull('upload_ijazah')
                ->whereNotNull('upload_skhu')
                ->whereNotNull('upload_ket_sehat')
                ->whereNotNull('upload_buta_warna')
                ->whereNotNull('upload_ktp')
                ->whereNotNull('upload_kk')
                ->whereNotNull('upload_foto_full_body')
                ->whereNotNull('upload_data_mahasiswa')
                ->whereNotNull('upload_surat_pernyataan')
                ->first();
                
        return $pendaftarData;
    }

    public function getJalurRaport() {
        $getRaport = Jalur::where('jalur', 'Raport')->first();
        return $getRaport;
    }

    public function getCheckTest() {
        $getCheckTest = Ujian::where('no_telepon', Auth::guard('web')->user()->no_telepon)
            ->where('user_id', Auth::guard('web')->user()->id)
            ->where('status_ujian', 'sudah ujian')
            ->first();
        return $getCheckTest;
    }

    public function getCheckRaport() {
        $getCheckRaport = Pendaftar::where('no_telepon', Auth::guard('web')->user()->no_telepon)
            ->where('user_id', Auth::guard('web')->user()->id)
            ->where('status_jalur_raport', 'Terima')
            ->first();
        return $getCheckRaport;
    }

    // terbilang function
    private function penyebut($nilai){
        $nilai = abs($nilai);
        $libs = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $n = "";

        if ($nilai < 12) {
			$n = " ". $libs[$nilai];
		} else if ($nilai <20) {
			$n = self::penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$n = self::penyebut($nilai/10)." puluh". self::penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$n = " seratus" . self::penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$n = self::penyebut($nilai/100) . " ratus" . self::penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$n = " seribu" . self::penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$n = self::penyebut($nilai/1000) . " ribu" . self::penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$n = self::penyebut($nilai/1000000) . " juta" . self::penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$n = self::penyebut($nilai/1000000000) . " milyar" . self::penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$n = self::penyebut($nilai/1000000000000) . " trilyun" . self::penyebut(fmod($nilai,1000000000000));
		}
        return $n;
    }

    public function pembilang($nilai)
    {
        if($nilai < 0 ){
            $hasil = "minus ". trim($this->penyebut($nilai));
        }else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function infoDataPendaftarAdmin($id) {
        $pendaftarData = 
            Pendaftar::where('id', $id)
                ->whereNotNull('upload_foto')
                ->whereNotNull('no_ktp')
                ->whereNotNull('no_kk')
                ->whereNotNull('tempat_lahir')
                ->whereNotNull('tanggal_lahir')
                ->whereNotNull('jenis_kelamin')
                ->whereNotNull('agama')
                ->whereNotNull('alamat_pendaftar')
                ->whereNotNull('email')
                ->whereNotNull('no_telepon')
                ->whereNotNull('nama_ayah')
                ->whereNotNull('nama_ibu')
                ->whereNotNull('pekerjaan_ayah')
                ->whereNotNull('pekerjaan_ibu')
                ->whereNotNull('no_telepon_orang_tua')
                ->whereNotNull('alamat_orang_tua')
                ->whereNotNull('no_nisn')
                ->whereNotNull('nama_sekolah')
                ->whereNotNull('jurusan_sekolah')
                ->whereNotNull('nilai_rata_rata_sekolah')
                ->whereNotNull('tahun_lulus_sekolah')
                ->whereNotNull('alamat_sekolah')
                ->first();
                
        return $pendaftarData;
    }

    public function infoDataPeryaratanAdmin($id) {
        $pendaftarData = 
            Pendaftar::where('id', $id)
                ->whereNotNull('upload_ijazah')
                ->whereNotNull('upload_skhu')
                ->whereNotNull('upload_ket_sehat')
                ->whereNotNull('upload_buta_warna')
                ->whereNotNull('upload_ktp')
                ->whereNotNull('upload_kk')
                ->whereNotNull('upload_foto_full_body')
                ->whereNotNull('upload_data_mahasiswa')
                ->whereNotNull('upload_surat_pernyataan')
                ->first();
                
        return $pendaftarData;
    }
}