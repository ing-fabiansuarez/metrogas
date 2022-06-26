<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\JobtitleController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Originsites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowJobtitles;
use Illuminate\Contracts\Foundation\MaintenanceMode;

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


	Route::get('menu-mantenimientos', [MaintenanceController::class, 'menu'])->name('menu-mainten');

	//USUARIOS
	Route::get('usuarios', [UserController::class, 'index'])->name('user.index');
	Route::get('usuarios/create', [UserController::class, 'create'])->name('user.create');
	Route::post('usuarios/create', [UserController::class, 'searchUser'])->name('user.searchuser');

	//CARGOS
	Route::get('cargos', [JobtitleController::class, 'index'])->name('jobtitle.index');

	//SITIOS DESTINO
	Route::get('sitios-de-destino', function () {
		return view('livewire.destination-site.index');
	});

	//Sitios Origen
	Route::get('sitios-de-origen', function () {
		return view('livewire.origin-site.index');
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
	Route::post('/session', [SessionsController::class, 'store']);
	/* Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update'); */
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');
