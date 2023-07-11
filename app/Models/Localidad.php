<?php

namespace App\Models;

use App\Models\Cliente;
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
}
