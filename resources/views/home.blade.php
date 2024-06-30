@extends('layout.frontend.header')

@section('content')
    <div class="main" id="main">


        <!-- Carousel Start -->
        <div class="carousel-header">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="/frontend/assets/img/Monumen_Habibie_Ainun.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                    Explore
                                    The
                                    World</h4>
                                <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang !!!</h1>
                                <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s,
                                </p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="#">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/frontend/assets/img/Taman_Mattirotasi_Parepare_.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                    Explore
                                    The
                                    World</h4>
                                <h1 class="display-2 text-capitalize text-white mb-4">Find Your Perfect Tour At
                                    Travel
                                </h1>
                                <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s,
                                </p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="#">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/frontend/assets/img/Masjid_Terapung_.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                    Explore The
                                    World</h4>
                                <h1 class="display-2 text-capitalize text-white mb-4">You Like To Go?</h1>
                                <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s,
                                </p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="#">Selengkapnya </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Packages Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Galeri</h5>
                    <h1 class="mb-0">Kunjungan Berbagai Pihak</h1>
                </div>

                <div class="packages-carousel owl-carousel">
                    @foreach ($galery as $item)    
                        <div class="packages-item">
                            <div class="packages-img">
                                <img src="{{url('').'/storage/'.$item->gambar}}" class="img-fluid w-100 rounded-top"
                                    alt="Image">
                            </div>
                            <div class="packages-content bg-light">
                                <div class="p-4 pb-0">
                                    <h5 class="mb-0">{{$item->topik}}</h5>

                                    <p class="mb-4">{{$item->caption}}</p>
                                </div>
                                <div class="row bg-primary rounded-bottom mx-0">
                                    <div class="col-6 text-start px-0">
                                        <a href="#" class="btn-hover btn text-white py-2 px-4">Read More</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Packages End -->



        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Servis</h5>
                    <h1 class="mb-0">Layanan Kami</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">WorldWide Tours</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias
                                            eum,
                                            suscipit
                                            expedita corrupti officiis debitis possimus nam laudantium beatae quidem
                                            dolore
                                            consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Hotel Reservation</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias
                                            eum,
                                            suscipit
                                            expedita corrupti officiis debitis possimus nam laudantium beatae quidem
                                            dolore
                                            consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">WorldWide Tours</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias
                                            eum,
                                            suscipit
                                            expedita corrupti officiis debitis possimus nam laudantium beatae quidem
                                            dolore
                                            consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Hotel Reservation</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias
                                            eum,
                                            suscipit
                                            expedita corrupti officiis debitis possimus nam laudantium beatae quidem
                                            dolore
                                            consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Services End -->




    </div>
@endsection
