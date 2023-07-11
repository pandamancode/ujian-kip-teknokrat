@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Soal')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div id="respon">
                @if(session()->has('msg'))
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
                    <h3 class="card-title">Data Soal &nbsp;</h3>
                    @csrf
                    <select name="kategori" onchange="this.form.submit()">
                        <option value="all">Semua</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ ($kategoriAktif==$k->id) ? "selected" : "" }}>{{ $k->nama_kategori_soal }}</option>
                        @endforeach
                    </select>

                    <div class="card-tools">
                        <a href="javascript:;" class="btn btn-xs btn-success btn-import">
                            <i class="fas fa-cloud-upload"></i> Import
                        </a>
                        <a href="javascript:;" class="btn btn-xs btn-primary btn-add">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr style="background-color:#a51c30; color:#fff;">
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center" width="10%">Aksi</th>
                                    <th class="text-center">Soal</th>
                                    <th class="text-center">A</th>
                                    <th class="text-center">B</th>
                                    <th class="text-center">C</th>
                                    <th class="text-center">D</th>
                                    <th class="text-center">E</th>
                                    <th class="text-center" width="8%">Kunci</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSoal as $key)
                                <tr class="odd">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-xs btn-primary btn-ubah"
                                            data-id="{{ $key->id }}"><i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-danger btn-hapus"
                                            data-id="{{ $key->id }}"><i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>{!! $key->soal !!}</td>
                                    <td>{!! $key->a !!}</td>
                                    <td>{!! $key->b !!}</td>
                                    <td>{!! $key->c !!}</td>
                                    <td>{!! $key->d !!}</td>
                                    <td>{!! $key->e !!}</td>
                                    <td class="text-center">{{ strtoupper($key->kunci) }}</td>
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
    setTimeout(function() {document.getElementById('respon').innerHTML='';},2000);
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on("click", ".btn-import", function () {
            var url = "{{ route('admin.soalimport') }}";
            $.ajax({
                    method: "GET",
                    url: url,
                })
                .done(function (data) {
                    $('#tempat-modal').html(data.html);
                    $('#modal_show').modal('show');
                })
        })

        $(document).on("click", ".btn-add", function () {
            var url = "{{ route('admin.soalcreate') }}";
            $.ajax({
                    method: "GET",
                    url: url,
                })
                .done(function (data) {
                    $('#tempat-modal').html(data.html);
                    $('.modal-dialog').attr('class','modal-dialog modal-lg'); 
                    $('#modal_show').modal('show');
                })
        })

        $(document).on("click", ".btn-ubah", function () {
            var id = $(this).attr("data-id");
            var url = "{{ route('admin.soaledit') }}";
            $.ajax({
                    method: "GET",
                    url: url,
                    data: "id=" + id
                })
                .done(function (data) {
                    $('#tempat-modal').html(data.html);
                    $('.modal-dialog').attr('class','modal-dialog modal-lg'); 
                    $('#modal_show').modal('show');
                })
        })
        $(document).on("click", ".btn-hapus", function () {
            var id = $(this).attr("data-id");
            var url = "{{ route('admin.soalhapus') }}";
            $.ajax({
                    method: "GET",
                    url: url,
                    data: "id=" + id
                })
                .done(function (data) {
                    $('#tempat-modal').html(data.html);
                    $('#modal_show').modal('show');
                })
        })
    });
</script>
@endpush
@endsection
