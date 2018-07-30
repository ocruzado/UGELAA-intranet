<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Enum\TicketStates;
use Illuminate\Support\Facades\DB;

class TicketAdminController extends Controller
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
            ->where([
                ['et.codigo', '=', TicketStates::_key],
                ['t.estado', '=', TicketStates::Generado],
            ])
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
        return view('ticket.admin');
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
