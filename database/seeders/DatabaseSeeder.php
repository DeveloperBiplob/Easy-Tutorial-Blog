<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Biplob Jabery',
            'email' => 'biplob@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => Carbon::now()
        ]);

        AboutUs::create([
            'title' => 'About Our Blogs',
            'description' => Str::random(1000),
            'image' => 'storage/About-us/default.png'
        ]);

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

        $this->call([
            WebsiteSeeder::class,
            CategorySeeder::class,
        ]);

        for($i = 1; $i<=20; $i++){
            Post::create([
                'user_id' => 1,
                'category_id' => rand(1, 5),
                'title' => Str::random(10),
                'slug' => Str::random(10),
                'image' => 'storage/Post/defalut.png',
                'description' => Str::random(100)
            ]);
        }

        // \App\Models\User::factory(10)->create();
        // \App\Models\Post::factory(20)->create();

    }
}
