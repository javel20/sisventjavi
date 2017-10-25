<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;

use sisventjavi\Comp;

class Proveedor extends Model
{
    
    protected $table='proveedors';
    
        protected $fillable = [
            'nombre_empresa', 'direccion', 'nombre_contacto', 'apellidopat', 'apellidomat',
            'celular_contacto','operador','email','estado','descripcion',
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function comp(){
        return $this->hasMany(Comp::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query   ->where('nombre_empresa','LIKE', "%$dato->buscar%")
                        ->orwhere('estado','LIKE', "$dato->buscar")
                        ->orwhere('apellidomat','LIKE', "%$dato->buscar%")
                        ->orwhere('apellidopat','LIKE', "%$dato->buscar%")
                        ->orwhere('nombre_contacto','LIKE', "%$dato->buscar%")
                        ->orwhere('RUC','LIKE', "%$dato->buscar%")
                        ->select('proveedors.*');
                        
        
    }

}
