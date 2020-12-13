<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function(){
    return response()->json(['message' => 'Running smoothly!'], 200);
});

Route::post('user/register', [UserController::class,'store']);
Route::post('user/login', [UserController::class,'login'])->name('login');

Route::group(['middleware' => ['auth:api']], function () {    
    Route::get('user/logout', [UserController::class,'logout']);
    Route::get('user/info', [UserController::class,'getUserInfo']);
    Route::delete('/user/delete', [UserController::class, 'destroyUser']);
});



/* ADMIN
Route::get('/user/{id}', [UserController::class, 'show']);
 */
