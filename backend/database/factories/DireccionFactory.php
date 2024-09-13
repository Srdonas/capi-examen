<?php

namespace Database\Factories;

use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    protected $model = Direccion::class;

    public function definition()
    {
        return [
            'numero' => $this->faker->biasedNumberBetween($min = 1, $max = 2040, $function = 'sqrt'),
            'calle' => $this->faker->streetAddress,
            'ciudad' => $this->faker->city,
            'estado' => $this->faker->state,
            'codigo_postal' => $this->faker->postcode,
            'pais' => $this->faker->country,
        ];
    }
}
