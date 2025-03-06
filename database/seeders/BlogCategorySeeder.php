<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::factory()->create([
            'type' => 'post',
            'title' => 'Activity',
            'slug' => 'activity',
        ]);

        BlogCategory::factory()->create([
            'type' => 'post',
            'title' => 'Religion',
            'slug' => 'religion',
        ]);

        BlogCategory::factory()->create([
            'type' => 'post',
            'title' => 'Politics',
            'slug' => 'politics',
        ]);


        // -----


        BlogCategory::factory()->create([
            'type' => 'portfolio',
            'title' => 'Web Design',
            'slug' => 'web-design',
        ]);

        BlogCategory::factory()->create([
            'type' => 'portfolio',
            'title' => 'Branding',
            'slug' => 'branding',
        ]);

        BlogCategory::factory()->create([
            'type' => 'portfolio',
            'title' => 'Logo',
            'slug' => 'logo',
        ]);
    }
}
