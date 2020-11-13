<?php

namespace Database\Factories;

use App\Models\Pais;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pais::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'CODIGO_PAIS'  =>  function () {
                $value = $this->faker->unique()->numberBetween(00001, 99999);
                $paises = Pais::all();
                foreach ($paises as $row) {
                    $exists = Pais::where('CODIGO_PAIS', '=', $value);
                    if ($exists === null) {
                        return $value;
                    } else {
                        if ($row["CODIGO_PAIS"] === $value) {
                            return $this->faker->numberBetween($row["CODIGO_PAIS"] + 1, 99999);
                        } else {
                            return $value;
                        }
                    }
                }
            },
            'NOMBRE' => $this->faker->unique()->sentence(),
            'ISO'  =>  function () {
                $value = $this->faker->unique()->numberBetween(00001, 99999);
                $paises = Pais::all();
                foreach ($paises as $row) {
                    $exists = Pais::where('ISO', '=', $value);
                    if ($exists === null) {
                        return $value;
                    } else {
                        if ($row["ISO"] === $value) {
                            return $this->faker->numberBetween($row["ISO"] + 1, 99999);
                        } else {
                            return $value;
                        }
                    }
                }
            },
            'CODIGO_TELEFONICO'  =>  function () {
                $value = $this->faker->unique()->numberBetween(00001, 99999);
                $paises = Pais::all();
                foreach ($paises as $row) {
                    $exists = Pais::where('CODIGO_TELEFONICO', '=', $value);
                    if ($exists === null) {
                        return $value;
                    } else {
                        if ($row["CODIGO_TELEFONICO"] === $value) {
                            return $this->faker->numberBetween($row["CODIGO_TELEFONICO"] + 1, 99999);
                        } else {
                            return $value;
                        }
                    }
                }
            },
        ];
    }
}
