<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\HomeController;


Route::apiResource('category', CategoryController::class);


Route::get('/home', [HomeController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
