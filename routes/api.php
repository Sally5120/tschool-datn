<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',[PageController::class,'homepage']);
Route::post('/contact',[PageController::class,'contact']);
Route::get('/subject',[PageController::class,'subject']);
Route::get('/course',[PageController::class,'course']);
Route::get('/teacher',[PageController::class,'teacher']);
Route::get('/news',[PageController::class,'news']);
Route::get('/slider',[PageController::class,'slider']);
