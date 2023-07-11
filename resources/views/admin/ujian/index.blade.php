@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Data Pendaftar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="respon">
                    @if (session()->has('msg'))
                        <div class="alert {{ session('class') }} alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas {{ session('icon') }}"></i> Alert!</h5>
                            {{ session('msg') }}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <form method="get">
                        <div class="card-header">
                            <h3 class="card-title">Data Sudah Mengikuti Ujian &nbsp;</h3>
                            @csrf
                            <select name="tahun" onchange="this.form.submit()">
                                <option value="all">Semua</option>
                                <?php $now=date('Y')+1;  for($i=2023;$i<=$now;$i++) { ?>
                                <option value="{{ $i }}" {{ $tahunAktif == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-sm table-bordered">
                                <thead>
                                    <tr style="background-color:#a51c30; color:#fff;">
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center">Aksi</th>
                                        <th class="text-center">No Telp/WA</th>
                                        <th class="text-center">Nama Pendaftar</th>
                                        <th class="text-center">Tahun Daftar</th>
                                        <th class="text-center">Program Studi</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Waktu Mulai</th>
                                        <th class="text-center">Waktu Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_sudah_ujian as $key)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.ujian.destroy', $key->user_id) }}"
                                                    id="form-delete-{{ $key->user_id }}" role="form" method="POST"
                                                    class="btn-group btn-group-justified">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-danger" name="delete" type="submit"
                                                            title="Hapus Data"
                                                            onclick="deleteFunction({{ $key->user_id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="text-center">{{ $key->no_telepon }}</td>
                                            <td>
                                                {{ $key->nama_pendaftar }}
                                            </td>
                                            <td class="text-center">
                                                {{ $key->tahun_daftar }}
                                            </td>
                                            <td class="text-center">{{ $key->nama_program_studi }}</td>
                                            <td class="text-center">{{ $key->nilai }}</td>
                                            <td class="text-center">{{ $key->waktu_mulai }}</td>
                                            <td class="text-center">{{ $key->waktu_selesai }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
        <script>
            function deleteFunction($id) {
                event.preventDefault();
                const form = 'form-delete-' + $id;
                Swal.fire({
                    title: 'Apakah anda yakin menghapus ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(form).submit();
                    }
                }).catch((error) => {
                    console.log(error);
                })
            }
        </script>
    @endpush
@endsection
