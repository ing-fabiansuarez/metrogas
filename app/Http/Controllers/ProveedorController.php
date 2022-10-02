<?php

namespace App\Http\Controllers;

use App\Exports\FormPersonaJuridicaBrutoExport;
use App\Exports\FormPersonaJuridicaExport;
use App\Exports\FormPersonaNaturalBrutoExport;
use App\Exports\FormPersonaNaturalExport;
use App\Models\FormPersonaJuridica;
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
        $tipo = $request->get('r');

        if ($tipo == "normal") {
            return (new FormPersonaNaturalExport($id))->download('Formularios Personas Natural.xlsx');
        } else if ($tipo == "bruto") {
            return (new FormPersonaNaturalBrutoExport($id))->download('Formularios Personas Natural En Bruto.xlsx');
        }
        
    }

    public function personaJuridica()
    {
        return view('proveedores.persona_juridica');
    }


    public function indexPersonaJuridica(Request $request)
    {
        $respuestasForm = FormPersonaJuridica::latest();

        if (!empty($request->get('num_solicitud'))) {
            $respuestasForm->where('id', $request->get('num_solicitud'));
        }

        return view('proveedores.admin.index_persona_juridica', [
            'respuestasForm' => $respuestasForm->orderBy('id', 'desc')->get(),
        ]);
    }

    public function verFormPersonaJuridica(FormPersonaJuridica $id)
    {
        return view('proveedores.admin.ver_persona_juridica', [
            'personaJuridica' => $id
        ]);
    }

    public function exportarFormPersonaJuridica(Request $request)
    {
        $id =  $request->get('num_solicitud');
        $tipo = $request->get('r');

        if ($tipo == "normal") {
            return (new FormPersonaJuridicaExport($id))->download('Formularios Personas Juridica.xlsx');
        } else if ($tipo == "bruto") {
            return (new FormPersonaJuridicaBrutoExport($id))->download('Formularios Personas Juridica En Bruto.xlsx');
        }
    }
}
