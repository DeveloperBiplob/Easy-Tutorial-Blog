<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'name', 'email', 'comment'];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_id');
    }
}
