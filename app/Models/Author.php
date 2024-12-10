<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'user_id', // Foreign key to the user table
        'bio',
        'contact',
        'image',
    ];

    // The user that owns the author
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // The posts written by this author
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
   
}
