<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;


Route::get('/', [AppController::class, 'home']);

Route::get('/home', [AppController::class, 'home'])->name('home');
Route::get('/sobre', [AppController::class, 'sobre'])->name('sobre');
Route::get('/produtos', [AppController::class, 'produtos'])->name('produtos');
Route::get('/ListaProdutos', [AppController::class, 'listaProdutos'])->name('ListaProdutos');
Route::get('/contato', [AppController::class, 'contato'])->name('contato');
Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');
Route::get('/frmlogin', [AppController::class, 'frmlogin'])->name('frmlogin');
Route::post('/logout', [AppController::class, 'logout'])->name('logout');

Route::post('/salvarcontato', [AppController::class, 'salvarContato']);

Route::get('/frmproduto', [AppController::class, 'frmproduto']);
Route::post('/addproduto', [AppController::class, 'addproduto']);

Route::get('/frmeditarproduto/{id}', [AppController::class, 'frmeditarproduto'])->name('frmeditarproduto');
Route::delete('/excluirproduto/{id}', [AppController::class, 'excluirproduto'])->name('excluirproduto');

Route::get('/frmusuario', [AppController::class, 'frmusuario']);
Route::post('/addusuario', [AppController::class, 'addusuario']);
Route::get('/usuarios', [AppController::class, 'usuarios']);

Route::get('/frmeditarusuario/{id}', [AppController::class, 'frmeditarusuario']);
Route::put('/atualizarusuario/{id}', [AppController::class, 'atualizarusuario']);
Route::delete('/excluirusuario/{id}', [AppController::class, 'excluirusuario']);

Route::get('/cadastro', function () {
    return view('cadastroUsuario');
});
Route::post('/salvarusuario', [AppController::class, 'salvarUsuario']);

Route::get('/frmlogin', function () {
    return view('frmlogin');
});
Route::post('/login', [AppController::class, 'logar']);

Route::get('/ListaContatos', [AppController::class, 'listaContatos'])->name('ListaContatos');
Route::put('/atualizarproduto/{id}', [AppController::class, 'atualizarproduto'])->name('atualizarproduto');
Route::delete('/excluircontato/{id}', [AppController::class, 'excluircontato'])->name('excluircontato');

