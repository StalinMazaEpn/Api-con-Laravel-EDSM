LaraTrus Paquete

Mandar un token de autenticacion en el api

Manejar los roles con middlewares

composer require "santigarcor/laratrust:4.0.*"

Comando publicar assets de laratrust
php artisan vendor:publish --tag="laratrust"
php artisan config:clear

Laratruts trabaja con un token generado de manera automatizada

php artisan laratrust:migration //Crear Migracion de Laratrust

php artisan migrate //Ejecutar migraciones

php artisan make:model Role //Modelo de Roles
php artisan make:model Permission //Modelo de Permisos
//Estos modelos extiendan de laratrust y no del modelo eloquent

//Ejecutar el Seed de Laratrust

php artisan laratrust:seeder

//El seeder llenara la estructura de todas las tablas de laratrust

php artisan db:seed 

composer dump-autoload cargar clases //para arreglar error al crear seed

//TRAIT AGRUPACION DE METODOS CON FUNCIONES ESPECIFICAS PARA DIFERENTES CLASES

php artisan make:controller ProductsController --resource

Resource Controllers
Laravel resource routing assigns the typical "CRUD" routes to a controller with a single line of code. For example, you may wish to create a controller that handles all HTTP requests for "photos" stored by your application.

//Envio de Correos
//sendgrid.net
// php artisan make:mail TestEmail
php artisan make:controller MailController
 

 php artisan make:migration create_products_table

 php artisan migrate --path=database/migrations/2019_04_03_013158_create_products_table.php

 Subir archivos a bucket de Amazon
 Creamos un bucker en amazon
 ingreso credenciales

 Route::post('/archivoS3','ProductsController@storeS3')->name("products.store_s3");


 composer require thujohn/twitter

 php artisan vendor:publish --provider="Thujohn\Twitter\TwitterServiceProvider"

 php artisan make:migration create_tweets_table
 php artisan make:model Tweet

 http://laravel.jsmc/api_laravel_ed/public/api/tw/timeline?api_token=de146d0ffcb5cc0fed548d560d211a

http://laravel.jsmc/api_laravel_ed/public/api/tw/search/5/%23alcaldequito?api_token=de146d0ffcb5cc0fed548d560d211a

composer require laravel-notification-channels/twitter


php artisan migrate --path=database/migrations/2019_04_03_040428_create_tweets_table.php

php artisan make:notification TweetPublished

Socialite Login
composer require laravel/socialite
Integrar el Inicio de Sesion con Facebook y necesita https

INTRODUCCION A HEROKU

Soporta: NodeJS, PHP, Ruby, Python, Java, GO, Kotlin

Indicar donde esta el proyecto compilado



