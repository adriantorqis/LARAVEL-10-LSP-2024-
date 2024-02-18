<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSelesai extends Model
{
    use HasFactory;

    protected $table = 'laporan_selesai';

    protected $fillable = [
        'nis',
        'nama',
        'kategori',
        'isi_laporan',
        'tanggal_laporan',
        'foto',
        'alamat',
    ];
}
