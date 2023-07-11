<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ujian;
use App\Models\Ujiandetail;

class UjianController extends Controller
{
    public function index(Request $request) 
    {
        $data_ujian = DB::table('pendaftars')
            ->join('ujians', 'ujians.user_id', '=', 'pendaftars.user_id')
            ->join('programstudis', 'programstudis.id', '=', 'pendaftars.prodi_id')
            ->select(
                'pendaftars.*', 
                'programstudis.nama_program_studi',
                'ujians.nilai',
                'ujians.waktu_mulai',
                'ujians.updated_at as waktu_selesai',
            );

        if(isset($request->tahun)){
            if($request->tahun=='all'){
                $data_sudah_ujian = $data_ujian->get();
            }else{
                $data_sudah_ujian = $data_ujian ->where('pendaftars.tahun_daftar', $request->tahun)->get();
            }
            $tahunAktif = $request->tahun;
        }else{
            $tahunAktif = date('Y');
            $data_sudah_ujian = $data_ujian->where('pendaftars.tahun_daftar', $tahunAktif)->get();
        }
        return view('admin.ujian.index', compact('data_sudah_ujian', 'tahunAktif'));
    }

    public function delete($id) 
    {
        try {
            $ujian = Ujian::where('user_id', $id);
            $ujiandetail = Ujiandetail::where('user_id', $id);
            $ujian->delete();
            $ujiandetail->delete();

            return redirect()->route('admin.ujian')->with('status', "Data berhasil dihapus");
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('admin.ujian')->with('status', 'Data Tidak Berhasil Dihapus');
        }
    }
}
