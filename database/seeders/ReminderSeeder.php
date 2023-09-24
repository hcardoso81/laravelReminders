<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reminder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <25 ; $i++) { 
            $user = User::inRandomOrder()->first();

            // Crea un recordatorio utilizando la factory y el usuario seleccionado
            Reminder::factory()->create([
                'user_id' => $user->id,
            ]);
        }

    }
}
