<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Proveedor;
use sisventjavi\StockPresent;

class Compra extends Model
{
    protected $table='compras';
    
        protected $fillable = [
            'codigo','estado','descripcion', 'totalcompra','proveedor_id','user_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function proveedor(){
        return $this->hasMany(Proveedor::class);
    }

    public function stockpresent(){
        return $this->belongsToMany(StockPresent::class)->withTimestamps();
    }
     
}
