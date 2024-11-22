<?php

use App\Http\Controllers\ArticleApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signup', [AuthApiController::class, 'create'])->name('auth.sign');
Route::post('/login', [AuthApiController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthApiController::class, 'destroy'])->name('auth.logout');

    Route::get('/article', [ArticleApiController::class, 'index'])->name('articles.index');
    Route::post('/article', [ArticleApiController::class, 'store'])->name('articles.store');
    Route::get('/article/{id}', [ArticleApiController::class, 'show'])->name('articles.show');
    Route::post('/article/{id}', [ArticleApiController::class, 'update'])->name('articles.edit');
    Route::delete('/article/{id}', [ArticleApiController::class, 'destroy'])->name('articles.delete');

    Route::get('/category', [CategoryApiController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryApiController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryApiController::class, 'show'])->name('category.show');
    Route::post('/category/{id}', [CategoryApiController::class, 'update'])->name('category.edit');
    Route::delete('/category/{id}', [CategoryApiController::class, 'destroy'])->name('category.delete');


