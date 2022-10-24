<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPreoperacionalMotos extends Model
{
    use HasFactory;
    protected $fillable = [
        'cedula',
        'nombre_completo',
        'correo',
        'lugar_trabajo',
        'area',
        'placa_vehiculo',
        'modelo'
    ];
}
