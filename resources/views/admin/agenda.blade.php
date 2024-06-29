@extends('layout.maindash')
@section('content')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Agenda Pemerintahan</h1>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: {
                    url: '{{ url("admin/agenda/get") }}',
                        method: 'GET',
                        failure: function() {
                            alert('there was an error while fetching events!');
                        }
                    },
                editable: true,
                selectable: true,
                headerToolbar: {
                    left: 'today, prev',
                    center: 'title',
                    right: 'next',
                },
                eventClick: function(info) {
                    var eventId = info.event._def.publicId;
                    info.jsEvent.preventDefault();
                    // window.location.href = "{{url('/admin/reservasi')}}/" + eventId;
                    window.open("{{url('/admin/reservasi')}}/" + eventId, '_blank');
                }
            });

            calendar.render();
        })
      </script>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Calendar</div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
