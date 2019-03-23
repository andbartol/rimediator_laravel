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

Route::get('/', function () {
    if (Auth::check())
        return redirect()->route('home');
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/vestiti/lista', 'VestitiController@lista')->name('vestiti.lista');

    Route::get('/vestiti/aggiungi', 'VestitiController@aggiungi')->name('vestiti.aggiungi');
    Route::post('/vestiti/aggiungi', 'VestitiController@aggiungi_post');
    Route::get('/vestiti/tipo/{tipo}', 'VestitiController@tipo')->name('vestiti.tipi');

    Route::get('/vestiti/{vestito}', 'VestitiController@mostra')->name('vestiti.mostra')
            ->middleware('can:view,vestito');

    Route::get('/consiglio', 'OutfitController@consiglio')->name('consiglio');

    Route::get('/outift/oggi', 'OutfitController@oggi')->name('outfit.oggi');
    Route::post('/outift/oggi', 'OutfitController@insertOggi');

    Route::get('/settings', 'SettingsController@view')->name('settings');
    Route::post('/settings', 'SettingsController@save');
});
