<?php

use HelpDesk\Model\Categoria;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categoria')->truncate();

        Categoria::create([
            'nombre' => 'Internet',
        ]);

        Categoria::create([
            'nombre' => 'Impresora',
        ]);

        Categoria::create([
            'nombre' => 'Equipo de Computo',
        ]);
    }
}
