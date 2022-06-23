<?php

namespace App\Http\Controllers;

use Adldap\Laravel\Facades\Adldap;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('mtto.user.index', compact('users'));
    }

    public function create()
    {
        return view('mtto.user.create');
    }

    public function searchUser(UserRequest $request)
    {
        //se hace la conexion a el directorio activo para vverificar el usuario
        try {
            $user = Adldap::search()->where('samaccountname', '=', $request->username)->first();
            if (isset($user)) {
                $newUser = new User();
                return view('mtto.user.create', compact('newUser'));
            }

            return redirect()->route('user.create')->with("msg", [
                "class" => "alert alert-warning",
                'body' => __('messages.not_user_found')
            ]);
        } catch (Exception $e) {
            return redirect()->route('user.create')->with("msg", [
                "class" => "alert alert-danger",
                'body' => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        $datos = request()->all();
        return response()->json($datos);
    }
}
