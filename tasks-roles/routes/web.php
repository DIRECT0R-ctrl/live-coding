<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeedDemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/seed-demo/users', [SeedDemoController::class, 'users'])->name('seed-demo.users');
Route::get('/seed-demo/posts', [SeedDemoController::class, 'posts'])->name('seed-demo.posts');

// DEV-only action
Route::post('/seed-demo/reseed', [SeedDemoController::class, 'reseed'])->name('seed-demo.reseed');

require __DIR__.'/auth.php';
