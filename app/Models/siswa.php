<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // Nama tabel di database
    protected $table = 'siswas';

    // Primary key tabel
    protected $primaryKey = 'id_siswa';

    // Menonaktifkan timestamp otomatis (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_siswa',
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tahun_masuk',
    ];
}
