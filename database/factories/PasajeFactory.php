<?php

namespace Database\Factories;

use App\Models\Pasaje;
use App\Models\Vuelo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasajeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasaje::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'                => $this->faker->name(),
            'apellidos'             => $this->faker->name(),
            'vuelo_id'              => Vuelo::all()->random()->id,      
            'precio'                => $this->faker->numberBetween(5,500),
        ];
    }
}
