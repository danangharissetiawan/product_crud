<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::put('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::delete('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/logout', function() {
    return view('login');
})->middleware('auth');

Route::resource('users', UserController::class)
    ->middleware('auth');