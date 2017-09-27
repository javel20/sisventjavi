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

    Route::resource('locals','LocalsController');
    Route::resource('tipotrabajador','TipoTrabajadorsController');
    Route::resource('trabajadors','TrabajadorsController');
    Route::resource('licencias','LicenciasController');
    Route::resource('users','UsersController');
    Route::resource('accesos','AccesosController');

    Route::resource('categorias','CategoriasController');
    Route::resource('clientes','ClientesController');
    Route::resource('compras','ComprasController');
    Route::resource('productos','ProductosController');
    Route::resource('proveedor','ProveedorsController');
    Route::resource('stockpresent','StockPresentsController');
    Route::resource('ventas','VentasController');

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
