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

Route::get('/', function () { // Closure 클로저
    return view('welcome'); // view 헬퍼함수 welcome.blade.php 파일처리
});

Route::get('/home', function() {
    return view('home'); // home.blade.php 파일처리
});

Route::get(
    '/register', // 요청 주소
    [App\Http\Controllers\RegisterController::class,'create']
    // [컨트롤러클래스명::class, 메서드명]
)->middleware('guest')->name('register');
Route::post(
    '/register', // 요청 주소
    [App\Http\Controllers\RegisterController::class, 'store']
)->middleware('guest');

Route::get(
    '/login', // 요청주소
    [App\Http\Controllers\LoginController::class, 'index']
)->middleware('guest')->name('login');
Route::post(
    '/login',
    'App\Http\Controllers\LoginController@authenticate'
    // [App\Http\Controllers\LoginController::class, 'authenticate'] 와 같음
)->middleware('guest');

Route::get(
    '/logout',
    [App\Http\Controllers\LoginController::class, 'logout']
)->middleware('auth')->name('logout');

/* 
Route::HTTP요청메서드(
    요청URL,
    클로저, 컨트롤러
)

클로저 : function(){ return 응답객체; }
컨트롤러 : [클래스명::class,'메서드명']
*/