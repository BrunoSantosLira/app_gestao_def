<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\CampoController;
use App\Http\Controllers\OSController;
use App\Http\Controllers\OsProdutosController;
use App\Http\Controllers\OsServicoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
            

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');

    Route::resource('servico', ServicoController::class);
    Route::get('servico.exportar', [\App\Http\Controllers\ServicoController::class, 'exportar'])->name('servico.exportar');
    Route::get('os.exportar', [\App\Http\Controllers\OSController::class, 'exportar'])->name('os.exportar');

	Route::resource('checklist', ChecklistController::class);

	Route::resource('clientes', ClientesController::class);

	Route::resource('produtos', ProdutosController::class);
	Route::resource('categorias', CategoriasController::class);
	Route::resource('unidades', UnidadesController::class);
	Route::resource('os', OSController::class);
	Route::resource('osprodutos', OsProdutosController::class);
	Route::resource('osservicos', OsServicoController::class);
	Route::post('osprodutos/deletar', [App\Http\Controllers\OsProdutosController::class, 'deletar'])->name('osprodutos.deletar');
	Route::post('osservicos/deletar', [App\Http\Controllers\OsServicoController::class, 'deletar'])->name('osservicos.deletar');

	Route::resource('campo', CampoController::class);
	Route::resource('usuarios', RegisterController::class);


	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});