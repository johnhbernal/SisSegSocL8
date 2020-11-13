<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'NUM_IDENTIFICACION' => '94061212',
            // 'LOGIN_ID' => 99999999,
            'TIPO_DOCUMENTO' => 'CC',
            'PRIMER_NOMBRE' => 'John',
            'SEGUNDO_NOMBRE' => 'Hawer',
            'PRIMER_APELLIDO' => 'Bernal',
            'SEGUNDO_APELLIDO' => 'Gonzalez',
            'FECHA_DE_NACIMIENTO' => '1982-12-16',
            'ESTADO' => 'A',
            'SEXO' => 'M',
            'ESTADO_CIVIL' => 'S',
            'VINCULO_LABORAL' => 'C',
            'DISCAPACIDAD' => false
        ]);
    }
}
