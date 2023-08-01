<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\HistorialStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [
        'stock_id',
    ];
    protected $table = 'stock';
    public $timestamps = false;

    //Relacion uno a muchos inversa (stock-producto)
    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    //Relacion uno a muchos (stock-historialstock)
    public function historialstock(){
        return $this->hasMany(HistorialStock::class);
    }
}
