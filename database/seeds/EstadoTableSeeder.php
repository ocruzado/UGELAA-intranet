<?php

use HelpDesk\Model\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('estado')->truncate();

        // ESTADOS TICKET
        Estado::create([
            'codigo' => '100',
            'id' => '1',
            'value' => 'Generado',
            'descripcion' => 'ticket generado por usuario',
        ]);

        Estado::create([
            'codigo' => '100',
            'id' => '2',
            'value' => 'Asignado',
            'descripcion' => 'ticket asignado a un personal del equipo de informatica',
        ]);

        Estado::create([
            'codigo' => '100',
            'id' => '3',
            'value' => 'Abierto',
            'descripcion' => 'ticket en atencion por parte de personal de informatica',
        ]);

        Estado::create([
            'codigo' => '100',
            'id' => '4',
            'value' => 'Cerrado',
            'descripcion' => 'ticket cuya atencion a finalizado por parte del personal de informatica',
        ]);

        Estado::create([
            'codigo' => '100',
            'id' => '5',
            'value' => 'Rechazado',
            'descripcion' => 'ticket rechazado por el equipo de informatica',
        ]);

    }
}
