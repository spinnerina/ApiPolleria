<?php

namespace App\Models;

use App\Models\Caja;
use App\Models\Factura;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'usu_id',
    ];

    protected $table = 'usuario';

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
}
