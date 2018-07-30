<?php

namespace HelpDesk\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';

    protected $primaryKey = 'idArea';

    protected $fillable = [
        'idAreaPadre',
        'nombre',
        'siglas',
        'descripcion',
    ];
}
