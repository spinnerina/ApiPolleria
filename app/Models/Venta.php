<?php

namespace App\Models;

use App\Models\FormaPago;
use App\Models\VentaXProducto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    use HasFactory;

    protected $guarded = [
        'ven_id'
    ];

    protected $table = 'venta';

    protected $primaryKey = 'ven_id';

    //Relacion uno a muchos inversa (venta-formapago)
    public function localidad(){
        return $this->belongsTo(FormaPago::class);
    }

    //Relacion uno a muchos (venta-ventaxproducto)
    public function ventaxproductos()
    {
        return $this->hasMany(VentaXProducto::class, 'ven_id');
    }
}
