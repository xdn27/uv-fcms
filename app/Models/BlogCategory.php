<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    /** @use HasFactory<\Database\Factories\BlogCategoryFactory> */
    use HasFactory;

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
