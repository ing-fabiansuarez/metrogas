<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobtitleController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViaticController;
use Illuminate\Support\Facades\Route;
use Adldap\Laravel\Facades\Adldap;
use App\Enums\EBuenoMalo;
use App\Enums\ENivelAceite;
use App\Enums\ESiNo;
use App\Http\Controllers\DatosPreoperacionalesController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\ReportController;
use App\Http\Livewire\Pruebas;
use App\Models\FormDatosPreoperacionalesCarrosModel;
use App\Models\FormDatosPreoperacionalesMotosModel;
use App\Models\FormPersonaJuridica;
use App\Models\FormPersonaNatural;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
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

		//Centro Preoperacioneles
		Route::get('datos-preoperacioneles-moto', function () {
			return view('livewire.datos-preoperacional-motos.index');
		})->name('datospreoperacionelesmotos.index');

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

	Route::prefix('form-proveedores')->middleware('can:gestionarFormularioProveedores')->group(function () {
		Route::get('/persona-natural', [ProveedorController::class, 'indexPersonaNatural'])->name('proveedores.admin.persona-natural');
		Route::get('/persona-natural/{id}', [ProveedorController::class, 'verFormPersonaNatutal'])->name('proveedores.admin.persona-natural.ver');
		Route::post('/persona-natural', [ProveedorController::class, 'exportarFormPersonaNatural'])->name('proveedores.admin.persona-natural.exportar');

		Route::get('/persona-juridica', [ProveedorController::class, 'indexPersonaJuridica'])->name('proveedores.admin.persona-juridica');
		Route::get('/persona-juridica/{id}', [ProveedorController::class, 'verFormPersonajuridica'])->name('proveedores.admin.persona-juridica.ver');
		Route::post('/persona-juridica', [ProveedorController::class, 'exportarFormPersonaJuridica'])->name('proveedores.admin.persona-juridica.exportar');
		Route::get('/persona-juridica-imprimir/{id}', function (FormPersonaJuridica $id) {
			return view('proveedores.admin.pdf_persona_juridica', [
				'personaJuridica' => $id
			]);
		})->name('proveedores.admin.persona-juridica.imprimir');
		Route::get('/persona-natural-imprimir/{id}', function (FormPersonaNatural $id) {
			return view('proveedores.admin.pdf_persona_natural', [
				'personaNatural' => $id
			]);
		})->name('proveedores.admin.persona-natural.imprimir');
	});

	Route::prefix('form-datos-preoperacionales')->middleware('can:gestionarFormularioDatosPreoperacionales')->group(function () {
		Route::get('/moto1', [DatosPreoperacionalesController::class, 'indexFormMotos']);
		Route::get('/moto', [DatosPreoperacionalesController::class, 'indexFormMotosTable'])->name('admin.preoperacional');
		Route::get('/moto/{id}', [DatosPreoperacionalesController::class, 'verFormMotos'])->name('admin.preoperacional.ver');
		Route::post('/moto', [DatosPreoperacionalesController::class, 'exportarFormMotos'])->name('admin.preoperacional.exportar');
		Route::get('/carro1', [DatosPreoperacionalesController::class, 'indexFormCarros'])->name('admin.preoperacional.carros');
		Route::get('/carro', [DatosPreoperacionalesController::class, 'indexFormCarrosTable'])->name('admin.preoperacional.carros');
		Route::get('/carro/{id}', [DatosPreoperacionalesController::class, 'verFormCarros'])->name('admin.preoperacional.carros.ver');
		Route::post('/carro', [DatosPreoperacionalesController::class, 'exportarFormCarros'])->name('admin.preoperacional.carros.exportar');
		Route::get('/verficacion/{type}', [DatosPreoperacionalesController::class, 'verficarForm'])->name('admin.preoperacional.verificar');
		Route::post('/verficacion/{type}', [DatosPreoperacionalesController::class, 'sendEmails'])->name('admin.preoperacional.emails');
		Route::get('/moto-imprimir/{id}', function (FormDatosPreoperacionalesMotosModel $id) {
			$pdf = App::make('dompdf.wrapper');
			$pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('datos-preoperacionales.admin.pdf-dompdf-form-motos',  [
				'object' => $id,
				'solo_lectura' => true,
				'ENivelAceite' => ENivelAceite::cases(),
				'EBuenoMalo' => EBuenoMalo::cases(),
				'ESiNo' => ESiNo::cases()
			]);

			$pdf->render();
			return $pdf->stream($id->nombre_completo . ".pdf");
			/* return view('datos-preoperacionales.admin.pdf-form-motos', [
				'formulario' => $id,
			]); */
		})->name('admin.preoperacional.moto.imprimir');


		Route::get('/moto-imprimir-pdf/{id}', [DatosPreoperacionalesController::class, 'generarPdfFormMotos'])->name('admin.preoperacional.moto.imprimir.descargar');
		Route::get('/carro-imprimir-pdf/{id}', [DatosPreoperacionalesController::class, 'generarPdfFormCarros'])->name('admin.preoperacional.carro.imprimir.descargar');

		Route::get('/carro-imprimir/{id}', function (FormDatosPreoperacionalesCarrosModel $id) {
			$pdf = App::make('dompdf.wrapper');
			$pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('datos-preoperacionales.admin.pdf-dompdf-form-carros',  [
				'object' => $id,
				'solo_lectura' => true,
				'ENivelAceite' => ENivelAceite::cases(),
				'EBuenoMalo' => EBuenoMalo::cases(),
				'ESiNo' => ESiNo::cases()
			]);

			$pdf->render();
			return $pdf->stream($id->nombre_completo . ".pdf");
			/* return view('datos-preoperacionales.admin.pdf-dompdf-form-carros', [
				'object' => $id,
				'ENivelAceite' => ENivelAceite::cases(),
				'EBuenoMalo' => EBuenoMalo::cases(),
				'ESiNo' => ESiNo::cases()
			]); */
		})->name('admin.preoperacional.carro.imprimir');

		//Centro Preoperacioneles
		Route::get('datos-preoperacioneles', function () {
			return view('livewire.datos-preoperacional-motos.index');
		})->name('admin.preoperacional.configuracion');
	});

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


/*Route::get('/ldap', function () {
	 $array = [];
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
	return $array; 
	return Adldap::search()->users()->find('fsuarez');
});*/

//PROVEEDORES
Route::get('registrar-proveedor', [ProveedorController::class, 'register'])->name('proveedor.register');
Route::get('registrar-proveedor/persona-natural', [ProveedorController::class, 'personaNatural'])->name('proveedor.register.persona-natural');
Route::get('registrar-proveedor/persona-juridica', [ProveedorController::class, 'personaJuridica'])->name('proveedor.register.persona-juridica');
Route::get('registrar-proveedor/finalizado', [ProveedorController::class, 'formularioLleno'])->name('proveedor.register.finalizado');


//DATOS PREOPERACIONALES MOTOS
Route::get('datos-preoperacionales', [DatosPreoperacionalesController::class, 'index'])->name('datospreoperacionales.index');
Route::post('datos-preoperacionales', [DatosPreoperacionalesController::class, 'responseForm'])->name('datospreoperacionales.responseForm');
Route::get('datos-preoperacionales/finalizado', [DatosPreoperacionalesController::class, 'finalizado'])->name('datospreoperacionales.finalizado');
Route::get('/datos-preoperacionales/descargar', [DatosPreoperacionalesController::class, 'downloadZip'])->name('datospreoperacionales.descargar');


//pruebas
Route::get('prueba', [PruebasController::class, 'uploadFile'])->name('prueba');
Route::post('prueba', [PruebasController::class, 'store'])->name('sendprueba');
Route::get('prueba2', [PruebasController::class, 'uploadFile2'])->name('prueba2');


Route::get(
	'tiempo',
	function () {
		$hoy = date("Y-m-d H:i:s");
		return $hoy;
	}
);
