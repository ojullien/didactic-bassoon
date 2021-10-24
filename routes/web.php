<?php

declare(strict_types=1);

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/departements', function () {
    return 'departements list';
})->name('departements');

Route::permanentRedirect('/products', '/departements');

Route::get('/products/{id}', function (int $id) {
    return 'departement products list:' . $id;
})->where('id', '[0-9]+')->name('products');

Route::permanentRedirect('/product', '/departements');

Route::get('/product/{id}', function (int $id) {
    return 'product info:' . $id;
})->where('id', '[0-9]+')->name('product');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
