<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'title' => 'Easy Tutorial',
            'logo' => 'storage/Website/default.png',
            'phone' => '01643381009',
            'email' => 'biplobjabery@gmail.com',
            'address' => 'Uttru Badda, 1212',
            'facebook' => 'www.facebook.com',
            'twitter' => 'www.twitter.com',
            'behance' => 'www.behance.com',
            'linkdin' => 'www.linkdin.com',
            'footer' => 'Copy Right By DeveloperBiplob'
        ]);
    }
}
