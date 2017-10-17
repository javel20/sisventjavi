<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\User;

class Acceso extends Model
{

    protected $table='accesos';
    
        protected $fillable = [
            'nombre',
        ];
    
    public function user(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->select('accesos.*');
                        
        
    }
}
