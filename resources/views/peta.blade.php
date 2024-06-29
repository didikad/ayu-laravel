@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Peta Balaikota</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>

                        <li class="breadcrumb-item active text-white">Peta Balaikota</li>
                    </ol>
            </div>
        </div>
        <!-- Header End -->

        <!-- map Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5">
                    <h5 class="section-title px-3">Kontak</h5>
                    <h1 class="mb-0">Hubungi kami dari pilhan berikut</h1>
                </div>


                <div class="row rounded g-5 align-items-center">
                    <div class=" col-lg-4">
                        <div class=" p-4">

                            <div class="text-center mb-4">
                                <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                                <h4 class="text-primary">
                                    Lokasi


                                </h4>
                                <p class="mb-0">Kota Parepare, Sulawesi Selatan 91122</p>
                            </div>




                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class=" p-4">

                            <div class="text-center mb-4">
                                <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Seluler</h4>
                                <p class="mb-0" onclick="copyToClipboard('+012 345 67890')">+012 345 67890</p>
                                <p class="mb-0" onclick="copyToClipboard('+012 345 67891')">+012 345 67891</p>
                            </div>

                            <script>
                                function copyToClipboard(text) {
                                    navigator.clipboard.writeText(text)
                                        .then(() => {
                                            alert('Nomor telepon berhasil disalin ke clipboard');
                                        })
                                        .catch(err => {
                                            console.error('Gagal menyalin ke clipboard:', err);
                                            alert('Gagal menyalin nomor telepon');
                                        });
                                }
                            </script>




                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class=" p-4">

                            <div class="text-center">
                                <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Email</h4>
                                <a class="mb-0" href="mailto:setdako@pareparekota.go.id">setdako@pareparekota.go.id</a>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100 d-flex justify-content-center py-5">
                        <div class="rounded ">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.9627253132317!2d119.62844587558081!3d-4.028022934288975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bb6edbd2e717%3A0xf0c077cd2dac143b!2sParepare%20Mayor&#39;s%20Office!5e0!3m2!1sen!2sid!4v1714008782401!5m2!1sen!2sid"
                                class="w-100" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!-- Contact End -->
    @endsection
