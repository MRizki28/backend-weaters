<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\CMS\ChangeController;
use App\Http\Controllers\CMS\CuacaController;
use App\Models\CuacaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cuaca', [ApiController::class, 'index']);
Route::get('/cuaca/{id}', [ApiController::class, 'show']);

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);


// Route::get('/cuaca', [ChangeController::class, 'index']);
// Route::post('/cuaca', [ChangeController::class, 'store']);
// Route::get('/cuaca/{id}', [ChangeController::class, 'getById']);

Route::get('/cuaca1', [ChangeController::class ,'index']);




Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});