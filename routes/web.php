<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

use App\Http\Controllers\Pilota;
Route::get('/api/token', [Pilota::class, "getToken"]);

Route::get('/api/pilotak', [Pilota::class, "getPilotak"]);

Route::delete('/api/pilotak/{id}', [Pilota::class, "deletePilota"]);

Route::put('/api/pilotak', [Pilota::class, "insertPilota"]);

Route::post('/api/pilotak/{id}', [Pilota::class, "updatePilota"]);