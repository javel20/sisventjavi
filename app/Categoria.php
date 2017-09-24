<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Producto;

class Categoria extends Model
{
    
    protected $table='categorias';

    protected $fillable = [
        'nombre', 'descripcion', 'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function articulos(){
        return $this->hasMany(Producto::class);
    }

}
