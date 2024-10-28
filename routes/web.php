<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::middleware(['auth:sanctum'])->get('/', [TodoController::class, 'index'])->name('dashboard');
Route::middleware(['auth:sanctum'])->post('/', [TodoController::class, 'store'])->name('store');
Route::middleware(['auth:sanctum'])->delete('/{id}', [TodoController::class, 'destroy'])->name('destroy');