@extends('layout.frontend.header')

@section('content')
<div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Reservasi Berhasil</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item "><a href="/">Beranda</a></li>
                    </ol>
            </div>
        </div>
<div class="container mt-5"> <!-- Tambahkan margin-top untuk menjauhkan dari navbar -->
    <div class="alert alert-success">
        <h4 class="alert-heading">Reservasi Berhasil!</h4>
        <p>Reservasi Anda atas Nama<strong> {{ $reservasi->nama }} </strong>telah berhasil diajukan.</p>
        <hr>
        <p class="mb-0">Terima kasih telah melakukan reservasi. Kami akan segera menghubungi Anda.</p>
    </div>
</div>

    <div class="text-center py-5">
        <a href="/" class="btn btn-primary rounded-pill">Kembali ke Beranda</a>
    </div>
@endsection
