<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Coordinador']);
        $role3 = Role::create(['name'=>'Usuario']);
        $role4 = Role::create(['name'=>'Inscripto']);

        Permission::create(['name'=>'home'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name'=>'EventoController.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name'=>'dataEvent'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name'=>'Calendar.view'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name'=>'Calendar.store'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name'=>'Calendar.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name'=>'Calendar.update'])->syncRoles([$role1,$role2,$role3,$role4]);



    }
}
