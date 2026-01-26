<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Post extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // Relationships
    public function comments()
    {
        return $this->hasMany(Comment::class); // join comments on comments.post_id = posts.id
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postStatus()
    {
        return $this->belongsTo(postStatus::class);
    }
}
