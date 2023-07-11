@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Utama')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form method="get" action="{{ route('admin.dashboard') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Filter Pendaftar Berdasarkan Tanggal</label>
                                    <input type="date" value="{{ request('tanggal_now', $tanggal_now) }}"
                                        class="form-control form-control-sm" name="tanggal_now">
                                </div>
                            </div>
                            <div class="col-sm-1 d-flex align-items-end mb-3">
                                <button type="submit" class="btn btn-sm btn-block btn-warning" title="Filter"> <i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach ($fakultas as $row)
            <div class="col-12 col-lg-4 col-sm-4">
                <div class="card">
                    <div class="card-header border-bottom-2">
                        <h3 class="card-title" style="font-size: 14px">
                            Pendaftar {{ $row->nama_fakultas }} {{ $tahun_now }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped table-valign-middle nowrap" width="100%"
                            style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">Program Studi</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Per-Tanggal <br> {{ $tanggal_now }}</th>
                                </tr>
                            </thead>
                            @foreach ($row->program_studi as $row_prodi)
                                <tr>
                                    <td width="40%">{{ $row_prodi->nama_program_studi }}</td>
                                    <td class="text-center" width="10%" style="font-weight: bold">
                                        {{ $pendaftar->where('prodi_id', $row_prodi->id)->count() }}
                                    </td>
                                    <td class="text-center" width="20%" style="font-weight: bold">
                                        {{ $pendaftarHarian->where('prodi_id', $row_prodi->id)->count() }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr style="font-weight: bold">
                                <td width="40%">#Total</td>
                                <td class="text-center" width="30%">
                                    {{ $pendaftar->where('program_studi.fakultas_id', $row->id)->count() }}
                                </td>
                                <td class="text-center" width="30%">
                                    {{ $pendaftarHarian->where('program_studi.fakultas_id', $row->id)->count() }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
