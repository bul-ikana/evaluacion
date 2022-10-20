<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;

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
Route::get('/', [ProfesorController::class, 'index']);
Route::get('evalua/{id}', [ProfesorController::class, 'evalua']);
Route::post('evalua/{id}', [ProfesorController::class, 'evaluaForm']);
