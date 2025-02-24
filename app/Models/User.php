<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword; // Tambahkan jika ingin reset password

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword; // Tambahkan CanResetPassword jika diperlukan

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ // Perbaikan: `protected function casts()` diubah menjadi `protected $casts`
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
