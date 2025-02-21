<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'posts_id');
    }

    
}
