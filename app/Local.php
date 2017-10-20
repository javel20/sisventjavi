<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\User;

class Local extends Model
{

    protected $table='locals';
    
        protected $fillable = [
            'nombre', 'direccion','telefono', 'estado',
        ];


    public function user(){
        return $this->hasMany(User::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('locals.*');
                        
        
    }
}
