<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Llamar a los seeders que hayas creado
        $this->call([
            ContactoSeeder::class,
            DireccionSeeder::class,
            EmailSeeder::class,
            TelefonoSeeder::class,
        ]);
    }
}
