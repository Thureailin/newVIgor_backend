<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/category/create',[\App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
Route::post('/category/edit/${id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
Route::post('/category/delete/${id}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/category',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
Route::post('/subCategory/create',[\App\Http\Controllers\CategoryController::class,'store'])->name('SubCategory.create');
Route::post('/subCategory/edit/${id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('SubCategory.create');
Route::post('/subCategory/delete/${id}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('SubCategory.create');
Route::post('/subCategory',[\App\Http\Controllers\CategoryController::class,'index'])->name('SubCategory.index');
