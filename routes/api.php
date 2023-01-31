<?php

use App\Http\Controllers\Api\ClassApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\ApipostApiController;
use App\Http\Controllers\Product\ProductController;
use Spatie\FlareClient\Api as FlareClientApi;

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

// Student
Route::post('student','App\Http\Controllers\Api\StudentApiController@store');
Route::get('student','App\Http\Controllers\Api\StudentApiController@index');
Route::get('student/{id}','App\Http\Controllers\Api\StudentApiController@show');
Route::put('student/{id}','App\Http\Controllers\Api\StudentApiController@update');
Route::delete('student/{id}','App\Http\Controllers\Api\StudentApiController@destroy');


// Class
Route::post('create',[ClassApiController::class,'store']);
Route::get('index',[ClassApiController::class,'index']);
Route::get('show/{id}',[ClassApiController::class,'show']);
Route::delete('delete/{id}',[ClassApiController::class,'destroy']);
Route::put('update/{id}',[ClassApiController::class,'update']);

//   Post
Route::controller(ApipostApiController::class)->group(function () {
    Route::post('post/create', 'store');
    Route::get('post/index', 'index');
    Route::get('post/show/{id}','show');
    Route::put('post/update/{id}','update');
    Route::delete('post/delete/{id}','delete');
});

// Comemnt

Route::post('comment/create',[CommentController::class,'store']);
Route::get('comment/index',[CommentController::class,'index']);
Route::get('comment/show/{id}',[CommentController::class,'show']);
Route::put('comment/update/{id}',[CommentController::class,'update']);
Route::delete('comment/delete/{id}',[CommentController::class,'delete']);
