<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_instansi' => 'required|string|max:255',
            'nama_tampilkan' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric',
            'nomor_wa' => 'required|numeric',
            'email' => 'required|email',
            'provinsi' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'alamat_instansi' => 'required|string|max:255',
            'tanggal_reservasi' => 'required|date',
            'jam_berkunjung' => 'required|string|max:255',
            'topik' => 'required|string',
            'tujuan_opd' => 'required|string|max:255',
            'jumlah_rombongan' => 'required|integer',
            'pimpinan_rombongan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'no_surat' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
            'surat_permohonan' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072',
            // 'status' => 'required|string|in:proses,pending,diterima,ditolak,selesai',
            'bukti_inap' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:3072',
        ]);

        $surat_permohonan_path = $request->file('surat_permohonan')->store('surat_permohonan', 'public');
        $bukti_inap_path = $request->hasFile('bukti_inap') ? $request->file('bukti_inap')->store('bukti_inap', 'public') : null;

        $reservasi = Reservasi::create([
            'user_id' => $request->user()->id,
            'nama' => $request->nama,
            'nama_instansi' => $request->nama_instansi,
            'nama_tampilkan' => $request->nama_tampilkan,
            'nomor_hp' => $request->nomor_hp,
            'nomor_wa' => $request->nomor_wa,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'alamat_instansi' => $request->alamat_instansi,
            'tanggal_reservasi' => $request->tanggal_reservasi,
            'jam_berkunjung' => $request->jam_berkunjung,
            'topik' => $request->topik,
            'tujuan_opd' => $request->tujuan_opd,
            'jumlah_rombongan' => $request->jumlah_rombongan,
            'pimpinan_rombongan' => $request->pimpinan_rombongan,
            'keterangan' => $request->keterangan,
            'no_surat' => $request->no_surat,
            'kepada' => $request->kepada,
            'surat_permohonan' => $surat_permohonan_path,
            'status' => 'proses',
            'bukti_inap' => $bukti_inap_path,
        ]);

        return redirect()->route('keterangan.sukses.detail', ['id' => $reservasi->id])->with(['success'=>'Berhail Membuat Reservasi A.N '.$reservasi->nama]);
    }

    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservations.edit', compact('reservasi'));
    }

    public function show($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservations.show', compact('reservasi'));
    }

    public function showSuccess($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('sukses', compact('reservasi'));
    }
}
