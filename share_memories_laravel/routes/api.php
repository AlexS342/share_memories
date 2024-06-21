<?php

use App\Http\Controllers\AlbumsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/album_create', [AlbumsController::class, 'create'])->middleware('auth:sanctum');
