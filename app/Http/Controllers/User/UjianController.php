<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Ujiandetail;
use App\Models\Pendaftar;
use App\Models\Durasi;
use App\Models\Soal;
use App\Models\Gelombang;
use Auth;

class UjianController extends Controller
{
    public function index()
    {
        $user = Pendaftar::where('user_id',Auth::guard('web')->user()->id)->first();
        if($user->count()>0){
            $durasi = Durasi::all()->first();
            // ujian
            $check_ujian = Ujian::where('no_telepon', Auth::guard('web')->user()->no_telepon)
                ->where('user_id', Auth::guard('web')->user()->id)
                ->where('status_ujian', 'sudah ujian')
                ->first();

            return view('user.ujian.konfirmasi', compact(
                'user',
                'durasi',
                'check_ujian',
            ));
        }else{
            return redirect('/dashboard');
        }
    }

    public function mulai_ujian()
    {
        $userid = Auth::guard('web')->user()->id;
        $telepon = Auth::guard('web')->user()->no_telepon;
        $waktuujian = Durasi::all()->first()->durasi;

        $cekData = Pendaftar::where('user_id',$userid);
        if($cekData->count()>0){

            $user = Pendaftar::where('user_id',$userid)->first();

        
            $ujian = Ujian::where('no_telepon',$telepon)->where('user_id',$userid);
            $ujiandetail = Ujiandetail::where('no_telepon',$telepon)->where('user_id',$userid);

            $getSoal = Soal::all();
            if($getSoal->count()>0){
                if($ujian->count()>0){
                    if($ujian->first()->status_ujian=='sedang ujian'){
                        return redirect('ujian/pilih_soal/1');    
                    }else{
                        return redirect('/ujian');
                    }
                }else{
                    //insert to Ujian
                    $entryUjian = array(
                        'no_telepon' => $telepon,
                        'user_id' => $userid,
                        'status_ujian' => 'sedang ujian',
                        'nilai' => '0',
                        'durasi' => $waktuujian,
                        'waktu_mulai' => date('Y-m-d H:i:s'),
                    );
                    Ujian::create($entryUjian);

                    //insert to Ujiandetail
                    //$soal = Soal::all();
                    $soal = Soal::orderBy('kategori_id','asc')->get();
                    $no_soal = 0;
                    foreach($soal as $s){
                        $no_soal++;
                        $entryUjiandetail = array(
                            'no_telepon' => $telepon,
                            'user_id' => $userid,
                            'soal_id' => $s->id,
                            'no_soal' => $no_soal,
                        );
                        Ujiandetail::create($entryUjiandetail);
                    }
                    return redirect('ujian/pilih_soal/1');
                }
            }else{
                return redirect('ujian');
            }
        }else{
            return redirect('dashboard');
        }
    }

    public function pilih_soal($no_soal)
    {
        $userid = Auth::guard('web')->user()->id;
        $telepon = Auth::guard('web')->user()->no_telepon;
        $waktuujian = Durasi::all()->first()->durasi;
        $user = Pendaftar::where('user_id',$userid)->first();

        $ujian = Ujian::where('no_telepon',$telepon)->where('user_id',$userid)->first();
        $kerjakanSoal = Ujiandetail::where('no_telepon',$telepon)->where('user_id',$userid)->where('no_soal',$no_soal)->first();

        $semuaSoal = Ujiandetail::where('no_telepon',$telepon)->where('user_id',$userid)->get();
        $totalSoal = Ujiandetail::where('no_telepon',$telepon)->where('user_id',$userid)->count();

        return view('user.ujian.soal', compact(
            'user',
            'ujian',
            'no_soal',
            'waktuujian',
            'kerjakanSoal',
            'semuaSoal',
            'totalSoal',
        ));
    }

    public function jawab(Request $request){
        $userid = Auth::guard('web')->user()->id;
        $telepon = Auth::guard('web')->user()->no_telepon;

        $totalSoal = Ujiandetail::where('no_telepon',$telepon)->where('user_id',$userid)->count();

        $jawaban = $request->qjawaban;
        $soalId = $request->idsoal;
        $nomor = $request->nomor;

        $next = $request->nomor + 1;

        $soal = Soal::where('id',$soalId)->first();
        
        if($jawaban==$soal->kunci){
            $point = 1;
        }else{
            $point = 0;
        }

        $entryJawaban = array(
            'jawaban' => $jawaban,
            'point' => $point,
        );

        Ujiandetail::where("no_telepon",$telepon)->where("user_id",$userid)->where("soal_id",$soalId)->update($entryJawaban);

        if($next>$totalSoal){
            return redirect('ujian/pilih_soal/'.$nomor);
        }else{
            return redirect('ujian/pilih_soal/'.$next);
        }
        
    }

    public function submit(){
        $userid = Auth::guard('web')->user()->id;
        $telepon = Auth::guard('web')->user()->no_telepon;

        $cek = Ujian::where("no_telepon",$telepon)->where("user_id",$userid)->where("status_ujian",'sudah_ujian');
        if($cek->count()>0){
            return redirect('pengumuman');
        }else{
            $totalNilai = Ujiandetail::where("no_telepon",$telepon)->where("user_id",$userid)->sum("point");
            $entryNilai = array(
                'nilai' => $totalNilai,
                'status_ujian' => 'sudah ujian',
            );
            Ujian::where("no_telepon",$telepon)->where("user_id",$userid)->update($entryNilai);
            return redirect('pengumuman');
        }
    }
}
