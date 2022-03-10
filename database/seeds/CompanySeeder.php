<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
            'name' => 'Sports Nep',
            'tagline' => 'Shop by your team',
            'phone' => '4410000 | 9851010000',
            'email' => 'info@abc.inc',
            'address' => 'Baluwatar, Kathmandu, Nepal',
            'pan_number' => '605946000',

            'fb_link' => 'https://facebook.com',
            'insta_link' => 'https://instagram.com',

            'logo_image_path' => 'company/ATT4XNS5BZ9uT2ZSgHlGVEcdmvdePlI7ZEFuQPcM.png',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
