<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ekstrakulikuler extends Model
{
    //
    protected $table = 'ekstrakulikulers';
    protected $primaryKey = 'id_ekskul';
    public $timestamps = false;
    protected $fillable = [
        'id_ekskul',
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
