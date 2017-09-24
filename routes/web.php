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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'FrontController@index')->name('front.index');


Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.index ');
    });

    Route::resource('categorias','CategoriasController');
    Route::resource('clientes','ClientesController');
    Route::resource('compras','ComprasController');
    Route::resource('productos','ProductosController');
    Route::resource('proveedor','ProveedorsController');
    Route::resource('stockpresent','StockPresentsController');
    Route::resource('users','UsersController');
    Route::resource('ventas','VentasController');

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
