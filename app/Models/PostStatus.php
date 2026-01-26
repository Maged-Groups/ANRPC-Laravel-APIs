<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class PostStatus extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PostStatusFactory> */
    use HasFactory;

    
    // Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
