<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Proveedor;
use App\Models\Porcentaje;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [
        'prod_id',
    ];

    protected $table = 'producto';

    protected $primaryKey = 'prod_id';


    //Relacion uno a muchos (producto-stock)
    public function stock(){
        return $this->hasMany(Stock::class);
    }

    //Relacion uno a muchos inversa (producto-proveedor)
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    //Relacion uno a muchos (producto-porcentaje)
    public function porcentaje(){
        return $this->hasMany(Porcentaje::class, 'por_id');
    }
}
