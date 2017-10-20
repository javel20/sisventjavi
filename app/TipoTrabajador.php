<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\User;

class TipoTrabajador extends Model
{

    protected $table='tipo_trabajadors';
    
        protected $fillable = [
            'nombre', 'descripcion',
        ];


    public function user(){
        return $this->hasMany(User::class);
    }


    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->select('tipo_trabajadors.*');
                        
        
    }

}
