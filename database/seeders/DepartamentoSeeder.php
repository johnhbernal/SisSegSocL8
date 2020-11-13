<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use Carbon\Carbon;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 91,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Amazonas'),
            'NOMBRE' => 'Amazonas',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 5,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Antioquia'),
            'NOMBRE' => 'Antioquia',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 81,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Arauca'),
            'NOMBRE' => 'Arauca',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 8,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Atlántico'),
            'NOMBRE' => 'Atlántico',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 11,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Bogotá D.C'),
            'NOMBRE' => 'Bogotá D.C',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 13,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Bolívar'),
            'NOMBRE' => 'Bolívar',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 15,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Boyacá'),
            'NOMBRE' => 'Boyacá',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 17,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Caldas'),
            'NOMBRE' => 'Caldas',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 18,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Caquetá'),
            'NOMBRE' => 'Caquetá',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 85,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Casanare'),
            'NOMBRE' => 'Casanare',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 19,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Cauca'),
            'NOMBRE' => 'Cauca',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 20,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Cesar'),
            'NOMBRE' => 'Cesar',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 27,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Chocó'),
            'NOMBRE' => 'Chocó',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 23,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Córdoba'),
            'NOMBRE' => 'Córdoba',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 25,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Cundinamarca'),
            'NOMBRE' => 'Cundinamarca',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 94,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Güainía'),
            'NOMBRE' => 'Güainía',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 95,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Guaviare'),
            'NOMBRE' => 'Guaviare',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 41,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Huila'),
            'NOMBRE' => 'Huila',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 44,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('La Guajira'),
            'NOMBRE' => 'La Guajira',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 47,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Magdalena'),
            'NOMBRE' => 'Magdalena',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 50,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Meta'),
            'NOMBRE' => 'Meta',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 52,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Nariño'),
            'NOMBRE' => 'Nariño',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 54,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Norte de Santander'),
            'NOMBRE' => 'Norte de Santander',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 86,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Putumayo'),
            'NOMBRE' => 'Putumayo',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 63,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Quindio'),
            'NOMBRE' => 'Quindio',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 66,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Risaralda'),
            'NOMBRE' => 'Risaralda',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 88,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('San Andrés y Providencia'),
            'NOMBRE' => 'San Andrés y Providencia',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 68,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Santander'),
            'NOMBRE' => 'Santander',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 70,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Sucre'),
            'NOMBRE' => 'Sucre',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 73,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Tolima'),
            'NOMBRE' => 'Tolima',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 76,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Valle del Cauca'),
            'NOMBRE' => 'Valle del Cauca',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 97,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Vaupés'),
            'NOMBRE' => 'Vaupés',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
       Departamento::create([
            'CODIGO_DEPARTAMENTO' => 99,
            'CODIGO_PAIS' => 169,
            // 'NOMBRE' => urlencode('Vichada'),
            'NOMBRE' => 'Vichada',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
      ]);
    }
}
