<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Porcentaje extends Model
{
    use HasFactory;

    protected $guarded = [
        'por_id',
    ];

    protected $table = 'porcentaje';

    public $timestamps = false;

    //Relacion uno a muchos inversa (porcentaje-producto)
    public function producto(){
        return $this->belongsTo(Producto::class, 'prod_id');
    }
}
