@extends('layout.maindash')
@section('content')
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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Unggahan Galeri</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <h4 class="mb-4">Unggah Gambar Baru</h4>
                    <form action="{{route('admin.post.agenda')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="agenda">Pilih Agenda</label>
                            <select name="agenda" id="agenda" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <textarea name="caption" id="caption" style="width:100%; height: 150px;" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Pilih Gambar</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Unggah</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
        <div class="col-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">NO.</th>
                                <th scope="col" class="text-center">Gambar</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center">Caption</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galery as $index => $item)    
                                <tr>
                                    <th scope="row" class="text-center">{{$index+1}}</th>
                                    <td class="text-center">
                                        <img src="{{url('').'/storage/'.$item->gambar}}" alt="Gambar" style="width: 100px;">
                                    </td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y')}}</td>
                                    <td class="text-center">{{$item->caption}}</td>
                                    <td class="text-center">
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.delete.post', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#agenda').select2({
                ajax: {
                    url: '{{ url("/admin/get/data") }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                },
                placeholder: 'Pilih Agenda',
                minimumInputLength: 1,
            });
        });
    </script>
@endsection
