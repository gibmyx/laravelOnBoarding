<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([PersonaSeeder::class]);
        $this->call([EstudianteSeeder::class]);
        $this->call([ProfesorSeeder::class]);
    }
}
