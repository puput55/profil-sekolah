<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Nama tabel di database
    protected $table = 'beritas';

    // Primary key tabel
    protected $primaryKey = 'id_berita';

    // Menonaktifkan timestamp otomatis (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'id_berita',
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'id_user',
    ];

    // Relasi berita ke user (penulis berita)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
