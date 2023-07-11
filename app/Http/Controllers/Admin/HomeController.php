<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Fakultas;
use App\Models\Jalur;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        // Jalur 
        $jalur = Jalur::get();
        $fakultas = Fakultas::get();

        // tahun now
        $tahun_now = Carbon::now()->year;

        // count data
        $pendaftar = Pendaftar::with('program_studi')->where('tahun_daftar', $tahun_now)->get();

        if($request->has('tanggal_now')) {
            $tanggal_now = $request->tanggal_now;
            $pendaftarHarian = Pendaftar::with('program_studi')->whereDate('tanggal_daftar', $tanggal_now)->get();
        }
        else {
            $tanggal_now =Carbon::now()->format('Y-m-d');
            $pendaftarHarian = Pendaftar::with('program_studi')->whereDate('tanggal_daftar', $tanggal_now)->get();
        }
        
        return view('admin.dashboard', compact(
            'tahun_now',
            'jalur',
            'pendaftar',
            'pendaftarHarian',
            'tanggal_now',
            'fakultas',
        ));
    }
}
