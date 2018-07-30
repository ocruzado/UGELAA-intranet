<?php

use HelpDesk\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->truncate();

        Role::create([
            'name' => 'admin',
            'description' => 'Administrador',
        ]);

        Role::create([
            'name' => 'supervisor',
            'description' => 'Supervisor',
        ]);

        Role::create([
            'name' => 'tecnico',
            'description' => 'Tecnico Informatico',
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'Usuario',
        ]);
    }
}
