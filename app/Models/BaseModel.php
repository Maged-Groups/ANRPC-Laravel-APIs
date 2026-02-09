<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $hidden = [
        // 'updated_at',
        // 'deleted_at',
    ];
}
