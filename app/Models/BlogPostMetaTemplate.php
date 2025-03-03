<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostMetaTemplate extends Model
{
    use HasFactory;
    
    protected $casts = [
        'meta' => 'array'
    ];

    public function postType()
    {
        return $this->belongsTo(BlogPostType::class, 'post_type', 'id');
    }
}
