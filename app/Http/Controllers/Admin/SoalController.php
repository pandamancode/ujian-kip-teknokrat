<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Kategorisoal;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->kategori)){
            if($request->kategori=='all'){
                $dataSoal = Soal::all();
            }else{
                $dataSoal = Soal::where('kategori_id',$request->kategori)->get();
            }
            $kategoriAktif = $request->kategori;
        }else{
            $kategoriAktif = false;
            $dataSoal = Soal::all();
        }

        $kategori = Kategorisoal::all();
        return view('admin.soal.data', compact('dataSoal','kategori','kategoriAktif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategorisoal::all();
        $view = view('admin.soal.add',compact('kategori'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    public function import(){
        $kategori = Kategorisoal::all();
        $view = view('admin.soal.import',compact('kategori'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = array(
            'kategori_id' => $request->kategori,
            'soal' => $request->soal,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'kunci' => strtolower($request->kunci),
        );
        Soal::create($save);
        return back()->with(['msg' => 'Berhasil Menambah Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $soal = Soal::where('id', '=', $request->id)->first();
        $view = view('admin.soal.delete',compact('soal'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $kategori = Kategorisoal::all();
        $soal = Soal::where('id', '=', $request->id)->first();
        $view = view('admin.soal.update',compact('kategori','soal'))->render();
        return response()->json([
            'success' => true, 
            'html'=> $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $where['id'] = $request->id;
        $save = array(
            'kategori_id' => $request->kategori,
            'soal' => $request->soal,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'kunci' => strtolower($request->kunci),
        );
        Soal::where($where)->update($save);
        return back()->with(['msg' => 'Berhasil Menambah Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Soal::where("id",$request->id)->delete();
        return back()->with(['msg' => 'Berhasil Menghapus Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }

    public function import_soal(Request $request){
        $import = $request->file('file');
        $new_import = time().'.'.$import->getClientOriginalExtension();
        $import->move('uploads/', $new_import);
        $path = 'uploads/' . $new_import;
        $dataImport = Excel::toArray([], $path);
        foreach ($dataImport as $key => $value) {
            foreach ($value as $row) {
                $dataSoal = array(
                    'soal' => $row[1],
                    'a' => $row[2],
                    'b' => $row[3],
                    'c' => $row[4],
                    'd' => $row[5],
                    'e' => $row[6],
                    'kunci' => strtolower($row[7]),
                    'kategori_id' => $request->kategori,
                );
                Soal::create($dataSoal);
            }
        }
        return redirect('/admin/soal')->with(['msg' => 'Berhasil Import Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }
}
