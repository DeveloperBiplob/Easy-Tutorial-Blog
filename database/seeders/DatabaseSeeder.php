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

        $this->call([
            WebsiteSeeder::class,
            CategorySeeder::class,
            AboutSeeder::class,
            TagSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(20)->create();

    }
}
