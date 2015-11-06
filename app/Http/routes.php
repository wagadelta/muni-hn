<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

\Event::subscribe('App\Subscriber\Auth');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() { 

    Route::resource('roles', 'RolesController');
    Route::get('roles/{id}/delete', [
        'as' => 'roles.delete',
        'uses' => 'RolesController@destroy',
    ]);
    
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/delete', [
        'as' => 'users.delete',
        'uses' => 'UsersController@destroy',
    ]);
    
    Route::resource('bitacoras', 'BitacoraController');
    Route::get('bitacoras/{id}/delete', [
        'as' => 'bitacoras.delete',
        'uses' => 'BitacoraController@destroy',
    ]);
}); //middleware auth    


Route::resource('api/aplications', 'API\AplicationAPIController');
Route::resource('aplications', 'AplicationController');
Route::get('aplications/{id}/delete', [
    'as' => 'aplications.delete',
    'uses' => 'AplicationController@destroy',
]);


Route::resource('api/diaFestivos', 'API\DiaFestivoAPIController');
Route::resource('diaFestivos', 'DiaFestivoController');
Route::get('diaFestivos/{id}/delete', [
    'as' => 'diaFestivos.delete',
    'uses' => 'DiaFestivoController@destroy',
]);


Route::resource('api/motivoIngresos', 'API\motivoIngresoAPIController');

Route::resource('motivoIngresos', 'motivoIngresoController');

Route::get('motivoIngresos/{id}/delete', [
    'as' => 'motivoIngresos.delete',
    'uses' => 'motivoIngresoController@destroy',
]);


Route::resource('api/motivoLlamadas', 'API\motivoLlamadaAPIController');

Route::resource('motivoLlamadas', 'motivoLlamadaController');

Route::get('motivoLlamadas/{id}/delete', [
    'as' => 'motivoLlamadas.delete',
    'uses' => 'motivoLlamadaController@destroy',
]);


Route::resource('api/opcionMenus', 'API\opcionMenuAPIController');

Route::resource('opcionMenus', 'opcionMenuController');

Route::get('opcionMenus/{id}/delete', [
    'as' => 'opcionMenus.delete',
    'uses' => 'opcionMenuController@destroy',
]);


Route::resource('api/usuarioRols', 'API\usuarioRolAPIController');

Route::resource('usuarioRols', 'usuarioRolController');

Route::get('usuarioRols/{id}/delete', [
    'as' => 'usuarioRols.delete',
    'uses' => 'usuarioRolController@destroy',
]);


Route::resource('api/tipoPersonas', 'API\tipoPersonaAPIController');

Route::resource('tipoPersonas', 'tipoPersonaController');

Route::get('tipoPersonas/{id}/delete', [
    'as' => 'tipoPersonas.delete',
    'uses' => 'tipoPersonaController@destroy',
]);
