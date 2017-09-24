<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Categoria;
use sisventjavi\StockPresent;

class Producto extends Model
{
    protected $table='productos';
    
        protected $fillable = [
            'codigo', 'nombre', 'imagen', 'estado','descripcion','categoria_id'
        ];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function stockpresen(){
        return $this->hasMany(StockPresent::class);
    }


}
