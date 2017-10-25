<?php

namespace sisventjavi;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//use sisventjavi\Trabajador;
use sisventjavi\Acceso;
use sisventjavi\Local;
use sisventjavi\TipoTrabajador;
//use sisventjavi\User;
use sisventjavi\Licencia;
use sisventjavi\Comp;
use sisventjavi\Venta;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','estado',
        'nombre','apellidopat','apellidomat','DNI' ,
        'direccion','celular','operador',
        'estado', 'descripcion',
        'tipo_trabajador_id','local_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //public function trabajador(){
    //    return $this->belongsTo(Trabajador::class);
    //}




    public function accesos(){
        return $this->belongsToMany(Acceso::class)->withTimestamps();
    }

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function tipoTrabajador(){
        return $this->belongsTo(TipoTrabajador::class);
    }

    public function licencia(){
        return $this->hasMany(Licencia::class);
    }

    public function comp(){
        return $this->hasMany(Comp::class);
    }

    public function venta(){
        return $this->hasMany(venta::class);
    }




    public function scopeSearch($query, $dato){
        
        return $query->where('email','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('users.*');            
        
    }

}
