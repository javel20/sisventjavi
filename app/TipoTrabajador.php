<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Trabajador;

class TipoTrabajador extends Model
{

    protected $table='tipo_trabajadors';
    
        protected $fillable = [
            'nombre', 'descripcion',
        ];


    public function trabajadors(){
        return $this->hasMany(Trabajador::class);
    }
}
