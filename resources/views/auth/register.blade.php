<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar SPMB</title>

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
                <form action="{{ route('register') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="form-group">
                        <label style="color:black;">Nama Lengkap</label>
                        <div class="input-group mb-3">
                            <input type="text" name="name"
                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Masukan Nama Lengkap">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color:black;">No Telepon/WA</label>
                        <div class="input-group mb-3">
                            <input type="text" id="numbers-only" name="no_telepon" maxlength="15"
                                class="form-control form-control-sm @error('no_telepon') is-invalid @enderror"
                                value="{{ old('no_telepon') }}" placeholder="Masukan No Telepon/WA">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-phone"></span>
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
                                class="form-control form-control-sm @error('password') is-invalid @enderror"
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
                    <div class="form-group">
                        <label style="color:black;">Confirm Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-sm @error('password') is-invalid @enderror"
                                placeholder="Masukan Confirm Password">
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
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Sudah Punya Akun?') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center d-flex flex-column py-2" style="background-color: black">
                <strong style="color: #fff;"> &copy; 2017 - {{ \Carbon\Carbon::now()->year }} </strong>
                <span style="color: #fff;">All rights
                    reserved.
                </span>
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
    
    document.querySelector('#numbers-only').addEventListener('keypress', preventNonNumbersInInput);

    function preventNonNumbersInInput(event) {
        var characters = String.fromCharCode(event.which);
        if (!(/[0-9]/.test(characters))) {
            event.preventDefault();
        }
    }

    document.querySelector('#numbers-only').addEventListener('paste', pasteTest);

    function pasteTest(event) {
        window.setTimeout(() => {
            var characters = event.target.value;
            window.setTimeout(() => {
                if (!(/^\d+$/.test(characters))) {
                    event.target.value = event.target.value.replace(/\D/g, '');
                }
            });
        });
    }
    </script>
    <!-- jQuery -->
    <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
