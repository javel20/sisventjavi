<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Cliente;
use sisventjavi\Trabajador;
use sisventjavi\StockPresent;

class Venta extends Model
{
    protected $table='ventas';
    
        protected $fillable = [
            'codigo','estado','descripcion','totalventa','cliente_id','trabajador_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function cliente(){
        return $this->belongTo(Cliente::class);
    }

    public function trabajador(){
        return $this->belongTo(Trabajador::class);
    }

    public function stockpresent(){
        return $this->belongsToMany(Compra::class)->withTimestamps();
    }

}
