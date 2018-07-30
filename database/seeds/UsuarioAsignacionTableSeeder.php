<?php

use HelpDesk\Model\Usuario;
use HelpDesk\Model\UsuarioAsignacion;
use Illuminate\Database\Seeder;

class UsuarioAsignacionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('usuario_asignacion')->truncate();

        $usuario_igor = Usuario::where('email', 'igor')->first();
        $usuario_mpinzango = Usuario::where('email', 'mpinzango')->first();
        $usuario_acardenas = Usuario::where('email', 'acardenas')->first();

        UsuarioAsignacion::create([
            'idUsuarioMain' => $usuario_igor->idUsuario,
            'idUsuario' => $usuario_mpinzango->idUsuario,
        ]);

        UsuarioAsignacion::create([
            'idUsuarioMain' => $usuario_igor->idUsuario,
            'idUsuario' => $usuario_acardenas->idUsuario,
        ]);

    }
}
