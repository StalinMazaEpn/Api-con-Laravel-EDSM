<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductsController;

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

//  Prefijo https://miruta.com/api/{metodo}

//http://laravel.jsmc/api_laravel_ed/public/api/user?api_token=XXXXXX

//Route::middleware('auth:api')->get('/user', function (Request $request) {
Route::middleware('auth:api')->group(function () {
    // return $request->user();
    Route::get('/products/all', 'ProductsController@index')->name('products.all');

    Route::get('/correo/basico', 'MailController@enviarBasico')->name("correo.basico");

    Route::get('/correo/html', 'MailController@enviarHTML')->name("correo.html");

    Route::get('/correo/template', 'MailController@enviarTemplate')->name("correo.template");

    // Subir Archivos Locales
    // http://laravel.jsmc/api_laravel_ed/public/api/archivoLocal?api_token=XXXXXX

    //Guardar Archivos
    Route::post('/archivoLocal','ProductsController@storeLocal')->name("products.store_local");

    //Twitter
    # http://laravel.jsmc/api_laravel_ed/public/api/tw/timeline?api_token=XXXXXX
    Route::get('/tw/timeline','TwitterController@timeline')->name("twitter.timeline");

    Route::get('/tw/timeline/{count}/{screenName}','TwitterController@timeline_params')->name("twitter.timeline_params");

    Route::get('/tw/search/{count}/{search}','TwitterController@search')->name("twitter.search");


});

#GET - Petición
Route::get('welcome', function () {
    return response()->json(['data'=>'Bienvenidos al Workshop de Laravel','code'=> 200]);
});


