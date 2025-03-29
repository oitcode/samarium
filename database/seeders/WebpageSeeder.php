<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('webpage')->insert([
            'name' => 'Home',
            'permalink' => '/home',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage')->insert([
            'name' => 'About us',
            'permalink' => '/about-us',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage')->insert([
            'name' => 'Products',
            'permalink' => '/products',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage')->insert([
            'name' => 'Calendar',
            'permalink' => '/calendar',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage')->insert([
            'name' => 'Noticeboard',
            'permalink' => '/noticeboard',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage')->insert([
            'name' => 'Gallery',
            'permalink' => '/gallery',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage')->insert([
            'name' => 'Contact us',
            'permalink' => '/contact-us',
            'visibility' => 'public',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('webpage_category')->insert([
            'name' => 'Notice',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
