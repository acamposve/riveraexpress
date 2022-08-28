<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\CartController;

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
    return view('auth.login');
});
Route::resource('products', ProductoController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('clients', ClientsController::class);
Route::resource('debts', DebtsController::class);
Route::resource('purchase', DebtsController::class);
Route::resource('sale', DebtsController::class);
Route::resource('providers', ProvidersController::class);
Route::resource('cart', CartController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
