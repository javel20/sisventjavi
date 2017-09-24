<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Venta;

class Cliente extends Model
{
    protected $table='clientes';
    
        protected $fillable = [
            'DNI', 'RUC', 'nombre', 'apellidopat', 'apellidomat',
            'direccion','celular','operador','email','estado','descripcion',
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function ventas(){
        return $this->hasMany(Venta::class);
    }


}
