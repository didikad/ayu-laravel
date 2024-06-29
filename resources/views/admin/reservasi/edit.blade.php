@extends('layout.maindash')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Edit Reservasi</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Reservasi</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reservasi.update', $reservasi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggal_reservasi">Tanggal Reservasi:</label>
                    <input type="date" class="form-control" id="tanggal_reservasi" name="tanggal_reservasi" value="{{ $reservasi->tanggal_reservasi }}">
                </div>
                <div class="form-group">
                    <label for="jam_berkunjung">Jam Berkunjung:</label>
                    <input type="time" class="form-control" id="jam_berkunjung" name="jam_berkunjung" value="{{ $reservasi->jam_berkunjung }}">
                </div>
                <div class="form-group">
                    <label for="tujuan_opd">Tujuan:</label>
                    <input type="text" class="form-control" id="tujuan_opd" name="tujuan_opd" value="{{ $reservasi->tujuan_opd }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
