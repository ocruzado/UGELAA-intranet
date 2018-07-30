<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Http\Requests\StoreCategoriaRequest;
use HelpDesk\Http\Resources\CategoriaResource;
use HelpDesk\Model\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
        $this->middleware(['guest', 'role:admin']);
    }

    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(StoreCategoriaRequest $request)
    {
        $data = Categoria::find($request->idCategoria);

        if (!$data) {

            Categoria::create([
                'idCategoriaPadre' => $request->idCategoriaPadre,
                'nombre' => $request->nombre,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'registro creado correctamente'
            ]);

        } else {

            $data->idCategoriaPadre = $request->idCategoriaPadre;
            $data->nombre = $request->nombre;

            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'registro actualizado correctamente'
            ]);

        }
    }

    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json([
            'success' => true,
            'message' => 'registro eliminado correctamente'
        ]);
    }

     public function getCategoriaPadre()
    {
        return Categoria::select('idCategoria as value', 'nombre as text')->where('idCategoriaPadre', 0)->get();
    }

    public function getCategoria()
    {
        return DB::table('categoria as c')
            ->leftJoin('categoria as cp', 'c.idCategoriaPadre', '=', 'cp.idCategoria')
            ->selectRaw('c.idCategoria as value, if(cp.idCategoria is null, c.nombre, concat(cp.nombre," - ", c.nombre)) as text')
            ->get();
    }

}
