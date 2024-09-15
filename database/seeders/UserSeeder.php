<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'miqdad',
            'email' => 'miqdad@gmail.com',
            'password' => Hash::make('12345678'),
            'roles' => 'ADMIN',
            'phone' => '1234567890',
        ]);

        User::factory(10)->create();
    }
}
