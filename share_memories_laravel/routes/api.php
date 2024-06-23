<?php

use App\Http\Controllers\AlbumsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/albums/create', [AlbumsController::class, 'create'])->middleware('auth:sanctum');
Route::get('/albums/get', [AlbumsController::class, 'get'])->middleware('auth:sanctum');
