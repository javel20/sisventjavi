<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\User;

class Licencia extends Model
{
    
    protected $table='licencias';
    
        protected $fillable = [
            'nombre','fechai','fechaf',
            'estado', 'descripcion',
            'user_id',
        ];


    public function User(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->select('licencias.*');
                        
        
    }
}
