<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[homecontroller::class,'homepage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
route::get('/home',[AdminController::class,'index']);
Route::middleware(['auth'])->group(function () {
    // Define routes for AdminController here
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); 
});
