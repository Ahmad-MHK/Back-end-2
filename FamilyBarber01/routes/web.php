<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ourteamController;
use App\Http\Controllers\AppointmentController;




// Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::get('/', [ourteamController::class, 'app'])->name('images.index');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/inplannen', [AppointmentController::class, 'index'])->name('inplannen.index');
Route::post('/inplannen/store', [AppointmentController::class, 'store'])->name('inplannen.store');


