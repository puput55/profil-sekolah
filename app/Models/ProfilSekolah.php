<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    // Nama tabel di database
    protected $table = 'profil_sekolahs';

    // Primary key tabel
    protected $primaryKey = 'id_profil';

    // Menonaktifkan timestamp otomatis (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_profil',
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
