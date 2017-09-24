<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Cliente;
use sisventjavi\User;
use sisventjavi\StockPresent;

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
        return $this->belongTo(Cliente::class);
    }

    public function user(){
        return $this->belongTo(user::class);
    }

    public function stockpresent(){
        return $this->belongsToMany(Compra::class)->withTimestamps();
    }

}
