<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Comp;
use sisventjavi\StockPresent;

class DetalleComp extends Model
{
    protected $table='detalle_compra';
    
        protected $fillable = [
            'cantidad','fechavenc','costounitario', 'costototal','compra_id','stock_present_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function comp(){
        return $this->belongsTo(Comp::class);
    }

    public function stockpresent(){
        return $this->belongsTo(StockPresent::class);
    }
}
