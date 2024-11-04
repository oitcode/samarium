<?php

namespace Database\Seeders;

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
        /* Ask for name, email and password from terminal. */
        $userName = (string) readline('Name: ');
        $userEmail = (string) readline('Email: ');

        echo 'Password: ';
        system('stty -echo');
        $userPw = trim(fgets(STDIN));
        system('stty echo');
        echo "\n";

        DB::table('users')->insert([
            'name' => $userName,
            'email' => $userEmail,
            'password' => Hash::make($userPw),
            'role' => 'admin',
            'last_login_at' => Carbon::now(),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
