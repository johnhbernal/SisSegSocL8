<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Usuario;
use APP\Models\Eventos;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1000)->create();
        $this->call(PaisSeeder::class);
        // Pais::factory(220)->create();
        $this->call(DepartamentoSeeder::class);
        // Departamento::factory(100)->create();
        $this->call(MunicipioSeeder::class);
        // Municipio::factory(1500)->create();
        $this->call(UsuarioSeeder::class);
        // Usuario::factory(3000)->create();
        $this->call(EventosSeeder::class);
        Eventos::factory(150)->create();
    }
}
