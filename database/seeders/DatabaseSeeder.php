<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(WebpageSeeder::class);
        $this->call(CmsNavMenuSeeder::class);
        $this->call(CmsThemeSeeder::class);
        $this->call(AccountingSeeder::class);
        $this->call(TeamSeeder::class);
    }
}
