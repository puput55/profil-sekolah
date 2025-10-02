<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    //
    protected $table = 'profil_sekolahs';
    protected $primaryKey ='id_profil';
    public $timestamps = false;
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
