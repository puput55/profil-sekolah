<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    //
     protected $table = 'gurus';
     protected $primaryKey = 'id_guru';
     public $timestamps = false;
     protected $fillable = [
        'id_guru',
        'nama_guru',
        'nip',
        'mapel',
        'foto',
    ];
}
