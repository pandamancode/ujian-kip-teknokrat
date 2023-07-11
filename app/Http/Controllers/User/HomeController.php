<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jalur;
use App\Models\Programstudi;
use App\Models\Gelombang;
use App\Models\Pendaftar;
use App\Models\Ujian;
use Auth;
use File;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('user.dashboard',);
    }

    public function pengumuman() 
    {
        $check_ujian = Ujian::where('no_telepon', Auth::guard('web')->user()->no_telepon)
            ->where('user_id', Auth::guard('web')->user()->id)
            ->where('status_ujian', 'sudah ujian')
            ->first();
        
        if(!empty($check_ujian)) {
            return view('user.pengumuman.index', compact('check_ujian'));
        } else {
            return redirect()->route('user.ujian')->with('status', 'Silahkan Lakukan Ujian');
        }

    }

}
