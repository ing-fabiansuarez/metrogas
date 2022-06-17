<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('mtto/user/index', compact('users'));
    }

    public function create()
    {
        return view('mtto/user/create');
    }

    public function store(Request $request)
    {
        $datos = request()->all();
        return response()->json($datos);
    }
}
