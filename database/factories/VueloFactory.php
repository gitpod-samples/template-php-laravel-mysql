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
     *METER UPDATE,DELETE,ETC
     *github.com/invoiceninja
     * @return array
     */
    public function definition()
    {
        return [
            'codigo'                => $this->faker->iban(10),
            'origen'                => $this->faker->state(),
            'destino'               => $this->faker->state(),
            'fecha'                 => $this->faker->date(),
            'hora'                  => $this->faker->time,
            'piloto_id'             => Piloto::all()->random()->id,
            'created_at'            =>$this->facker->now(),
            'update_at'             =>$this->facker->now(),
            'delete_at'             =>$this->facker->now(),

         ];
    }
}
