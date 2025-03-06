<?php

namespace Database\Seeders;

use App\Models\BlogPostMetaTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostMetaTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
