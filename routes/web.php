<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Acervo;
use App\Livewire\Movimentacao;
use App\Livewire\PageAcervo;
use App\Livewire\Consulta;
use App\Livewire\DetalhesPage;
use App\Livewire\CreateRelatorio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcervController;
use App\Http\Controllers\LocalizacaoController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ConstanteController;

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
Route::get('/',[HomeController::class, 'index'])->name('home.index');
/// rotas consulta
Route::get('/consulta/index',Consulta::class)->name('consulta.index');
/// rotas relatorios
Route::get('/relatorios/index/{ids}',CreateRelatorio::class)->name('relatorios.show');

/// rotas acervo
Route::get('/acervo', PageAcervo::class);
Route::get('/acervo/create',PageAcervo::class)->name('acervo.create');
Route::post('/acervo/store',[AcervController::class, 'store'])->name('acervo.store');
Route::delete('/acervo/{id}', [AcervController::class, 'destroy'])->name('acervo.destroy');
Route::get('/acervo/{id}/edit', [AcervController::class, 'edit'])->name('acervo.edit');
Route::put('/acervo/{id}', [AcervController::class, 'update'])->name('acervo.update');
Route::get('/acervo/{id}',DetalhesPage::class )->name('acervo.show');

/// rotas caixa
Route::get('/caixa/create',[CaixaController::class, 'create'])->name('caixa.create');
Route::post('/caixa/store',[CaixaController::class, 'store'])->name('caixa.store');
Route::delete('/caixa/{id}', [CaixaController::class, 'destroy'])->name('caixa.destroy');
Route::get('/caixa/{id}/edit', [CaixaController::class, 'edit'])->name('caixa.edit');
Route::put('/caixa/{id}', [CaixaController::class, 'update'])->name('caixa.update');
Route::put('caixa/{id}/toggle-status', [CaixaController::class, 'toggleStatus'])->name('caixa.toggle-status');

// rotas localizacao
Route::get('/localizacao/create',[LocalizacaoController::class, 'create'])->name('localizacao.create');
Route::post('/localizacao/store',[LocalizacaoController::class, 'store'])->name('localizacao.store');
Route::delete('/localizacao/{id}', [LocalizacaoController::class, 'destroy'])->name('localizacao.destroy');
Route::get('/localizacao/{id}/edit', [LocalizacaoController::class, 'edit'])->name('localizacao.edit');
Route::put('/localizacao/{id}', [LocalizacaoController::class, 'update'])->name('localizacao.update');

//rotas constante
Route::get('/constante/index',[ConstanteController::class, 'index'])->name('constante.index');
Route::post('/constante/store',[ConstanteController::class, 'store'])->name('constante.store');
Route::put('constante/{id}/toggle-status', [ConstanteController::class, 'toggleStatus'])->name('constante.toggle-status');
Route::put('constante/{id}/toggle-arquivos', [ConstanteController::class, 'toggleArquivos'])->name('constante.toggle-arquivos');
Route::get('/constante/filtrar', [ConstanteController::class, 'filtrarConstante'])->name('constante.filtrar');

// rotas movimentacao
Route::get('/movimentacao',Movimentacao::class)->name('movimentacao.index');

// rotas admin
Route::get('/admin', function () {
    return view('admin');
});
