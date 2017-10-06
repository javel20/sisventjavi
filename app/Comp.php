<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Proveedor;
use sisventjavi\StockPresent;
use sisventjavi\Trabajador;
use sisventjavi\DetalleComp;

class Comp extends Model
{
    protected $table='compras';
    
        protected $fillable = [
            'codigo','fechacompra','estado','descripcion', 'totalcompra','proveedor_id','trabajador_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }

    public function detallecomp(){
        return $this->hasMany(DetalleComp::class);
    }
    
    public function stockpresent(){
        return $this->belongsToMany(StockPresent::class)->withTimestamps();
    }   


    public function scopeSearch($query, $dato){
        
        return $query->where('codigo','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('compras.*');
                        
    }
     
}
