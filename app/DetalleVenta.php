<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Venta;
use sisventjavi\StockPresent;

class DetalleVenta extends Model
{
    protected $table='detalle_venta';
    
        protected $fillable = [
            'cantidad','costounitario', 'costototal','venta_id','stock_present_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function venta(){
        return $this->belongsTo(Venta::class);
    }

    public function stockpresent(){
        return $this->belongsTo(StockPresent::class);
    }
}
