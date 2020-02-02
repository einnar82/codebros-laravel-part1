<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = 'posts';
    protected $guarded = ['id'];
    // protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
