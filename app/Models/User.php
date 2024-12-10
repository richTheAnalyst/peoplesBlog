<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'is_admin',  // To identify admin users
        'email',
        'phone',
        'bio',
        'image',
        'password',
    ];

    public function author()
    {
        return $this->hasOne(Author::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    
    public function isAdmin()
    {
        return $this->is_admin;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
