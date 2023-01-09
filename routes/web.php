<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryClassController;
use App\Http\Controllers\CategoryTeacherController;
use App\Http\Controllers\CategorySubjectController;
use App\Http\Controllers\PostClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutUsController;
use App\Models\PostClass;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

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

//User
Route::get('/',[IndexController::class,'home']);
Route::get('/danh-muc-mon-hoc/{slug}',[IndexController::class,'subject']);
Route::get('/xem-khoa-hoc/{slug}',[IndexController::class,'khoahoc']);
Route::get('/thong-tin-giao-vien/{slug}',[IndexController::class,'giaovien']);
Route::get('/toan-bo-khoa-hoc',[IndexController::class,'allkhoahoc']);
Route::get('/toan-bo-giao-vien',[IndexController::class,'allgiaovien']);
Route::get('/ve-chung-toi',[IndexController::class,'about']);
Route::get('/toan-bo-tin-tuc',[IndexController::class,'allnews']);
Route::get('/doc-tin-tuc/{slug}',[IndexController::class,'detailnew']);
Route::get('/tim-kiem',[IndexController::class,'timkiem']);




//Contact
Route::get('/lien-he',[IndexController::class,'contact']);
Route::post('/dang-ky',[IndexController::class,'dangky']);
Route::get('/unactive-dangky/{id}',[ContactController::class,'unactive']);
Route::get('/active-dangky/{id}',[ContactController::class,'active']);
Route::get('/da-lien-he',[ContactController::class,'dalienhe']);

//Admin

Route::get('/admin',[LoginController::class,'index']);
Route::get('/dashboard',[LoginController::class,'show']);
Route::post('/admin-dashboard',[LoginController::class,'dashboard']);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/doi-mat-khau',[LoginController::class,'doimatkhau']);
Route::post('/update-mat-khau',[LoginController::class,'update_mat_khau']);
Route::post('/filter-by-date',[LoginController::class,'filter_by_date']);
Route::post('/dashboard-filter',[LoginController::class,'dashboard_filter']);
Route::post('/days',[LoginController::class,'days']);
Route::get('/profile',[LoginController::class,'profile']);
Route::get('/thay-doi-thong-tin',[LoginController::class,'change_profile']);
Route::post('/cap-nhat-thong-tin',[LoginController::class,'update_profile']);
Route::resource('/categoryteacher', CategoryTeacherController::class);
Route::resource('/categorysubject', CategorySubjectController::class);
Route::resource('/contact', ContactController::class);
Route::resource('/postclass', PostClassController::class);
Route::resource('/aboutus', AboutUsController::class);
Route::resource('/news', NewsController::class);
Route::resource('/sliders', SliderController::class);



