<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localidad extends Model
{
    use HasFactory;


    protected $guarded = [
        'loc_id',
    ];

    protected $table = 'localidad';

    //Relacion uno a muchos (localidad-cliente)
    public function cliente(){
        return $this->hasMany(Cliente::class);
    }

    //Relacion uno a muchos (localidad-prveedor)
    public function proveedor(){
        return $this->hasMany(Proveedor::class);
    }



}
