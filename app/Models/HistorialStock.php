<?php

namespace App\Models;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialStock extends Model
{
    use HasFactory;

    protected $guarded = [
        'his_id',
    ];
    protected $table = 'historialstock';
    public $timestamps = false;


    //Relacion uno a muchos inversa (historialstock-stock)
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
