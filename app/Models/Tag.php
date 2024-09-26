<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory; 

    public function posts()
    {
        return $this->morphByMany(Post::class, 'taggable');
    }

    public function videos()
    {
        return $this->morphByMany(Video::class, 'taggable');
    }
}
