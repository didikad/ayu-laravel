@extends('layout.frontend.header')

@section('content')
<div class="main mb-5">
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center pt-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Jadwal Pertemuan</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Jadwal Pertemuan</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Packages Start -->
    <div class="container-fluid packages py-5">
        <div class="container pt-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Halaman</h5>
                <h1 class="mb-0">Jadwal Pertemuan</h1>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div id="calendar"></div>
    </div>

</div>

<!-- Script inisialisasi FullCalendar -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            events: {
                url: '{{ url("admin/agenda/get") }}',
                    method: 'GET',
                    failure: function() {
                        Swal.fire({
                            title: "Gagal Mengambil Data",
                            text: "Silahkan coba lagi",
                            icon: 'error'
                        })
                    }
                },
            editable: true,
            selectable: true,
            headerToolbar: {
                left: 'today, prev',
                center: 'title',
                right: 'next',
            },
        });

        calendar.render();
    });
</script>
@endsection
