<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            cache()->forget("settings_group_{$model->group}");
        });

        static::updated(function ($model) {
            cache()->forget("settings_group_{$model->group}");
        });
    }

    public static function getByGroup($group)
    {
        return cache()->remember("settings_group_{$group}", 24 * 60, function () use ($group) {
            return self::where('group', $group)->get()->pluck('content', 'code');
        });
    }
}
