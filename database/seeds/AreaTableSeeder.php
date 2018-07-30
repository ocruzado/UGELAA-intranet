<?php

use HelpDesk\Model\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('area')->truncate();

        Area::create([
            'nombre' => 'ÓRGANO DE CONTROL INSTITUCIONAL',
            'siglas' => 'OCI',
            'descripcion' => 'Descripción Órgano de control institucional',
        ]);

        Area::create([
            'nombre' => 'DIRECCIÓN',
            'siglas' => 'Dirección',
            'descripcion' => 'Descripción de Dirección',
        ]);

        Area::create([
            'nombre' => 'CONSEJO PARTICIPATIVO LOCAL DE EDUCACIÓN',
            'siglas' => 'COPALE',
            'descripcion' => 'Descripción de Consejo Participativo Local de Educación',
        ]);

        $are_administracion = Area::create([
            'nombre' => 'AREA DE ADMINISTRACION',
            'siglas' => 'Administración',
            'descripcion' => 'Descripción Area de Administración',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de Contabilidad',
            'siglas' => 'Eq. Contabilidad',
            'descripcion' => 'Descripción Equipo de Contabilidad',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de Tesoreria',
            'siglas' => 'Eq. Tesoreria',
            'descripcion' => 'Descripción Equipo de Tesoreria',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de Logística',
            'siglas' => 'Eq. Logística',
            'descripcion' => 'Descripción Equipo de Logística',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de RR.HH.',
            'siglas' => 'Eq. RR.HH.',
            'descripcion' => 'Descripción Equipo de RR.HH.',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de Remuneraciones, Pensiones e Informática',
            'siglas' => 'ERPI',
            'descripcion' => 'Descripción Equipo de Remuneraciones, Pensiones e Informática',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de Bien Social',
            'siglas' => 'Eq. Bien Social',
            'descripcion' => 'Descripción Equipo de Bien Social',
        ]);

        Area::create([
            'idAreaPadre' => $are_administracion->idArea,
            'nombre' => 'Equipo de Control Patrimonial',
            'siglas' => 'Eq. Control Patrimonial',
            'descripcion' => 'Descripción Equipo de Control Patrimonial',
        ]);

        Area::create([
            'nombre' => 'AREA DE ASESORIA JURÍDICA',
            'siglas' => 'Asesoria Jurídica',
            'descripcion' => 'Descripción del Asesoria Jurídica',
        ]);

    }
}
