<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Admin::all();
        return view('admin.pengguna.data', compact('pengguna',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('admin.pengguna.add')->render();
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
        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'level' => 'information',
                'password' => Hash::make('teknokrat'),
            ]);

            return redirect()->route('admin.pengguna.index')->with(['msg' => 'Berhasil Menambah Data Data','icon'=>'fa fa-check','class'=>'alert-success']);
        } catch (\Exception $e) {
            return redirect()->route('admin.pengguna.index')->with(['msg' => 'Gagal Menambah Data Data','icon'=>'fa fa-times','class'=>'alert-danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = Admin::findorfail($id);
        $view = view('admin.pengguna.delete', compact('pengguna'))->render();
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
    public function edit($id)
    {
        $pengguna = Admin::findorfail($id);
        $view = view('admin.pengguna.update', compact('pengguna'))->render();
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
    public function update(Request $request, $id)
    {
        try {
            $admin = Admin::findorfail($id);

            $adminData = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            $admin->update($adminData);
            if($request->has('password')) {
                $adminData = [
                    'password' => Hash::make($request->password),
                ];
                $admin->update($adminData);
            }
            
            return redirect()->route('admin.pengguna.index')->with(['msg' => 'Berhasil Memperbarui Data','icon'=>'fa fa-check','class'=>'alert-success']);
        } catch (\Exception $e) {
            return redirect()->route('admin.pengguna.index')->with(['msg' => 'Gagal Memperbarui Data','icon'=>'fa fa-times','class'=>'alert-danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $admin = Admin::findorfail($id);
            $admin->delete();

            return redirect()->route('admin.pengguna.index')->with(['msg' => 'Berhasil Menghapus Data','icon'=>'fa fa-check','class'=>'alert-success']);
        } catch (\Exception $e) {
            return redirect()->route('admin.pengguna.index')->with(['msg' => 'Gagal Menghapus Data','icon'=>'fa fa-times','class'=>'alert-danger']);
        }
    }
}
