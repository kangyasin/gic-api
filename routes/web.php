<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'contacts'], function () {
    Route::get('/', [ContactsController::class, 'index']);
    Route::get('/daftar', [ContactsController::class, 'create']);
    Route::post('/buat', [ContactsController::class, 'store']);
    Route::get('/edit/{id}', [ContactsController::class, 'edit']);
    Route::put('/ubah/{id}', [ContactsController::class, 'update']);
    Route::delete('/hapus/{id}', [ContactsController::class, 'destroy']);
});
