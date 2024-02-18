<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan'; // Sesuaikan dengan nama tabel yang sesuai di database

    protected $fillable = [ 'nis', 'nama', 'kategori', 'isi_laporan', 'tanggal_laporan', 'alamat', 'status', 'foto'];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($laporan) {
            if (!$laporan->foto) {
                throw new \Exception('Field "foto" must be filled.');
            }
        });
    }
}