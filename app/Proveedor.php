<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;

use sisventjavi\Compra;

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

    public function compras(){
        return $this->belongTo(Compra::class);
    }

}
