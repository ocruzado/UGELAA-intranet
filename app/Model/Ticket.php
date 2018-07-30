<?php

namespace HelpDesk\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';

    protected $primaryKey = 'idTicket';

    protected $fillable = [
        'codigo',
        'idUsuario',
        'idArea',
        'idCategoria',
        'descripcion',
        'image',
        'estado',
    ];

//    public function getRouteKeyName()
//    {
//        return 'codigo';
//    }

    public static function generate_codigo()
    {
        $num = Ticket::whereDate('created_at', Carbon::now()->toDateString())->count() + 1;
        return Carbon::now()->format('Ymd') . str_pad($num, 3, '0', STR_PAD_LEFT);
    }
}
