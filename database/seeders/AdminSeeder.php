<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::firstOrCreate([
            'name' => 'saugat',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('super-admin');
    }
}
