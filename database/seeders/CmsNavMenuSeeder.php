<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Webpage;

class CmsNavMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cmsNavMenuId = DB::table('cms_nav_menu')->insertGetId([
            'name' => 'Nav menu 1',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $aboutUsWebpage = Webpage::where('name', 'About us')->first();
        DB::table('cms_nav_menu_item')->insert([
            'name' => 'About us',
            'cms_nav_menu_id' => $cmsNavMenuId,
            'order' => 1,
            'type' => 'item',
            'webpage_id' => $aboutUsWebpage->webpage_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $productsWebpage = Webpage::where('name', 'Products')->first();
        DB::table('cms_nav_menu_item')->insert([
            'name' => 'Products',
            'cms_nav_menu_id' => $cmsNavMenuId,
            'order' => 2,
            'type' => 'item',
            'webpage_id' => $productsWebpage->webpage_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $calendarWebpage = Webpage::where('name', 'Calendar')->first();
        DB::table('cms_nav_menu_item')->insert([
            'name' => 'Calendar',
            'cms_nav_menu_id' => $cmsNavMenuId,
            'order' => 3,
            'type' => 'item',
            'webpage_id' => $calendarWebpage->webpage_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $noticeboardWebpage = Webpage::where('name', 'Noticeboard')->first();
        DB::table('cms_nav_menu_item')->insert([
            'name' => 'Noticeboard',
            'cms_nav_menu_id' => $cmsNavMenuId,
            'order' => 4,
            'type' => 'item',
            'webpage_id' => $noticeboardWebpage->webpage_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $galleryWebpage = Webpage::where('name', 'Gallery')->first();
        DB::table('cms_nav_menu_item')->insert([
            'name' => 'Gallery',
            'cms_nav_menu_id' => $cmsNavMenuId,
            'order' => 5,
            'type' => 'item',
            'webpage_id' => $galleryWebpage->webpage_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $contactUsWebpage = Webpage::where('name', 'Contact us')->first();
        DB::table('cms_nav_menu_item')->insert([
            'name' => 'Contact us',
            'cms_nav_menu_id' => $cmsNavMenuId,
            'order' => 6,
            'type' => 'item',
            'webpage_id' => $contactUsWebpage->webpage_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
