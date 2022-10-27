<?php

namespace App\Http\Controllers;

use App\Enums\ETipoVehiculo;
use App\Models\DatosPreoperacional;
use App\Models\FormDatosPreoperacionalesMotosModel;
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
            switch ($datosPreoperacional->tipo_vehiculo) {
                case ETipoVehiculo::MOTO->getId():
                    return view('datos-preoperacionales.form-motos', [
                        'datosPreoperacional' => $datosPreoperacional
                    ]);
                    break;
                case ETipoVehiculo::CARRO->getId():
                    return "CARRO";
                    break;
            }
        } else {
            return redirect()->back()->withErrors(['msg-error' => 'No existe un vehículo registrado a ese número de cedula.']);
        }
    }

    public function indexFormMotos(Request $request)
    {
        $respuestasForm = FormDatosPreoperacionalesMotosModel::latest();

        if (!empty($request->get('num_solicitud'))) {
            $respuestasForm->where('id', $request->get('num_solicitud'));
        }

        return view('datos-preoperacionales.admin.index_moto', [
            'respuestasForm' => $respuestasForm->orderBy('id', 'desc')->get(),
        ]);
    }

    public function verFormMotos(FormDatosPreoperacionalesMotosModel $id)
    {
        return view('datos-preoperacionales.admin.ver_moto', [
            'formulario' => $id
        ]);
    }

    public function exportarFormMotos()
    {
    }
}
