<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
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

        Genre::create([
            'name' => 'Open-world',
        ]);

        Genre::create([
            'name' => 'Simulator',
        ]);

        Genre::create([
            'name' => 'Multiplayer',
        ]);

        Genre::create([
            'name' => 'Singleplayer',
        ]);

        Genre::create([
            'name' => 'Crime',
        ]);

        Genre::create([
            'name' => 'Sci-fi',
        ]);

        Genre::create([
            'name' => 'Sports',
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

        Platform::create([
            'name' => 'Xbox Series X',
        ]);

        Game::create([
            'name' => 'Grand Theft Auto V',
            'publisher' => 'Rockstar Games',
            'release_date' => '2013-09-13'
        ]);

        Game::create([
            'name' => 'Red Dead Redemption 2',
            'publisher' => 'Rockstar Games',
            'release_date' => '2019-12-19'
        ]);

        Game::create([
            'name' => 'FIFA 23',
            'publisher' => 'Electronic Arts',
            'release_date' => '2022-09-27'
        ]);

        Game::create([
            'name' => 'Cyberpunk 2077',
            'publisher' => 'CD PROJEKT RED',
            'release_date' => '2020-12-10'
        ]);

        Game::create([
            'name' => 'Call of Duty®: Black Ops Cold War',
            'publisher' => 'Activision',
            'release_date' => '2020-11-13'
        ]);
    }
}
