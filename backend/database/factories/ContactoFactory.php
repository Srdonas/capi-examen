<?php

namespace Database\Factories;

use App\Models\Contacto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoFactory extends Factory
{
    protected $model = Contacto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'notas' => $this->faker->sentence,
            'fecha_de_cumpleaños' => $this->faker->date,
            'pagina_web' => $this->faker->url,
            'empresa' => $this->faker->company,
        ];
    }
}
