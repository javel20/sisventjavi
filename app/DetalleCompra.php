<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Compra;
use sisventjavi\StockPresent;

class Compra extends Model
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

    public function compra(){
        return $this->hasMany(Compra::class);
    }

    public function stockpresent(){
        return $this->hasMany(StockPresent::class);
    }

}
