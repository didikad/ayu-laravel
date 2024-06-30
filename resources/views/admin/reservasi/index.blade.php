@extends('layout.maindash')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Daftar Reservasi</h1>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Reservasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">NO.</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Tanggal</th>
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
                                        <td>
                                            <select name="status" class="form-control" id="statusUpdate-{{$reservasi->id}}">
                                                <option value="proses" @if ($reservasi->status == 'proses') selected @endif>Proses</option>
                                                <option value="pending" @if ($reservasi->status == 'pending') selected @endif>Pending</option>
                                                <option value="diterima" @if ($reservasi->status == 'diterima') selected @endif>Diterima</option>
                                                <option value="ditolak" @if ($reservasi->status == 'ditolak') selected @endif>Ditolak</option>
                                                <option value="selesai" @if ($reservasi->status == 'selesai') selected @endif>Selesai</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.reservasi.show', $reservasi->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('admin.reservasi.edit', $reservasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.reservasi.destroy', $reservasi->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                                            </form>
                                            @if ($reservasi->status == 'Pending')
                                                <a href="{{ route('admin.reservasi.success', $reservasi->id) }}" class="btn btn-success btn-sm">Terima</a>
                                                <a href="{{ route('admin.reservasi.reject', $reservasi->id) }}" class="btn btn-danger btn-sm">Tolak</a>
                                            @endif
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

            $('select[id^=statusUpdate-]').on("change", function () {
                var id = $(this).attr('id').split('-')[1];
                var status = $(this).val();
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:'{{url('admin/updateStatus')}}',
                    type:'POST',
                    data:{
                        _token: token,
                        id:id,
                        status:status
                    },
                    success: function(response){
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.success,
                            icon: "success",
                        })
                    },
                    error: function(error){
                        Swal.fire({
                            title: "Gagal!",
                            text: "Gagal Update Data",
                            icon: "error",
                        })
                    }
                })
            })
        });
    </script>
@endsection
