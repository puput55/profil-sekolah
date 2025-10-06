<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Nama tabel di database
    protected $table = 'galeris';

    // Primary key tabel
    protected $primaryKey = 'id_galeri';

    // Menonaktifkan timestamp otomatis (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_galeri',
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];
}
