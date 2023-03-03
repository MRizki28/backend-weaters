<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CMS\ChangeController;
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

// Route::get('/cuaca', function () {
//     return view('Admin.cuaca');
// });

Route::get('/cms/login', function () {
    return view('Auth.Login');
})->name('login');
Route::get('/cms/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/login', 'login')->name('auth.login');
    Route::get('/logout', 'logout')->name('logout');
});
Route::get('/cuaca', [ChangeController::class ,'index2']);

Route::post('/cuaca', [ChangeController::class, 'store']);
Route::get('/', function () {
    return view('Base.template');
});

Route::middleware('auth')->group(function() {
 
    
    
});