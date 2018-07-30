<?php

namespace HelpDesk\Http\Controllers;

use Carbon\Carbon;
use HelpDesk\Enum\TicketStates;
use HelpDesk\Http\Requests\StoreTicketUserRequest;
use HelpDesk\Model\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TicketUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return DB::table('ticket as t')
            ->Join('area as a', 't.idArea', '=', 'a.idArea')
            ->Join('categoria as c', 't.idCategoria', '=', 'c.idCategoria')
            ->Join('usuario as u', 't.idUsuario', '=', 'u.idUsuario')
            ->Join('estado as et', 't.estado', '=', 'et.id')
            ->where('et.codigo', '=', '100')
            ->select(
                't.idTicket',
                't.codigo',
                'u.idUsuario',
                'u.email',
                'a.idArea',
                'a.siglas',
                'c.idCategoria',
                'c.nombre',
                't.descripcion',
                't.image',
                't.estado',
                'et.value')
            ->get();
    }

    public function create()
    {
        return view('ticket.new');
    }

    public function store(StoreTicketUserRequest $request)
    {
        $data = new Ticket();
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $file_extension = $image->getClientOriginalExtension();
            $file_name = uniqid() . '_' . time() . '.' . $file_extension;

            $image->move(public_path('upload'), $file_name);
            $data->image = $file_name;
        }

        $data->codigo = Ticket::generate_codigo();
        $data->idUsuario = Auth::user()->idUsuario;
        $data->idArea = $request->idArea;
        $data->idCategoria = $request->idCategoria;
        $data->descripcion = $request->descripcion;
        $data->estado = TicketStates::Generado;

        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'registro creado correctamente'
        ]);
    }

    public function show(Ticket $ticket)
    {
        $result = DB::table('ticket as t')
            ->Join('area as a', 't.idArea', '=', 'a.idArea')
            ->Join('categoria as c', 't.idCategoria', '=', 'c.idCategoria')
            ->Join('usuario as u', 't.idUsuario', '=', 'u.idUsuario')
            ->Join('estado as et', 't.estado', '=', 'et.id')
            ->where([
                ['et.codigo', '=', '100'],
                ['t.idTicket', '=', $ticket->idTicket]
            ])
            ->select(
                't.idTicket',
                't.codigo',
                'u.idUsuario',
                'u.email',
//                'u.nombre',
//                'u.apellido_paterno',
//                'u.apellido_materno',
//                'u.dni',
//                'u.correo',


                'a.idArea',
                'a.siglas',

                'c.idCategoria',
                'c.nombre',

                't.descripcion',
                't.image',
                't.created_at',
                't.estado',

                'et.value')
            ->first();

//        $result->created_at = Carbon::now()->format('Ymd');
//        $result->image_url = $result->image ? public_path('upload') . '/' . $result->image : null;

        $create_at = new Carbon($result->created_at);
//        Carbon::setLocale('es');
        $result->created_at_fecha = $create_at->toDateTimeString();
//        $result->created_at_fecha = $create_at->toDayDateTimeString();
//        $result->created_at_fecha_3 = $create_at->format('jS F Y h:i:s A');
//        $result->created_at_fecha_4 = $create_at->format('%d %B %Y');
//        $result->idioma = Carbon::getLocale();
        $result->created_at_diff = $create_at->diffForHumans();

        return Response::json($result);
    }
}
