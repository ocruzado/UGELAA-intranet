<?php

namespace HelpDesk\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $primaryKey = 'idCategoria';

    protected $fillable = [
        'idCategoriaPadre',
        'nombre',
    ];
}
