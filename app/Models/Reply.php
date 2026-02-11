<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends BaseModel 
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory, SoftDeletes;
}
