<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoProducto extends Model
{
    use HasFactory;

    protected $primaryKey = 'tp_id';

    protected $guarded = [
        'tp_id',
    ];

    //Relacion uno a muchos inversa (TipoProducto-producto)
    public function producto(){
        return $this->belongsTo(Producto::class, 'prod_id');
    }
}
