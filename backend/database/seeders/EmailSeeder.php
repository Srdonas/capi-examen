<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Email;
use App\Models\Contacto;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un email para cada contacto
        Contacto::all()->each(function ($contacto) {
            Email::factory()->create(['contacto_id' => $contacto->id]);
        });
    }
}
