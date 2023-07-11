<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategorisoal;


class KategorisoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKategori = Kategorisoal::all();
        return view('admin.kategori.data', compact('dataKategori',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('admin.kategori.add')->render();
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
        $cek = Kategorisoal::where("nama_kategori_soal","=",$request->kategori);
        if($cek->count()>0){
            return back()->with(['msg' => 'Data Sudah Ada','icon'=>'fa fa-warning','class'=>'alert-danger']);
        }else{
            $save = array(
                'nama_kategori_soal' => strip_tags($request->kategori),
            );
            Kategorisoal::create($save);
            return back()->with(['msg' => 'Berhasil Menambah Data','icon'=>'fa fa-check','class'=>'alert-success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $kategori = Kategorisoal::where('id', '=', $request->id)->first();
        $view = view('admin.kategori.delete',compact('kategori'))->render();
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
        $kategori = Kategorisoal::where('id', '=', $request->id)->first();
        $view = view('admin.kategori.update',compact('kategori'))->render();
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
        $update = array(
            'nama_kategori_soal' => strip_tags($request->kategori),
        );
        Kategorisoal::where("id",$request->id)->update($update);
        return back()->with(['msg' => 'Berhasil Merubah Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Kategorisoal::where("id",$request->id)->delete();
        return back()->with(['msg' => 'Berhasil Menghapus Data','icon'=>'fa fa-check','class'=>'alert-success']);
    }
}
