<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ujian Seleksi KIP - Universitas Teknokrat Indonesia</title>

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="https://teknokrat.ac.id/wp-content/uploads/2022/04/UNIVERSITASTEKNOKRAT-e1647677057867-768x774-min.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('TemplateAdmin/AdminLTE-3.1.0/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page" style="background-color: #a50d0d;">
    <div class="login-box">
        <div class="card card-outline card-danger p-2">
            <div class="d-flex justify-content-center align-items-center my-2">
                <div class="text-center">
                    <img src="{{ asset('image/spmb.png') }}" alt="logo" class="img-fluid">
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-warning alert-dismissible p-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-times"></i> Alert!</h5>
                        <p class="pb-0">{{ session('status') }}</p>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="form-group">
                        <label style="color:black;">No Telepon/WA</label>
                        <div class="input-group mb-3">
                            <input type="text" name="no_telepon" maxlength="15"
                                class="form-control @error('no_telepon') is-invalid @enderror"
                                value="{{ old('no_telepon') }}" placeholder="Masukan No Telepon/WA">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa fa-phone"></span>
                                </div>
                            </div>
                            @error('no_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color:black;">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukan Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            &nbsp;
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center d-flex flex-column py-2" style="background-color: black">
                <strong style="color: #fff;"> &copy; 2023</strong>
                <span style="color: #fff;">Powered by
                    <a data-toggle="modal" data-target="#puskom" style="color: #F00;">Pustik UTI<br /></a>
                </span>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3500);
    
    	 
    </script>
    <!-- jQuery -->
    <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
