<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Cliente;
use sisventjavi\User;
use sisventjavi\StockPresent;
use sisventjavi\DetalleVenta;

class Venta extends Model
{
    protected $table='ventas';
    
        protected $fillable = [
            'codigo','estado','descripcion','totalventa','cliente_id','user_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stockpresent(){
        return $this->belongsToMany(Compra::class)->withTimestamps();
    }

    public function detalleventa(){
        return $this->hasMany(DetalleVenta::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('codigo','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('ventas.*');
                        
    }

}
