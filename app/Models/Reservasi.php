<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nama_instansi',
        'nama_tampilkan',
        'nomor_hp',
        'nomor_wa',
        'email',
        'provinsi',
        'kota_kabupaten',
        'alamat_instansi',
        'tanggal_reservasi',
        'jam_berkunjung',
        'topik',
        'tujuan_opd',
        'jumlah_rombongan',
        'pimpinan_rombongan',
        'keterangan',
        'no_surat',
        'kepada',
        'surat_permohonan',
        'status',
        'bukti_inap'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
