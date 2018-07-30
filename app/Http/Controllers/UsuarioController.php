<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Http\Requests\StoreUsuarioRequest;
use HelpDesk\Http\Resources\UsuarioResource;
use HelpDesk\Model\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
        $this->middleware(['guest', 'role:admin']);
    }

    public function index()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(StoreUsuarioRequest $request)
    {
        $data = Usuario::find($request->idUsuario);

        if (!$data) {

            Usuario::create([
                'email' => $request->dni,
                'idArea' => $request->idArea,
                'password' => bcrypt($request->dni),
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'dni' => $request->dni,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'registro creado correctamente'
            ]);

        } else {

            $data->idArea = $request->idArea;
            $data->nombre = $request->nombre;
            $data->apellido_paterno = $request->apellido_paterno;
            $data->apellido_materno = $request->apellido_materno;
            $data->dni = $request->dni;
            $data->fecha_nacimiento = $request->fecha_nacimiento;
            $data->telefono = $request->telefono;
            $data->correo = $request->correo;

            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'registro actualizado correctamente'
            ]);
        }
    }

    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return response()->json([
            'success' => true,
            'message' => 'registro eliminado correctamente'
        ]);
    }

    public function show_supervisor()
    {
        return DB::table('usuario as u')
            ->join('role_usuario as ru', 'u.idUsuario', '=', 'ru.usuario_idUsuario')
            ->join('role as r', function ($join) {
                $join->on('ru.role_idRole', '=', 'r.idRole')->where('r.name', '=', 'supervisor');
            })
            ->select('u.idUsuario', 'u.nombre', 'u.apellido_paterno', 'u.apellido_materno', 'u.email', 'u.dni')
            ->get();
    }

    public function show_asignado(Usuario $usuario)
    {
        return DB::table('usuario as u')
            ->join('usuario_asignacion as ua', 'u.idUsuario', '=', 'ua.idUsuario')
            ->select('u.idUsuario', 'u.nombre', 'u.apellido_paterno', 'u.apellido_materno', 'u.email', 'u.dni')
            ->where('ua.idUsuarioMain', '=', $usuario->idUsuario)
            ->get();
    }

    public function show_no_asignado()
    {
        return DB::table('usuario as u')
            ->join('role_usuario as ru', 'u.idUsuario', '=', 'ru.usuario_idUsuario')
            ->join('role as r', function ($join) {
                $join->on('ru.role_idRole', '=', 'r.idRole')->where('r.name', '=', 'tecnico');
            })
            ->leftJoin('usuario_asignacion as ua', 'u.idUsuario', '=', 'ua.idUsuario')
            ->select('u.idUsuario', 'u.nombre', 'u.apellido_paterno', 'u.apellido_materno', 'u.email', 'u.dni')
            ->whereNull('ua.idUsuario')
            ->get();
    }

}
