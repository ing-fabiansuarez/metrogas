<?php

namespace App\Http\Controllers;

use App\Models\DatosPreoperacional;
use Illuminate\Http\Request;

class DatosPreoperacionalesController extends Controller
{
    public function index()
    {
        return view('datos-preoperacionales.index');
    }

    public function responseForm(Request $request)
    {
        $request->validate([
            'cedula' => 'required',
            'placa' => 'required'
        ]);
        //realizamos las consultas a los datos preoperacionales para verificar si existe
        if ($datosPreoperacional = DatosPreoperacional::where('cedula', $request->cedula)->where('placa_vehiculo', $request->placa)->first()) {
            return view('datos-preoperacionales.form-motos', [
                'datosPreoperacional' => $datosPreoperacional
            ]);
        } else {
            return redirect()->back()->withErrors(['msg-error' => 'No existe un vehículo registrado a ese número de cedula.']);
        }
    }
}
