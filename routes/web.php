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

//Rotte Pubbliche
Route::get('/', function () {
    return view('welcome');
});


//Rotte di Autenticazione che ci fornisce Laravel
Auth::routes();


//Rotte Nostra Area Admin
Route::middleware('auth')
->namespace('Admin') //il namespace è una Cartella che conterrà tutti i nostri Controller, ovvero (Cartella Admin)
->name('admin.') //il name è il nome delle nostre Rotte (es: admin.home, vedi sotto)
->prefix('admin') // il prefisso è /admin/ stesso, divide le url del(Front office:localhost:8000) dal(Back office /admin/home)
->group(function() {
    Route::get('/home', 'HomeController@index')->name('home'); //admin.home
});

