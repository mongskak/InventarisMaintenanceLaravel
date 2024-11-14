<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MaintenanceItemController;


Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::Post('/login', [LoginController::class, 'login']);
Route::delete('/logout', [LoginController::class, 'logout']);

//route product
Route::get('/products', [ProductController::class, 'list']);
Route::get('/products/add', [ProductController::class, 'add']);
Route::get('/products/{id}', [ProductController::class, 'detail']);
Route::post('/products/create', [ProductController::class, 'create']);
Route::delete('/products/delete/{id}', [ProductController::class, 'delete']);
Route::put('/products/edit/{id}', [ProductController::class, 'edit']);

//route maintenance
Route::get('/maintenances', [MaintenanceController::class, 'list']);
Route::get('/maintenances/add', [MaintenanceController::class, 'add']);
Route::get('/maintenances/{id}', [MaintenanceController::class, 'detail']);
Route::post('/maintenances/create', [MaintenanceController::class, 'create']);
Route::delete('/maintenances/delete/{id}', [MaintenanceController::class, 'delete']);
Route::put('/maintenances/edit/{id}', [MaintenanceController::class, 'edit']);

//route item
Route::get('/items', [ItemController::class, 'list']);
Route::get('/items/add', [ItemController::class, 'add']);
Route::post('/items/create', [ItemController::class, 'create']);
Route::delete('/items/delete/{id}', [ItemController::class, 'delete']);

//route maintenanceItem
Route::post('/maintenanceitem/create', [MaintenanceItemController::class, 'create']);
Route::delete('/maintenanceitem/delete/{id}', [MaintenanceItemController::class, 'delete']);
