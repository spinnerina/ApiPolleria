<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;

    protected $guarded = [
        'fac_id',
    ];

    //Relacion uno a muchos inversa (factura-usuario)
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
