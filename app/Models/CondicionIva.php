<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CondicionIva extends Model
{
    use HasFactory;

    protected $guarded = [
        'cli_id',
    ];

    protected $table = 'condicioniva';

    //Relacion uno a muchos (condicioniva-cliente)
    public function cliente(){
        return $this->hasMany(Cliente::class);
    }
}
