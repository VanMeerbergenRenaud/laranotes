<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
             'name' => 'Renaud Vmb',
             'email' => 'renaud.vmb@gmail.com',
        ]);

        Note::factory(20)->create();

        User::factory()->create([
            'is_admin' => true,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);
    }
}

// Migrer la db au début : php artisan migrate
// Actualisé la db avec la commande : php artisan db:seed
// Faire tout : php artisan migrate --seed
