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

Route::get("/",function(){
    return view('welcome');
});

Route::get('/encriptacion', function () {
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


Route::get("/saveTweet",function(){
    return view('tweets.send-tweet');
});

Route::post("/tw/saveTweet", "TwitterController@saveTweet")->name("tweet.save");


#Socialite

// Route::get('login/facebook','Auth\LoginController@redirectToProvider')->name('login.fb');

// Route::get('login/facebook/callback','Auth\LoginController@handleProviderCallback')->name('login.callback');


// TEST API CON GUZZLY
Route::group(['prefix' => 'test_sm'], function () {
    Route::get("all_posts", "TestController@all_posts")->name("test.all_posts");
    Route::get("create_user", "TestController@create_user")->name("test.create_user");
    Route::get("update_user", "TestController@update_user")->name("test.update_user");
    Route::get("delete_user", "TestController@delete_user")->name("test.delete_user");
});
