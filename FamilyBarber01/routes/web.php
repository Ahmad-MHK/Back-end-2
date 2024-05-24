<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContactController;



Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

