<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Demo Company',
            'tagline' => 'Demo Company',
            'phone' => '0000000 | 0000000000',
            'email' => 'info@example.com',
            'address' => '---------, ---------, -----',
            'pan_number' => '000000000',

            'fb_link' => 'https://facebook.com',
            'insta_link' => 'https://instagram.com',

            'logo_image_path' => 'company/ATT4XNS5BZ9uT2ZSgHlGVEcdmvdePlI7ZEFuQPcM.png',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
