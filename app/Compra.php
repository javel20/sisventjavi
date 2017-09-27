<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Proveedor;
use sisventjavi\StockPresent;
use sisventjavi\Trabajador;

class Compra extends Model
{
    protected $table='compras';
    
        protected $fillable = [
            'codigo','estado','descripcion', 'totalcompra','proveedor_id','trabajador_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function proveedor(){
        return $this->hasMany(Proveedor::class);
    }

    public function trabajador(){
        return $this->belongTo(Trabajador::class);
    }

    public function stockpresent(){
        return $this->belongsToMany(StockPresent::class)->withTimestamps();
    }
     
}
