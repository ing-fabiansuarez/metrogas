<?php

namespace App\Http\Controllers;

use App\Enums\ETipoVehiculo;
use App\Exports\FormDatosPreoperacionalesCarrosExport;
use App\Exports\FormDatosPreoperacionalesMotosExport;
use App\Mail\DatosPreoperacionalNoFillMailable;
use App\Models\DatosPreoperacional;
use App\Models\FormDatosPreoperacionalesCarrosModel;
use App\Models\FormDatosPreoperacionalesMotosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
                    return view('datos-preoperacionales.form-carros', [
                        'datosPreoperacional' => $datosPreoperacional
                    ]);
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
            'tipo_form' => ETipoVehiculo::MOTO->getId()
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
        return (new FormDatosPreoperacionalesMotosExport())->download('Formularios Motos.xlsx');
    }

    public function indexFormCarros(Request $request)
    {
        $respuestasForm = FormDatosPreoperacionalesCarrosModel::latest();

        if (!empty($request->get('num_solicitud'))) {
            $respuestasForm->where('id', $request->get('num_solicitud'));
        }

        return view('datos-preoperacionales.admin.index_carro', [
            'respuestasForm' => $respuestasForm->orderBy('id', 'desc')->get(),
        ]);
    }

    public function verFormCarros(FormDatosPreoperacionalesCarrosModel $id)
    {
        return view('datos-preoperacionales.admin.ver_carros', [
            'formulario' => $id
        ]);
    }

    public function exportarFormCarros()
    {
        return (new FormDatosPreoperacionalesCarrosExport())->download('Formularios Carros.xlsx');
    }

    public function finalizado()
    {
        return view('datos-preoperacionales.finalizado');
    }


    public function verficarForm($type)
    {
        if (!ETipoVehiculo::exist($type)) {
            return "Tipo ingresado no existe!";
        }
        //se consultan los datos preoperacionales
        $objetsModel = DatosPreoperacional::where('tipo_vehiculo', $type)->orderBy('id')->get();

        //con este metodo se traen los correo para ponerlos en el textarea de la vista para enviar los correo
        $emailsArray = array();
        if ($type == ETipoVehiculo::MOTO->getId()) {
            foreach ($objetsModel as $datoPreoperacional) {
                if (!$datoPreoperacional->verficarSiLlenoFormulario(date('Y-m-d'))) {
                    array_push($emailsArray, $datoPreoperacional->correo);
                }
            }
        }
        //dd($emailsArray);

        return view('datos-preoperacionales.admin.verificar', [
            'objetsModel' => $objetsModel,
            'emailsArray' => $emailsArray
        ]);
    }

    public function sendEmails(Request $request, $type)
    {
        $mails = explode(',', $request->get('emails'));
        $emailsToSend = array();
        $errores = array();
        foreach ($mails as $ma_original) {
            $ma = trim($ma_original);
            if (filter_var($ma, FILTER_VALIDATE_EMAIL)) {
                array_push($emailsToSend, $ma);
            } else {
                if ($ma != '') {
                    array_push($errores, $ma . ' no es un correo valido.');
                }
            }
        }
        $correo = new DatosPreoperacionalNoFillMailable();
        $correo->subject("Debes Llenar el Formulario Datos Preoperacionales");
        if (count($emailsToSend) > 0) {
            Mail::to($emailsToSend)
                ->queue($correo);
            return redirect()->route('admin.preoperacional.verificar', $type)->with([
                'success' => 'Se enviarón los correos validados con exito.',
                'validation' => $errores
            ]);
        } else {
            return redirect()->route('admin.preoperacional.verificar', $type)->with(['errors' => ['Debe haber por lo menos un correo valido para enviar información.']]);
        }
    }
}
