<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // for ($i = 1; $i <= 250; $i++) {
        //     $iadefaults[] = $this->faker->unique()->word();
        // }
        return [


            // 'CONS_USUARIO' => $this->faker->unique()->numberBetween(001, 999),
            'NUM_IDENTIFICACION' => $this->faker->unique()->numberBetween(1000000, 999999999),
            // 			'LOGIN_ID',
            'TIPO_DOCUMENTO' => $this->faker->randomElement($array = array ('SC','CD','PA','CE', 'CC', 'TI', 'RC', 'CN')),
            'PRIMER_NOMBRE' => $this->faker->unique()->sentence(),
            'PRIMER_APELLIDO' => $this->faker->unique()->sentence(),
            'SEGUNDO_NOMBRE' => $this->faker->unique()->sentence(),
            'SEGUNDO_APELLIDO' => $this->faker->unique()->sentence(),

            'FECHA_DE_NACIMIENTO' => $this->faker->dateTime(),

            'ESTADO'  => $this->faker->randomElement($array = array ('A', 'I', 'M', 'D')),
            // 'SEXO' => $this->faker->name($gender = null|'M'|'F'),
            'SEXO'  => $this->faker->randomElement($array = array ('M', 'F')),
            'GRUPO_SANGUINEO' => $this->faker->randomElement($array = array ('A', 'B', 'O', 'AB')),
            'FACTOR_RH' => $this->faker->randomElement($array = array ('+', '-')),
            'ESTADO_CIVIL' => $this->faker->randomElement($array = array ('S', 'P', 'U', 'E', 'C', 'D', 'V')),
            'VINCULO_LABORAL' => $this->faker->randomElement($array = array ('C', 'B')),
            'DISCAPACIDAD' => $this->faker->randomElement($array = array ('1', '0')),
            'TIPO_DISCAPACIDAD' => $this->faker->randomElement($array = array ('F', 'N', 'M')),
            'CONDICION_DISCAPACIDAD' => $this->faker->randomElement($array = array ('T', 'P')),
            'ETNIA' => $this->faker->randomElement($array = array ('01', '02', '03', '04', '05')),

        ];
    }
}
