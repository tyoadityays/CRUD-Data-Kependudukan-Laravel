<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;

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

//Route::get('/index', [PendudukController::class, 'home'] );
Route::get('/datapenduduk', [PendudukController::class, 'index'] );
Route::get('/adddatapenduduk', [PendudukController::class, 'adddatapenduduk'] );
Route::post('/prosesaddpenduduk', [PendudukController::class, 'store'] );
Route::delete('hapusdatapenduduk/{id}', [PendudukController::class, 'destroy']);
Route::get('/editdatapenduduk/{id}', [PendudukController::class, 'editdata'] );
Route::put('/proseseditpenduduk/{id}', [PendudukController::class, 'update']);