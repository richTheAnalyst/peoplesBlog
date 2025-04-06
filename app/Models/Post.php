<?php

namespace App\Models;

//use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'title' ,
         'content',
         'image',
         'user_id',
         'author_id'
     ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    
}
