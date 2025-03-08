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
        'metas' => 'array',
        'post_at' => 'date'
    ];

    public $metas;

    protected function metas(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => [],
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, app(BlogPostCategory::class)->getTable());
    }

    public function stringCategory($column = 'title', $separtor = ', '): string
    {
        return $this->categories->pluck($column)->implode($separtor);
    }

    public function postMeta(): HasMany
    {
        return $this->hasMany(BlogPostMeta::class, 'post_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
