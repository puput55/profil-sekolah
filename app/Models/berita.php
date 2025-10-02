<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    //
    protected $table = 'beritas';
    protected $primaryKey = 'id_berita';
    public $timestamps = false;
    protected $fillable = [
        'id_berita',
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
