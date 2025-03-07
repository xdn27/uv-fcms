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
        $this->call([
            SettingSeeder::class,
            BlogPostMetaTemplateSeeder::class,
            PageSeeder::class,
            BlogCategorySeeder::class
        ]);
    }
}
