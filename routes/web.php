<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\TelefoneController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ClienteController::class, 'index']);
Route::get('/cliente/create', [ClienteController::class, 'create']);
Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit']);
Route::post('/', [ClienteController::class, 'store']);

Route::get('/empresa', [EmpresaController::class, 'index']);
Route::get('/empresa/create', [EmpresaController::class, 'create']);
Route::get('/empresa/{id}/edit', [EmpresaController::class, 'edit']);
Route::post('/empresa', [EmpresaController::class, 'store']);

Route::get('/telefone/list/{id}', [TelefoneController::class, 'list']);
Route::get('/telefone/create/{id}', [TelefoneController::class, 'create']);
Route::get('/telefone/{id}/edit', [TelefoneController::class, 'edit']);
Route::post('/telefone', [TelefoneController::class, 'store']);
