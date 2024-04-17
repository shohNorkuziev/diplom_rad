<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;

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

Route::get('/',[UserController::class,'home'])->name('home');
Route::get('/info',[UserController::class,'info'])->name('info');

// Route::get('/products',[ProductController::class,'index']);
// Route::get('/products/{id}',[ProductController::class,'show']);
// Route::post('/products',[ProductController::class,'store']);
// Route::patch('/products/{id}',[ProductController::class,'update']);
// Route::delete('/products/{id}',[ProductController::class,'destroy']);

Route::resource('/products',ProductController::class)->except('index');
Route::resource('/categories',CategoryController::class);
Route::get('sort/{id}/{sort}',[ProductController::class,'sort'])->name('sort');
Route::get('catalog',[ProductController::class,'catalog'])->name('catalog');

Route::get('/create',[UserController::class,'create'])->name('create');
Route::post('/create',[UserController::class,'store'])->name('store');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/signup',[UserController::class,'signup'])->name('signup');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/basket',[UserController::class,'basket'])->name('basket');
