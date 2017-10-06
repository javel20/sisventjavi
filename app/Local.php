<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Trabajador;

class Local extends Model
{

    protected $table='locals';
    
        protected $fillable = [
            'nombre', 'direccion','telefono', 'estado',
        ];


    public function trabajador(){
        return $this->hasMany(Trabajador::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('locals.*');
                        
        
    }
}
