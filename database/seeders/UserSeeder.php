<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hernán Federico Cardoso',
            'email' => 'hernan.f.cardoso@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
    }
}
