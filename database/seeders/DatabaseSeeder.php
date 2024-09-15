<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'hedar',
        //     'email' => 'hedar@gmail.com',
        //     'password' => Hash::make('password'),
        //     'roles' => 'ADMIN',
        //     'phone' => '1234567890',
        // ]);

        // User::factory(10)->create();

        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            ProductSeeder::class
        ]);
        
    }

}
