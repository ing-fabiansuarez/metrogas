<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function uploadFile()
    {
        return view('pruebas.form-motos', [
            'solo_lectura' => false
        ]);
    }
    public function uploadFile2()
    {
        return view('pruebas.form-motos-2', [
            'solo_lectura' => false
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'myarchivo' => 'required|image|max:2048'
        ]);
        if ($request->hasFile('myarchivo')) {
            $file =  $request->file('myarchivo');
            $destinationPath = "storage/private/pruebas/";
            $filename = time() . ' - ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('myarchivo')->move($destinationPath, $filename);
            echo "CARGADA CON EXITO";
        } else {
            echo "NO SE RECONOCE LA IMAGEN";
        }
    }
}
