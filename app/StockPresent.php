<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Producto;
use sisventjavi\Compra;
use sisventjavi\Venta;

class StockPresent extends Model
{
    protected $table='stock_present';
    
        protected $fillable = [
            'stockmin', 'stockreal', 'nombre',
            'por_ganancia','precioventa','estado','descripcion','producto_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     
     public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function compra(){
        return $this->belongsToMany(Compra::class);
    }

    public function venta(){
        return $this->belongsToMany(Venta::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('stock_present.*');
                        
    }

}
