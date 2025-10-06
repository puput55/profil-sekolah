<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    // Nama tabel di database
    protected $table = 'ekstrakulikulers';

    // Primary key tabel
    protected $primaryKey = 'id_ekskul';

    // Menonaktifkan timestamp otomatis (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_ekskul',
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
