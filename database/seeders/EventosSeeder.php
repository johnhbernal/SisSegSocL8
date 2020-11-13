<?php

namespace Database\Seeders;

use App\Models\Eventos;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eventos::create([
            'TITULO' => 'Prueba',
            'DESCRIPCION' => 'Prueba desde seeder ',
            'INICIO' => Carbon::now()->locale('es_CO'),
            'FIN' => Carbon::now()->locale('es_CO')->addMinutes(25),
            'COLOR_TEXTO' => '#ffffff',
            'COLOR_FONDO' => '#94ceca',
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);
    }
}
