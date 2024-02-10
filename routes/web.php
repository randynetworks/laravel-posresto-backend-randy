<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return redirect('login');
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard.dashboard');
    })->name('home');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});


// error
Route::get('/error-403', function () {
    return view('template.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('template.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('template.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('template.error-503', ['type_menu' => 'error']);
});
