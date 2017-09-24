<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    protected $table='categoria';

    protected $fillable = [
        'nombre', 'descripcion', 'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

}
