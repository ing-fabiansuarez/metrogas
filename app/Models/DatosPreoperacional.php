<?php

namespace App\Models;

use App\Enums\ETipoVehiculo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPreoperacional extends Model
{
    use HasFactory;
    protected $fillable = [
        'cedula',
        'nombre_completo',
        'correo',
        'lugar_trabajo',
        'area',
        'placa_vehiculo',
        'modelo',
        'cargo',
        'tipo_vehiculo'
    ];

    public function verficarSiLlenoFormulario($date)
    {
        if ($this->tipo_vehiculo == ETipoVehiculo::MOTO->getId()) {
            if (count(FormDatosPreoperacionalesMotosModel::whereDate('created_at', $date)->where('cedula', $this->cedula)->where('placa_vehiculo', $this->placa_vehiculo)->get()) > 0) {
                return True;
            } else {
                return False;
            }
        }
    }

    
}
