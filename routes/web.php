<?php

use App\Http\Controllers\CMS\CuacaController;
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

Route::get('/', function () {
    return view('Base.template');
});
Route::get('/cuaca', function () {
    return view('Admin.cuaca');
});

Route::post('/cuaca', [CuacaController::class ,'store'])->name('tambahData.cuaca');
Route::get('/cuaca', [CuacaController::class ,'index']);
