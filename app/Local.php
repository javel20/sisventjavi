<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Trabajador ;

class Local extends Model
{

    protected $table='locals';
    
        protected $fillable = [
            'nombre', 'direccion','telefono', 'estado',
        ];


    public function trabajadors(){
        return $this->hasMany(Trabajador::class);
    }
}
