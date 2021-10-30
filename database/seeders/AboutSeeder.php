<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'title' => 'About Our Blogs',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima velit, nemo delectus libero obcaecati dicta modi deleniti qui soluta voluptatum, officia optio! Ratione blanditiis totam doloremque eligendi fugit laborum quaerat.',
            'image' => 'storage/About-us/default.jpg'
        ]);
    }
}
