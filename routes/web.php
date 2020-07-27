<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('/', 'ProdukController@index');
Route::get('/produk/create', 'ProdukController@create');
Route::post('/produk', 'ProdukController@store');
Route::get('/produk/{id}/edit','ProdukController@edit');
Route::patch('/produk/{id}','ProdukController@update');
Route::delete('produk/{id}','ProdukController@destroy');
