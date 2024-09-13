<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Direccion;
use App\Models\Contacto;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear una dirección para cada contacto
        Contacto::all()->each(function ($contacto) {
            Direccion::factory()->create(['contacto_id' => $contacto->id]);
        });
    }
}
