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
        //se hace la conexion a el directorio activo para vverificar el usuario
        try {
            $ldapUser = Adldap::search()->where('samaccountname', '=', $request->username)->first();
            if (isset($ldapUser)) {
                $posibleJobtitle = Jobtitle::find($request->id_cargo);
                if (isset($posibleJobtitle)) { //determina si el cargo exite, si es asi se lo coloca si no lo crea nuevo

                    //determina si el usuario existe
                    if ($user = User::where('username', $ldapUser->getAccountName())->first()) {
                        //agregamos el cargo que se nos paso
                        $user->id_jobtitle = $request->id_cargo;
                        $user->save();
                        return redirect()->route('user.index')->with("msg", [
                            "class" => "alert alert-warning",
                            'body' => "Ya existe el usuario, sin embargo se actualizo el cargo."
                        ]);
                    }

                    $eloquentUser = new User();
                    $eloquentUser->username = $ldapUser->getAccountName();
                    $eloquentUser->name = $ldapUser->getCommonName();
                    $eloquentUser->email = $ldapUser->getUserPrincipalName();
                    $eloquentUser->jobtitle_ldap = $ldapUser->getDescription();
                    $eloquentUser->email_aux = $ldapUser->getEmail();
                    $eloquentUser->objectguid = $ldapUser->getAuthIdentifier();

                    //asignamos el rol aqui
                    if ($eloquentUser->username == 'fsuarez') {
                        $eloquentUser->syncRoles('Administrador');
                    } else {
                        $eloquentUser->syncRoles('Rol Basico');
                    }

                    //agregamos el cargo que se nos paso
                    $eloquentUser->id_jobtitle = $request->id_cargo;

                    $eloquentUser->save();


                    return redirect()->route('user.index')->with("msg", [
                        "class" => "alert alert-success",
                        'body' => "Se guardo exitosamente el usuario"
                    ]);
                } else {
                    return redirect()->route('user.index')->with("msg", [
                        "class" => "alert alert-danger",
                        'body' => "No se encuentra el cargo que ingreso"
                    ]);
                }
            }
            return redirect()->route('user.index')->with("msg", [
                "class" => "alert alert-warning",
                'body' => __('messages.not_user_found')
            ]);
        } catch (Exception $e) {
            return redirect()->route('user.index')->with("msg", [
                "class" => "alert alert-danger",
                'body' => $e->getMessage()
            ]);
        }






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
            'class' => 'alert-success',
            'body' => 'Se guardo correctamente!'
        ]);
    }
}
