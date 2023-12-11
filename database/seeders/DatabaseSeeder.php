<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false
        ]);

        Genre::create([
            'name' => 'FPS',
        ]);

        Genre::create([
            'name' => 'RPG',
        ]);

        Genre::create([
            'name' => 'Action',
        ]);

        Genre::create([
            'name' => 'Adventure',
        ]);

        Genre::create([
            'name' => 'Arcade',
        ]);

        Platform::create([
            'name' => 'Playstation 4',
        ]);

        Platform::create([
            'name' => 'Playstation 5',
        ]);

        Platform::create([
            'name' => 'Xbox One',
        ]);
    }
}
