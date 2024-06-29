@extends('layout.maindash')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Detail Reservasi</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Reservasi</h6>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $reservasi->nama }}</p>
            <p><strong>Instansi:</strong> {{ $reservasi->nama_instansi }}</p>
            <p><strong>Nama (untuk ditampilkan pada surat):</strong> {{ $reservasi->nama_tampilkan }}</p>
            <p><strong>Nomor HP:</strong> <a href="#" onclick="copyToClipboard('{{ $reservasi->nomor_hp }}'); return false;">{{ $reservasi->nomor_hp }}</a></p>
            <p><strong>Nomor WA:</strong> <a href="#" onclick="copyToClipboard('{{ $reservasi->nomor_wa }}'); return false;">{{ $reservasi->nomor_wa }}</a></p>
            <p><strong>Email:</strong> <a href="#" onclick="copyToClipboard('{{ $reservasi->email }}'); return false;">{{ $reservasi->email }}</a></p>
            <script>
                function copyToClipboard(text) {
                    navigator.clipboard.writeText(text).then(function() {
                        alert("Nomor berhasil disalin ke clipboard");
                    }, function() {
                        alert("Gagal menyalin nomor");
                    });
                }
            </script>
            <p><strong>Provinsi:</strong> {{ $reservasi->provinsi }}</p>
            <p><strong>Kota/Kabupaten:</strong> {{ $reservasi->kota_kabupaten }}</p>
            <p><strong>Alamat Instansi:</strong> {{ $reservasi->alamat_instansi }}</p>
            <p><strong>Tanggal Reservasi:</strong> {{ $reservasi->tanggal_reservasi }}</p>
            <p><strong>Jam Berkunjung:</strong> {{ $reservasi->jam_berkunjung }}</p>
            <p><strong>Topik Diskusi:</strong> {{ $reservasi->topik }}</p>
            <p><strong>Tujuan OPD yang akan dikunjungi:</strong> {{ $reservasi->tujuan_opd }}</p>
            <p><strong>Jumlah Rombongan:</strong> {{ $reservasi->jumlah_rombongan }}</p>
            <p><strong>Pimpinan Rombongan:</strong> {{ $reservasi->pimpinan_rombongan }}</p>
            <p><strong>Keterangan:</strong> {{ $reservasi->keterangan }}</p>
            <p><strong>No Surat:</strong> {{ $reservasi->no_surat }}</p>
            <p><strong>Kepada:</strong> {{ $reservasi->kepada }}</p>
            <p><strong>Surat Permohonan:</strong> <a href="{{ url('storage/'.$reservasi->surat_permohonan) }}" target="_blank">{{ $reservasi->surat_permohonan }}</a>
            <a href="{{ url('storage/'.$reservasi->surat_permohonan) }}" class="btn btn-primary" download="{{ $reservasi->nama_instansi.'_'.$reservasi->surat_permohonan }}">Download Surat Permohonan</a>
</p>
            <p><strong>Status:</strong> {{ $reservasi->status }}</p>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
