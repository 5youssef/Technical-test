<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('add', [BookController::class, 'add']);
    Route::get('edit/{id}', [BookController::class, 'edit']);
    Route::post('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
});


Route::group(['prefix' => 'projects', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('add', [ProjectController::class, 'add']);
    Route::get('edit/{id}', [ProjectController::class, 'edit']);
    Route::post('update/{id}', [ProjectController::class, 'update']);
    Route::delete('delete/{id}', [ProjectController::class, 'delete']);
});



Route::group(['prefix' => 'statuses', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [StatusController::class, 'index']);
    Route::post('add', [StatusController::class, 'add']);
    Route::get('edit/{id}', [StatusController::class, 'edit']);
    Route::post('update/{id}', [StatusController::class, 'update']);
    Route::delete('delete/{id}', [StatusController::class, 'delete']);
});