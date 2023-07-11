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
                        <div class="card-header">
                            <h3 class="card-title">Data Pendaftar &nbsp;</h3>
                            <div class="card-tools">
                                <a href="javascript:;" class="btn btn-xs btn-info btn-import">
                                    <i class="fas fa-cloud-upload"></i> Import Data
                                </a>
                                <a href="javascript:;" class="btn btn-xs btn-primary btn-add">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-content">
                                    @include('admin.pendaftar.table')
                                </div>
                            </div>
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
                    var url = "{{ url('admin/pendaftar/create') }}";
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
                    var url = "{{ url('admin/pendaftar/edit') }}";
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
                $(document).on("click", ".btn-import", function() {
                    var id = $(this).attr("data-id");
                    var url = "{{ url('admin/pendaftar/hapus') }}";
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

            function resetFunction($id) {
                event.preventDefault();
                const form = 'form-reset-' + $id;
                Swal.fire({
                    title: 'Apakah anda yakin untuk mereset password?',
                    text: 'password default "teknokrat"',
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

            function validationPembayaran($id) {
                event.preventDefault();
                const form = 'form-validation-' + $id;
                Swal.fire({
                    title: 'Validasi Pembayaran?',
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

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
            }
        </script>
    @endpush
@endsection
