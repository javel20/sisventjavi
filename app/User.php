<?php

namespace sisventjavi;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use sisventjavi\Trabajador;
use sisventjavi\Acceso;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','estado','trabajador_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }

    public function accesos(){
        return $this->belongsToMany(Acceso::class)->withTimestamps();
    }

    public function scopeSearch($query, $dato){
        
        return $query->where('email','LIKE', "%$dato->buscar%")
                        ->orWhere('estado','LIKE', "$dato->buscar")
                        ->select('users.*');
                        
        
    }

}
