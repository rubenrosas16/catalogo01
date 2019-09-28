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
Route::get('/', 'CatalogoControlador@catalogo');

Route::get('/listado', 'CatalogoControlador@listado');

Route::post('/nuevoProducto', 'CatalogoControlador@nuevoProducto');

Route::get('/borrarProducto', 'CatalogoControlador@borrarProducto');

Route::get('/buscarProducto', 'CatalogoControlador@buscarProducto');

Route::post('/actualizarProducto', 'CatalogoControlador@actualizarProducto');

/*
Route::get('/', function () {
    return view('catalogo');
});
*/
