<?php

namespace App\Models;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VentaXProducto extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'ventaxproducto';

    protected $primaryKey = 'id';


    //Relacion uno a muchos inversa (ventaxproducto-venta)
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ven_id');
    }

    //Relacion uno a muchos inversa (ventaxproducto-producto)
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'prod_id');
    }

}
