<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'PHP',
            'slug' => 'PHP'
        ]);
        Category::create([
            'name' => 'LARAVEL',
            'slug' => 'LARAVEL'
        ]);
        Category::create([
            'name' => 'JS',
            'slug' => 'JS',
        ]);
        Category::create([
            'name' => 'PHYTHON',
            'slug' => 'PHYTHON',
        ]);
        Category::create([
            'name' => 'JQUERY',
            'slug' => 'JQUERY',
        ]);
    }
}
