<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPostMetaTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::truncate();
        for($i=0; $i<10; $i++){
            $title = fake('id')->unique()->safeColorName();
            BlogCategory::factory()->create([
                'title' => ucwords($title),
                'slug' => Str::slug($title),
                'is_published' => 1
            ]);
        }

        BlogPostMetaTemplate::truncate();
        BlogPostMetaTemplate::factory()->create([
            'name' => 'Portfolio',
            'post_type' => 'portfolio',
            'meta' => [
                'Directory' => '',
                'Year' => '',
                'Type' => '',
                'Agency' => ''
            ]
        ]);
    }
}
