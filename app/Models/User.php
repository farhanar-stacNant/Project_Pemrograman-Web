<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*Membuat Atribut yang Dapat Diisi Massal*/
    protected $fillable = [
        'name',
        'email',
        'role',
        'status',
        'password',
    ];

    /*Membuat Atribut yang Harus Disembunyikan*/
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*Membuat Atribut yang Harus Dirubah*/
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
