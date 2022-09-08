<?php

namespace App\Http\Controllers;

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

    public function indexPersonaNatural()
    {
        return view('proveedores.admin.index_persona_natural', [
            'respuestasForm' => FormPersonaNatural::orderBy('id')->get(),
        ]);
    }
}
