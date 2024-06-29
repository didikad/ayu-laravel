<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'wisata_galery_post_galery';

    protected $fillable = ['id', 'caption', 'gambar', 'tanggal_kegiatan', 'status', 'type', 'agenda_id'];
}
