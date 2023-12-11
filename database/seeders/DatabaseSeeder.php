<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Student;
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
            'username' => 'ikramzaidann',
            'password' => Hash::make('password'),
            'role' => 'Admin'
        ]);
        
        Student::create([
            'nik' => '3216022007020020',
            'nisn' => '0023978634',
            'name' => 'IKRAM ZAIDAN WICAKSONO',
            'gender' => 'Laki-laki',
            'birthplace' => 'BEKASI',
            'birthdate' => '2002-07-20',
            'status' => 1
        ]);
    }
}
