<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
//Route::get('/', function () {
////    return view('welcome');
//    return ('Page dacceuil');
//});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/signup', [AuthController::class, 'signup'])->name('auth.signup');
Route::post('/signup', [AuthController::class, 'create'])->name('auth.sign');
Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::post('/edit/{article}', [ArticleController::class, 'update'])->name('articles.edit');
    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.delete');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/edit/{category}', [CategoryController::class, 'update'])->name('category.edit');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

});

