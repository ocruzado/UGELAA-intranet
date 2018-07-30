<?php

namespace HelpDesk\Model;

use Illuminate\Database\Eloquent\Model;

class UsuarioAsignacion extends Model
{
    protected $table = 'usuario_asignacion';

    protected $primaryKey = 'idUsuarioAsignacion';

    protected $fillable = [
        'idUsuarioMain',
        'idUsuario',
    ];
}
