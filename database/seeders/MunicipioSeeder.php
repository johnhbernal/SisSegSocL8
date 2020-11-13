<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipio::create([
            'CODIGO_MUNICIPIO' => 020,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Alcalá' ),
            'NOMBRE' => 'Alcalá',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 036,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Andalucía' ),
            'NOMBRE' =>  'Andalucía',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 041,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Ansermanuevo' ),
            'NOMBRE' =>  'Ansermanuevo',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 054,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Argelia' ),
            'NOMBRE' =>  'Argelia',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 100,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Bolívar' ),
            'NOMBRE' => 'Bolívar',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 109,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Buenaventura' ),
            'NOMBRE' =>  'Buenaventura',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 111,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Guadalajara de Buga' ),
            'NOMBRE' =>  'Guadalajara de Buga',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 113,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Bugalagrande' ),
            'NOMBRE' =>  'Bugalagrande',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 122,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Caicedonia' ),
            'NOMBRE' => 'Caicedonia',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 126,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Calima (Darién)' ),
            'NOMBRE' => 'Calima (Darién)',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 001,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Santiago de Calí' ),
            'NOMBRE' =>  'Santiago de Calí',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 130,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Candelaria' ),
            'NOMBRE' =>  'Candelaria',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 147,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Cartago' ),
            'NOMBRE' =>  'Cartago',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 233,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Dagua' ),
            'NOMBRE' =>  'Dagua',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 246,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'El Cairo' ),
            'NOMBRE' => 'El Cairo',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 248,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'El Cerrito' ),
            'NOMBRE' =>  'El Cerrito',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 250,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'El Dovio' ),
            'NOMBRE' =>  'El Dovio',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 243,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'El Águila' ),
            'NOMBRE' => 'El Águila',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 275,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Florida' ),
            'NOMBRE' => 'Florida',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 306,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Ginebra' ),
            'NOMBRE' =>  'Ginebra',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 318,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Guacarí' ),
            'NOMBRE' => 'Guacarí',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 364,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'Jamundí' ),
            'NOMBRE' =>  'Jamundí',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 377,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'La Cumbre' ),
            'NOMBRE' => 'La Cumbre',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 400,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode ( 'La Unión' ),
            'NOMBRE' => 'La Unión',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 403,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('La Victoria'),
            'NOMBRE' => 'La Victoria',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 497,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Obando'),
            'NOMBRE' => 'Obando',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 520,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Palmira'),
            'NOMBRE' => 'Palmira',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 563,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Pradera'),
            'NOMBRE' => 'Pradera',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 606,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Restrepo'),
            'NOMBRE' => 'Restrepo',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 616,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Riofrío'),
            'NOMBRE' => 'Riofrío',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 622,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Roldanillo'),
            'NOMBRE' => 'Roldanillo',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 670,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('San Pedro'),
            'NOMBRE' => 'San Pedro',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 736,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Sevilla'),
            'NOMBRE' => 'Sevilla',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 823,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Toro'),
            'NOMBRE' => 'Toro',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 828,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Trujillo'),
            'NOMBRE' => 'Trujillo',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 834,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Tulúa'),
            'NOMBRE' => 'Tulúa',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 845,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Ulloa'),
            'NOMBRE' => 'Ulloa',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 863,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Versalles'),
            'NOMBRE' => 'Versalles',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 869,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Vijes'),
            'NOMBRE' => 'Vijes',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 890,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Yotoco'),
            'NOMBRE' => 'Yotoco',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 892,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Yumbo'),
            'NOMBRE' => 'Yumbo',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
        Municipio::create([
            'CODIGO_MUNICIPIO' => 895,
            'CODIGO_DEPARTAMENTO' => 76,
            // 'NOMBRE' => urlencode('Zarzal'),
            'NOMBRE' => 'Zarzal',
            'REGION' => 'Región Pacífico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
    }
}
