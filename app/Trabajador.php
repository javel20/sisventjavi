<?php

namespace sisventjavi;

use Illuminate\Database\Eloquent\Model;
use sisventjavi\Local;
use sisventjavi\TipoTrabajador;
use sisventjavi\user;
use sisventjavi\Licencia;

class Trabajador extends Model
{

    protected $table='trabajadors';
    
        protected $fillable = [
            'nombre','apellidopat','apellidomat','DNI' ,
            'direccion','celular','operador',
            'estado', 'descripcion',
            'tipo_trabajador_id','local_id',
        ];


    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function tipoTrabajador(){
        return $this->belongsTo(TipoTrabajador::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    public function licencia(){
        return $this->hasMany(Licencia::class);
    }


    public function scopeSearch($query, $dato){
        
        return $query->where('nombre','LIKE', "%$dato->buscar%")
                        ->orwhere('apellidopat','LIKE',"%$dato->buscar%")
                        ->orwhere('apellidomat','LIKE',"%$dato->buscar%")
                        ->orwhere('DNI','LIKE',"$dato->buscar")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('trabajadors.*');
                        
    }

    
}
