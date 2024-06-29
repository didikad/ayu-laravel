@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center pt-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Jadwal Pertemuan</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active text-white">Jadwal Pertemuan</li>
                    </ol>
            </div>
        </div>
        <!-- Header End -->


        <!-- Packages Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Halaman</h5>
                    <h1 class="mb-0">Jadwal Pertemuan</h1>
                </div>

            </div>
        </div>


        <div id="calendar"></div>
        @push('script')
        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    initialView: 'dayGridMonth',
                    header: {
                        left: '',
                        center: 'title',
                        right: 'prev,next today'
                    },
                    dayHeaders: function(date, groupInformation) {
                        return $(`
                            <span>${date.format('DD')}</span>
                        `);
                    },
                    events: function(start, end, callback) {
                        $.ajax({
                            url: "{{ url('api/jadwal') }}",
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                var events = [];
                                $.each(data, function(key, value) {
                                    events.push({
                                        title: value.judul,
                                        start: new Date(value.tanggal.getFullYear(), value.tanggal.getMonth(), value.tanggal.getDate(), value.pukul.split(':')[0], value.pukul.split(':')[1], 0),
                                        end: new Date(value.tanggal.getFullYear(), value.tanggal.getMonth(), value.tanggal.getDate(), value.pukul.split(':')[0], value.pukul.split(':')[1], 59)
                                    });
                                });
                                callback(events);
                            }
                        });
                    }
                });
            });
        </script>
        @endpush


    </div>
@endsection
