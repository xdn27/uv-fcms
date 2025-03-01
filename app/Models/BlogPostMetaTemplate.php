<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostMetaTemplate extends Model
{
    protected $casts = [
        'meta' => 'array'
    ];
}
