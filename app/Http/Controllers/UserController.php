<?php

namespace App\Http\Controllers;

use Adldap\Laravel\Facades\Adldap;
use App\Http\Requests\UserRequest;
use App\Models\Jobtitle;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
            $userLdap = Adldap::search()->where('samaccountname', '=', $request->username)->first();
            if (isset($userLdap)) {

                $posibleJobtitle = Jobtitle::where('name', $userLdap->getDescription())->first();
                if (isset($posibleJobtitle)) { //determina si el cargo exite, si es asi se lo coloca si no lo crea nuevo
                    $posibleJobtitle = $posibleJobtitle;
                } else {
                    $posibleJobtitle = new Jobtitle();
                }
                return view('mtto.user.create', [
                    'userLdap' => $userLdap,
                    'posibleJobtitle' => $posibleJobtitle,
                    'jobtitles' => Jobtitle::all()
                ]);
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
        return response()->json($request);
    }

    public function roles($id)
    {
        $user = User::find($id);
        return view('mtto.user.roles', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function storeRoles(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('user.roles', $user->id)->with('msg', [
            'class'=>'alert-success',
            'body'=>'Se guardo correctamente!'
        ]);
    }
}
