@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Pengguna')
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
                    <div class="card-header">
                        <h3 class="card-title">Data Pengguna</h3>
                        <div class="card-tools">
                            <a href="javascript:;" class="btn btn-xs btn-primary btn-add">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr style="background-color:#a51c30; color:#fff;">
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengguna as $key)
                                        <tr class="odd">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-xs btn-primary btn-ubah"
                                                    data-id="{{ $key->id }}"><i class="fas fa-edit"></i>
                                                </a>
                                                @if ($key->level != 'admin')
                                                    <a href="#" class="btn btn-xs btn-danger btn-hapus"
                                                        data-id="{{ $key->id }}"><i class="fas fa-trash"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $key->name }}</td>
                                            <td class="text-center">{{ $key->email }}</td>
                                            <td class="text-center">{{ $key->level }}</td>
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

    <div id="tempat-modal"></div>
    @push('js')
        <script>
            setTimeout(function() {
                document.getElementById('respon').innerHTML = '';
            }, 2000);
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).on("click", ".btn-add", function() {
                    var url = "{{ route('admin.pengguna.create') }}";
                    $.ajax({
                            method: "GET",
                            url: url,
                        })
                        .done(function(data) {
                            $('#tempat-modal').html(data.html);
                            $('#modal_show').modal('show');
                        })
                })
                $(document).on("click", ".btn-ubah", function() {
                    var id = $(this).attr("data-id");
                    var url = "{{ route('admin.pengguna.edit', ':id_data') }}";
                    url = url.replace(":id_data", id);

                    $.ajax({
                            method: "GET",
                            url: url,
                            data: "id=" + id
                        })
                        .done(function(data) {
                            $('#tempat-modal').html(data.html);
                            $('#modal_show').modal('show');
                        })
                })
                $(document).on("click", ".btn-hapus", function() {
                    var id = $(this).attr("data-id");
                    var url = "{{ route('admin.pengguna.show', ':id_data') }}";
                    url = url.replace(":id_data", id);

                    $.ajax({
                            method: "GET",
                            url: url,
                            data: "id=" + id
                        })
                        .done(function(data) {
                            $('#tempat-modal').html(data.html);
                            $('#modal_show').modal('show');
                        })
                })
            });
        </script>
    @endpush
@endsection
