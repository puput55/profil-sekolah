<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    // Nama tabel di database
    protected $table = 'gurus';

    // Primary key tabel
    protected $primaryKey = 'id_guru';

    // Menonaktifkan timestamp otomatis (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_guru',
        'nama_guru',
        'nip',
        'mapel',
        'foto',
    ];
}
