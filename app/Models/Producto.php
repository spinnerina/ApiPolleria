<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [
        'prod_id',
    ];

    protected $table = 'producto';


    //Relacion uno a muchos (producto-stock)
    public function stock(){
        return $this->hasMany(Stock::class);
    }

    //Relacion uno a muchos inversa (producto-proveedor)
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
