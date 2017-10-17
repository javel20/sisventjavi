<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Trabajador;

class Licencia extends Model
{
    
    protected $table='licencias';
    
        protected $fillable = [
            'nombre','fechai','fechaf',
            'estado', 'descripcion',
            'trabajador_id',
        ];


    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->select('licencias.*');
                        
        
    }
}
