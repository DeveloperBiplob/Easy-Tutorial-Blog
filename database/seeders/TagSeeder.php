<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'PHP',
            'slug' => 'PHP'
        ]);

        Tag::create([
            'name' => 'Js',
            'slug' => 'js'
        ]);

        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel'
        ]);

        Tag::create([
            'name' => 'Phython',
            'slug' => 'phython'
        ]);

    }
}
