<?php

namespace HelpDesk\Model;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';

    protected $primaryKey = 'idEstado';

    protected $fillable = [
        'codigo',
        'id',
        'value',
        'descripcion',
    ];
}
