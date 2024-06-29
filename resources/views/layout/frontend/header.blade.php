<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>SIJAGAD KOTA PAREPARE</title>

    {{-- ganti icon --}}

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/frontend/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/frontend/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/frontend/assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil!',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire(
                'Gagal!',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif
    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="m-0"> <i> </i>SIJAGAD</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link">Beranda</a>
                    <a href="/jadwal" class="nav-item nav-link">Jadwal Pertemuan</a>
                    <a href="/galeri" class="nav-item nav-link">Galeri</a>
                    <a href="/reservasi" class="nav-item nav-link">Reservasi</a>
                    <a href="/peta" class="nav-item nav-link">Peta BalaiKota</a>

                    <li class="nav-item dropdown">
                        @auth
                            <a class="nav-link dropdown-toggle text-warning fw-bold" href="#" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <strong class="text-warning">Hello {{ auth()->user()->name }}</strong>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <form action="/logout-google" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>


                        @endauth
                    </li>

                </div>

                {{-- <a href="/logout" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Logout</a> --}}
            </div>
        </nav>

        @yield('content')
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
                class="fa fa-arrow-up"></i></a>

        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <a class="navbar-brand" href="#">
                <img src="/frontend/assets/img/Logo_Parepare_Baru.png" width="150" height="150" alt="Logo"
                    class="img-fluid" style="margin-left: 150px">
            </a>
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            {{-- <img src="https://www.sulselsatu.com/assets/media/upload/2021/12/FB_IMG_1638698172434.jpg"
                                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                alt=""> --}}
                            <h4 class="mb-4 text-white">Hubungi Kami</h4>
                            <a href="https://maps.app.goo.gl/DbmU97XX4u8PGRvs6"><i class="fas fa-home me-2"></i> Jl.
                                Jenderal Sudirman No.78, Bumi
                                Harapan, Kec. Bacukiki Bar., Kota Parepare, Sulawesi Selatan 91122</a>
                            <a href="mailto:setdako@pareparekota.go.id"><i
                                    class="fas fa-envelope me-2"></i>setdako@pareparekota.go.id</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Company</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Careers</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Blog</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Press</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Gift Cards</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Magazine</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Legal Notice</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Terms and Conditions</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Sitemap</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Cookie policy</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Footer End -->


            <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="/frontend/assets/lib/easing/easing.min.js"></script>
            <script src="/frontend/assets/lib/waypoints/waypoints.min.js"></script>
            <script src="/frontend/assets/lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="/frontend/assets/lib/lightbox/js/lightbox.min.js"></script>


            <!-- Template Javascript -->
            <script src="/frontend/assets/js/main.js"></script>
</body>

</html>
