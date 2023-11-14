<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/biodata', [BiodataController::class, 'show']);
Route::get('/home', [homeController::class, 'index']);
Route::get('/home', function(){
    return view('pages.dashboard');
});


//route CRUD
route::resource('product', ProductController::class);
Route::get('/produk/create', function(){
    return view('pages.create');
});
