<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
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
        for($i=0; $i<10; $i++){
            $title = fake('id')->colorName();
            BlogCategory::factory()->create([
                'title' => ucwords($title),
                'slug' => Str::slug($title),
                'is_published' => 1
            ]);
        }
    }
}
