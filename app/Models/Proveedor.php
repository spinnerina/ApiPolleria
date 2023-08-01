<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Localidad;
use App\Models\GastosProveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;

    protected $guarded = [
        'prov_id',
    ];

    protected $table = 'proveedor';


    //Relacion uno a muchos inversa (proveedor-localidad)
    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }

    //Relacion uno a muchos (proveedor-gastosproveedor)
    public function gastosproveedor(){
        return $this->hasMany(GastosProveedor::class);
    }

    //Relacion uno a muchos (proveedor-producto)
    public function producto(){
        return $this->hasMany(Producto::class);
    }
}
