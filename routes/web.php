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

    Route::group(['middleware' => ['accesomenu:11']], function () {
        Route::resource('locals','LocalsController');
    });

    Route::group(['middleware' => ['accesomenu:10']], function () {
        Route::resource('tipotrabajador','TipoTrabajadorsController');
    });
    //Route::resource('trabajadors','TrabajadorsController');

    Route::group(['middleware' => ['accesomenu:9']], function () {
        Route::resource('licencias','LicenciasController');
    });

    Route::group(['middleware' => ['accesomenu:8']], function () {
        Route::resource('users','UsersController');
    });
    
    Route::group(['middleware' => ['accesomenu:8']], function () {
        Route::resource('accesos','AccesosController');
    });
    
    Route::group(['middleware' => ['accesomenu:1']], function () {
        Route::resource('categorias','CategoriasController');
    });

    Route::group(['middleware' => ['accesomenu:7']], function () {
        Route::resource('clientes','ClientesController');
    });

    Route::group(['middleware' => ['accesomenu:4']], function () {
        Route::resource('compras','CompsController');
    });

    Route::group(['middleware' => ['accesomenu:2']], function () {
        Route::resource('productos','ProductosController');
    });

    Route::group(['middleware' => ['accesomenu:6']], function () {
        Route::resource('proveedor','ProveedorsController');
    });
    
    Route::group(['middleware' => ['accesomenu:3']], function () {
        Route::resource('stockpresent','StockPresentsController');
        Route::get('ajaxstockpresent','StockPresentsController@findByIdStockPresent');
    });

    Route::group(['middleware' => ['accesomenu:5']], function () {
        Route::resource('ventas','VentasController');
    });
    
});

Route::post('postlogin','Auth\LoginController@postLogin')->name('postlogin');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
