<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function register()
    {
        return view('proveedores.register');
    }
    public function personaNatural(){
        return view('proveedores.persona_natural');
    }
}
