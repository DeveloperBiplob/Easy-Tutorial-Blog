<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
        ]);

        // \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(20)->create();

    }
}
