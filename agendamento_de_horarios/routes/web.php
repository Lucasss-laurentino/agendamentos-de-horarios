<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::get('/', [UserController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/cadastrar', [UserController::class, 'cadastrar']);

Route::post('/store', [UserController::class, 'store']);

Route::post('/auth', [UserController::class, 'auth']);

Route::get('/home', [UserController::class, 'home']);

Route::get('/update/{id}', [UserController::class, 'update']);

Route::get('/meu_horario', [UserController::class, 'meu_horario']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/desmarcar/{id}', [UserController::class, 'desmarcar']);

Route::get('/recuperar', [UserController::class, 'recuperar']);

Route::post('/enviar', [UserController::class, 'enviar']);

Route::get('/form_redefinir', [UserController::class, 'form_redefinir']);

Route::post('/redefinir', [UserController::class, 'redefinir']);

Route::get('/todos_horarios', [UserController::class, 'dados_horas']);

Route::get('/excluir/{id}', [UserController::class, 'excluir']);

Route::get('/adicionar', [UserController::class, 'adicionar']);

Route::any('/cadastrar_hora', [UserController::class, 'cadastrar_hora']);

Route::get('/todos_usuarios', [UserController::class, 'todos_usuarios']);

Route::get('/excluir_usuario/{id}', [UserController::class, 'excluir_usuario']);