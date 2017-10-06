<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Cliente;
use sisventjavi\Trabajador;
use sisventjavi\StockPresent;
use sisventjavi\DetalleVenta;

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
        return $this->belongsTo(Cliente::class);
    }

    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }

    public function stockpresent(){
        return $this->belongsToMany(Compra::class)->withTimestamps();
    }

    public function detalleventa(){
        return $this->belongsTo(DetalleVenta::class);
    }

}
