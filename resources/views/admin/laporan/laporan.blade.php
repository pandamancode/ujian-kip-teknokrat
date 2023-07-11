@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Rekap')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Rekap Pendaftar Berdasarkan Tanggal
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.laporan_berdasarkan_tanggal.filter') }}" target="_blank"
                        class="form-horizontal my-2" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date"
                                        class="form-control form-control-sm @error('tanggal_sekarang') is-invalid @enderror"
                                        name="tanggal_sekarang" placeholder="Nama Pasien" required
                                        value="{{ request('tanggal_sekarang') }}">
                                    @error('tanggal_sekarang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date"
                                        class="form-control form-control-sm @error('tanggal_mendatang') is-invalid @enderror"
                                        name="tanggal_mendatang" placeholder="Tanggal Lahir" required
                                        value="{{ request('tanggal_mendatang') }}">
                                    @error('tanggal_mendatang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Rekap Profil Pendaftar Berdasarkan Tanggal
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.laporan_profil_berdasarkan_tanggal.filter') }}" target="_blank"
                        class="form-horizontal my-2" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date"
                                        class="form-control form-control-sm @error('tanggal_sekarang') is-invalid @enderror"
                                        name="tanggal_sekarang" placeholder="Nama Pasien" required
                                        value="{{ request('tanggal_sekarang') }}">
                                    @error('tanggal_sekarang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date"
                                        class="form-control form-control-sm @error('tanggal_mendatang') is-invalid @enderror"
                                        name="tanggal_mendatang" placeholder="Tanggal Lahir" required
                                        value="{{ request('tanggal_mendatang') }}">
                                    @error('tanggal_mendatang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
