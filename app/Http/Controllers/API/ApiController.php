<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\User;
use App\Models\Ujian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
class ApiController extends Controller
{

    public function daftar_ulang(Request $request){
        try {
            $tahun = $request->tahun;
            $prodi_id = $request->id_prodi;
        	$program = $request->program;
        	if($program=='09'){
            	$result = Pendaftar::select("nama_pendaftar as nama", "no_va_daftar_ulang as urut", "prodi_id as id_prodi")
                	->where('tahun_daftar',$tahun)
                	->where('prodi_id',$prodi_id)
                	->where('waktu_kuliah','Kelas Karyawan')
                	->whereNotNull('no_va_daftar_ulang')
                	->get();
            }else{
            	$result = Pendaftar::select("nama_pendaftar as nama", "no_va_daftar_ulang as urut", "prodi_id as id_prodi")
                	->where('tahun_daftar',$tahun)
                	->where('prodi_id',$prodi_id)
                	->where('waktu_kuliah','<>','Kelas Karyawan')
                	->whereNotNull('no_va_daftar_ulang')
                	->get();
            }
        
            /*$result = Pendaftar::select("nama_pendaftar as nama", "no_va_daftar_ulang as urut", "prodi_id as id_prodi")
                ->where('tahun_daftar',$tahun)
                ->where('prodi_id',$prodi_id)
                ->whereNotNull('no_va_daftar_ulang')
                ->get();*/
            return response()->json([
                "status" => true,
                "message" => "Berhasil",
                "data" => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Gagal",
            ]);
        }
    }

    public function pmbValidasi(Request $request){
        try {
            $updatePembayaran = array(
                'tanggal_pembayaran_pmb' => date('Y-m-d'),
                'status_pembayaran_pmb' => 'sudah bayar',
            );
            Pendaftar::where('no_va_pmb',$request->va)->update($updatePembayaran);
            return response()->json([
                "status" => true,
                "message" => "Berhasil",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Gagal",
            ]);
        }
    }

    public function daftarulangValidasi(Request $request){
        try {
            $updatePembayaran = array(
                'tanggal_pembayaran_daftar_ulang' => date('Y-m-d'),
                'status_pembayaran_daftar_ulang' => 'sudah bayar',
            );
            Pendaftar::where('no_va_daftar_ulang',$request->va)->update($updatePembayaran);
            return response()->json([
                "status" => true,
                "message" => "Berhasil",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Gagal",
            ]);
        }
    }

    public function sinkronisasi(){
        $data = json_decode(file_get_contents("http://admin.spmb.teknokrat.ac.id/Api/data_pmb"));
        foreach($data as $d){
            $akun = array(
                'name' => $d->nama_pendaftar,
                'email' => $d->no_telp.'2023@teknokrat.ac.id',
                'no_telepon' => $d->no_telp,
                'password' => Hash::make('teknokrat'),
            );
            //User::create($akun);

            $usr = User::where('no_telepon',$d->no_telp)->first();

            if($d->status_bayar=='true'){
                if($d->ujian=='sudah'){
                    $biodata = array(
                        'nama_pendaftar' => $d->nama_pendaftar,
                        'email' => $d->no_telp.'2023@teknokrat.ac.id',
                        'no_telepon' => $d->no_telp,
                        'tanggal_daftar' => $d->tgl_daftar,
                        'no_va_pmb' => $d->va_pmb,
                        'tanggal_pembayaran_pmb' => $d->tgl_pembayaran,
                        'status_pembayaran_pmb' => 'sudah bayar',
                        'no_va_daftar_ulang' => $d->va_daftar_ulang,
                        'prodi_id' => $d->prodi_id,
                        'gelombang_id' => '1',
                        'jalur_id' => '1',
                        'user_id' => $usr->id,
                        'tahun_daftar' => $d->tahun,
                        'waktu_kuliah' => 'Reguler Pagi',
                    );

                }else{
                    $biodata = array(
                        'nama_pendaftar' => $d->nama_pendaftar,
                        'email' => $d->no_telp.'2023@teknokrat.ac.id',
                        'no_telepon' => $d->no_telp,
                        'tanggal_daftar' => $d->tgl_daftar,
                        'no_va_pmb' => $d->va_pmb,
                        'tanggal_pembayaran_pmb' => $d->tgl_pembayaran,
                        'status_pembayaran_pmb' => 'sudah bayar',
                        'prodi_id' => $d->prodi_id,
                        'gelombang_id' => '1',
                        'jalur_id' => '1',
                        'user_id' => $usr->id,
                        'tahun_daftar' => $d->tahun,
                        'waktu_kuliah' => 'Reguler Pagi',
                    );
                }
            }else{
                $biodata = array(
                    'nama_pendaftar' => $d->nama_pendaftar,
                    'email' => $d->no_telp.'2023@teknokrat.ac.id',
                    'no_telepon' => $d->no_telp,
                    'tanggal_daftar' => $d->tgl_daftar,
                    'no_va_pmb' => $d->va_pmb,
                    'prodi_id' => $d->prodi_id,
                    'gelombang_id' => '1',
                    'jalur_id' => '1',
                    'user_id' => $usr->id,
                    'tahun_daftar' => $d->tahun,
                    'waktu_kuliah' => 'Reguler Pagi',
                );
            }

            /*Pendaftar::create($biodata);
            if($d->ujian=='sudah'){
                $dataujian = array(
                    'user_id' => $usr->id,
                    'no_telepon' => $d->no_telp,
                    'nilai' => '0',
                    'status_ujian' => 'sudah ujian',
                    'durasi' => '120',
                    'waktu_mulai' => date('Y-m-d H:i:s'),
                );
                Ujian::create($dataujian);
            }*/
        }

        return "mantab";
    }

	public function data_sudah_ujian_spmb(Request $request) {
        try {

            $tahunAktif = $request->has('tahun') ? $request->get('tahun') : date('Y');

            $data_ujian = DB::table('pendaftars')
            ->join('ujians', 'ujians.user_id', '=', 'pendaftars.user_id')
            ->join('programstudis', 'programstudis.id', '=', 'pendaftars.prodi_id')
            ->join('jalurs', 'jalurs.id', '=', 'pendaftars.jalur_id')
            ->join('gelombangs', 'gelombangs.id', '=', 'pendaftars.gelombang_id')
            ->select(
                'pendaftars.*', 
                'programstudis.nama_program_studi',
                'jalurs.jalur',
            	'gelombangs.gelombang',
            );

            $data_raport = DB::table('pendaftars')
                ->join('programstudis', 'programstudis.id', '=', 'pendaftars.prodi_id')
                ->join('jalurs', 'jalurs.id', '=', 'pendaftars.jalur_id')
            	->join('gelombangs', 'gelombangs.id', '=', 'pendaftars.gelombang_id')
                ->select(
                    'pendaftars.*', 
                    'programstudis.nama_program_studi',
                    'jalurs.jalur',
            		'gelombangs.gelombang',
                )
                ->where('jalur_id', '2')
                ->where('status_jalur_raport', 'Terima');

            $data_sudah_ujian = $data_ujian->where('pendaftars.tahun_daftar', $tahunAktif)->orderBy('pendaftars.tanggal_daftar', 'desc')->get();
            $data_raport = $data_raport->where('pendaftars.tahun_daftar', $tahunAktif)->orderBy('pendaftars.tanggal_daftar', 'desc')->get();

            $array = Arr::collapse([$data_raport, $data_sudah_ujian]);

            return response()->json([
                "status" => true,
                "message" => "Berhasil",
                "data" => $array,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Gagal",
            ]);
        }
    }

	public function data_sudah_ujian_spmb_new(Request $request) {
        try {

            $tahunAktif = $request->has('tahun') ? $request->get('tahun') : date('Y');
        
       	 	$search = $request->has('search') ? $request->get('search') : '';

            $data_ujian = DB::table('pendaftars')
            ->join('ujians', 'ujians.user_id', '=', 'pendaftars.user_id')
            ->join('programstudis', 'programstudis.id', '=', 'pendaftars.prodi_id')
            ->join('jalurs', 'jalurs.id', '=', 'pendaftars.jalur_id')
            ->join('gelombangs', 'gelombangs.id', '=', 'pendaftars.gelombang_id')
            ->select(
                'pendaftars.*', 
                'programstudis.nama_program_studi',
                'jalurs.jalur',
            	'gelombangs.gelombang',
            );

			if($search != '') {
				$data_ujian = $data_ujian->where('pendaftars.nama_pendaftar', 'LIKE', '%'.$search.'%');
			}
        
            $data_sudah_ujian = $data_ujian->where('pendaftars.tahun_daftar', $tahunAktif)->orderBy('pendaftars.tanggal_daftar', 'desc')->paginate(10);

            return response()->json([
                "status" => true,
                "message" => "Berhasil",
                "data" => $data_sudah_ujian,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Gagal",
            ]);
        }
    }

	public function pmb_sudah_bayar(Request $request) {
        try {

            $tahunAktif = $request->has('tahun') ? $request->get('tahun') : date('Y');

            $data_ujian = DB::table('pendaftars')
            ->join('ujians', 'ujians.user_id', '=', 'pendaftars.user_id')
            ->join('programstudis', 'programstudis.id', '=', 'pendaftars.prodi_id')
            ->join('jalurs', 'jalurs.id', '=', 'pendaftars.jalur_id')
            ->join('gelombangs', 'gelombangs.id', '=', 'pendaftars.gelombang_id')
            ->select(
                'pendaftars.*', 
                'programstudis.nama_program_studi',
                'jalurs.jalur',
            	'gelombangs.gelombang',
            );

            $data_raport = DB::table('pendaftars')
                ->join('programstudis', 'programstudis.id', '=', 'pendaftars.prodi_id')
                ->join('jalurs', 'jalurs.id', '=', 'pendaftars.jalur_id')
            	->join('gelombangs', 'gelombangs.id', '=', 'pendaftars.gelombang_id')
                ->select(
                    'pendaftars.*', 
                    'programstudis.nama_program_studi',
                    'jalurs.jalur',
            		'gelombangs.gelombang',
                )
                ->where('jalur_id', '2')
                ->where('status_jalur_raport', 'Terima');

            $data_sudah_ujian = $data_ujian->where('pendaftars.tahun_daftar', $tahunAktif)->where('pendaftars.status_pembayaran_daftar_ulang','sudah bayar')->orderBy('pendaftars.tanggal_daftar', 'desc')->get();
            $data_raport = $data_raport->where('pendaftars.tahun_daftar', $tahunAktif)->where('pendaftars.status_pembayaran_daftar_ulang','sudah bayar')->orderBy('pendaftars.tanggal_daftar', 'desc')->get();

            $array = Arr::collapse([$data_raport, $data_sudah_ujian]);

            return response()->json([
                "status" => true,
                "message" => "Berhasil",
                "data" => $array,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Gagal",
            ]);
        }
    }
}
