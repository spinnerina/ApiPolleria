<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosProveedor extends Model
{
    use HasFactory;

    protected $table = 'gastosproveedor';



    //Relacion uno a muchos inversa (gastosproveedor-proveedor)
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
