<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    Route::get('user/info', [UserController::class,'getInfo']);
    Route::delete('/user/delete', [UserController::class, 'destroyUser']);

    Route::get('/category/showAll', [CategoryController::class, 'indexAll']);
    Route::get('/category/{name}', [CategoryController::class, 'getByName']);

    Route::get('/product/showAll', [ProductController::class, 'indexAll']);
    Route::get('/product/{id}', [ProductController::class, 'getById']);
    Route::get('/product/{name}', [ProductController::class, 'getByName']);
    

    Route::group(['middleware' => ['role:admin']], function () {

        Route::post('/category/add', [CategoryController::class, 'store']);

        Route::post('/product/add', [ProductController::class, 'store']);
        Route::post('/product/image/{id}', [ProductController::class, 'uploadImage']);
        Route::put('/product/{id}', [ProductController::class, 'update']);
        Route::delete('/product/{id}', [ProductController::class, 'destroy']);
    });
});
