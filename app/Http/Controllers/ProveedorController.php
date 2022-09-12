<?php

namespace App\Http\Controllers;

use App\Exports\FormPersonaNaturalExport;
use App\Models\FormPersonaNatural;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function register()
    {
        return view('proveedores.register');
    }
    public function personaNatural()
    {
        return view('proveedores.persona_natural');
    }
    public function formularioLleno()
    {
        return view('proveedores.finalizado');
    }

    public function indexPersonaNatural(Request $request)
    {
        $respuestasForm = FormPersonaNatural::latest();

        if (!empty($request->get('num_solicitud'))) {
            $respuestasForm->where('id', $request->get('num_solicitud'));
        }

        return view('proveedores.admin.index_persona_natural', [
            'respuestasForm' => $respuestasForm->orderBy('id', 'desc')->get(),
        ]);
    }

    public function verFormPersonaNatutal(FormPersonaNatural $id)
    {
        return view('proveedores.admin.ver_persona_natural', [
            'personaNatural' => $id
        ]);
    }

    public function exportarFormPersonaNatural(Request $request)
    {
        $id =  $request->get('num_solicitud');
        return (new FormPersonaNaturalExport($id))->download('Formularios Personas Natural.xlsx');
    }
}
