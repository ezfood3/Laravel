<?php

use Illuminate\Support\Facades\Route;
use App\Http\TextAction;

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

클로저 : function(Reqeust $req){ return 응답객체; }
컨트롤러 : [클래스명::class,'메서드명'] -> 클래스:
        '클래스명@메서드명'

        [클래스명::class,] -> 클래스: 액션 클래스 (~~~Action)
        '클래스명'-> 클레스에 작성되어 있는 __invoke메서드 실행
*/

Route::get('/user', ['App\Http\Controllers\UserController::class', 'index']);
Route::post('/user', ['App\Http\Controllers\UserController::class', 'store']);

Route::get('/uregist','App\Http\Controllers\UserController@register');
Route::post('/uregist','App\Http\Controllers\UserController@register');

Route::get('/text',App\Http\Controllers\TextAction::class);
Route::get('/view',App\Http\Controllers\ViewAction::class);
Route::get('/json',App\Http\Controllers\JsonAction::class);
Route::get('/download',App\Http\Controllers\DownloadAction::class);