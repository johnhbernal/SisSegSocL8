<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Pais::create([
            'CODIGO_PAIS' => 169,
            'NOMBRE' => urlencode('Colombia'),
            'ISO' => 'CO',
            'CODIGO_TELEFONICO' => 57,
            'created_by' => 'admin',
            'created_at' => Carbon::now()
        ]);

        // Pais::factory(220)->create();
    }
}
