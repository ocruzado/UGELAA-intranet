<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Http\Requests\StoreAreaRequest;
use HelpDesk\Http\Resources\AreaResource;
use HelpDesk\Model\Area;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
        $this->middleware(['guest', 'role:admin']);
    }

    public function index()
    {
        return AreaResource::collection(Area::all());
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(StoreAreaRequest $request)
    {
        $data = Area::find($request->idArea);

        if (!$data) {

            Area::create([
                'idAreaPadre' => $request->idAreaPadre,
                'nombre' => $request->nombre,
                'siglas' => $request->siglas,
                'descripcion' => $request->descripcion
            ]);

            return response()->json([
                'success' => true,
                'message' => 'registro creado correctamente'
            ]);

        } else {

            $data->idAreaPadre = $request->idAreaPadre;
            $data->nombre = $request->nombre;
            $data->siglas = $request->siglas;
            $data->descripcion = $request->descripcion;

            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'registro actualizado correctamente'
            ]);
        }
    }

    public function show(Area $area)
    {
        return new AreaResource($area);
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return response()->json([
            'success' => true,
            'message' => 'registro eliminado correctamente'
        ]);
    }

    public function getAreaPadre()
    {
        return Area::select('idArea as value', 'siglas as text')->where('idAreaPadre', 0)->get();
    }

    public function getArea()
    {
        return DB::table('area as a')
            ->leftJoin('area as ap', 'a.idAreaPadre', '=', 'ap.idArea')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('a.idArea', "if(ap.idArea is null, a.siglas, concat(ap.siglas,' - ', a.siglas)) as s")
            ->selectRaw('a.idArea as value, if(ap.idArea is null, a.siglas, concat(ap.siglas," - ", a.siglas)) as text')
            ->get();
    }

}
