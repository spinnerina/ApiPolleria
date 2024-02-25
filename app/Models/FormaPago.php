<?php

namespace App\Models;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormaPago extends Model
{
    use HasFactory;

    protected $guarded = [
        'form_pago_id'
    ];

    protected $table = 'formapago';

    protected $primaryKey = 'form_pago_id';

    //Relacion uno a muchos (formapago-venta)
    public function venta(){
        return $this->hasMany(Venta::class);
    }
}
