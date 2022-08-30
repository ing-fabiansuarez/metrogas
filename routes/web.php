<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobtitleController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViaticController;
use Illuminate\Support\Facades\Route;
use Adldap\Laravel\Facades\Adldap;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home'])->name('home');
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	//MANTENIMIENTOS


	Route::prefix('mantenimientos')->middleware('can:menu-mainten')->group(function () {
		//Menu dle mantenimiento
		Route::get('/', [MaintenanceController::class, 'menu'])->name('menu-mainten');
		//SITIOS DESTINO
		Route::get('sitios-de-destino', function () {
			return view('livewire.destination-site.index');
		})->name('destinationsite.index');

		//Sitios Origen
		Route::get('sitios-de-origen', function () {
			return view('livewire.origin-site.index');
		})->name('originsite.index');

		//OTROS GASTOS
		Route::get('otros-gastos', function () {
			return view('livewire.other-expense.index');
		})->name('otherexpense.index');

		//otros items para la gestion
		Route::get('otros-items', function () {
			return view('livewire.other-item.index');
		})->name('otheritem.index');

		//tipo identificacion
		Route::get('tipo-identificacion', function () {
			return view('livewire.type-identification.index');
		})->name('typeidenfification.index');

		//tipo identificacion
		Route::get('centro-de-costos', function () {
			return view('livewire.centro-de-costos.index');
		})->name('centrodecostos.index');

		//Mantenimineto de los roles
		Route::get('roles', function () {
			return view('livewire.roles.index');
		})->name('roles.index');

		//CARGOS
		Route::get('cargos', [JobtitleController::class, 'index'])->name('jobtitle.index');
	});

	//USUARIOS
	Route::prefix('usuarios')->middleware('can:menu-mainten')->group(function () {
		Route::get('/', [UserController::class, 'index'])->name('user.index');
		Route::get('/create', [UserController::class, 'create'])->name('user.create');
		Route::post('/create', [UserController::class, 'searchUser'])->name('user.searchuser');
		Route::post('/', [UserController::class, 'store'])->name('user.store');
		Route::get('/{User}', [UserController::class, 'roles'])->name('user.roles');
		Route::post('/{User}', [UserController::class, 'storeRoles'])->name('user.storeRoles');
	});
	Route::get('subalternos', [UserController::class, 'subordinates'])->name('user.subordinates');
	Route::post('subalternos', [UserController::class, 'storeSubordinates'])->name('user.storesubordinates');


	//VIATICOS
	//solicitud de viaticos
	Route::get('solicitud-viaticos/create', [ViaticController::class, 'create'])->name('viatic.create');
	Route::get('solicitud-viaticos/{id}', [ViaticController::class, 'show'])->name('viatic.show');
	Route::get('solicitud-viaticos', [ViaticController::class, 'index'])->name('viatic.index');
	Route::get('solicitud-viaticos/{id}/pdf', [ViaticController::class, 'pdf'])->name('viatic.pdf');
	//legalizaciones

	Route::get('legalizaciones', [ViaticController::class, 'indexlegalization'])->name('legalization.index');
	Route::get('legalizaciones/create', [ViaticController::class, 'createlegalization'])->name('legalization.create');
	Route::post('legalizaciones/create', [ViaticController::class, 'storelegalization'])->name('legalization.store');
	Route::get('legalizaciones/{id}', [ViaticController::class, 'showlegalization'])->name('legalization.show');
	Route::get('legalizaciones/{id}/pdf', [ViaticController::class, 'pdfLegalization'])->name('legalization.pdf');

	Route::get('por-aprobar', [ViaticController::class, 'byAprove'])->name('byAprove');

	//USUARIOS
	Route::prefix('reportes')->middleware('can:report')->group(function () {
		Route::get('/solicitud-anticipos', [ReportController::class, 'viaticRequest'])->name('report.viaticrequest');
		Route::post('/solicitud-anticipos', [ReportController::class, 'exportViaticRequest'])->name('report.viaticrequest.export');
		Route::get('/legalizaciones', [ReportController::class, 'legalization'])->name('report.legalization');
		Route::post('/legalizaciones', [ReportController::class, 'exportLegalization'])->name('report.legalization.export');
	});

	/* 
	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');
	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

	Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');*/

	Route::get('/logout', [SessionsController::class, 'destroy']);
	/* 	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']); */
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	/* Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']); */
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store'])->name('session');
	/* Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update'); */
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');


Route::get('/ldap', function () {
	/* $array = [];
	foreach (Adldap::search()->users()->get() as $user) {
		
		array_push($array, [
			'cn' => $user->cn,
			'name' =>$user->name,
			'description'=>$user->description,
			 'samaccountname'=>$user->samaccountname,
			'samaccounttype'=>$user->samaccounttype,
			'useraccountcontrol'=>$user->useraccountcontrol,
		]);
	}
	return $array; */
	return Adldap::search()->users()->find('fsuarez');
});
