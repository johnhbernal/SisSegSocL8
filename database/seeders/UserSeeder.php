<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([


         'name'=>'Prueba',
         'email'=>'Prueba@gmail.com',
         'password'=>bcrypt('123456789')


        ])->assignRole('Inscripto');


        User::factory(1000)->create();
    }
}
