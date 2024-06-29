@extends('layout.maindash')

@section('content')
{{-- @dd(url('admin/reservasi/data-ajax')); --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Agenda Terdekat</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendaTerdekat as $agenda)
                                <tr>
                                    <td>{{ $agenda->tanggal_reservasi }}</td>
                                    <td>{{ $agenda->topik }}</td>
                                    <td>
                                        <a href="{{route('admin.reservasi.show', $agenda->id)}}" target="_blank" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Reservasi</h6>
                </div>
                @php
                    $countReservasi = App::make('App\Http\Controllers\AdminController');
                    $total = $countReservasi->countReservasi(['proses', 'diterima', 'ditolak']);
                    $waiting = $countReservasi->countReservasi(['proses']);
                    $diterima = $countReservasi->countReservasi(['diterima']);
                    $ditolak = $countReservasi->countReservasi(['ditolak']);
                @endphp
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Total Reservasi Masuk: {{$total}}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Total Reservasi Menunggu Konfirmasi: {{$waiting}}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Total Reservasi Diterima: {{$diterima}}</p>
                        </div>
                        <div class="col-md-6">
                            <p>Total Reservasi Ditolak: {{$ditolak}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Reservasi</h6> &ensp;
                    <a href="{{route('admin.reservasi.create')}}" class="btn btn-add btn-sm btn-primary">Tambahkan Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">NO.</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Topik</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservasis as $reservasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reservasi->nama }}</td>
                                        <td>{{ $reservasi->tanggal_reservasi }}</td>
                                        <td>{{ $reservasi->topik }}</td>
                                        <td class="">{{ $reservasi->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.reservasi.show', $reservasi->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('admin.reservasi.edit', $reservasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.reservasi.destroy', $reservasi->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data reservasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
