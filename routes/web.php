<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\noticiaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [noticiaController::class, 'index'])->name('admin.noticia.index')->middleware(['auth']);

require __DIR__.'/auth.php';

route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    //route::get('/noticia', [noticiaController::class, 'index'])->name('noticia.index');
    route::any('/noticia/pesquisar', [noticiaController::class, 'pesquisar'])->name('noticia.pesquisar');
    route::get('/noticia/criar', [noticiaController::class, 'criar'])->name('noticia.criar');
    route::post('/noticia/salvar', [noticiaController::class, 'salvar'])->name('noticia.salvar');
    route::get('/noticia/editar/{id}', [noticiaController::class, 'editar'])->name('noticia.editar');
    route::put('/noticia/atualizar/{id}', [noticiaController::class, 'atualizar'])->name('noticia.atualizar');
    route::delete('/noticia/deletar/{id}', [noticiaController::class, 'deletar'])->name('noticia.deletar');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
