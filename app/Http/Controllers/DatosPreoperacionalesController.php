<?php

namespace App\Http\Controllers;

use App\Enums\EActivoInactivo;
use App\Enums\EBuenoMalo;
use App\Enums\ENivelAceite;
use App\Enums\ESiNo;
use App\Enums\ETipoVehiculo;
use App\Exports\FormDatosPreoperacionalesCarrosExport;
use App\Exports\FormDatosPreoperacionalesMotosExport;
use App\Mail\DatosPreoperacionalNoFillMailable;
use App\Models\DatosPreoperacional;
use App\Models\FormDatosPreoperacionalesCarrosModel;
use App\Models\FormDatosPreoperacionalesMotosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

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
            if ($datosPreoperacional->active == EActivoInactivo::ACTIVO->getId()) {
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
                return redirect()->back()->withErrors(['msg-error' => 'Se encuentra Inactivo, comuníquese con el administrador.'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['msg-error' => 'No existe un vehículo registrado a ese número de cedula.'])->withInput();
        }
    }

    public function indexFormMotos(Request $request)
    {
        $respuestasForm = FormDatosPreoperacionalesMotosModel::latest();

        $placa_vehiculo = "";
        $fecha_creacion = "";

        if (!empty($request->get('num_solicitud'))) {
            $respuestasForm->where('id', $request->get('num_solicitud'));
        }
        if (!empty($request->get('placa_vehiculo'))) {
            $respuestasForm->where('placa_vehiculo', $request->get('placa_vehiculo'));
            $placa_vehiculo = $request->get('placa_vehiculo');
        }
        if (!empty($request->get('fecha_creacion'))) {
            $dates = explode(' - ', $request->get('fecha_creacion'));
            $respuestasForm->whereBetween('created_at', [$dates[0], $dates[1]]);
            //dd($respuestasForm);
            $fecha_creacion = $request->get('fecha_creacion');
        }


        Paginator::useBootstrap();
        return view('datos-preoperacionales.admin.index_moto', [
            'respuestasForm' => $respuestasForm->orderBy('id', 'desc')->paginate(10),
            'tipo_form' => ETipoVehiculo::MOTO->getId(),
            'inputs' => [
                'placa_vehiculo' => $placa_vehiculo,
                'fecha_creacion' => $fecha_creacion
            ]
        ]);
    }

    public function indexFormMotosTable()
    {
        return view('datos-preoperacionales.admin.view_datatable_form_motos', [
            'tipo_form' => ETipoVehiculo::MOTO->getId(),
        ]);
    }
    public function indexFormCarrosTable()
    {
        return view('datos-preoperacionales.admin.view_datatable_form_carros', [
            'tipo_form' => ETipoVehiculo::CARRO->getId(),
        ]);
    }

    public function verFormMotos(FormDatosPreoperacionalesMotosModel $id)
    {
        return view('datos-preoperacionales.admin.ver_moto', [
            'formulario' => $id
        ]);
    }

    public function exportarFormMotos(Request $request)
    {
        //filtros
        $num_solicitud = $request->get('num_solicitud');
        $start_date =  $request->get('fecha_inicial');
        $end_date = $request->get('fecha_final');
        $placa_vehiculo = $request->get('placa_vehiculo');
        $cedula = $request->get('cedula');
        return (new FormDatosPreoperacionalesMotosExport($num_solicitud, $start_date, $end_date, $placa_vehiculo, $cedula))->download('Formularios Motos.xlsx');
    }

    public function indexFormCarros(Request $request)
    {
        $respuestasForm = FormDatosPreoperacionalesCarrosModel::latest();

        $placa_vehiculo = "";
        $fecha_creacion = "";


        if (!empty($request->get('num_solicitud'))) {
            $respuestasForm->where('id', $request->get('num_solicitud'));
        }
        if (!empty($request->get('placa_vehiculo'))) {
            $respuestasForm->where('placa_vehiculo', $request->get('placa_vehiculo'));
            $placa_vehiculo = $request->get('placa_vehiculo');
        }
        if (!empty($request->get('fecha_creacion'))) {
            $dates = explode(' - ', $request->get('fecha_creacion'));
            $respuestasForm->whereBetween('created_at', [$dates[0], $dates[1]]);
            //dd($respuestasForm);
            $fecha_creacion = $request->get('fecha_creacion');
        }

        return view('datos-preoperacionales.admin.index_carro', [
            'respuestasForm' => $respuestasForm->orderBy('id', 'desc')->get(),
            'tipo_form' => ETipoVehiculo::CARRO->getId(),
            'inputs' => [
                'placa_vehiculo' => $placa_vehiculo,
                'fecha_creacion' => $fecha_creacion
            ]
        ]);
    }

    public function verFormCarros(FormDatosPreoperacionalesCarrosModel $id)
    {
        return view('datos-preoperacionales.admin.ver_carros', [
            'formulario' => $id
        ]);
    }

    public function exportarFormCarros(Request $request)
    {
        //filtros
        $num_solicitud = $request->get('num_solicitud');
        $start_date =  $request->get('fecha_inicial');
        $end_date = $request->get('fecha_final');
        $placa_vehiculo = $request->get('placa_vehiculo');
        $cedula = $request->get('cedula');
        return (new FormDatosPreoperacionalesCarrosExport($num_solicitud, $start_date, $end_date, $placa_vehiculo, $cedula))->download('Formularios Carros.xlsx');
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
                if ($datoPreoperacional->active == EActivoInactivo::ACTIVO->getId()) {
                    if (!$datoPreoperacional->verficarSiLlenoFormulario(date('Y-m-d'))) {
                        array_push($emailsArray, $datoPreoperacional->correo);
                    }
                }
            }
        } else
        if ($type == ETipoVehiculo::CARRO->getId()) {
            foreach ($objetsModel as $datoPreoperacional) {
                if ($datoPreoperacional->active == EActivoInactivo::ACTIVO->getId()) {
                    if (!$datoPreoperacional->verficarSiLlenoFormulario(date('Y-m-d'))) {
                        array_push($emailsArray, $datoPreoperacional->correo);
                    }
                }
            }
        }
        //dd($emailsArray);
        return view('datos-preoperacionales.admin.verificar', [
            'objetsModel' => $objetsModel,
            'emailsArray' => $emailsArray,
            'EActivo' => EActivoInactivo::ACTIVO->getId(),
            'EInactivo' => EActivoInactivo::INACTIVO->getId()
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

    public function downloadZip(Request $request)
    {

        $date = $request->get('date');
        $type = $request->get('type');

        $path = "";
        switch ($type) {
            case ETipoVehiculo::CARRO->getId():
                $path = "\public\\form-datos-preoperacionales\soportes-carros\\" . $date;
                break;
            case ETipoVehiculo::MOTO->getId():
                $path = "\public\\form-datos-preoperacionales\soportes-motos\\" . $date;
                break;

            default:
                return "NO EXITE EL TIPO ENVIADO";
                break;
        }
        // dd(str_replace("\\", "/", storage_path("app") . $path));

        if (!is_dir(str_replace("\\", "/", storage_path("app") . $path))) {
            return "NO HAY IMAGENES ESTE DIA";
        }


        // Define Dir Folder
        $public_dir = public_path();
        // Zip File Name
        $zipFileName = 'Preoperacionales.zip';
        // Create ZipArchive Obj
        $zip = new ZipArchive;


        if (file_exists($zipFileName)) {
            unlink($zipFileName);
        }

        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {

            $files = Storage::allFiles($path);


            foreach ($files as $file) {

                $ruta = storage_path("app/") . $file;
                // dd($ruta);
                $nombre = basename($ruta);
                // Add File in ZipArchive
                $zip->addFile($ruta, $nombre);
            }


            // Close ZipArchive     
            $zip->close();
        }
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath = $public_dir . '/' . $zipFileName;
        // Create Download Response
        if (file_exists($filetopath)) {
            return response()->download($filetopath, $zipFileName, $headers);
        }
    }

    public function generarPdfFormMotos(FormDatosPreoperacionalesMotosModel $id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('datos-preoperacionales.admin.pdf-dompdf-form-motos',  [
            'object' => $id,
            'solo_lectura' => true,
            'ENivelAceite' => ENivelAceite::cases(),
            'EBuenoMalo' => EBuenoMalo::cases(),
            'ESiNo' => ESiNo::cases()
        ]);

        $pdf->render();
        return $pdf->download($id->nombre_completo . ".pdf");

        /*  return view('datos-preoperacionales.admin.pdf-dompdf-form-motos',  [
            'object' => $id,
            'solo_lectura' => true,
            'ENivelAceite' => ENivelAceite::cases(),
            'EBuenoMalo' => EBuenoMalo::cases(),
            'ESiNo' => ESiNo::cases()
        ]); */
    }

    public function generarPdfFormCarros(FormDatosPreoperacionalesCarrosModel $id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('datos-preoperacionales.admin.pdf-dompdf-form-carros',  [
            'object' => $id,
            'solo_lectura' => true,
            'ENivelAceite' => ENivelAceite::cases(),
            'EBuenoMalo' => EBuenoMalo::cases(),
            'ESiNo' => ESiNo::cases()
        ]);

        $pdf->render();
        return $pdf->download($id->nombre_completo . ".pdf");

        /*  return view('datos-preoperacionales.admin.pdf-dompdf-form-motos',  [
            'object' => $id,
            'solo_lectura' => true,
            'ENivelAceite' => ENivelAceite::cases(),
            'EBuenoMalo' => EBuenoMalo::cases(),
            'ESiNo' => ESiNo::cases()
        ]); */
    }
}
