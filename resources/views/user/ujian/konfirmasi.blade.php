@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Ujian')
@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                @if (!empty($check_ujian))
                    <div class="card-header">
                        <h3 class="card-title">Terima Kasih Telah Mengikuti Test KIP Universitas Teknokrat Indonesia</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <tr>
                                <td width="40%">Nama</td>
                                <td>: {{ $user->nama_pendaftar }}</td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td>: {{ $user->program_studi->nama_program_studi }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('user.pengumuman') }}" class="btn btn-primary btn-sm">Lihat Pengumuman</a>
                    </div>
                @else
                    <div class="card-header">
                        <h3 class="card-title">Konfirmasi Test</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <tr>
                                <td width="40%">Nama</td>
                                <td>: {{ $user->nama_pendaftar }}</td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td>: {{ $user->program_studi->nama_program_studi }}</td>
                            </tr>
                            <tr>
                                <td>Durasi</td>
                                <td>: {{ $durasi->durasi }} Menit</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url('ujian/mulai_ujian') }}" target="_blank" class="btn btn-primary btn-sm">Mulai
                            Test</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @push('js')
        @if (session('status'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('status') }}',
                })
            </script>
        @endif
    @endpush
@endsection
