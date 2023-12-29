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


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistProdutosController;


use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\CampoController;
use App\Http\Controllers\OSController;

use App\Http\Controllers\OsProdutosController;
use App\Http\Controllers\OsServicoController;
use App\Http\Controllers\ContratoProdutosController;
use App\Http\Controllers\ContratoServicosController;
use App\Http\Controllers\ParcelasController;

use App\Http\Controllers\ContaController;
use App\Http\Controllers\ContaEntradasController;

use App\Http\Controllers\ContasPagaController;

use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\CompraProdutosController;
use App\Http\Controllers\ImpostosController;


use App\Http\Controllers\EntradasController;
use App\Http\Controllers\SaidasController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
            

Route::get('/', function () {return redirect('dashboard');})->middleware('guest');
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
	Route::get('contrato.exportar', [\App\Http\Controllers\ContratoController::class, 'exportar'])->name('contrato.exportar');
	Route::get('contrato.update_corpo/{id}', [\App\Http\Controllers\ContratoController::class, 'update_corpo'])->name('update_corpo');


	Route::resource('checklist', ChecklistController::class);
	Route::resource('checklistProdutos', ChecklistProdutosController::class);

	Route::resource('clientes', ClientesController::class);
	Route::resource('impostos', ImpostosController::class);

	Route::resource('produtos', ProdutosController::class);
	Route::resource('entradas', EntradasController::class);
	Route::resource('saidas', SaidasController::class);
	Route::resource('categorias', CategoriasController::class);
	Route::resource('unidades', UnidadesController::class);
	Route::resource('os', OSController::class);
	Route::resource('contrato', ContratoController::class);


	Route::resource('conta', ContaController::class);
	Route::resource('conta_entradas', ContaEntradasController::class);

	Route::resource('ContasPagas', ContasPagaController::class);
	Route::get('ContasPagas.aprovar/{conta}', [\App\Http\Controllers\ContasPagaController::class, 'aprovar'])->name('ContasPagas.aprovar');


	Route::resource('fornecedores', FornecedoresController::class);
	Route::resource('vendas', VendasController::class);
	Route::resource('compras', ComprasController::class);
	Route::resource('compra_produtos', CompraProdutosController::class);
	Route::post('compraProdutos/deletar', [App\Http\Controllers\CompraProdutosController::class, 'deletar'])->name('compraProdutos.deletar');
	Route::get('compra/aprovar/{compra}', [App\Http\Controllers\ComprasController::class, 'aprovar'])->name('compra.aprovar');


	Route::get('parcelas.index/{contrato}', [\App\Http\Controllers\ParcelasController::class, 'index'])->name('parcelas.index');
	Route::get('parcelas.aprovar/{parcela}', [\App\Http\Controllers\ParcelasController::class, 'aprovar'])->name('parcelas.aprovar');

	// routes/web.php


	Route::resource('osprodutos', OsProdutosController::class);
	Route::resource('contratoprodutos', ContratoProdutosController::class);
	Route::resource('contratoservicos', ContratoServicosController::class);
	Route::resource('osservicos', OsServicoController::class);

	Route::post('osprodutos/deletar', [App\Http\Controllers\OsProdutosController::class, 'deletar'])->name('osprodutos.deletar');
	Route::post('contratoProdutos/deletar', [App\Http\Controllers\ContratoProdutosController::class, 'deletar'])->name('contratoProdutos.deletar');
	Route::post('contratoServicos/deletar', [App\Http\Controllers\ContratoServicosController::class, 'deletar'])->name('contratoServicos.deletar');
	
	Route::post('osservicos/deletar', [App\Http\Controllers\OsServicoController::class, 'deletar'])->name('osservicos.deletar');

	Route::get('contrato/aprovar/{contrato}', [App\Http\Controllers\ContratoController::class, 'aprovar'])->name('contrato.aprovar');
	Route::get('os/aprovar/{os}', [App\Http\Controllers\OSController::class, 'aprovar'])->name('os.aprovar');


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