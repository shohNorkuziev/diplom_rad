<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.main');
})->name('home');

Route::get('signin-page', function() {
    return view('layouts.signin');
})->name('login');
Route::post('signin',[UserController::class, 'signin'])->name('signin');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('create-worker-page', function(){
        return view('layouts.admin.create_worker');
    })->name('createWorkerPage');
    Route::post('create-worker', [UserController::class, 'store'])->name('create-worker');
});
// Route::middleware(['auth:sanctum', 'role:admin'])->post(function () {
//     Route::post('create-worker', [UserController::class, 'store'])->name('create-worker');
// });
