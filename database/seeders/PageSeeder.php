<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory()->create([
            'user_id' => 0,
            'type' => 'landing',
            'title' => 'Home',
            'slug' => 'home',
            'is_using_builder' => 1,
            'is_published' => 1
        ]);

        Page::factory()->create([
            'user_id' => 0,
            'type' => 'about',
            'title' => 'About',
            'slug' => 'about',
            'is_using_builder' => 1,
            'is_published' => 1
        ]);

        Page::factory()->create([
            'user_id' => 0,
            'type' => 'portfolio',
            'title' => 'Portfolio',
            'slug' => 'portfolio',
            'is_using_builder' => 1,
            'is_published' => 1
        ]);

        Page::factory()->create([
            'user_id' => 0,
            'type' => 'blog',
            'title' => 'Journal',
            'slug' => 'journal',
            'is_using_builder' => 1,
            'is_published' => 1
        ]);

        Page::factory()->create([
            'user_id' => 0,
            'type' => 'contact',
            'title' => 'Contact',
            'slug' => 'contact',
            'is_using_builder' => 1,
            'is_published' => 1
        ]);
    }
}
