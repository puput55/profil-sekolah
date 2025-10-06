<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Menggunakan trait HasFactory untuk factory pembuatan data
    use HasFactory;

    // Nama tabel di database
    protected $table = 'users';

    // Primary key tabel
    protected $primaryKey = 'id_user';

    // Tipe primary key
    protected $keyType = 'int';

    // Kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    // Relasi User ke Berita (satu user bisa memiliki banyak berita)
    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_user');
    }

    // Kolom yang disembunyikan saat serialisasi, misal untuk API
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Contoh pengaturan cast (dikomentari, bisa diaktifkan jika perlu)
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }
}
