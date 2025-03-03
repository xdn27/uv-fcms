<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostMeta extends Model
{
    /** @use HasFactory<\Database\Factories\BlogPostMetaFactory> */
    use HasFactory;

    // protected $primaryKey = ['post_id', 'key'];
    public $timestamps = false;
    
}
