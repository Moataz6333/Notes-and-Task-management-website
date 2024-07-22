<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  \App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       User::create([
            'name' => 'Admin',
            'email' => 'Admin@laravel.com',
            'password'=>Hash::make('secret')
        ]);
       User::create([
            'name' => 'Admin2',
            'email' => 'Admin2@laravel.com',
            'password'=>Hash::make('secret2')
        ]);
    }
}
