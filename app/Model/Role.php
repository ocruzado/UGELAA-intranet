<?php

namespace HelpDesk\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $primaryKey = 'idRole';

    protected $fillable = [
        'name',
        'descripcion',
    ];

    public function users()
    {
        return $this
            ->belongsToMany(Usuario::class)
            ->withTimestamps();
    }
}
