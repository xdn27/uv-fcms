<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostType extends Model
{
    use \Sushi\Sushi;

    public $incrementing = false;
    protected $rows = [
        ['id' => 'post', 'name' => 'Post', 'is_default' => 1, 'is_active' => 1],
        ['id' => 'portfolio', 'name' => 'Portfolio', 'is_default' => 0, 'is_active' => 1]
    ];
}
