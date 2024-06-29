@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Reservasi Online</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item active text-white">Reservasi Online</li>
                </ol>
            </div>
        </div>
        <!-- Header End -->

        <div class="container-fluid packages py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h1 class="mb-4">Reservasi Online</h1>
                <p class="mb-4">Silakan mengisi formulir reservasi di bawah ini untuk mengajukan kunjungan. Pastikan untuk mengisi formulir hanya sekali untuk menghindari duplikasi data.</p>

                <div class="d-flex align-items-center justify-content-center py-3">
                    <a class="btn-hover-bg btn btn-danger rounded-pill text-white py-3 px-5" href="{{ url ('auth/google')}}">
                        Login with Google
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
