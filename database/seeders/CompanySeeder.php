<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'name' => 'Demo Company',
            'tagline' => 'Demo Company',
            'phone' => '0000000 | 0000000000',
            'email' => 'info@example.com',
            'address' => 'Demo street, Demo city, Demo country',
            'pan_number' => '000000000',
            'brief_description' =>
            'This is brief description of the demo company. This company is a unique company with unique mission, vision and objectives. Founded by management team which is dedicated and hard working, this company offers best services and products to you. It is continuously evolving to address diverse needs of customers and market.',

            'fb_link' => 'https://facebook.com',
            'insta_link' => 'https://instagram.com',

            'logo_image_path' => 'samarium-logo-1.png',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
