<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gelombang;
use App\Models\Jalur;
use App\Models\Programstudi;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    public function index(Request $request){
        $dataPendaftar = Pendaftar::all();
        return view('admin.pendaftar.data', compact('dataPendaftar'));
    }

    public function create(){
        $prodi = Programstudi::all();
        $view = view('admin.pendaftar.add',compact('prodi'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    public function store(Request $request){
        $now = Carbon::now();
        $cek_pendaftar = Pendaftar::where("no_telepon",$request->telp);
        $cek_user = User::where("no_telepon",$request->telp);
        if($cek_pendaftar->count()>0 || $cek_user->count()>0){
            return back()->with(['msg' => 'Nomor Telp Sudah Terdaftar !','icon'=>'fa fa-warning','class'=>'alert-danger']);
        }else{
            $user = array(
                'name' => strip_tags($request->nama),
                'email' => strip_tags($request->telp).'@teknokrat.ac.id',
                'no_telepon' => strip_tags($request->telp),
                'password' => Hash::make('teknokrat'),
                'created_at' => Carbon::now(),
            );

            DB::table("users")->insert($user);

            $getIdUsr = User::where("no_telepon",strip_tags($request->telp))->first();

            $save = array(
                'no_telepon' => strip_tags($request->telp),
                'email' => strtolower(str_replace(' ', '_', strip_tags($request->telp))).'@teknokrat.ac.id',
                'nama_pendaftar' => strip_tags($request->nama),
                'prodi_id' => $request->prodi,
                'user_id' => $getIdUsr->id,
                'tanggal_daftar' => Carbon::now(),
                'tahun_daftar' => Carbon::now()->format('Y'),
            );

            Pendaftar::create($save);

            return back()->with(['msg' => 'Berhasil Menambah Data','icon'=>'fa fa-check','class'=>'alert-success']);
        }
    }

    public function edit(Request $request){
        $data_pendaftar = Pendaftar::where("id",$request->id)->first();
        $prodi = Programstudi::all();
        $view = view('admin.pendaftar.update',compact('prodi','data_pendaftar'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    public function update(Request $request, $id) 
    {
        $save = array(
            'nama_pendaftar' => strip_tags($request->nama),
            'prodi_id' => $request->prodi,
        );

        Pendaftar::where("no_telepon",$id)->update($save);

        return back()->with(['msg' => 'Berhasil Merubah Data','icon'=>'fa fa-check','class'=>'alert-success']);
        
    }


    public function show(Request $request)
    {
        $prodi = Programstudi::all();
        $view = view('admin.pendaftar.import',compact('prodi'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    public function resetPassword(Request $request, $id)
    {
        $pendaftar = User::findorfail($id);
        
        $pendaftar_data = [
            'password' => Hash::make('teknokrat'),
        ];

        $pendaftar->update($pendaftar_data);
        
        return back()->with(['msg' => 'Berhasil Reset Password','icon'=>'fa fa-check','class'=>'alert-success']);
    }

    public function import_data(Request $request){
        $import = $request->file('file');
        $new_import = 'kip' . '.' . $import->getClientOriginalExtension();
        $import->move('kip/', $new_import);

        $path = 'kip/' . $new_import;

        $dataImport = Excel::toArray([], $path);

        foreach ($dataImport as $key => $value) {
            foreach ($value as $row) {
                if(!empty($row[1])){

                    $getDataUser = User::where("no_telepon",strip_tags($row[1]));
                    $getDataPendaftar = Pendaftar::where("no_telepon",strip_tags($row[1]));

                    if($getDataUser->count()>0){
                        $user = array(
                            'name' => strip_tags($row[2]),
                            'email' => strip_tags($row[1]).'@teknokrat.ac.id',
                            'password' => Hash::make('teknokrat'),
                            'created_at' => Carbon::now(),
                        );
                        User::where("no_telepon",strip_tags($row[1]))->update($user);
                    }else{
                        $user = array(
                            'name' => strip_tags($row[2]),
                            'email' => strip_tags($row[1]).'@teknokrat.ac.id',
                            'no_telepon' => strip_tags($row[1]),
                            'password' => Hash::make('teknokrat'),
                            'created_at' => Carbon::now(),
                        );
                        User::create($user);
                    }
        
                    
        
                    $getIdUsr = User::where("no_telepon",strip_tags($row[1]))->first();
                    
                    if($getDataPendaftar->count()>0){
                        $save = array(
                            'email' => strtolower(str_replace(' ', '_', strip_tags($row[1]))).'@teknokrat.ac.id',
                            'nama_pendaftar' => strip_tags($row[2]),
                            'prodi_id' => $request->prodi,
                            'user_id' => $getIdUsr->id,
                            'tanggal_daftar' => Carbon::now(),
                            'tahun_daftar' => Carbon::now()->format('Y'),
                        );
                        Pendaftar::where("no_telepon",strip_tags($row[1]))->update($save);
                    }else{
                        $save = array(
                            'no_telepon' => strip_tags($row[1]),
                            'email' => strtolower(str_replace(' ', '_', strip_tags($row[1]))).'@teknokrat.ac.id',
                            'nama_pendaftar' => strip_tags($row[2]),
                            'prodi_id' => $request->prodi,
                            'user_id' => $getIdUsr->id,
                            'tanggal_daftar' => Carbon::now(),
                            'tahun_daftar' => Carbon::now()->format('Y'),
                        );
                        Pendaftar::create($save);
                    }
                }
            }
        }
        return back()->with(['msg' => 'Berhasil Import Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }

}
