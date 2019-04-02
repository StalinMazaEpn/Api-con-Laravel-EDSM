<?php

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

Route::get('/dc', function () {
    //Encriptar en Laravel
    $cadena = "laravel_api";
    echo "HASH MAKE:" . "<br/>";
    echo Hash::make('api_laravel') . "<br/>";
    echo "BCRYPT:" . "<br/>";
    echo bcrypt('mi_secret_pass') . "<br/>";
    //Encriptar
    echo "CRYPT:" . "<br/>";
    echo Crypt::encrypt($cadena) . "<br/>";
    //Desencriptar
    // echo Crypt::decrypt($cadena) . "<br/>"; 
    echo "MD5:" . "<br/>";
    echo md5('stalin_maza'). "<br/>";
});
