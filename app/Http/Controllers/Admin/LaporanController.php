<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Laporanberdasarkantanggal;
use App\Exports\Laporanpendaftarberdasarkantanggal;

class LaporanController extends Controller
{
    public function laporan()
    {
        $dataLaporan= 'active';
        return view('admin.laporan.laporan', compact('dataLaporan'));
    }

    public function filter_laporan_berdasarkan_tanggal(Request $request) 
    {
        return Excel::download(new Laporanberdasarkantanggal($request), 'laporan_pendaftar_berdasarkantanggal.xlsx');
    }

    public function filter_laporan_profil_berdasarkan_tanggal(Request $request) 
    {
        return Excel::download(new Laporanpendaftarberdasarkantanggal($request), 'laporan_pendaftar_profil_berdasarkantanggal.xlsx');
    }

}
