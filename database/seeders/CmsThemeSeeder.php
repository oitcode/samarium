<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CmsThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cms_theme')->insert([
            'name' => 'Theme 1',
            'ascent_bg_color' => '#123',
            'ascent_text_color' => 'white',
            'top_header_bg_color' => 'white',
            'top_header_text_color' => '#123',
            'nav_menu_bg_color' => '#345',
            'nav_menu_text_color' => 'white',
            'footer_bg_color' => 'white',
            'footer_text_color' => '#123',
            'heading_color' => '#123',
            'hero_image_path' => 'samarium-logo-1.png',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
