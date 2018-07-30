<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            UsuarioTableSeeder::class,
            AreaTableSeeder::class,
            CategoriaTableSeeder::class,
            EstadoTableSeeder::class,
            UsuarioAsignacionTableSeeder::class,
        ]);
    }
}
