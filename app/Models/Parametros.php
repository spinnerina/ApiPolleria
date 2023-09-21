<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametros extends Model
{
    use HasFactory;

    protected $guarded = [
        'param_id',
    ];

    protected $table = 'parametros';
    public $timestamps = false;

    protected $primaryKey = 'param_id';

    
}
