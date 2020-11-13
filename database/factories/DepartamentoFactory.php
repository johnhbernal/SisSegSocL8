<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pais;
use App\Models\Departamento;

class DepartamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'CODIGO_DEPARTAMENTO'  =>  function () {
                $value = $this->faker->unique()->numberBetween(00001, 99999);
                $exists = Departamento::where('CODIGO_DEPARTAMENTO', '=', $value);
                if ($exists === null) {
                    return $value;
                } else {

                    return $value = $this->faker->unique()->numberBetween(00001, 99999);
                }
            },
            'CODIGO_PAIS'       =>      function () {
                return Pais::inRandomOrder()->first()->CODIGO_PAIS;
            },
            'NOMBRE' => $this->faker->city
        ];
    }
}
