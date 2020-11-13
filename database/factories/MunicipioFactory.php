<?php

namespace Database\Factories;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Municipio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CODIGO_MUNICIPIO'  =>  function () {
                $value = $this->faker->unique()->numberBetween(00001, 99999);
                $exists = Municipio::where('CODIGO_MUNICIPIO', '=', $value);
                if ($exists === null) {
                    return $value;
                } else {

                    $newValue = $this->faker->unique()->numberBetween(00001, 99999);

                    $newExists = Municipio::where('CODIGO_MUNICIPIO', '=', $newValue);

                    if ($newExists === null) {

                        return $newValue;
                    }else{
                        return $this->faker->unique()->numberBetween(00001, 99999);
                    }
                }
            },
            'CODIGO_DEPARTAMENTO' => function () {
                return Departamento::inRandomOrder()->first()->CODIGO_DEPARTAMENTO;
            },
            'NOMBRE' => $this->faker->city,
            'REGION' => $this->faker->city,
        ];
    }
}
