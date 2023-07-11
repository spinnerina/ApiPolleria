<?php

namespace App\Models;

use App\Models\Localidad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = [
        'cli_id',
    ];

    protected $table = 'cliente';


    //Relacion uno a muchos inversa (cliente-localidad)
    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }
}
