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
    echo "<strong>" . "HASH MAKE:" . "</strong>" . "<br/>";
    echo Hash::make('api_laravel') . "<br/>";
    echo "<strong>" . "BCRYPT:". "</strong>" . "<br/>";
    echo bcrypt('mi_secret_pass') . "<br/>";
    //Encriptar
    echo "<strong>" . "CRYPT:" . "</strong>" . "<br/>";
    $cadena_encriptada= Crypt::encrypt($cadena);
    echo $cadena_encriptada . "<br/>";
    //Desencriptar
    echo "<strong>" . "DECRYPT:" . "</strong>" . "<br/>";
    $cadena_desencriptada = Crypt::decrypt($cadena_encriptada);
    echo  $cadena_desencriptada . "<br/>";
   
    echo "<strong>" . "MD5:" . "</strong>" . "<br/>";
    echo md5('stalin_maza'). "<br/>";
});
