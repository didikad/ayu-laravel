<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="/backend/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/backend/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/backend/assetsimg/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/backend/assetsimg/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/backend/assetsimg/favicon-16x16.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="manifest" href="/backend/assets/site.webmanifest">

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

    <div class="container mt-4">
        @yield('container')
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/backend/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/backend/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/backend/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
