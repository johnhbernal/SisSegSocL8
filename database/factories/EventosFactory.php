<?php

namespace Database\Factories;

use App\Models\Eventos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class EventosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Eventos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $inicio = Carbon::now()->locale('es_CO');
        // $fin = $inicio->addDays(30);

        $starts_at = Carbon::parse($this->faker->dateTimeBetween(Carbon::now()->locale('es_CO'),Carbon::now()->locale('es_CO')->addDays(30)));

        $ends_at = Carbon::parse($this->faker->dateTimeBetween(Carbon::parse($starts_at->addMinutes($this->faker->numberBetween(25, 100))),Carbon::parse($starts_at->addMinutes($this->faker->numberBetween(101, 480)))));

        return [

            'TITULO' => $this->faker->text,
            'DESCRIPCION' => $this->faker->text,
            'INICIO' => $starts_at,
            'FIN' => $ends_at,
            'COLOR_TEXTO' => $this->faker->colorName,
            'COLOR_FONDO' => $this->faker->colorName,
        ];
    }
}
