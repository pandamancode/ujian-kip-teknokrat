@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Utama')
@section('content')
    <div class="row">
        <div class="col-sm-12 mb-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://spmb.teknokrat.ac.id/wp-content/uploads/2023/06/Banner-WEB-UTI-2023-1.jpg"
                            class="d-block w-100" alt="banner-1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://spmb.teknokrat.ac.id/wp-content/uploads/2022/12/WEB-HOME-2.jpg"
                            class="d-block w-100" alt="banner-2">
                    </div>
                </div>
                <button class="carousel-control-prev d-none" type="button" data-target="#carouselExampleControls"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next d-none" type="button" data-target="#carouselExampleControls"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Informasi</strong></h3>
                </div>
                <div class="card-body">
                    <p>
                        Selamat Datang di Sistem Ujian Seleksi Online KIP 2023 Universitas Teknokrat Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
