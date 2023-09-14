<?php

namespace App\Models;

use App\Models\Caja;
use App\Models\Factura;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;
    
    protected $guarded = [
        'usu_id',
    ];

    protected $table = 'usuario';
    protected $primaryKey = 'usu_id';

    protected $hidden = [
        'usu_contrasenia',
    ];

    //Relacion de uno a muchos (usuario-caja)
    public function caja(){
        return $this->hasMany(Caja::class);
    }

    //Relacion de uno a muchos (usuario-factura)
    public function factura(){
        return $this->hasMany(Factura::class);
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
