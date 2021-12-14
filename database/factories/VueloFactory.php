<?php

namespace Database\Factories;

use App\Models\Vuelo;
use App\Models\Piloto;
use Illuminate\Database\Eloquent\Factories\Factory;

class VueloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vuelo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo'    => $this->faker->bothify('?###??##??'),
            'origen' => $this->faker->state(),
            'destino' => $this->faker->state(),
            'fecha'  => $this->faker->date(),
            'hora' => $this->faker->time($format = 'H:i', $max = 'now'),
            'piloto_id' => Piloto::all()->random()->id,
        ];
    }
}
