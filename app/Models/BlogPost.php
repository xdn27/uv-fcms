<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogPost extends Model
{
    /** @use HasFactory<\Database\Factories\BlogPostFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'title',
        'slug',
        'post_at',
        'banner',
        'summary',
        'body_html',
        'body_json',
        'is_using_builder',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'body_json' => 'array',
        'metas' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, app(BlogPostCategory::class)->getTable());
    }

    public function metas(): HasMany
    {
        return $this->hasMany(BlogPostMeta::class, 'post_id', 'id');
    }
}
