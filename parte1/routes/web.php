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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function() {
    echo "Este é um teste";
});

Route::get('/html', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});
Route::get ('/dataHora/', 'App\Http\Controllers\parte1controller@dataHora');
Route::get ('/horaData/', [App\Http\Controllers\parte1controller::class, 'dataHora']);
Route::get ('/site/', [App\Http\Controllers\sitecontroller::class, 'web']);
Route::get ('/home/', [App\Http\Controllers\sitecontroller::class, 'laravel1']);
