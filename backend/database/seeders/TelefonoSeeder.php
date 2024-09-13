<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Telefono;
use App\Models\Contacto;

class TelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un teléfono para cada contacto
        Contacto::all()->each(function ($contacto) {
            Telefono::factory()->create(['contacto_id' => $contacto->id]);
        });
    }
}
