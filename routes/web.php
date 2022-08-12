<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignInController;
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
Route::get('/',[FrontendController::class, 'main'])->name('main');
Route::get('/index', [FrontendController::class, 'index'])->name('home'); 
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/productfe', [FrontendController::class, 'productfe'])->name('productfe');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/detail', [FrontendController::class, 'detail'])->name('detail');

Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function() {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
});
Route::middleware('auth')->prefix('/auth')->name('auth.')->group(function() {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

});
Route::middleware('guest')->prefix('/auth')->name('sigin.')->group(function() {
    Route::get('/add', [SignInController::class, 'show'])->name('show');
    Route::post('/add', [SignInController::class, 'store'])->name('post');

});

// Admin
Route::middleware(['auth', 'checkAdmin'])->prefix('/admin')->name('admin.')->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/users')->name('users.')->group(function () { 
        Route::get('/', [UserController::class, 'index'])->name('list'); 
        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    });
    
    Route::prefix('/category')->name('categorys.')->group(function () { 
        Route::get('/', [CategoryController::class, 'index'])->name('list'); 
        Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
    });
    
    Route::prefix('/product')->name('products.')->group(function () { 
        Route::get('/', [ProductController::class, 'index'])->name('list'); 
        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('delete');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    });

});