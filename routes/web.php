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

//Rotte Pubbliche che non necessitano di Autenticazione
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PageController@index');


//Rotte di Autenticazione che ci fornisce Laravel per far Funzionare tutto(login,autentcazione,cambio password logout, ecc..)
Auth::routes();


//Zona Rotte Nostra Area Admin
Route::middleware('auth') //funzione di controllo login/logout, verifica se l'utente è autentificato
->namespace('Admin') //il namespace è una Cartella che conterrà tutti i nostri Controller, ovvero (Cartella Admin)
->name('admin.') //il name è il nome delle nostre Rotte (es: admin.home, vedi sotto)
->prefix('admin') // il prefisso è /admin/ stesso, divide le url del(Front office:localhost:8000) dal(Back office /admin/home)
->group(function() { // group applica tutte le regole sopra raggrupandole internamente alla funzione group{}
    Route::get('/home', 'HomeController@index')->name('home'); //admin.home
    Route::resource('posts', 'PostController');
});


