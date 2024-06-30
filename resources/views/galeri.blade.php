@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Galeri</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>

                        <li class="breadcrumb-item active text-white">Galeri</li>
                    </ol>
            </div>
        </div>
        <!-- Header End -->

        <!-- Gallery Start -->
        <div class="container-fluid gallery py-5 my-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Galeri</h5>
                <h1 class="mb-4">Kumpulan Dokumentasi dari Semua Kunjungan</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam,
                    architecto
                    doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat
                    corrupti
                    eum cum repellat a laborum quasi.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($galery as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="blog-img-inner">
                                    <img class="img-fluid w-100 rounded-top" src="{{url('').'/storage/'.$item->gambar}}"
                                        alt="Image">

                                </div>

                            </div>
                            <div class="blog-content border border-top-0 rounded-bottom p-4">

                                <a href="#" class="h4">{{$item->topik}}</a>
                                <p class="my-3">{{$item->caption}}</p>
                                <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-/frontend/assets/">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="/frontend/assets/img/blog-1.jpg"
                                    alt="Image">

                            </div>

                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">

                            <a href="#" class="h4">Adventures Trip</a>
                            <p class="my-3">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam
                                eos
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="/frontend/assets/img/blog-1.jpg"
                                    alt="Image">

                            </div>

                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">

                            <a href="#" class="h4">Adventures Trip</a>
                            <p class="my-3">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam
                                eos
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="/frontend/assets/img/blog-1.jpg"
                                    alt="Image">

                            </div>

                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">

                            <a href="#" class="h4">Adventures Trip</a>
                            <p class="my-3">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam
                                eos
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="/frontend/assets/img/blog-1.jpg"
                                    alt="Image">

                            </div>

                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">

                            <a href="#" class="h4">Adventures Trip</a>
                            <p class="my-3">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam
                                eos
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="/frontend/assets/img/blog-1.jpg"
                                    alt="Image">

                            </div>

                        </div>
                        <div class="blog-content border border-top-0 rounded-bottom p-4">

                            <a href="#" class="h4">Adventures Trip</a>
                            <p class="my-3">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam
                                eos
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection
