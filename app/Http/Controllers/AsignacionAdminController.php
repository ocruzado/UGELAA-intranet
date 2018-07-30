<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Http\Requests\StoreAsignacionAdminRequest;
use HelpDesk\Model\UsuarioAsignacion;

class AsignacionAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest', 'role:admin']);
    }

    public function create()
    {
        return view('asignacion.create');
    }

    public function store(StoreAsignacionAdminRequest $request)
    {

        UsuarioAsignacion::create([
            'idUsuarioMain' => $request->idUsuarioSupervisor,
            'idUsuario' => $request->idUsuario,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'registro creado correctamente'
        ]);

    }

    public function destroy(StoreAsignacionAdminRequest $request)
    {
        UsuarioAsignacion::where([
            'idUsuarioMain' => $request->idUsuarioSupervisor,
            'idUsuario' => $request->idUsuario,
        ])->delete();

        return response()->json([
            'success' => true,
            'message' => 'registro eliminado correctamente'
        ]);
    }

}
