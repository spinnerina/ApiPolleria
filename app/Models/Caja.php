<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caja extends Model
{
    use HasFactory;

    protected $guarded = [
        'caj_id',
    ];


    //Relacion de uno a muchos inversa (caja-usuario)
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    
}
