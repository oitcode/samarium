<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@oit.com.np',
            'password' => Hash::make('password'),
            'role' => 'admin',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
