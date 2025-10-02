<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    //
    protected $table = 'galeris';
    protected $primaryKey = 'id_galeri';
    public $timestamps = false;
    protected $fillable = [
        'id_galeri',
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];
}
