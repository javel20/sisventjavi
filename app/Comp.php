<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Proveedor;
use sisventjavi\StockPresent;
use sisventjavi\User;
use sisventjavi\DetalleComp;

class Comp extends Model
{
    protected $table='comps';
    
        protected $fillable = [
            'codigo','fechacompra','estado','descripcion', 'totalcompra','proveedor_id','user_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
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
                        ->select('comps.*');
                        
    }
     
}
