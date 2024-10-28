<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
});

Route::middleware(['auth:sanctum'])->delete('/delete/{id}', [TodoController::class, 'destroy'])->name('destroy');