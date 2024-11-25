<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\text;

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
        $name = text('Name:', required: true);
        $email = text('Email:', required: true);
        $password = text('Password:', required: true);

        User::factory()->create(compact('name', 'email', 'password'));
    }
}
