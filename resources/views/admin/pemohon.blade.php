@extends('layout.maindash')

@section('content')
    <style>
        a{
            color: black;
            text-decoration-style: none;
            text-decoration: none;
        }
        a:hover{
            text-decoration-style: none;
            text-decoration: none;
        }
    </style>
    @php
        $countPemohon = App::make("\App\Http\Controllers\AdminController");
    @endphp
    <div class="container d-flex flex-wrap justify-content-center w-full gap-x-3">
        <a href="{{url('/admin/pemohon')}}?{{ \http_build_query(array_merge(request()->query(), ['pemohon' => 'proses'])) }}" class="card @if (request('pemohon') == 'proses') bg-primary text-white @else bg-secondary @endif" style="width: 10rem;">
            <div class="card-body">
              <h5 class="card-title">Proses</h5>
              <h6 class="card-subtitle mb-2">{{$countPemohon->countPemohon('proses')}}</h6>
            </div>
        </a> &ensp;
        <a href="{{url('/admin/pemohon')}}?{{ \http_build_query(array_merge(request()->query(), ['pemohon' => 'pending'])) }}" class="card @if (request('pemohon') == 'pending') bg-primary text-white @else bg-secondary @endif" style="width: 10rem;">
            <div class="card-body">
              <h5 class="card-title">Pending</h5>
              <h6 class="card-subtitle mb-2">{{$countPemohon->countPemohon('pending')}}</h6>
            </div>
        </a> &ensp;
        <a href="{{url('/admin/pemohon')}}?{{ \http_build_query(array_merge(request()->query(), ['pemohon' => 'diterima'])) }}" class="card @if (request('pemohon') == 'diterima') bg-primary text-white @else bg-secondary @endif" style="width: 10rem;">
            <div class="card-body">
              <h5 class="card-title">Diterima</h5>
              <h6 class="card-subtitle mb-2">{{$countPemohon->countPemohon('diterima')}}</h6>
            </div>
        </a> &ensp;
        <a href="{{url('/admin/pemohon')}}?{{ \http_build_query(array_merge(request()->query(), ['pemohon' => 'ditolak'])) }}" class="card @if (request('pemohon') == 'ditolak') bg-primary text-white @else bg-secondary @endif" style="width: 10rem;">
            <div class="card-body">
              <h5 class="card-title">Ditolak</h5>
              <h6 class="card-subtitle mb-2">{{$countPemohon->countPemohon('ditolak')}}</h6>
            </div>
        </a> &ensp;
        <a href="{{url('/admin/pemohon')}}?{{ \http_build_query(array_merge(request()->query(), ['pemohon' => 'selesai'])) }}" class="card @if (request('pemohon') == 'selesai') bg-primary text-white @else bg-secondary @endif" style="width: 10rem;">
            <div class="card-body">
              <h5 class="card-title">Selesai</h5>
              <h6 class="card-subtitle mb-2">{{$countPemohon->countPemohon('selesai')}}</h6>
            </div>
        </a> &ensp;
    </div>

    <div class="card w-full table-responsive mt-5 p-3">
        <table class="table table-bordered table-striped table-hover datatable ">
            <thead>
                <th>No.</th>
                <th>Nama</th>
                <th>Topik</th>
                <th>Tanggal</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($pemohon as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->topik }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_reservasi)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.reservasi.show', $item->id) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-warning">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
         $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
@endsection