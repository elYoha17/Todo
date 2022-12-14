<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index']);
Route::post('/create', [TaskController::class, 'store']);
Route::get('/{id}', [TaskController::class, 'show'])->whereNumber('id');
Route::put('/{id}', [TaskController::class, 'update'])->whereNumber('id');
Route::delete('/{id}', [TaskController::class, 'destroy'])->whereNumber('id');
