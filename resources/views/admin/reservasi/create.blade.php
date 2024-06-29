<!-- resources/views/admin/reservasi/create.blade.php -->

@extends('layout.maindash')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Form Reservasi Baru</h1>
    </div>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-12">
            <form action="{{ route('admin.reservasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="required">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                        value="{{ old('nama') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Nama Instansi Pemohon:</label>
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                        placeholder="Nama Instansi Pemohon" value="{{ old('nama_instansi') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Nama (untuk ditampilkan pada surat):</label>
                    <input type="text" class="form-control" id="nama_tampilkan" name="nama_tampilkan"
                        placeholder="Nama untuk ditampilkan pada surat" value="{{ old('nama_tampilkan') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Nomor HP (dapat menerima panggilan):</label>
                    <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Nomor HP"
                        value="{{ old('nomor_hp') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Nomor WA (boleh sama dengan nomor HP):</label>
                    <input type="number" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="Nomor WA"
                        value="{{ old('nomor_wa') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Email Lembaga/Instansi/Pemohon:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="provinsi">Provinsi:</label>
                    <select class="form-control" id="provinsi" name="provinsi" required>
                        <option style="display:none" selected>Pilih Provinsi</option>
                        <option value="ACEH">ACEH</option>
                        <option value="BALI">BALI</option>
                        <!-- other options... -->
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Kota/Kabupaten:</label>
                    <input type="text" class="form-control" id="kota_kabupaten" name="kota_kabupaten"
                        placeholder="Kota/Kabupaten" value="{{ old('kota_kabupaten') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label class="required">Alamat Instansi:</label>
                    <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi"
                        placeholder="Alamat Instansi" value="{{ old('alamat_instansi') }}" required>
                </div>

                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div><b>Data Tujuan Reservasi</b></div>
                </div>

                <a class="btn-hover-bg btn btn-warning rounded-pill text-white mb-3" href="#">Lihat Jadwal
                    Pertemuan</a>

                <div class="form-group mb-3">
                    <label>Hari & Pukul Kunjungan:</label>
                    <br />
                    <span class="text-danger fs-8 mt-20 ms-3">Pendaftaran minimal 3 hari kerja.</span>
                    <input required type="date" class="form-control tanggalreservasi" id="tanggal"
                        name="tanggal_reservasi" value="{{ old('tanggal_reservasi') }}">
                    <br />
                    <select class="form-select form-control" name="jam_berkunjung" id="pukul" required>
                        <option value="09:00:00">09:00</option>
                        <!-- other options... -->
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="topik">Topik Diskusi:</label>
                    <textarea class="form-control" id="topik" name="topik" rows="3" required>{{ old('topik') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="tujuan_opd">Tujuan OPD yang akan dikunjungi:</label>
                    <select class="form-control" id="tujuan_opd" name="tujuan_opd" required>
                        <option style="display:none" selected>Pilih Tujuan OPD</option>
                        <option>Kantor Walikota</option>
                        <!-- other options... -->
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="jumlah_rombongan">Jumlah Rombongan:</label>
                    <input required type="number" class="form-control" id="jumlah_rombongan" name="jumlah_rombongan"
                        value="{{ old('jumlah_rombongan') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="pimpinan_rombongan">Rencana Pimpinan Rombongan:</label>
                    <input type="text" class="form-control" id="pimpinan_rombongan" name="pimpinan_rombongan"
                        value="{{ old('pimpinan_rombongan') }}" placeholder="Pimpinan Rombongan">
                </div>

                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan:</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                </div>

                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div><b>Data Surat Permohonan Kunjungan</b></div>
                </div>

                <div class="form-group mb-3">
                    <label class="required" for="no_surat">No. Surat Permohonan Kunjungan:</label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat"
                        placeholder="Nomor Surat Permohonan Kunjungan" value="{{ old('no_surat') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label class="required" for="kepada">Kepada:</label>
                    <input type="text" class="form-control form-control-solid" id="kepada" name="kepada"
                        value="Walikota" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="surat_permohonan">Surat Permohonan Kunjungan:</label>
                    <input type="file" class="form-control" accept=".jpeg,.jpg,.png,.pdf" id="surat_permohonan"
                        name="surat_permohonan" required>
                    <small class="text-danger mt-20">
                        File format <span class="fw-bolder">.jpg/.jpeg/.png/.pdf</span> dan ukuran maks <span
                            class="fw-bolder">3MB</span>
                    </small>
                </div>

                <div class="form-group mb-3">
                    <label for="bukti_inap">Bukti Inap (jika ada):</label>
                    <input type="file" class="form-control" accept=".jpeg,.jpg,.png,.pdf" id="bukti_inap"
                        name="bukti_inap">
                    <small class="text-danger mt-20">
                        File format <span class="fw-bolder">.jpg/.jpeg/.png/.pdf</span> dan ukuran maks <span
                            class="fw-bolder">3MB</span>
                    </small>
                </div>

                <div class="form-group mb-3">
                    <label>Status</label>
                    <select class="form-select form-control" name="status" id="status" required>
                        <option value="">Pilih Status</option>
                        <option value="proses">Proses</option>
                        <option value="pending">pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
