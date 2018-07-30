<?php

use HelpDesk\Model\Role;
use HelpDesk\Model\Usuario;
use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuario')->truncate();

        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_supervisor = Role::where('name', 'supervisor')->first();
        $role_tecnico = Role::where('name', 'tecnico')->first();

        // ADMINISTRADORES
        $usuario_administrador = Usuario::create([
            'email' => 'admin',
            'password' => bcrypt('123'),
            'nombre' => 'Orry Nays',
            'apellido_paterno' => 'Cruzado',
            'apellido_materno' => 'Morey',
            'dni' => '46068754',
            'fecha_nacimiento' => '1989-06-15',
            'telefono' => '945543865',
            'correo' => 'ocruzado89@gmail.com',
        ]);
        $usuario_administrador->roles()->attach($role_admin);

        // USUARIOS
        $usuario_usuario = Usuario::create([
            'email' => 'usuario',
            'password' => bcrypt('123'),
            'nombre' => 'Nimia Giovany',
            'apellido_paterno' => 'Valdiviezo',
            'apellido_materno' => 'Manihuari',
            'dni' => '76905934',
            'fecha_nacimiento' => '1994-06-07',
            'telefono' => '929432427',
            'correo' => 'giovani_94genimis@hotmail.com',
        ]);
        $usuario_usuario->roles()->attach($role_user);

        // SUPERVISOR
        $usuario_supervisor = Usuario::create([
            'email' => 'igor',
            'password' => bcrypt('123'),
            'nombre' => 'Igor',
            'apellido_paterno' => 'del Aguila',
            'apellido_materno' => 'del Aguila',
            'dni' => '41197283',
            'fecha_nacimiento' => '1981-11-03',
            'telefono' => '958059470',
            'correo' => 'igordelaguila@hotmail.com',
        ]);
        $usuario_supervisor->roles()->attach($role_supervisor);

        // TECNICO
        $usuario_tecnico01 = Usuario::create([
            'email' => 'mpinzango',
            'password' => bcrypt('123'),
            'nombre' => 'Marko Antonio',
            'apellido_paterno' => 'Pizango',
            'apellido_materno' => 'Huansi',
            'dni' => '12345678',
            'fecha_nacimiento' => '1989-06-15',
            'telefono' => '945543865',
            'correo' => 'mpinzango@gmail.com',
        ]);
        $usuario_tecnico01->roles()->attach($role_tecnico);

        $usuario_tecnico02 = Usuario::create([
            'email' => 'acardenas',
            'password' => bcrypt('123'),
            'nombre' => 'Amanda',
            'apellido_paterno' => 'Cardenas',
            'apellido_materno' => 'Rios',
            'dni' => '87654321',
            'fecha_nacimiento' => '1989-06-15',
            'telefono' => '945543865',
            'correo' => 'acardenas@gmail.com',
        ]);
        $usuario_tecnico02->roles()->attach($role_tecnico);

        $usuario_tecnico03 = Usuario::create([
            'email' => 'tecnico',
            'password' => bcrypt('123'),
            'nombre' => 'tecnico',
            'apellido_paterno' => 'paterno',
            'apellido_materno' => 'materno',
            'dni' => '11223344',
            'fecha_nacimiento' => '1989-06-15',
            'telefono' => '945486215',
            'correo' => 'correo@ficticio.com',
        ]);
        $usuario_tecnico03->roles()->attach($role_tecnico);
    }
}