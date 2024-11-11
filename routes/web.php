<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'list']);
Route::get('/products/add', [ProductController::class, 'add']);
Route::get('/products/{id}', [ProductController::class, 'detail']);

Route::post('/products/create', [ProductController::class, 'create']);
Route::delete('/products/delete/{id}', [ProductController::class, 'delete']);
Route::put('/products/edit/{id}', [ProductController::class, 'edit']);


Route::get(
    '/',
    function () {
        return view('layouts.pages.dashboard.index');
    }
);
